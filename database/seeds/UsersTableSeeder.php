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
        // test users
        $usersToSeed = 100;
        for ($i = 1; $i <= $usersToSeed; $i++) {
            $user = new User;
            $user->name = 'Test User-'.$i;
            $user->email = 'testuser'.$i.'@mailinator.com';
            $plainPassword = '123456';
            $user->password = app('hash')->make($plainPassword);
            $user->save();
        }

        //my user
        $user = new User;
        $user->name = 'Kapil';
        $user->email = 'lpkapil@gmail.com';
        $plainPassword = '123456';
        $user->password = app('hash')->make($plainPassword);
        $user->save();
    }
}
