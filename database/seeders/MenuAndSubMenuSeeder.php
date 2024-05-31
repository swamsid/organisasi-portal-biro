<?php

namespace Database\Seeders;

use App\Models\Menu;
use App\Models\Opd;
use App\Models\SubMenu;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class MenuAndSubMenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $layanan_publik = Menu::create([
            'slug' => Str::slug('Layanan Publik'),
            'nama' => 'Layanan Publik',
        ]);

        $submenu = SubMenu::create([
            'menu_id' => $layanan_publik->id,
            'slug' => Str::slug('Kependudukan dan Tempat Tinggal'),
            'nama' => 'Kependudukan dan Tempat Tinggal',
            'icon' => 'icon/submenu-testing.svg',
            'deskripsi' => 'Temukan informasi, panduan, dan layanan terkait urusan administratif tempat tinggal Anda.'
        ]);
    }
}
