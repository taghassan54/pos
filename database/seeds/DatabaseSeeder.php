<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder {

    public function run()
    {

        for($i=0;$i<20;$i++){
            DB::table('products')->insert([
                'name' => "المنتج رقم ".$i,
                'price' => rand(1, 25),
                'created_at' => \Carbon\Carbon::now(),
            ]);
        }
    }
}
