<?php

namespace Database\Seeders;

use App\Models\Opd;
use App\Models\SubMenu;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = User::create([
            'name' => 'superadmin',
            'email' => 'superadmin@gmail.com',
            'password' => Hash::make('password'),
        ]);

        $user_opd = User::create([
            'name' => 'BPKAD',
            'email' => 'bpkad@gmail.com',
            'password' => Hash::make('password'),
        ]);

        $admin->assignRole('superadmin');
        $user_opd->assignRole('opd');
    }
}
