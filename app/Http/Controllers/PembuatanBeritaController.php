<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class PembuatanBeritaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::user()->hasRole('superadmin')) {
            $berita = Berita::all();
        } else if (Auth::user()->hasRole('admin')) {
            $berita = Berita::whereHas('user', function ($q) {
                $q->whereHas('opd', function ($query) {
                    $query->where('kabkot_id', Auth::user()->opd->kabkot_id);
                });
            })->get();
        } else if (Auth::user()->hasRole('opd')) {
            $berita = Berita::whereHas('user', function ($q) {
                $q->whereHas('opd', function ($query) {
                    $query->where('opd_id', Auth::user()->opd->kabkot_id);
                });
            })->get();
        } else {
            $berita = Berita::where('created_by', Auth::user()->id)->get();
        }
        return view('page.opd.berita.index', compact('berita'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $berita = new Berita();
        return view('page.opd.berita.create', compact('berita'));
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
            'banner' => 'required|mimes:png,jpg,jpeg',
            'judul' => 'required',
            'isi' => 'required',
            'tag.*' => 'required'
        ]);

        DB::beginTransaction();
        try {

            if (Auth::user()->hasRole('upt')) {
                $verif = '0';
            } else if (Auth::user()->hasRole('opd')) {
                $verif = '1';
            } else {
                $verif = '2';
            }

            Berita::create([
                'judul' => $request->judul,
                'slug' => Str::slug($request->judul),
                'gambar' => Storage::disk('public_uploads')->put('banner_berita', $request->banner),
                'isi' => $request->isi,
                'tags' => $request->tag,
                'verif' => $verif,
                'created_by' => Auth::user()->id,
            ]);
            DB::commit();
            return redirect()->route('portal.pembuatan.beritas.index')->with('success', 'Berhasil menambah berita');
        } catch (\Throwable $th) {
            //throw $th;
            dd($th);
            DB::rollBack();
            return redirect()->back()->with('danger', 'Gagal menambah berita');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Berita  $berita
     * @return \Illuminate\Http\Response
     */
    public function show(berita $berita)
    {
        $berita = Berita::where('id', $berita->id)->first();
        return view('page.opd.berita.show', compact('berita'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Berita  $berita
     * @return \Illuminate\Http\Response
     */
    public function edit($berita)
    {
        $berita = Berita::find($berita);
        return view('page.opd.berita.create', compact('berita'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Berita  $berita
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $berita)
    {
        $this->validate($request, [
            'banner' => 'mimes:png,jpg,jpeg',
            'judul' => 'required',
            'isi' => 'required',
            'tag.*' => 'required'
        ]);

        DB::beginTransaction();
        try {
            $berita = Berita::find($berita);
            if ($request->file()) {
                $berita->update([
                    'gambar' => Storage::disk('public_uploads')->put('banner', $request->banner)
                ]);
            }
            $berita->update([
                'judul' => $request->judul,
                'slug' => Str::slug($request->judul),
                'isi' => $request->isi,
                'tags' => $request->tag,
                'updated_by' => Auth::user()->id
            ]);
            DB::commit();
            return redirect()->route('portal.pembuatan.beritas.index')->with('success', 'Berhasil merubah berita');
        } catch (\Throwable $th) {
            //throw $th;
            dd($th);
            DB::rollBack();
            return redirect()->back()->with('danger', 'Gagal merubah berita');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Berita  $berita
     * @return \Illuminate\Http\Response
     */
    public function destroy($berita)
    {
        $berita = Berita::find($berita);
        DB::beginTransaction();
        try {
            $berita->delete();
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
