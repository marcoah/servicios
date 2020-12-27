<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
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
        $user = new User();
        $user->name = 'Marco Antonio';
        $user->email = 'marcoah@gmail.com';
        $user->password = Hash::make('marcoa1*');
        $user->email_verified_at = now();
        $user->created_at = now();
        $user->updated_at = now();
        $user->save();
        $user->assignRole('super-admin');
    }
}
