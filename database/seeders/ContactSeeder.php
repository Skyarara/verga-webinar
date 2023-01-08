<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ContactSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i=1;$i<=6;$i++){
                DB::table('contacts')->insert([
                'name' => "nama$i",
                'email' => "user$i@gmail.com",
                'phone' => "0898123823",
                'message' => "Lorem ipsum dolor sit amet consectetur, adipisicing elit. Accusantium commodi aliquam dolorum consectetur debitis labore saepe recusandae delectus, quisquam beatae. Consequatur, officiis excepturi. Dolorum ratione libero assumenda. Tempora, iste delectus!",
            ]);
        }
    }
}
