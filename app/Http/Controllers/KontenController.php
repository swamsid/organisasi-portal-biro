<?php

namespace App\Http\Controllers;

use App\Models\Layanan;
use App\Models\MediaInformasi;
use App\Models\SubMenu;
use Illuminate\Http\Request;

class KontenController extends Controller
{
    public function kategori(Request $request, $slug)
    {
        $subMenu = SubMenu::where('slug', $slug)->first();
        $layanans = Layanan::where(function ($query) use ($request) {
            if ($request->search != null) {
                $query->where('judul', 'like', '%' . $request->search . '%');
            } else {
                $query;
            }
        })->where('sub_menu_id', $subMenu->id)->where('verif', '2')->get();

        return view('public.page.layanan.index', compact(
            'slug',
            'subMenu',
            'layanans'
        ));
    }

    public function layananDetail($slug)
    {
        $layanan = Layanan::with(['contents', 'submenu'])->where('slug', $slug)->first();
        $submenu = SubMenu::where('id', $layanan->sub_menu_id)->first();
        $media_informasi = MediaInformasi::where('layanan_id', $layanan->id)->first();
        $current_operasional = array_values($media_informasi->operasional->filter(function ($q) {
            return $q->hari == now()->translatedFormat('l');
        })->toArray());
        $is_tutup = now()->translatedFormat('H:i') > date('H:i', strtotime($current_operasional[0]['jam_akhir'])) ||  now()->translatedFormat('H:i') < date('H:i', strtotime($current_operasional[0]['jam_awal']));
        $link_akses_full = !empty($media_informasi->link_akses) ? explode('.', parse_url($media_informasi->link_akses)['host']) : '';
        $link_akses_format = !empty($link_akses_full) ? ucwords($link_akses_full[0] . ' ' . $link_akses_full[1]) : '';

        // dd($is_tutup, $current_operasional[2]->jam_awal, $current_operasional[2]->jam_akhir);
        return view('public.page.layanan.detail', compact(
            'layanan',
            'submenu',
            'media_informasi',
            'current_operasional',
            'is_tutup',
            'link_akses_format'
        ));
    }
}
