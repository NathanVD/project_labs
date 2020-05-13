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
        Eloquent::unguard();

		//disable foreign key check for this connection before running seeders
		DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        $this->call(TestimonialSeeder::class);
        $this->call(CarouselSeeder::class);
        $this->call(TeamSeeder::class);
        $this->call(ServiceSeeder::class);
        $this->call(AuthorSeeder::class);
        $this->call(CategorySeeder::class);
        // supposed to only apply to a single connection and reset it's self
		// but I like to explicitly undo what I've done for clarity
		DB::statement('SET FOREIGN_KEY_CHECKS=1;');
        
    }
}
