<?php

use Illuminate\Database\Seeder;
use App\user;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
class usersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    // $user = user::where('email','first@test.com')->first();
 
        $user= Db::table('users')->where('email','first@test.com')->first();

            if (! $user) {
               user::create([
                    'name'=>'abdelrhman',
                    'email'=>'xaxbxdxox.2015@gmail.com',
                    'password'=>Hash::make('123456789'),
                    'role'=>'admin'
                ]);
            }

    }
}
