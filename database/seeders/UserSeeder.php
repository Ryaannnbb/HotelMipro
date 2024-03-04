<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' =>  Hash::make('123456789'),
            'role' => 'admin',
        ]);
        DB::table('users')->insert([
            'name' => 'User',
            'email' => 'user@gmail.com',
            'password' =>  Hash::make('123456789'),
            'role' => 'user',
        ]);
        DB::table('users')->insert([
            'name' => 'Ryaannn',
            'email' => 'blitaryanendipratama@gmail.com',
            'password' =>  Hash::make('123456789'),
            'role' => 'user',
        ]);
    }
}
