<?php

namespace App\Http\Controllers\pekppp\penilaian;

use App\Http\Controllers\Controller;
use App\Models\F02;
use App\Models\KategoriIndikator;
use App\Models\MasterF02;
use App\Models\MasterForm;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class F2Controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index1($jenis, $id)
    {
        $data = MasterForm::find($id);

        if ($data->periode->status != '0') {
            return redirect()->back()->with('danger', 'Periode telah selesai');
        }

        if (Auth::user()->getRoleNames()[0] != 'superadmin' && Auth::user()->getRoleNames()[0] != 'verifikator') {
            return redirect()->back()->with('danger', 'Anda tidak meimiliki akses');
        }


        $datas = F02::where('master_form_id', $id)->where('jenis', $jenis)->first();

        $f02 = MasterF02::with('jawaban')->where('jenis', $jenis)->get();
        return view('ekppp.page.penilaian.f02', compact('f02', 'data', 'jenis', 'datas'));
    }

    public function nilaiF02($id)
    {
        $data = F02::where('master_form_id', $id)->first();
        $kategori = KategoriIndikator::where('tipe', 'f02')->orWhere('tipe', 'semua')->get();
        return view('ekppp.page.penilaian.nilai.f02', compact('data', 'kategori'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $f02 = MasterF02::with('jawaban')->get();
        return view('ekppp.page.penilaian.f02', compact('f02'));
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
            'form_id' => 'required|exists:master_forms,id',
            'jenis' => 'required',
            '0' => 'nullable',
            '1' => 'required',
            '2' => 'required',
            '3' => 'required',
            '4' => 'required',
            '5' => 'required',
            '6' => 'required',
            '7' => 'required',
            '8' => 'required',
            '9' => 'required',
            '10' => 'required',
            '11' => 'required',
        ]);

        if (Auth::user()->getRoleNames()[0] != 'superadmin' && Auth::user()->getRoleNames()[0] != 'verifikator') {
            return redirect()->back()->with('danger', 'Anda tidak meimiliki akses');
        }

        DB::beginTransaction();

        try {

            F02::create([
                'master_form_id' => $request->form_id,
                'verifikator_id' => Auth::user()->id,
                'jenis' => $request->jenis,
                'file' => Storage::disk('public_uploads')->put('file_f02', $request->file),
                '1' => $request->input('1'),
                '2' => $request->input('2'),
                '3' => $request->input('3'),
                '4' => $request->input('4'),
                '5' => $request->input('5'),
                '6' => $request->input('6'),
                '7' => $request->input('7'),
                '8' => $request->input('8'),
                '9' => $request->input('9'),
                '10' => $request->input("10"),
                '11' => $request->input("11"),
                '12' => $request->input("12"),
                '13' => $request->input("13"),
                '14' => $request->input("14"),
                '15'  => $request->input("15"),
                '16'  => $request->input("16"),
                '17'  => $request->input("17"),
                '18'  => $request->input("18"),
                '19'  => $request->input("19"),
                '20'  => $request->input("20"),
                '21'  => $request->input("21"),
                '22'  => $request->input("22"),
                '23'  => $request->input("23"),
                '24'  => $request->input("24"),
                '25'  => $request->input("25"),
                '26'  => $request->input("26"),
                '27'  => $request->input("27"),
                '28'  => $request->input("28"),
                '29'  => $request->input("29"),
                '30'  => $request->input("30"),
            ]);
            DB::commit();
            return redirect()->route('pekppp.penilaian.f01.index')->with('success', 'Survei anda tersimpan, terimakasih.');
        } catch (\Throwable $th) {
            //throw $th;
            DB::rollBack();
            dd($th);
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
        // dd($request->all());
        $this->validate($request, [
            'form_id' => 'required|exists:master_forms,id',
            'jenis' => 'required',
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
            'u_15' => 'required',
            'u_16' => 'required',
            'u_17' => 'required',
            'u_18' => 'required',
            'u_19' => 'required',
            'u_20' => 'required',
            'u_21' => 'required',
            'u_22' => 'required',
            'u_23' => 'required',
            'u_24' => 'required',
            'u_25' => 'required',
            'u_26' => 'required',
            'u_27' => 'required',
            'u_28' => 'required',
            'u_29' => 'required',
            'u_30' => 'required',
        ]);

        if (Auth::user()->getRoleNames()[0] != 'superadmin' && Auth::user()->getRoleNames()[0] != 'verifikator') {
            return redirect()->back()->with('danger', 'Anda tidak meimiliki akses');
        }

        DB::beginTransaction();

        try {

            $data = F02::find($id);
            $data->update([
                'master_form_id' => $request->form_id,
                'verifikator_id' => Auth::user()->id,
                'jenis' => $request->jenis,
                'file' => $request->file ? Storage::disk('public_uploads')->put('file_f02', $request->file) : $data->file,
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
                'u_15'  => $request->input("u_15"),
                'u_16'  => $request->input("u_16"),
                'u_17'  => $request->input("u_17"),
                'u_18'  => $request->input("u_18"),
                'u_19'  => $request->input("u_19"),
                'u_20'  => $request->input("u_20"),
                'u_21'  => $request->input("u_21"),
                'u_22'  => $request->input("u_22"),
                'u_23'  => $request->input("u_23"),
                'u_24'  => $request->input("u_24"),
                'u_25'  => $request->input("u_25"),
                'u_26'  => $request->input("u_26"),
                'u_27'  => $request->input("u_27"),
                'u_28'  => $request->input("u_28"),
                'u_29'  => $request->input("u_29"),
                'u_30'  => $request->input("u_30"),
            ]);
            DB::commit();
            return redirect()->route('pekppp.penilaian.f01.index')->with('success', 'Survei anda tersimpan, terimakasih.');
        } catch (\Throwable $th) {
            //throw $th;
            DB::rollBack();
            dd($th);
            return redirect()->back()->with('danger', 'Survei anda gagal, mohon isi kembali.');
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
        //
    }
}
