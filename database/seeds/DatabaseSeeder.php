<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(TestimonialSeeder::class);
        $this->call(CarouselSeeder::class);
        $this->call(TeamSeeder::class);
        $this->call(ServiceSeeder::class);

    }
}
