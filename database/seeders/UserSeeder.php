<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
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
        DB::table('users')->insert([
            'name' => "admin1",
            'email' => "admin1@gmail.com",
            'password' => Hash::make("admin1"),
            'is_admin' => true,
        ]);
        DB::table('users')->insert([
            'name' => "admin2",
            'email' => "admin2@gmail.com",
            'password' => Hash::make("admin2"),
            'is_admin' => true,
        ]);
        // for($i=1;$i<=6;$i++){
        //     DB::table('users')->insert([
        //         'name' => "user$i",
        //         'email' => "user$i@gmail.com",
        //         'password' => Hash::make("user$i"),
        //         'is_admin' => false,
        //     ]);
        // }
    }
}
