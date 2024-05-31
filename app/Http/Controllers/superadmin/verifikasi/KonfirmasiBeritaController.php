<?php

namespace App\Http\Controllers\superadmin\verifikasi;

use App\Http\Controllers\Controller;
use App\Models\Berita;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class KonfirmasiBeritaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::user()->hasRole('superadmin')) {
            $berita = Berita::where('verif', '1')->get();
        } else if (Auth::user()->hasRole('admin')) {
            $berita = Berita::whereHas('user', function ($q) {
                $q->whereHas('opd', function ($query) {
                    $query->where('kabkot_id', Auth::user()->opd->kabkot_id);
                });
            })->where('verif', '1')->get();
        } else {
            $berita = Berita::whereHas('user', function ($q) {
                $q->whereHas('opd', function ($query) {
                    $query->where('opd_id', Auth::user()->opd->id);
                });
            })->where('verif', '0')->whereNull('verifikator')->get();
        }
        return view('page.opd.berita.verif', compact('berita'));
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
     * @param  \App\Models\Berita  $berita
     * @return \Illuminate\Http\Response
     */
    public function show(Berita $berita)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Berita  $berita
     * @return \Illuminate\Http\Response
     */
    public function edit(Berita $berita)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Berita  $berita
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        DB::beginTransaction();
        try {
            $berita = Berita::find($id);

            if ($berita->verif == '0') {
                $berita->update([
                    'verif' => '1',
                    'verifikator' => Auth::user()->id,
                ]);
            }else{
                $berita->update([
                    'verif' => '2',
                    'verifikator' => Auth::user()->id,
                ]);
            }
            DB::commit();

            return response()->json([
                'success' => true,
                'message' => 'Berhasil Memverifikasi berita'
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
     * @param  \App\Models\Berita  $berita
     * @return \Illuminate\Http\Response
     */
    public function destroy(Berita $berita)
    {
        //
    }
}
