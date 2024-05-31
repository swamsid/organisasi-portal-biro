<?php

namespace Database\Seeders;

use App\Models\Kabkot;
use App\Models\Regency;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;

class KabkotSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $mediaPath = public_path('uploads\kabkot');

        $filesInFolder = File::allFiles($mediaPath);

        foreach ($filesInFolder as $path) {
            $files = pathinfo($path);
            $regency = Regency::where('name', $files['filename'])->first();
            if (!empty($regency)) {
                Kabkot::create([
                    'logo' => 'kabkot/' . $files['basename'],
                    'regency_id' => $regency->id,
                    'created_by' => 1
                ]);
            }
        }
    }
}
