<?php

namespace App\Http\Controllers\pekppp\master;

use App\Http\Controllers\Controller;
use App\Models\Kabkot;
use App\Models\User;
use App\Models\Verifikator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class VerifikatorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::role('verifikator')->get();
        return view('ekppp.page.master.verifikator.index', compact(
            'user'
        ));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kabkot = Kabkot::all();
        $user = new User();
        return view('ekppp.page.master.verifikator.create', compact(
            'user', 'kabkot'
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
        $this->validate($request, [
            'kabkot_id' => 'nullable|exists:kabkots,id',
            'name' => 'required',
            'email' => 'required|unique:users,email',
            'password' => 'required|min:8|required_with:conpassword|same:conpassword',
        ]);

        DB::beginTransaction();
        try {
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ]);

            Verifikator::create([
                'kabkot_id' => $request->kabkot_id ?? null,
                'user_id' => $user->id,
                'created_by' => Auth::user()->id,
            ]);

            $user->assignRole('verifikator');
        DB::commit();

        return redirect()->route('pekppp.master.verifikator.index')->with('success', 'data berhasil tersimpan');
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
        $user = User::find($id);
        $kabkot = Kabkot::all();
        return view('ekppp.page.master.verifikator.create', compact(
            'user', 'kabkot'
        ));
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
        $user = User::find($id);
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|unique:users,email,'.$user->id,
        ]);

        DB::beginTransaction();
        try {
            $user->update([
                'name' => $request->name,
                'email' => $request->email,
            ]);

            $user->verifikator->update([

                'updated_by' => Auth::user()->id
            ]);

        DB::commit();

        return redirect()->route('pekppp.master.verifikator.index')->with('success', 'data berhasil di update');
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
