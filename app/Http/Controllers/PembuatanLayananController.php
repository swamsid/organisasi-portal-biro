<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use App\Models\Layanan;
use App\Models\Opd;
use App\Models\SubMenu;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class PembuatanLayananController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::user()->hasRole('superadmin')) {
            $postingan = Layanan::all();
        } else if (Auth::user()->hasRole('admin')) {
            $postingan = Layanan::whereHas('user', function ($q) {
                $q->whereHas('opd', function ($query) {
                    $query->where('kabkot_id', Auth::user()->opd->kabkot_id);
                });
            })->get();
        } else {
            $postingan = Layanan::where('created_by', Auth::user()->id)->get();
        }
        return view('page.opd.postingan.index', compact('postingan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $layanan = new Layanan();
        // dd($layanan->user);
        if (Auth::user()->hasRole('superadmin') || Auth::user()->hasRole('admin')) {
            $opds = Opd::get();
            $submenu = DB::table('sub_menus')->get();
            // $submenu = null;
            // $submenu = DB::table('opds')
            //     ->select('opds.user_id', 'opds.sub_menu_id', 'opds.nama as nama_user', 'sub_menus.id', 'sub_menus.nama')
            //     ->join('sub_menus', 'opds.sub_menu_id', '=', 'sub_menus.id')->get();
            // dd($submenu);
        } else {
            // $sub_menu = DB::table('sub_menus')->where('id', Auth::user()->opd->sub_menu_id)->first();
            $opds = null;
            $submenu = DB::table('sub_menus')->get();
            // $submenu = [$sub_menu->id, $sub_menu->nama];
        }

        return view('page.opd.postingan.create', compact('layanan', 'submenu', 'opds'));
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
            // "submenu" => "required",
            "judul" => "required",
            "isi" => "required",
            "icon" => "mimes:png,jpg,svg"
        ]);

        DB::beginTransaction();
        try {

            if (Auth::user()->hasRole('upt')) {
                $datas = Auth::user()->opd->sub_menu_id;
            }else{
                $datas = $request->submenu_id;
            }
            $sub_menu = DB::table('sub_menus')
                ->select('sub_menus.id', 'sub_menus.nama', 'sub_menus.menu_id', 'menus.nama as nama_menu')
                ->where('sub_menus.id', $datas)
                ->join('menus', 'sub_menus.menu_id', '=', 'menus.id')->first();

            
            if (Auth::user()->hasRole('upt')) {
                $verif = '0';
            } else if (Auth::user()->hasRole('opd')) {
                $verif = '1';
            } else {
                $verif = '2';
            }
            
            $data = $request->all();
            $data['sub_menu_id'] = $datas;
            $data['file_icon'] = Storage::disk('public_uploads')->put('opd_logo', $request->file('icon'));

            $data['slug'] = Str::slug($sub_menu->nama_menu . " " . $sub_menu->nama . " " . $request->judul);
            // $data['slug'] = Str::slug(SubMenu::find($request->submenu_id)->menu->nama . " " . SubMenu::find($request->submenu_id)->nama . " " . $request->judul);
            $data['created_by'] = Auth::user()->id;
            $data['verif'] = $verif;

            $is_layanan_existing = Layanan::where('slug', $data['slug'])->first();

            if (!empty($is_layanan_existing)) {
                return redirect()->route('portal.pembuatan.layanans.index')->with('danger', 'Data layanan tersebut sudah ada!');
            }

            unset($data['submenu']);
            unset($data['icon']);
            $layanan = Layanan::create($data);

            if (Auth::user()->hasRole('superadmin') || Auth::user()->hasRole('admin')) {
                $layanan->update([
                    'created_by' => $request->user_id
                ]);
            }

            DB::commit();
            return redirect()->route('portal.pembuatan.layanans.index')->with('success', 'Berhasil menambah layanan');
        } catch (\Throwable $th) {
            dd($th);
            DB::rollBack();
            return redirect()->back()->with('danger', 'Gagal menambah layanan');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\layanan  $layanan
     * @return \Illuminate\Http\Response
     */
    public function show(layanan $layanan)
    {
        dd($layanan);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\layanan  $layanan
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $layanan = Layanan::find($id);
        if (Auth::user()->hasRole('superadmin') || Auth::user()->hasRole('admin')) {
            $opds = Opd::get();
            $submenu = DB::table('sub_menus')->get();
            // $submenu = DB::table('sub_menus')->where('id', $layanan->user->opd->sub_menu_id)->first();
        } else {
            // $sub_menu = DB::table('sub_menus')->where('id', Auth::user()->opd->sub_menu_id)->first();
            $opds = null;
            $submenu = DB::table('sub_menus')->get();
            // $submenu = [$sub_menu->id, $sub_menu->nama];
        }

        return view('page.opd.postingan.create', compact('layanan', 'submenu', 'opds'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\layanan  $layanan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $layanan)
    {
        // dd($request->all()); 
        $this->validate($request, [
            'judul' => 'required',
            'isi' => 'required',
        ]);

        DB::beginTransaction();
        try {
            $layanans = Layanan::find($layanan);
            $layanans->update([
                'judul' => $request->judul,
                'slug' => Str::slug($request->judul),
                'isi' => $request->isi,
                'updated_by' => Auth::user()->id,
                'submenu_id' => $request->kategori ?? $request->submenu_id,
            ]);

            if ($request->file('icon') != null) {
                Storage::disk('public_uploads')->delete($layanans->file_icon);
                $layanans->update([
                    'file_icon' => Storage::disk('public_uploads')->put('opd_logo', $request->file('icon')),
                ]);
            }


            if (Auth::user()->hasRole('superadmin') || Auth::user()->hasRole('admin')) {
                $layanans->update([
                    'created_by' => $request->user_id
                ]);
            }
            DB::commit();
            return redirect()->route('portal.pembuatan.layanans.index')->with('success', 'Berhasil merubah postingan');
        } catch (\Throwable $th) {
            //throw $th;
            dd($th);
            DB::rollBack();
            return redirect()->back()->with('danger', 'Gagal merubah postingan');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\layanan  $layanan
     * @return \Illuminate\Http\Response
     */
    public function destroy($layanan)
    {
        $layanans = Layanan::find($layanan);
        DB::beginTransaction();
        try {
            Storage::disk('public_uploads')->delete($layanan->icon);
            $layanans->delete();
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

    public function getSubmenu($user_id)
    {
        DB::beginTransaction();
        try {
            $opd = Opd::where('user_id', $user_id)->first();
            $kategori = DB::table('sub_menus')->where('id', $opd->sub_menu_id)->first();

            return response()->json([
                'success' => true,
                'data' => $kategori
            ]);
        } catch (\Throwable $th) {
            //throw $th;
            return response()->json([
                'success' => false,
            ]);
        }
    }
}
