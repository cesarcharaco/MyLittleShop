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
    	$admin=\DB::table('users')->insert([
    		'name' => 'Admin',
    		'email' => 'admin@example.com',
    		'password' => \Hash::make('12345678'),
    		'type_user' => 'Admin'

    	]);
        $users=\factory(User::class,10)->create();
    }
}
