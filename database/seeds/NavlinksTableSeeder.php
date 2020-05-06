<?php

use Illuminate\Database\Seeder;

class NavlinksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('navlinks')->insert([
            'link_1'=>'home',
            'link_2'=>'services',
            'link_3'=>'blog',
            'link_4'=>'contact',
        ]);
    }
}
