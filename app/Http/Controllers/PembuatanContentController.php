<?php

namespace App\Http\Controllers;

use App\Models\Content;
use App\Models\Layanan;
use App\Models\SubMenu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PembuatanContentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $layanan = Layanan::where('created_by', Auth::user()->id)->get()->pluck('id');
        $contents = Content::whereIn('layanan_id', $layanan)->get();

        return view('page.opd.content.index', compact('contents'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $layanan = Layanan::where('created_by', Auth::user()->id)->get();
        $content = new Content();

        if (Auth::user()->hasRole('superadmin') || Auth::user()->hasRole('admin')) {
            $submenu = SubMenu::all();
        } else {
            $submenu = [Auth::user()->opd->submenu->id, Auth::user()->opd->submenu->nama];
        }

        return view('page.opd.content.create', compact('content', 'layanan', 'submenu'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'layanan_id' => 'required',
            'nama' => 'required',
            'deskripsi' => 'required',
        ]);

        DB::beginTransaction();
        try {
            $content = Content::create([
                'layanan_id' => $request->layanan_id,
                'nama' => $request->nama,
                'deskripsi' => $request->deskripsi,
            ]);

            DB::commit();
            return redirect()->route('portal.pembuatan.contents.index')->with('success', 'Berhasil menambah Content');
        } catch (\Throwable $th) {
            DB::rollBack();
            dd($th);
            return redirect()->back()->with('danger', 'Gagal menambah Content');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $layanan = Layanan::where('created_by', Auth::user()->id)->get();
        $content = Content::find($id);

        if (Auth::user()->hasRole('superadmin') || Auth::user()->hasRole('admin')) {
            $submenu = SubMenu::all();
        } else {
            $submenu = [Auth::user()->opd->submenu->id, Auth::user()->opd->submenu->nama];
        }

        return view('page.opd.content.create', compact('content', 'layanan', 'submenu'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'layanan_id' => 'required',
            'nama' => 'required',
            'deskripsi' => 'required',
        ]);

        DB::beginTransaction();
        try {
            $content = Content::find($id);

            $content->update([
                'layanan_id' => $request->layanan_id,
                'nama' => $request->nama,
                'deskripsi' => $request->deskripsi,
            ]);

            DB::commit();
            return redirect()->route('portal.pembuatan.contents.index')->with('success', 'Berhasil mengubah Content');
        } catch (\Throwable $th) {
            DB::rollBack();
            dd($th);
            return redirect()->back()->with('danger', 'Gagal mengubah Content');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $content = Content::find($id);

        DB::beginTransaction();
        try {
            $content->delete();
            DB::commit();

            return response()->json([
                'success' => true,
                'message' => 'Berhasil Menghapus Data',
            ]);
        } catch (\Throwable $th) {
            //throw $th;
            return response()->json([
                'success' => false,
                'message' => 'Gagal Menghapus Data',
            ]);
        }
    }
}
