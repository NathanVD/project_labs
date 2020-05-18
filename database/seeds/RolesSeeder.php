<?php

use Illuminate\Database\Seeder;
use App\Role;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::truncate();

        DB::table('roles')->insert([
            'name' => 'Admin',
        ]);

        DB::table('roles')->insert([
            'name' => 'Webmaster',
        ]);

        DB::table('roles')->insert([
            'name' => 'Editor',
        ]);

        DB::table('roles')->insert([
            'name' => 'Teammate',
        ]);

        DB::table('roles')->insert([
            'name' => 'Member',
        ]);
    }
}
