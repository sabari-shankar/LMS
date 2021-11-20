<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
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
                'name' => 'Admin',
                'email' => 'admin@gmail.com',
                'is_admin' => 1,
                'password' => bcrypt('LMSadmin@123')
            ],
            [
                'name' => 'User A',
                'email' => 'usera@gmail.com',
                'password' => bcrypt('userA@123')
            ]
        ];
        foreach($users as $user){
            User::create($user);
        }

    }
}
