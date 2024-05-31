<?php

namespace App\Http\Controllers;

use App\Models\Layanan;
use App\Models\MediaInformasi;
use App\Models\MediaInformasiDetail;
use App\Models\Operasional;
use App\Models\SubMenu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class PembuatanMediaInformasiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $layanan = Layanan::where('created_by', Auth::user()->id)->get()->pluck('id');
        $media_informasis = MediaInformasi::with('layanan')->whereIn('layanan_id', $layanan)->get();

        return view('page.opd.media-informasi.index', compact('media_informasis'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $layanan = Layanan::where('created_by', Auth::user()->id)->get();
        $media_informasi = new MediaInformasi();
        $haris = ['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu', 'Minggu'];
        $tarifs = ['gratis', 'berbayar', 'menyesuaikan'];

        // if (Auth::user()->hasRole('superadmin') || Auth::user()->hasRole('admin')) {
        //     $submenu = SubMenu::all();
        // } else {
        //     $submenu = [Auth::user()->opd->submenu->id, Auth::user()->opd->submenu->nama];
        // }

        return view('page.opd.media-informasi.create', compact('media_informasi', 'layanan', 'haris', 'tarifs'));
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
            'layanan_id' => 'required',
            'link_embed' => 'url',
            'email' => 'required',
            'alamat' => 'required',
            'telp' => 'required',
            'hotline' => 'required',
            'link_web' => 'required|url',
            'tarif' => 'required',
            'link_akses' => 'required|url',
            // 'twitter' => 'required',
            // 'facebook' => 'required',
            // 'instagram' => 'required',
            // 'tiktok' => 'required',
            // 'youtube' => 'required',
        ]);

        DB::beginTransaction();
        try {
            $check_media_informasi = MediaInformasi::where('layanan_id', $request->layanan_id)->first();

            if (!empty($check_media_informasi)) {
                return redirect()->back()->with('danger', 'Media informasi dengan layanan tersebut sudah ada!');
            }

            $media_informasi = MediaInformasi::create([
                'layanan_id' => $request->layanan_id,
                'link_embed' => $request->link_embed,
                'email' => $request->email,
                'alamat' => $request->alamat,
                'telp' => $request->telp,
                'hotline' => $request->hotline,
                'link_web' => $request->link_web,
                'tarif' => $request->tarif,
                'link_akses' => $request->link_akses,
                'twitter' => $request->twitter,
                'facebook' => $request->facebook,
                'instagram' => $request->instagram,
                'tiktok' => $request->tiktok,
                'youtube' => $request->youtube,
                'whatsapp' => $request->whatsapp,
            ]);

            foreach ($request->hari as $index => $hari) {
                $operasional = Operasional::create([
                    'media_id' => $media_informasi->id,
                    'hari' => $request->hari[$index],
                    'jam_awal' => $request->jam_awal[$index],
                    'jam_akhir' => $request->jam_akhir[$index],
                ]);
            }

            foreach ($request->file('gambar') as $gambar) {
                $media_informasi_detail = MediaInformasiDetail::create([
                    'id' => uuid_create(),
                    'media_id' => $media_informasi->id,
                    'gambar' => Storage::disk('public_uploads')->put('media_informasi', $gambar),
                    // 'gambar' => $gambar->store('media_informasi')
                ]);
            }

            DB::commit();
            return redirect()->route('portal.pembuatan.media-informasis.index')->with('success', 'Berhasil menambah Media Informasi');
        } catch (\Throwable $th) {
            DB::rollBack();
            dd($th);
            return redirect()->back()->with('danger', 'Gagal menambah Media Informasi');
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
        $layanan = Layanan::where('created_by', Auth::user()->id)->get();
        $media_informasi = MediaInformasi::with(['operasional', 'detailMedia'])->find($id);
        $haris = ['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu', 'Minggu'];
        $tarifs = ['gratis', 'berbayar', 'menyesuaikan'];

        // if (Auth::user()->hasRole('superadmin') || Auth::user()->hasRole('admin')) {
        //     $submenu = SubMenu::all();
        // } else {
        //     $submenu = [Auth::user()->opd->submenu->id, Auth::user()->opd->submenu->nama];
        // }

        return view('page.opd.media-informasi.create', compact('media_informasi', 'layanan', 'haris', 'tarifs'));
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
            'layanan_id' => 'required',
            'link_embed' => 'url',
            'email' => 'required',
            'alamat' => 'required',
            'telp' => 'required',
            'hotline' => 'required',
            'link_web' => 'required',
            'tarif' => 'required',
            'link_akses' => 'required',
            // 'twitter' => 'required',
            // 'facebook' => 'required',
            // 'instagram' => 'required',
            // 'tiktok' => 'required',
            // 'youtube' => 'required',
        ]);

        DB::beginTransaction();
        try {
            $media_informasi = MediaInformasi::with(['operasional', 'detailMedia'])->find($id);
            Operasional::where('media_id', $media_informasi->id)->forceDelete();

            $media_informasi->update([
                'layanan_id' => $request->layanan_id,
                'link_embed' => $request->link_embed,
                'email' => $request->email,
                'alamat' => $request->alamat,
                'telp' => $request->telp,
                'hotline' => $request->hotline,
                'link_web' => $request->link_web,
                'tarif' => $request->tarif,
                'link_akses' => $request->link_akses,
                'twitter' => $request->twitter,
                'facebook' => $request->facebook,
                'instagram' => $request->instagram,
                'tiktok' => $request->tiktok,
                'youtube' => $request->youtube,
                'whatsapp' => $request->whatsapp,
            ]);

            foreach ($request->hari as $index => $hari) {
                $operasional = Operasional::create([
                    'media_id' => $media_informasi->id,
                    'hari' => $request->hari[$index],
                    'jam_awal' => $request->jam_awal[$index],
                    'jam_akhir' => $request->jam_akhir[$index],
                ]);
            }

            if ($request->file('gambar') != null) {
                MediaInformasiDetail::where('media_id', $media_informasi->id)->forceDelete();

                foreach ($media_informasi->detailMedia as $media) {
                    Storage::disk('public_uploads')->delete($media->gambar);
                }

                foreach ($request->file('gambar') as $gambar) {
                    $media_informasi_detail = MediaInformasiDetail::create([
                        'media_id' => $media_informasi->id,
                        'gambar' => Storage::disk('public_uploads')->put('media_informasi', $gambar),
                        // 'gambar' => $gambar->store('media_informasi')
                    ]);
                }
            }

            DB::commit();
            return redirect()->route('portal.pembuatan.media-informasis.index')->with('success', 'Berhasil mengubah Media Informasi');
        } catch (\Throwable $th) {
            DB::rollBack();
            dd($th);
            return redirect()->back()->with('danger', 'Gagal mengubah Media Informasi');
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
        $media_informasi = MediaInformasi::find($id);

        DB::beginTransaction();
        try {
            $media_informasi->delete();
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
