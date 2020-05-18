<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Role;
use App\Role_User;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        User::truncate();
        Role_User::truncate();

        factory(User::class,10)->create();

        $roles = Role::all();
        $little_roles = $roles->where('name','Member');
        App\User::all()->each(function ($user) use ($little_roles) { 
            $user->roles()->attach($little_roles->pluck('id')->toArray()); 
        });

        DB::table('users')->insert([
            'name' => 'Nathan Van Dyck',
            'email' => 'nathan@admin.com',
            'password' => bcrypt('12345678'),
            'photo_path' => 'img/admin.jpg'
        ]);

        DB::table('users')->insert([
            'name' => 'William Shakespeare',
            'email' => 'w.shak@editor.com', 
            'password' => bcrypt('12345678'),
            'photo_path' => 'img/034 William Shakespeare 1.png'
        ]);

        $nathan = User::where('name','Nathan Van Dyck')->first();
        $nathan->roles()->attach($roles->pluck('id')->toArray());
        $WS = User::where('name','William Shakespeare')->first();
        $WS->roles()->attach($roles->where('name','Member')->pluck('id')->toArray());
        $WS->roles()->attach($roles->where('name','Editor')->pluck('id')->toArray());

    }
}
