<?php

namespace App\Http\Controllers\pekppp\penilaian;

use App\Http\Controllers\Controller;
use App\Models\F03;
use App\Models\MasterF03;
use App\Models\MasterForm;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class F3Controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index1($jenis, $id)
    {
        $data = MasterForm::where('uuid', $id)->first();
        if ($data->periode->status != '0') {
            return redirect()->back()->with('danger', 'Periode telah selesai');
        }
        $f03 = MasterF03::where('jenis', $jenis)->get();
        return view('ekppp.page.penilaian.f03', compact('data', 'f03', 'jenis'));
    }

    public function nilaiF03($id)
    {
        $data = F03::where('master_form_id', $id)->get();
        // dd($data);
        return view('ekppp.page.penilaian.nilai.f03', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $f03 = MasterF03::all();
        return view('ekppp.page.penilaian.f03', compact('f03'));
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
        if ($request->jenis == 'A') {
            $this->validate($request, [
                'form_id' => 'required|exists:master_forms,id',
                'nama' => 'required',
                'no_hp' => 'required',
                'u_1' => 'required',
                'u_2' => 'required',
                'u_3' => 'required',
                'u_4' => 'required',
                'u_5' => 'required',
                'u_6' => 'required',
                'u_7' => 'required',
                'u_8' => 'required',
                'u_9' => 'required',
                'u_10' => 'required',
                'u_11' => 'required',
                'u_12' => 'required',
                'u_13' => 'required',
                'u_14' => 'required',
            ]);
        }


        if ($request->jenis == 'B') {
            $this->validate($request, [
                'form_id' => 'required|exists:master_forms,id',
                'nama' => 'required',
                'no_hp' => 'required',
                'u_1' => 'required',
                'u_2' => 'required',
                'u_3' => 'required',
                'u_4' => 'required',
                'u_5' => 'required',
                'u_6' => 'required',
                'u_7' => 'required',
                'u_8' => 'required',
                'u_9' => 'required',
                'u_10' => 'required',
                'u_11' => 'required',
            ]);
        }

        DB::beginTransaction();

        try {
            if ($request->jenis == 'A') {
                F03::create([
                    'master_form_id' => $request->form_id,
                    'no_hp' => $request->no_hp,
                    'nama' => $request->nama,
                    'jenis' => 'A',
                    'u_1' => $request->input('u_1'),
                    'u_2' => $request->input('u_2'),
                    'u_3' => $request->input('u_3'),
                    'u_4' => $request->input('u_4'),
                    'u_5' => $request->input('u_5'),
                    'u_6' => $request->input('u_6'),
                    'u_7' => $request->input('u_7'),
                    'u_8' => $request->input('u_8'),
                    'u_9' => $request->input('u_9'),
                    'u_10' => $request->input("u_10"),
                    'u_11' => $request->input("u_11"),
                    'u_12' => $request->input("u_12"),
                    'u_13' => $request->input("u_13"),
                    'u_14' => $request->input("u_14"),
                ]);
            } else if ($request->jenis == 'B') {
                F03::create([
                    'master_form_id' => $request->form_id,
                    'no_hp' => $request->no_hp,
                    'nama' => $request->nama,
                    'jenis' => 'B',
                    'u_1' => $request->input('u_1'),
                    'u_2' => $request->input('u_2'),
                    'u_3' => $request->input('u_3'),
                    'u_4' => $request->input('u_4'),
                    'u_5' => $request->input('u_5'),
                    'u_6' => $request->input('u_6'),
                    'u_7' => $request->input('u_7'),
                    'u_8' => $request->input('u_8'),
                    'u_9' => $request->input('u_9'),
                    'u_10' => $request->input("u_10"),
                    'u_11' => $request->input("u_11"),
                ]);
            } else {
                return redirect()->back()->with('danger', 'Survei anda gagal, mohon isi kembali.');
            }

            DB::commit();
            return redirect()->back()->with('success', 'Survei anda tersimpan, terimakasih.');
        } catch (\Throwable $th) {
            //throw $th;
            DB::rollBack();
            return redirect()->back()->with('danger', 'Survei anda gagal, mohon isi kembali.');
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
