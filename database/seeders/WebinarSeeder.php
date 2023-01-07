<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class WebinarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i=1;$i<=10;$i++) { 
            DB::table('webinars')->insert([
                'category_id' => rand(1,5),
                'title' => "webinar$i",
                'description' => "Lorem ipsum dolor sit, amet consectetur adipisicing elit. Similique nisi 
                voluptatibus totam atque iste dolor quasi, suscipit eligendi quas velit facilis aliquid nemo 
                laborum assumenda culpa dolores blanditiis modi minus!",
                "image" => 'https://picsum.photos/200',
                "date" => date("Y-m-d"),
                "status" => rand(0,1)
            ]);
        }
    }
}
