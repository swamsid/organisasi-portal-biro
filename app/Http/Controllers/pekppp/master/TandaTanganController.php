<?php

namespace App\Http\Controllers\pekppp\master;

use App\Http\Controllers\Controller;
use App\Models\Siganture;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class TandaTanganController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::user()->hasRole('superadmin')) {
            $ttd = Siganture::all();
            return view('ekppp.page.master.tanda-tangan.index', compact('ttd'));
        }else{
            $ttd = Siganture::where('user_id', Auth::user()->id)->first();
            return view('ekppp.page.master.tanda-tangan.create', compact('ttd'));
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $ttd = new Siganture();
        return view('ekppp.page.master.tanda-tangan.create', compact('ttd'));
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
            'ttd' => 'required|mimes:png,jpg,jpeg',
        ]);
        DB::beginTransaction();
        try {
            Siganture::create([
                'tanda_tangan' => Storage::disk('public_uploads')->put('tanda_tangan', $request->ttd),
                'created_by' => Auth::user()->id,
                'user_id' => Auth::user()->id,
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
        $ttd = Siganture::find($id);
        return view('ekppp.page.master.tanda-tangan.create', compact('ttd'));
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
            'ttd' => 'required|mimes:png,jpg,jpeg',
        ]);
        DB::beginTransaction();
        try {
            $ttd = Siganture::find($id);
            if ($request->ttd != null) {
                $ttd->update([
                    'logo' => Storage::disk('public_uploads')->put('tanda_tangan', $request->ttd),
                    'updated_by' => Auth::user()->id
                 ]);
            }
;
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
        //
    }
}
