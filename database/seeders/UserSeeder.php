<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        User::create([
            'role_id'=> 1,
            'is_system_admin'=> 1,
            'name'=> 'Admin',
            'email'=> 'kazi@gmail.com',
            'email_verified_at'=> now(),
            'password'=> Hash::make(1234),
            'remember_token'=> Str::random(10),
        ]);

    }
}
