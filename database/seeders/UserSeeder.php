<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = User::all();

        if($users->isEmpty())
        {
            $userDatas = [
                [
                    'name' => 'Admin',
                    'email' => 'admin@email.com',
                    'phone' => '0700112233',
                    'password' => Hash::make('password'),
                ],
    
                [
                    'name' => 'User',
                    'email' => 'user@email.com',
                    'phone' => '0701112233',
                    'password' => Hash::make('password'),
                ],
            ];

            foreach($userDatas as $user)
            {
                User::create($user);
            }
        }
    }
}
