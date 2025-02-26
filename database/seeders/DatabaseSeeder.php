<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Admin;
use App\Models\Product;
use Illuminate\Support\Facades\Hash;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

        User::factory()->create([
            'name' => 'JG',
            'email' => 'jg@jg.com',
            'password' => Hash::make('password'),
        ]);


        Admin::factory()->create([
            'name' => 'AdminUser',
            'email' => 'admin@admin.com',
            'password' => Hash::make('admin'),
        ]);

        Product::factory()->create([
            'name' => 'O Grande Gatsby'
        ]);
    }
}
