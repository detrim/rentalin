<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\User;
use App\Models\lOGIN;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

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
        User::create([
            'name' => 'SuperAdmin',
            'password' => Hash::make('pass123'),
            'email' => 'superadmin@mail.co.id',
            'remember_token' => Str::random(40),
        ]);
        // Login::create([
        //     'username' => 'Admin',
        //     'password' => Hash::make('pass123'),
        //     'role_id' => '2',
        // ]);
    }
}
