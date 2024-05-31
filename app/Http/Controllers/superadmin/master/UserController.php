<?php

namespace App\Http\Controllers\superadmin\master;

use App\Http\Controllers\Controller;
use App\Models\Kabkot;
use App\Models\Kategori;
use App\Models\Opd;
use App\Models\SubMenu;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\File;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::user()->hasRole('superadmin')) {
            $user = User::all();
        } else if (Auth::user()->hasRole('admin')) {
            $user = User::whereHas('opd', function ($query) {
                $query->where('kabkot_id', Auth::user()->opd->kabkot_id);
            })->get();
        } else {
            $user = User::whereHas('opd', function ($query) {
                $query->where('opd_id', Auth::user()->opd->id);
            })->get();
        }
        return view('page.admin.user.index', compact(
            'user'
        ));
    }

    function getOpd($id)
    {
        $opd = User::role('opd')->with('opd')->whereHas('opd', function ($query) use ($id) {
            $query->where('kabkot_id', $id);
        })->get();

        return response()->json($opd);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = new User();
        if (Auth::user()->hasRole('superadmin')) {
            $role = Role::all();
            $regency = Kabkot::all();
        }else if(Auth::user()->hasRole('admin')){
            $role = Role::whereNotIn('name', ['superadmin', 'admin', 'verifikator'])->get();
            $regency = Kabkot::where('id', Auth::user()->opd->kabkot_id)->get();
        }else {
            $regency = [Auth::user()->opd->kabkot_id, Auth::user()->opd->kabkot->regency->name];
            $role = Role::where('name', 'upt')->get();
        }
        $submenu = SubMenu::all();

        return view('page.admin.user.create_edit', compact('user', 'role', 'regency', 'submenu'));
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
            'role' => 'required',
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
            if ($request->role != 'superadmin') {
                $te = null;

                if ($request->logo == null) {
                    $mediaPath = public_path('uploads/kabkot');
                    $filesInFolder = File::allFiles($mediaPath);
                    $kabkot = Kabkot::find($request->kabkot_id);
                    foreach ($filesInFolder as $value) {
                        $files = pathinfo($value);
                        if ($kabkot->regency->name == $files['filename']) {
                            $data = $files['basename'];
                        }
                    }
                    $te = Storage::disk('public_uploads')->putFileAs('opd_logo', $value, $data);
                }

                if ($request->role == 'upt') {
                    Opd::create([
                        'kabkot_id' => $request->kabkot_id,
                        'user_id' => $user->id,
                        'sub_menu_id' => $request->sub_menu_id,
                        'logo' => $request->logo ? Storage::disk('public_uploads')->put('opd_logo', $request->logo) : $te,
                        'nama' => $user->name,
                        'alamat' => $request->alamat,
                        'opd_id' => $request->opd_id ?? Auth::user()->opd->id,
                        'no_telp' => (string)$request->no_telp
                    ]);
                }else{
                    Opd::create([
                        'kabkot_id' => $request->kabkot_id,
                        'user_id' => $user->id,
                        'sub_menu_id' => $request->sub_menu_id,
                        'logo' => $request->logo ? Storage::disk('public_uploads')->put('opd_logo', $request->logo) : $te,
                        'nama' => $user->name,
                        'alamat' => $request->alamat,
                        'no_telp' => (string)$request->no_telp
                    ]);
                }
            }

            $user->assignRole($request->role);
            DB::commit();

            return redirect()->route('portal.master.user.index')->with('success', 'data berhasil tersimpan');
        } catch (\Throwable $th) {
            //throw $th;
            DB::rollBack();
            dd($th);
            return redirect()->back()->with('danger', $th->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $role = Role::all();
        $regency = Kabkot::all();
        $submenu = SubMenu::all();

        return view('page.admin.user.create_edit', compact('user', 'role', 'regency', 'submenu'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $this->validate($request, [
            'role' => 'required',
            'name' => 'required',
            'email' => 'required|unique:users,email,' . $user->id,
        ]);

        DB::beginTransaction();
        try {
            $user->update([
                'name' => $request->name,
                'email' => $request->email,
            ]);
            if ($request->role != 'superadmin') {
                if ($user->opd == null) {
                    Opd::create([
                        'regency_id' => $request->regency_id,
                        'user_id' => $user->id,
                        'sub_menu_id' => $request->sub_menu_id,
                        'nama' => $user->name,
                        'alamat' => $request->alamat,
                        'no_telp' => $request->no_telp
                    ]);
                } else {
                    $user->opd->update([
                        'regency_id' => $request->regency_id,
                        'sub_menu_id' => $request->sub_menu_id,
                        'nama' => $user->name,
                        'alamat' => $request->alamat,
                        'no_telp' => $request->no_telp
                    ]);
                }
            }

            $user->assignRole($request->role);
            DB::commit();

            return redirect()->route('portal.master.user.index')->with('success', 'data berhasil di update');
        } catch (\Throwable $th) {
            //throw $th;
            DB::rollBack();
            return redirect()->back()->with('danger', $th->getMessage());
        }
    }

    public function updateLogo(Request $request)
    {
        $user = User::find($request->id);

        $this->validate($request, [
            'logo' => 'required|mimes:png,jpg,jpeg'
        ]);

        DB::beginTransaction();
        try {

            if ($request->logo) {
                $user->opd->update([
                    'logo' => Storage::disk('public_uploads')->put('opd_logo', $request->logo)
                ]);
            }

            DB::commit();

            return redirect()->back()->with('success', 'Berhasil merubah logo');
        } catch (\Throwable $th) {
            //throw $th;
            DB::rollBack();

            return redirect()->back()->with('danger', 'Gagal merubah logo');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }

    public function editPasswordView($id)
    {
        $user = User::find($id);
        return view('page.admin.user.edit_password', compact('user'));
    }

    public function editPasswordAction(Request $request, $id)
    {
        $this->validate($request, [
            'password' => 'required'
        ]);

        DB::beginTransaction();
        try {
            $user = User::find($id);
            $user->update([
                'password' => Hash::make($request->password),
            ]);

            DB::commit();
            return redirect()->route('portal.master.user.index')->with('success', 'Berhasil merubah password!');
        } catch (\Throwable $th) {
            //throw $th;
            DB::rollBack();
            return redirect()->back()->with('danger', 'Gagal merubah password!');
        }
    }
}
