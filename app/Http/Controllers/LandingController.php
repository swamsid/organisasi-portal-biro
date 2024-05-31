<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use App\Models\Kabkot;
use App\Models\Kategori;
use App\Models\Layanan;
use App\Models\LogLayanan;
use App\Models\Menu;
use App\Models\SubMenu;
use App\Models\Visit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Carbon;

class LandingController extends Controller
{
    public function landing(Request $request)
    {
        $visit_visitor_count = Visit::select('ip', DB::raw('DATE(created_at) as created_at'))
            ->distinct('ip', 'created_at')->get()->count();
        $visit_visitor_view_count = Visit::get()->count();

        // $visit_visitor_view_count = Visit::whereDate('created_at', Carbon::today())->get()->count();

        $kategori = Menu::all();
        $kabkot = Kabkot::with('regency')->get();
        $berita = Berita::with('user.opd')->where('verif', '2')->whereNotNull('verifikator')->latest()->limit(4)->get();
        $mostLayanan = LogLayanan::with('layanan')->select('id_layanan', DB::raw('COUNT(*) as jumlah_pengunjung'))->groupBy('id_layanan')
            ->orderByDesc('jumlah_pengunjung')->limit(5)->get();
        // dd($mostLayanan);
        // dd($kabkot);
        return view('public.page.landing', compact('kategori', 'kabkot', 'berita', 'mostLayanan', 'visit_visitor_count', 'visit_visitor_view_count'));
    }

    public function cariByKategori($nama)
    {
        $kategori = Kategori::where('nama', $nama)->first();
        $postingan = Layanan::where('kategori_id', $kategori->id)->where('verif', '2')->whereNotNull('verifikator')->paginate(6);
        $kats = Kategori::all();
        return view('public.page.layanan.postingan-all', compact('postingan', 'kats'));
    }

    public function detailLayanan($nama, Request $request)
    {
        $postingan = Layanan::where('slug', $nama)->first();
        $kats = Kategori::all();
        $this->setLogLayanan($postingan, $request);
        return view('public.page.layanan.detail', compact('postingan', 'kats'));
    }

    public function dataSemuaBerita()
    {
        $berita = Berita::with('user.opd')->where('verif', '2')->whereNotNull('verifikator')->latest()->paginate(8);

        return view('public.page.berita.all-data', compact('berita'));
    }

    public function detailBerita(Request $request, $nama)
    {
        $berita = Berita::with('user.opd')->where('verif', '2')->whereNotNull('verifikator')->where('slug', $nama)->first();
        $all_berita = Berita::take(4)->get();
        $this->setLogBerita($berita, $request);
        return view('public.page.berita.detail', compact('berita', 'all_berita'));
    }

    public function searchData(Request $request)
    {
        $berita = Berita::with('user.opd')->where('verif', '2')->whereNotNull('verifikator')->where('judul', 'LIKE', '%' . $request->keyword . '%')->paginate(8);
        if ($request->keyword != null) {
            $this->setLogKeyword($request);
        }
        return view('public.page.berita.search', compact('berita', 'request'));
    }

    public function searchDataByTag(Request $request, $tag)
    {
        $berita = Berita::with('user.opd')->where('verif', '2')->whereNotNull('verifikator')->where('tags', 'like', '%' . $tag . '%')->paginate(8);
        return view('public.page.berita.search', compact('berita', 'request'));
    }

    public function searchDataLayanan(Request $request)
    {
        $postingan = Layanan::with('user.opd')->where('verif', '2')->whereNotNull('verifikator')->where('judul', 'LIKE', '%' . $request->keyword . '%')->paginate(9);
        if ($request->keyword != null) {
            $this->setLogKeyword($request);
        }
        return view('public.page.layanan.search', compact('postingan', 'request'));
    }

    public function searchDataKabkot(Request $request, $id)
    {
        $kabkot = Kabkot::with('regency')->find($id);
        if ($kabkot == null) {
            return redirect()->route('home')->with('danger', 'Kabupaten / Kota tidak ditemukan');
        }
        $layanan = Layanan::with('user.opd')->where('verif', '2')->whereNotNull('verifikator')->whereHas('user', function ($q) use ($id) {
            $q->whereHas('opd', function (Builder $query) use ($id) {
                $query->where('kabkot_id', $id);
            });
        })->paginate(9);

        $berita = Berita::with('user.opd')->where('verif', '2')->whereNotNull('verifikator')->whereHas('user', function ($q) use ($id) {
            $q->whereHas('opd', function (Builder $query) use ($id) {
                $query->where('kabkot_id', $id);
            });
        })->paginate(9);

        return view('public.page.kabkot.detail', compact('layanan', 'berita', 'kabkot'));
    }
}
