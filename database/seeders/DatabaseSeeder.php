<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Login;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
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