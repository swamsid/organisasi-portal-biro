<?php

namespace Database\Seeders;

use App\Models\Layanan;
use App\Models\MediaInformasi;
use App\Models\MediaInformasiDetail;
use App\Models\Operasional;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MediaInformasiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $layanan = Layanan::where('slug', 'pelayanan-komunikasi-informasi-dan-edukasi-kebencanaan')->first();

        $media_informasi = MediaInformasi::create([
            'layanan_id' => $layanan->id,
            'link_embed' => 'https://www.youtube.com/embed/cLYnqfp3xko?si=aByuUVr_a8hYLb82',
            'email' => 'email.testing@gmail.com',
            'alamat' => 'alamat testing',
            'telp' => '0895700321925',
            'hotline' => '0895700321925',
            'link_web' => 'https://jabarprov.go.id',
            'tarif' => 'gratis',
            'link_akses' => 'https://jabarprov.go.id',
            'twitter' => 'https://twitter.com',
            'facebook' => 'https://www.facebook.com',
            'instagram' => 'https://www.instagram.com',
            'tiktok' => 'https://www.tiktok.com/en',
            'youtube' => 'https://www.youtube.com',
        ]);

        $media_informasi_detail = MediaInformasiDetail::insert([
            [
                'id' => uuid_create(),
                'media_id' => $media_informasi->id,
                'gambar' => 'media_informasi/media-informasi-detail-testing.jpg',
            ],
            [
                'id' => uuid_create(),
                'media_id' => $media_informasi->id,
                'gambar' => 'media_informasi/media-informasi-detail-testing.jpg',
            ],
            [
                'id' => uuid_create(),
                'media_id' => $media_informasi->id,
                'gambar' => 'media_informasi/media-informasi-detail-testing.jpg',
            ],
            [
                'id' => uuid_create(),
                'media_id' => $media_informasi->id,
                'gambar' => 'media_informasi/media-informasi-detail-testing.jpg',
            ],
        ]);

        $operasionals = Operasional::insert([
            [
                'id' => uuid_create(),
                'media_id' => $media_informasi->id,
                'hari' => 'Senin',
                'jam_awal' => '10:30',
                'jam_akhir' => '17:30',
            ],
            [
                'id' => uuid_create(),
                'media_id' => $media_informasi->id,
                'hari' => 'Selasa',
                'jam_awal' => '10:30',
                'jam_akhir' => '17:30',
            ],
            [
                'id' => uuid_create(),
                'media_id' => $media_informasi->id,
                'hari' => 'Rabu',
                'jam_awal' => '10:30',
                'jam_akhir' => '17:30',
            ],
        ]);
    }
}
