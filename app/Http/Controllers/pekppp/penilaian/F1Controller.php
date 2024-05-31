<?php

namespace App\Http\Controllers\pekppp\penilaian;

use App\Http\Controllers\Controller;
use App\Models\JawabanSoalF01;
use App\Models\jenisSoalForm1;
use App\Models\soalForm1;
use App\Models\MasterForm;
use App\Models\Periode;
use App\Models\UnitLokus;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class F1Controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $unit = MasterForm::with(['f02'])->whereHas('periode', function ($q) {
            $q->where('status', '0');
        })->get();
        return view('ekppp.page.penilaian.pilih-unit', compact('unit'));
    }

    public function timeline()
    {
        $periode = Periode::where('status', 1)->get();
        return view('ekppp.page.penilaian.timeline', compact('periode'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $jenisSoal = jenisSoalForm1::with('jenisSubSoal.soal')->get();
        return view('ekppp.page.penilaian.f01', compact("jenisSoal", 'request'));
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
            $soal = soalForm1::find($request->idsoal);
            $jawaban = $soal->toArray();
            if ($soal->has_child == "true") {
                $child = json_decode($soal->child_json_soal);
                if ($soal->type_soal == "radio") {
                    $jawabanresp = $request->{"answer_".$request->idsoal} == "yes" ? "ya" : "tidak";
                }
    
                $jawaban['jawaban'] =  array(
                    array(
                        "soal" => $child->nama_soal,
                        "type" => $child->type_soal,
                        "jawaban" => $child->jawaban,
                        "respon" => $jawabanresp
                    )
                );
    
                foreach ($child->child_soal as $key => $value) {
                    if ($value->type_soal == "multiple") {
                        foreach ($request->multiple as $keym => $multiple) {
                            $jawabanrespmultiple[$keym] = $multiple;
                        }
                        $jawaban['jawaban'][] = array(
                            "soal" => $value->nama_soal,
                            "type" => $value->type_soal,
                            "jawaban" => $value->jawaban,
                            "respon" => $jawabanrespmultiple
                        );
                    }
                    if ($value->type_soal == "radio") {
                        $name = str_replace(" ", "_", $value->nama_soal);
                        if (!empty($request->{"$name"})) {
                            $jawabanrespRadio = $request->{"$name"} == "yes" ? "ya" : "tidak";
                            $jawaban['jawaban'][] = array(
                                "soal" => $value->nama_soal,
                                "type" => $value->type_soal,
                                "jawaban" => $value->jawaban,
                                "respon" => $jawabanrespRadio
                            );
                        }
                    }
                }
    
                $jawaban['jawaban']['file_pendukung'] = null;
            }
            else {
                $parent = json_decode($soal->parent_json_soal);
                
                if ($parent->type_soal == "multiple") {
                    foreach ($parent->jawaban as $key => $value) {
                        foreach ($request->multiple as $keym => $multiple) {
                            $jawabanrespmultiple[$keym] = $multiple;
                        }
                        // if ($value->type_soal == "radio") {
                        //     $name = str_replace(" ", "_", $value->nama_soal);
                        //     if (!empty($request->{"$name"})) {
                        //         $jawabanrespRadio = $request->{"$name"} == "yes" ? "ya" : "tidak";
                        //         $jawaban['jawaban'][] = array(
                        //             "soal" => $value->nama_soal,
                        //             "type" => $value->type_soal,
                        //             "jawaban" => $value->jawaban,
                        //             "respon" => $jawabanrespRadio
                        //         );
                        //     }
                        // }
                    }
                    $jawaban['jawaban'] =  array(
                        array(
                            "soal" => $parent->nama_soal,
                            "type" => $parent->type_soal,
                            "jawaban" => $parent->jawaban,
                            "respon" => $jawabanrespmultiple
                        )
                    );
                    
                }
            }

            $form = JawabanSoalF01::where('user_id', Auth::user()->id)->where('form_id', $request->form_id)->first();
            if ($form != null) {
                // ambil json
                $jawab_json = json_decode($form->jawaban_json);
                $jawab_json[] = $jawaban;
                $jawab_jsonencode = json_encode($jawab_json);
                $jawabanF01 = $form->update([
                    "jawaban_json" => $jawab_jsonencode
                ]);
            }
            else {
                $jawaban_json = json_encode(array($jawaban));
                $jawabanF01 = JawabanSoalF01::create([
                    "user_id" => Auth::user()->id,
                    "form_id" => $request->form_id,
                    "jawaban_json" => $jawaban_json
                ]);
            }
    
    
            DB::commit();
            return redirect()->back()->with('success', "berhasil submit");
        } catch (\Throwable $th) {
            //throw $th;
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
