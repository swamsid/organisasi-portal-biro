<?php

namespace App\Http\Controllers\superadmin\master;

use App\Http\Controllers\Controller;
use App\Models\Kabkot;
use App\Models\Regency;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class KabKotController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kabkot = Kabkot::all();

        return view('page.admin.kabkot.index', compact('kabkot'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $regency = Regency::where('province_id', '35')->whereDoesntHave('kabkot')->get();
        $kabkot = new Kabkot();
        return  view('page.admin.kabkot.created', compact('regency', 'kabkot'));
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
            'regency_id' => 'required',
            'logo' => 'required|mimes:png,jpg,jpeg',
        ]);
        DB::beginTransaction();
        try {
            Kabkot::create([
                'regency_id' => $request->regency_id,
                'logo' => Storage::disk('public_uploads')->put('kabkot', $request->logo),
                'created_by' => Auth::user()->id
            ]);
            DB::commit();
            return redirect()->route('portal.master.kabkot.index')->with('success', 'Data berhasil disimpan');
        } catch (\Throwable $th) {
            //throw $th;
            DB::rollBack();
            return redirect()->back()->with('danger', $th->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Kabkot  $kabkot
     * @return \Illuminate\Http\Response
     */
    public function show(Kabkot $kabkot)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Kabkot  $kabkot
     * @return \Illuminate\Http\Response
     */
    public function edit(Kabkot $kabkot)
    {
        $regency = Regency::where('province_id', '35')->get();
        return  view('page.admin.kabkot.created', compact('regency', 'kabkot'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Kabkot  $kabkot
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Kabkot $kabkot)
    {
        $this->validate($request, [
            'regency_id' => 'required',
            'logo' => 'nullable|mimes:png,jpg,jpeg',
        ]);
        DB::beginTransaction();
        try {
            if ($request->logo != null) {
                $kabkot->update([
                    'logo' => Storage::disk('public_uploads')->put('kabkot', $request->logo)
                ]);
            }
            $kabkot->update([
                'regency_id' => $request->regency_id,
            ]);
            DB::commit();
            return redirect()->route('portal.master.kabkot.index')->with('success', 'Data berhasil disimpan');
        } catch (\Throwable $th) {
            //throw $th;
            DB::rollBack();
            return redirect()->back()->with('danger', $th->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Kabkot  $kabkot
     * @return \Illuminate\Http\Response
     */
    public function destroy(Kabkot $kabkot)
    {
        //
    }
}
