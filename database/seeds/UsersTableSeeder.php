<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Role;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::truncate();

        $adminRole = Role::where('name', 'admin')->first();
        $userRole = Role::where('name', 'user')->first();

        $admin = User::create([
        	'name' => 'admin',
        	'email' => 'SaefullohAziz027@gmail.com',
        	'password' => 123
        ]);

        $user = User::create([
        	'name' => 'user',
        	'email' => '16171234@smkifsmd.sch.id',
        	'password' => 123
        ]);

        $admin->roles()->attach($adminRole);
        $user->roles()->attach($userRole);
    }
}
