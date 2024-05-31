<?php

namespace Database\Seeders;

use App\Models\KategoriIndikator;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class KategoriF0Seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            'kebijakan pelayanan',
            'profesionalisme sdm',
            'sarana prasarana',
            'sistem informasi pelayanan publik',
            'konsultasi dan pengaduan'
        ];
        foreach ($data as $key => $value) {
            KategoriIndikator::create([
                'nama' => $value,
                'tipe' => 'semua',
                'created_by' => 1,
            ]);
        }

        $datas = [
            'inovasi pelayanan publik',
            'informasi tambahan',

        ];
        foreach ($datas as $key => $value) {
            KategoriIndikator::create([
                'nama' => $value,
                'tipe' => 'f02',
                'created_by' => 1,
            ]);
        }
    }
}
