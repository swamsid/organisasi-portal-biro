<?php

namespace App\Http\Controllers\pekppp\master;

use App\Http\Controllers\Controller;
use App\Models\DetailMasterF02;
use App\Models\KategoriIndikator;
use App\Models\MasterF02;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class MasterF02Controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $master = MasterF02::where('jenis', 'A')->get();
        return view('ekppp.page.penilaian.master.f02.index', compact('master'));
    }

    public function index2()
    {
        $master = MasterF02::where('jenis', 'B')->get();
        return view('ekppp.page.penilaian.master.f02.daring', compact('master'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kategori = KategoriIndikator::where('tipe', 'f02')->orWhere('tipe', 'semua')->get();
        $master = new MasterF02();
        return view('ekppp.page.penilaian.master.f02.create', compact('kategori', 'master'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        DB::beginTransaction();
        try {
            $header = MasterF02::create([
                'kategori_id'   => $request->kategori_id,
                'indikator'     => $request->indikator,
                'created_by'    => Auth::user()->id
            ]);

            foreach ($request->value as $key => $value) {
                DetailMasterF02::create([
                    'header_id'     => $header->id, 
                    'value'         => $value,
                    'jawaban'       => $request->jawaban[$key],
                    'created_by'    => Auth::user()->id,
                ]);
            }
            DB::commit();
            return redirect()->back()->with('success', 'Data berhasil disimpan');
        } catch (\Throwable $th) {
            //throw $th;
            DB::rollBack();
            return redirect()->back()->with('danger', $th->getMessage());
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
        $kategori = KategoriIndikator::where('tipe', 'f02')->orWhere('tipe', 'semua')->get();
        $master = MasterF02::find($id);
        return view('ekppp.page.penilaian.master.f02.create', compact('kategori', 'master'));
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
        DB::beginTransaction();
        try {

            $header = MasterF02::find($id);
            $header->update([
                'kategori_id'   => $request->kategori_id,
                'indikator'     => $request->indikator,
                'updated_by'    => Auth::user()->id
            ]);

            foreach ($request->value as $key => $value) {
                $detaill = DetailMasterF02::where('value', $value)->where('jawaban', $request->jawaban[$key])->where('header_id', $header->id)->first();
                if ($detaill == null) {
                    DetailMasterF02::create([
                        'header_id'     => $header->id, 
                        'value'         => $value,
                        'jawaban'       => $request->jawaban[$key],
                        'created_by'    => Auth::user()->id,
                    ]);
                }else{
                    $detaill->update([
                        'value'         => $value,
                        'jawaban'       => $request->jawaban[$key],
                        'updated_by'    => Auth::user()->id,
                    ]);
                }
            }
            DB::commit();
            return redirect()->back()->with('success', 'Data berhasil dirubah');
        } catch (\Throwable $th) {
            //throw $th;
            DB::rollBack();
            return redirect()->back()->with('danger', $th->getMessage());
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
        DB::beginTransaction();
        try {
            $header = MasterF02::find($id);
            foreach ($header->jawaban as $key => $value) {
                $value->delete();
            }
            $header->delete();
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

    public function destroyDetail($id)
    {
        DB::beginTransaction();
        try {
            $header = DetailMasterF02::find($id);
            $header->delete();
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
