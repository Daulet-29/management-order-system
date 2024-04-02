<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [
            [
                'name' => 'admin',
                'email' => 'admin@admin.kz',
                'password' => 'password',
                'role' => 'admin',
            ],
            [
                'name' => 'TestAdmin',
                'email' => 'test@admin.kz',
                'password' => 'password',
                'role' => 'admin',
            ],
        ];

        foreach ($users as $userData) {
            $user = User::firstWhere('email', $userData['email']);

            if (!$user) {
                $user = new User([
                    'name' => $userData['name'],
                    'email' => $userData['email'],
                    'password' => bcrypt($userData['password']),
                    'role' => 'admin'
                ]);
                $user->save();
            }
        }
    }
}
