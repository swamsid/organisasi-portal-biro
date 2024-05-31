<?php

namespace App\Http\Controllers\superadmin\verifikasi;

use App\Http\Controllers\Controller;
use App\Models\Berita;
use App\Models\Layanan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class KonfirmasiLayananController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::user()->hasRole('superadmin')) {
            $postingan = Layanan::where('verif', '1')->get();
        } else if (Auth::user()->hasRole('admin')) {
            $postingan = Layanan::whereHas('user', function ($q) {
                $q->whereHas('opd', function ($query) {
                    $query->where('kabkot_id', Auth::user()->opd->kabkot_id);
                });
            })->where('verif', '1')->get();
        } else {
            $postingan = Layanan::whereHas('user', function ($q) {
                $q->whereHas('opd', function ($query) {
                    $query->where('opd_id', Auth::user()->opd->id);
                });
            })->where('verif', '0')->whereNull('verifikator')->get();
        }
        return view('page.opd.postingan.verif', compact('postingan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Layanan  $layanan
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $layanan = Layanan::find($id);
        $sub_menu = DB::table('sub_menus')->where('id', $layanan->user->opd->sub_menu_id)->first();

        return view('page.opd.postingan.show', compact('layanan', 'sub_menu'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Layanan  $layanan
     * @return \Illuminate\Http\Response
     */
    public function edit(Layanan $layanan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Layanan  $layanan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $layanan)
    {
        DB::beginTransaction();
        try {
            $layanans = Layanan::find($layanan);
            if ($layanans->verif == '0') {
                $layanans->update([
                    'verif' => '1',
                    'verifikator' => Auth::user()->id,
                ]);
            } else {
                $layanans->update([
                    'verif' => '2',
                    'verifikator' => Auth::user()->id,
                ]);
            }
            DB::commit();

            return response()->json([
                'success' => true,
                'message' => 'Berhasil Memverifikasi layanan'
            ]);
        } catch (\Throwable $th) {
            //throw $th;
            return response()->json([
                'success' => false,
                'message' => $th->getMessage()
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Layanan  $layanan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Layanan $layanan)
    {
        //
    }

    public function verifikasiAllLayanan()
    {
        DB::beginTransaction();
        try {
            $layanan = Layanan::where('verif', "0")
                ->update([
                    'verif' => '1',
                    'verifikator' => Auth::user()->id,
                ]);

            DB::commit();
            return redirect()->back()->with('success', 'Berhasil memverifikasi layanan');
        } catch (\Throwable $th) {
            DB::rollBack();
            dd($th);
            return redirect()->back()->with('danger', 'Gagal memverifikasi layanan');
        }
    }

    public function verifikasiAllBerita()
    {
        DB::beginTransaction();
        try {
            $berita = Berita::where('verif', '1')
                ->update([
                    'verif' => '2',
                    'verifikator' => Auth::user()->id,
                ]);

            DB::commit();
            return redirect()->back()->with('success', 'Berhasil memverifikasi berita');
        } catch (\Throwable $th) {
            DB::rollBack();
            dd($th);
            return redirect()->back()->with('danger', 'Gagal memverifikasi berita');
        }
    }
}
