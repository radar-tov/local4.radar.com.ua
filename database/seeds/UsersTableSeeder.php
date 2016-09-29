<?php

use App\Models\User;
use Illuminate\Database\Seeder;

// composer require laracasts/testdummy
use Illuminate\Support\Facades\DB;
use Laracasts\TestDummy\Factory as TestDummy;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
//	    DB::table('users')->delete();
		$users = ['igorek_mazur@mail.ru','phpdimas@gmail.com'];

	    foreach($users as $user) {
		    User::create(['name'=>$user,'email'=>$user,'password'=>$user, 'active'=>1,'permissions'=>-5]);
	    }
    }

}
