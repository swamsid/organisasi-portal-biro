<?php

namespace Database\Seeders;

use App\Models\Kabkot;
use App\Models\Opd;
use App\Models\SubMenu;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OpdSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user_opd = User::where('name', 'BPKAD')->first();
        $submenu = SubMenu::where('slug', 'kependudukan-dan-tempat-tinggal')->first();
        $kabkot = Kabkot::find(38);

        $opd = Opd::create([
            'user_id' => $user_opd->id,
            'kabkot_id' => $kabkot->id,
            'sub_menu_id' => $submenu->id,
            'logo' => 'opd_logo/KOTA SURABAYA.png',
            'nama' => 'BPKAD',
            'alamat' => '-',
            'no_telp' => '-'
        ]);
    }
}
