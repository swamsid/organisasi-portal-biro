<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;


class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $menu = Menu::all();
        return view('page.admin.menu.index', compact(
            'menu'
        ));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('page.admin.menu.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'url' => 'nullable'
        ]);

        DB::beginTransaction();
        try {

            $data = $request->all();
            $data['slug'] = Str::slug($request->nama);

            $is_menu_existing = Menu::where('slug', $data['slug'])->first();

            if (!empty($is_menu_existing)) {
                return redirect()->route('menu.menu.index')->with('danger', 'Data menu tersebut sudah ada!');
            }

            $menu = Menu::create($data);

            DB::commit();
            return redirect()->route('menu.menu.index')->with('success', "Berhasil Membuat Menu");
        } catch (\Throwable $th) {
            DB::rollBack();
            return redirect()->back()->with('danger', "Gagal Membuat Menu");
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
        $menu = Menu::find($id);

        return view('page.admin.menu.update', compact('menu'));
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
            'nama' => 'required'
        ]);

        DB::beginTransaction();
        try {
            $menu = Menu::find($id);
            $menu->update([
                'nama' => $request->nama,
                'url' => $request->url
            ]);

            DB::commit();
            return redirect()->route('menu.menu.index')->with('success', "Berhasil Mengubah Menu");
        } catch (\Throwable $th) {
            DB::rollBack();
            return redirect()->route('menu.menu.index')->with('danger', "Gagal Mengubah Menu");
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
        $menu = Menu::find($id);

        DB::beginTransaction();
        try {
            $menu->delete();
            DB::commit();

            // return redirect()->back();
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
