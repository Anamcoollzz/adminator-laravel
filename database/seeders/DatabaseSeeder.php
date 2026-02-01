<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // 1 Superadmin
        User::factory()->create([
            'name' => 'Super Admin',
            'email' => 'superadmin@adminator.test',
            'role' => 'superadmin',
        ]);

        // 10 Admins
        User::factory(10)->create([
            'role' => 'admin',
        ]);

        // 100 Users (default role is 'user' from factory)
        User::factory(100)->create();
    }
}
