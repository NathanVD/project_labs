<?php

use Illuminate\Database\Seeder;
use App\Testimonial;

class TestimonialSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    Testimonial::truncate();

    factory(Testimonial::class,10)->create();
    }
}
