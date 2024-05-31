<?php

namespace App\Http\Controllers\pekppp\master;

use App\Http\Controllers\Controller;
use App\Models\MasterForm;
use App\Models\Periode;
use App\Models\UnitLokus;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class FormPenilaianController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $master = new MasterForm();
        if (Auth::user()->getRoleNames()[0] == 'superadmin') {
            $unit = UnitLokus::all();
        }
        if (Auth::user()->getRoleNames()[0] == 'opd') {
            $unit = UnitLokus::whereHas('opd', function ($q) {
                $q->where('opd_id', Auth::user()->opd->id);
            })->get();
        }
        $unit = UnitLokus::all();
        $periode = Periode::all();

        return view('ekppp.page.master.form-nilai.create', compact('master', 'unit', 'periode'));
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
            $cek = MasterForm::where('unit_id', $request->unit_id)->where('periode_id', $request->periode_id)->first();
            if ($cek != null) {
                return redirect()->back()->with('danger', 'Unit lokus sudah ada pada periode yang sama!');
            }
            MasterForm::create([
                'unit_id'       => $request->unit_id,
                'periode_id'    => $request->periode_id,
                'created_by'    => Auth::user()->id
            ]);

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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
