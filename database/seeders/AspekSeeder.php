<?php

namespace Database\Seeders;

use App\Models\Aspek;
use App\Models\AspekDetail;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AspekSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $aspek = [
            'Aspek Kelompok Umum dan Replikasi',
            'Aspek Tambahan Kelompok Replikasi',
            'Aspek Kelompok Khusus'
        ];

        $_0 =[
            'Ringkasan',
            'Latar Belakang dan Tujuan',
            'Kebaruan/ Nilai Tambah',
            'Implementasi Inovasi',
            'Signifikansi',
            'Adaptabilitas',
            'Sumber Daya',
            'Strategi Keberlanjutan'
        ];

        $_1 =[
            'Inspirasi',
            'Proses Replikasi',
            'Faktor Pembeda',
        ];

        $_2 =[
            'Ringkasan',
            'Deskripsi Inovasi Awal',
            'Pembaruan / Peningkatan Inovasi',
            'Dampak',
            'Adaptabilitas',
            'Penguatan Sumber Daya',
            'Strategi Penguatan Keberlanjutan',
        ];

        
        foreach ($aspek as $key => $value) {
           $datas =  Aspek::create([
                'nama' => $value
            ]);

            $currentArray = ${'_' . $key}; 
            foreach ($currentArray as $items) {
                AspekDetail::create([
                    'nama' => $items,
                    'aspek_id' => $datas->id
                ]);
            }
        }


    }
}
