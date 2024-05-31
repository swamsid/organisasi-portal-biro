<?php

namespace App\Http\Controllers\pekppp\master;

use App\Http\Controllers\Controller;
use App\Models\Opd;
use App\Models\UnitLokus;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class UnitLokusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $unit = UnitLokus::all();

        return view('ekppp.page.master.unit-lokus.index', compact('unit'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $unit = new UnitLokus();
        $opd = Opd::whereHas('user', function ($q) {
            $q->role('opd');
        })->get();
        return view('ekppp.page.master.unit-lokus.create', compact('unit', 'opd'));
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
            'opd_id' => 'required|exists:opds,id',
            'nama' => 'required'
        ]);

        DB::beginTransaction();
        try {
            UnitLokus::create([
                'opd_id' => $request->opd_id,
                'nama' => $request->nama,
                'jenis' => $request->jenis,
                'created_by' => Auth::user()->id,
            ]);

        DB::commit();

        return redirect()->route('pekppp.master.unit-lokus.index')->with('success', 'data berhasil tersimpan');
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
        $unit = UnitLokus::find($id);
        $opd = Opd::whereHas('user', function ($q) {
            $q->role('opd');
        })->get();
        return view('ekppp.page.master.unit-lokus.create', compact('unit', 'opd'));
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
            'opd_id' => 'required|exists:opds,id',
            'nama' => 'required'
        ]);

        DB::beginTransaction();
        try {
           $unit = UnitLokus::find($id);
            $unit->update([
                'opd_id' => $request->opd_id,
                'nama' => $request->nama,
                'jenis' => $request->jenis,
                'updated_by' => Auth::user()->id,
            ]);

        DB::commit();

        return redirect()->route('pekppp.master.unit-lokus.index')->with('success', 'data berhasil tersimpan');
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
        $unit = UnitLokus::find($id);
        DB::beginTransaction();
        try {
            $unit->delete();
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
