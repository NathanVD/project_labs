<?php

use Illuminate\Database\Seeder;
use App\Carousel;

class CarouselSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    Carousel::truncate();

    factory(Carousel::class,5)->create();
    }
}
