<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\SubMenu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class SubMenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $subMenu = SubMenu::all();
        return view('page.admin.submenu.index', compact(
            "subMenu"
        ));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $menus = Menu::with('submenu')->get();
        return view('page.admin.submenu.create', compact(
            'menus'
        ));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());

        $request->validate([
            "menu_id" => 'required',
            "nama" => 'required',
            "deskripsi" => "nullable",
            "file_icon" => "required|mimes:png,jpg,svg"
        ]);

        DB::beginTransaction();
        try {
            $data = $request->all();
            $data['slug'] = Str::slug(Menu::find($request->menu_id)->nama . " " . $request->nama);
            $data['icon'] = Storage::disk('public_uploads')->put('icon', $request->file_icon);

            $is_submenu_existing = SubMenu::where('slug', $data['slug'])->first();

            if (!empty($is_submenu_existing)) {
                return redirect()->route('menu.sub-menu.index')->with('danger', 'Data submenu tersebut sudah ada!');
            }

            $subMenu = SubMenu::create($data);

            DB::commit();
            return redirect()->route('menu.sub-menu.index')->with('success', "Berhasil Membuat Sub Menu");
        } catch (\Throwable $th) {
            DB::rollBack();
            return redirect()->back()->with('danger', "Gagal Membuat");
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
        $menus = Menu::with('submenu')->get();
        $subMenu = SubMenu::find($id);

        return view('page.admin.submenu.update', compact(
            'menus',
            'subMenu'
        ));
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
        $request->validate([
            "menu_id" => 'required',
            "nama" => 'required',
        ]);

        DB::beginTransaction();
        try {
            $subMenu = SubMenu::find($id);

            $subMenu->update([
                'menu_id' => $request->menu_id,
                'slug' => Str::slug(Menu::find($request->menu_id)->nama . " " . $request->nama),
                'nama' => $request->nama,
                'deskripsi' => $request->deskripsi,
            ]);

            if ($request->file('file_icon') != null) {
                Storage::disk('public_uploads')->delete($subMenu->icon);
                $subMenu->update([
                    'icon' => Storage::disk('public_uploads')->put('icon', $request->file_icon)
                ]);
            }

            DB::commit();
            return redirect()->route('menu.sub-menu.index')->with('success', "Berhasil Mengubah Sub Menu");
        } catch (\Throwable $th) {
            DB::rollBack();
            return redirect()->back()->with('danger', "Gagal Mengubah");
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
        $sub_menu = SubMenu::find($id);

        DB::beginTransaction();
        try {
            Storage::disk('public_uploads')->delete($sub_menu->icon);
            $sub_menu->delete();
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
