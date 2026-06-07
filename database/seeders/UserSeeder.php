<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        // Admin / Dean
        User::updateOrCreate(
            ['email' => 'admin@tam.test'],
            [
                'name'     => 'System Admin',
                'email'    => 'admin@tam.test',
                'password' => Hash::make('password'),
                'role'     => 'admin',
            ]
        );

        // Teacher
        User::updateOrCreate(
            ['email' => 'teacher@tam.test'],
            [
                'name'     => 'Demo Teacher',
                'email'    => 'teacher@tam.test',
                'password' => Hash::make('password'),
                'role'     => 'teacher',
            ]
        );

        // Student
        User::updateOrCreate(
            ['email' => 'student@tam.test'],
            [
                'name'     => 'Demo Student',
                'email'    => 'student@tam.test',
                'password' => Hash::make('password'),
                'role'     => 'student',
            ]
        );

        $this->command->info('✅  Seeded: admin@tam.test | teacher@tam.test | student@tam.test  (password: password)');
    }
}
