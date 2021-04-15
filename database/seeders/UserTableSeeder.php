<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'guest',
            'email' => 'guest@bebasakuntasi.com',
            'password' => Hash::make('password'),
        ]);
        DB::table('users')->insert([
            'name' => 'leo',
            'email' => 'leo@bebasakuntasi.com',
            'password' => Hash::make('password'),
        ]);
        DB::table('users')->insert([
            'name' => 'budi',
            'email' => 'budi@bebasakuntasi.com',
            'password' => Hash::make('password'),
        ]);
    }
}
