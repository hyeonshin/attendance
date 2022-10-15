<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class CreateUsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            [
               'name'=>'Admin User',
               'email'=>'admin@example.com',
               'type'=>1,
               'password'=> bcrypt('123456'),
               'phone'=>'08123456789',
               'is_active'=>'Yes',
            ],
            [
               'name'=>'User',
               'email'=>'user@example.com',
               'type'=>0,
               'password'=> bcrypt('123456'),
               'phone'=>'08987654321',
               'is_active'=>'Yes',
            ],

        ];

        foreach ($users as $key => $user) {
            User::create($user);
        }
    }
}
