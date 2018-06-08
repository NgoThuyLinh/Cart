<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	DB::table('users')->truncate();
        User::create([
        	'name'=>'Linh',
        	'email'=>'linh@gmail.com',
        	'password'=>bcrypt('123456')
        ]);
        User::create([
        	'name'=>'Hương',
        	'email'=>'huong@gmail.com',
        	'password'=>bcrypt('123456')
        ]);
        User::create([
        	'name'=>'Tuấn Anh',
        	'email'=>'beo@gmail.com',
        	'password'=>bcrypt('123456')
        ]);
        User::create([
        	'name'=>'Dương',
        	'email'=>'duong@gmail.com',
        	'password'=>bcrypt('123456')
        ]);

    }
}
