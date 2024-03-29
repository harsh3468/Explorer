<?php

use Illuminate\Database\Seeder;
use App\User;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user=User::where('email','coder@gmail.com')->first();

        if(!$user)
        {
            User::create([
                'name'=>'Kanak goel',
                'email'=>'kanakgoel36@gmail.com',
                'password'=>Hash::make('password'),
                'role'=>'admin'
            ]);
        }
    }
}
