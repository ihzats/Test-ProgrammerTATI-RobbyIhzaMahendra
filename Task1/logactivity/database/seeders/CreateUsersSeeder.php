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
    public function run(): void
    {
        $users = [
            [
               'name'=>'Kepala Dinas',
               'email'=>'kepaladinas@gmail.com',
               'type'=> 2,
               'supervisor_id'=> 0,
               'password'=> bcrypt('123456789'),
            ],
            [
               'name'=>'Kepala Bidang 1',
               'email'=>'kepalabidang1@gmail.com',
               'type'=>1,
               'supervisor_id'=> 1,
               'password'=> bcrypt('123456789'),
            ],
            [
               'name'=>'Kepala Bidang 2',
               'email'=>'kepalabidang2@gmail.com',
               'type'=>1,
               'supervisor_id'=> 1,
               'password'=> bcrypt('123456789'),
            ],
            [
               'name'=>'Staff 1',
               'email'=>'Staff1@gmail.com',
               'type'=>0,
               'supervisor_id'=> 2,
               'password'=> bcrypt('123456789'),
            ],
            [
               'name'=>'Staff 2',
               'email'=>'Staff2@gmail.com',
               'type'=>0,
               'supervisor_id'=> 3,
               'password'=> bcrypt('123456789'),
            ],
        ];

        foreach ($users as $key => $user) {
            User::create($user);
        }
    }
}
