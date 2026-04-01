<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            ShieldSeeder::class,
        ]);

        $user = User::create([
            'name' => 'Salem',
            'email' => 'salem.admin@alkhaleej.com',
            'password' => Hash::make('adminsalem1930'),
        ]);

        $user->assignRole('super_admin');
    }
}