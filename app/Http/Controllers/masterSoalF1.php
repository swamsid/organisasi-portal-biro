<?php

namespace App\Http\Controllers;

use App\Models\jenisSoalForm1;
use App\Models\jenisSubSoalForm1;
use App\Models\soalForm1;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class masterSoalF1 extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('ekppp.page.master.soalf1.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $layanans = jenisSoalForm1::all();
        $sub_layanans = jenisSubSoalForm1::all();
        return view('ekppp.page.master.soalf1.create', compact(
            "layanans", "sub_layanans"
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

        DB::beginTransaction();
        try {
            $jenisSoal = jenisSoalForm1::firstOrCreate([
                "name" => $request->name_layanan
            ]);
    
            $jenisSubSoal = jenisSubSoalForm1::firstOrCreate([
                "name" => $request->nama_sub_layanan,
                "jenis_soalf1_id" => $jenisSoal->id
            ]);
            

            if ($request->type_soal == "radio") {
                $jawaban = array(
                    "ya", "tidak"
                );
            }
            if ($request->type_soal == "multiple") {
                $jawaban = $request->multiple_value;
            }
            if ($request->type_soal == "input") {
                $jawaban = array(
                    "input" => "text"
                );
            }
            
            $soal = array(
                "nama_soal" => $request->name_soal,
                "type_soal" => $request->type_soal,
                "jawaban" => $jawaban,
                "file_upload" => array(
                    "type_soal"    => "file"
                )
            );
    
            if (!empty($request->has_child)) {
                $sub_soal = [];
                foreach ($request->tmp_soal as $key => $value) {
                    if ($request->sub_type_soal[$key] == "radio") {
                        $jawaban = array(
                            "ya", "tidak"
                        );
                    }
                    if ($request->sub_type_soal[$key] == "multiple") {
                        $jawaban = $request->sub_multiple_value[$request->tmp_soal[$key]];
                    }
                    if ($request->type_soal == "input") {
                        $jawaban = array(
                            "input" => "text"
                        );
                    }
                    $sub_soal[] = array(
                        "nama_soal" => $request->sub_name_soal[$key],
                        "type_soal" => $request->sub_type_soal[$key],
                        "jawaban" => $jawaban
                    );
                }

                $soal["child_soal"] = $sub_soal;
                $soalEncode = json_encode($soal);

                // Create Soal

                $soalForm1 = soalForm1::create([
                    'sub_jenis_soalf1_id' => $jenisSubSoal->id,
                    'keterangan' => $request->keterangan,
                    'jenis' => $request->jenis,
                    'soal' => $request->name_soal,
                    'type_soal' => $request->type_soal,
                    'has_child' => "true",
                    'child_json_soal' => $soalEncode,
                ]);
            }
            else {

                $soalEncode = json_encode($soal);
                $soalForm1 = soalForm1::create([
                    'sub_jenis_soalf1_id' => $jenisSubSoal->id,
                    'keterangan' => $request->keterangan,
                    'jenis' => $request->jenis,
                    'soal' => $request->name_soal,
                    'type_soal' => $request->type_soal,
                    'has_child' => "false",
                    'parent_json_soal' => $soalEncode,
                ]);
            }

            DB::commit();
            return redirect()->route('pekppp.master.formf1.index')->with('success', "Berhasil");
        } catch (\Throwable $th) {
            dd($th);
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
