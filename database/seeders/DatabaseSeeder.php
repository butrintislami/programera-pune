<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Jobs;
use App\Models\User;
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
        User::factory(10)->create();
        User::factory()->create([
             'name' => 'Butrint',
             'email' => 'butrint@gmail.com',
             'role'=>'admin',
             'email_verified_at' => now(),
             'password' => Hash::make(('butrinti')),
             'remember_token' => Str::random(10),
        ]);
        Jobs::factory(14)->create();


    }
}
