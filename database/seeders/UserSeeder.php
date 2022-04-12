<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

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
                'name' => 'admin',
                'email' => 'admin@gmail.com',
                'role' => 'admin',
                'password' => Hash::make('admin123'),
            ],
            [
                'name' => 'publisher',
                'email' => 'publisher@gmail.com',
                'role' => 'publisher',
                'password' => Hash::make('publisher123'),
            ],
            [
                'name' => 'representative',
                'email' => 'representative@gmail.com',
                'role' => 'representative',
                'password' => Hash::make('representative123'),
            ],
            [
                'name' => 'developer',
                'email' => 'developer@gmail.com',
                'role' => 'developer',
                'password' => Hash::make('developer123'),
            ],
            [
                'name' => 'editor',
                'email' => 'editor@gmail.com',
                'role' => 'editor',
                'password' => Hash::make('editor123'),
            ],
            [
                'name' => 'desk-reporter',
                'email' => 'desk-reporter@gmail.com',
                'role' => 'desk-reporter',
                'password' => Hash::make('desk-reporter123'),
            ]
        ];

        \DB::table('users')->insert($users);
    }
}
