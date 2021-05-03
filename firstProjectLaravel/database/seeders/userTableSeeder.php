<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class userTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i = 0; $i < 10; $i++){
            \Illuminate\Support\Facades\DB::table('users')->insert([
                'name'=> "JhonDoe$i",
                'email'=>"jhondoe$i@doe.fr",
                'password'=>bcrypt('0000')
            ]);
        }
    }
}
