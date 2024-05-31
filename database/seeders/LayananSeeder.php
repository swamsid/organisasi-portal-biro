<?php

namespace Database\Seeders;

use App\Models\Content;
use App\Models\Layanan;
use App\Models\SubMenu;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class LayananSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $sub_menu = SubMenu::where('slug', 'kependudukan-dan-tempat-tinggal')->first();
        $user = User::where('name', 'BPKAD')->first();
        $admin = User::where('name', 'superadmin')->first();

        $layanan = Layanan::create([
            'judul' => 'Pelayanan Komunikasi, Informasi dan Edukasi Kebencanaan',
            'slug' => Str::slug('Pelayanan Komunikasi, Informasi dan Edukasi Kebencanaan'),
            'isi' => 'Memberikan data dan informasi dan hasil kajian risiko yang merupakan hasil perhitungan ancaman, kerentanan dan kapasitas daerah di wilayah Jawa Barat',
            'tipe_layanan' => 'online',
            'verif' => '1',
            'sub_menu_id' => $sub_menu->id,
            'created_by' => $user->id,
            'verifikator' => $admin->id,
            'file_icon' => 'layanan-testing.png',
        ]);

        $contents = Content::insert([
            [
                'id' => uuid_create(),
                'layanan_id' => $layanan->id,
                'nama' => 'Manfaat Layanan untuk Masyarakat',
                'deskripsi' => "
                    <ul>
                        <li>Mendapatkan informasi untuk kebutuhan penyusunan RUTR (Rencana Umum Tata Ruang), RDTR (Rencana Detail Tata Ruang).</li>
                        <li>Untuk kebutuhan penelitian</li>
                    </ul>
                "
            ],
            [
                'id' => uuid_create(),
                'layanan_id' => $layanan->id,
                'nama' => 'Syarat dan Ketentuan Layanan',
                'deskripsi' => "
                    <ul>
                        <li>Surat rekomendasi dari Kesbangpol Provinsi Jawa Barat</li>
                    </ul>
                "
            ],
        ]);
    }
}
