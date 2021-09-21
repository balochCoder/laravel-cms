<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::where('email','raheelahmed017@gmail.com')->first();


        if (!$user) {
           User::create([
            'name'=>'Raheel Ahmed',
            'email'=>'raheelahmed017@gmail.com',
            'email_verified_at' => now(),
            'role'=>'admin',
            'password'=>Hash::make('password'),
            'remember_token' => Str::random(10),
           ]);

        }
    }
}
