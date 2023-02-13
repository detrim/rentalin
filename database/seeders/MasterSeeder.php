<?php

namespace Database\Seeders;

use App\Models\Login;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class MasterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Login::create([
                    'username' => 'Admin',
                    'password' => Hash::make('pass123'),
                    'role_id' => '2',
                ]);
        Login::create([
                'username' => 'SuperAdmin',
                'password' => Hash::make('pass123'),
                'role_id' => '1',
            ]);
    }
}