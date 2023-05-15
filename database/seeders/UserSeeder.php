<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            'name' => 'zakaria',
            'email' => 'admin@admin.co',
            'role' => 'admin',
            'password' => Hash::make('admin1234'),
        ]);
        DB::table('users')->insert([
            'name' => 'missou',
            'email' => 'user@user.co',
            'role' => 'user',
            'password' => Hash::make('user1234'),
        ]);
    }
}
