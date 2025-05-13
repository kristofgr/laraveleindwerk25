<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // call the CategorySeeder class
        $this->call(CategorySeeder::class);

        // call the ProductSeeder class
        $this->call(ProductSeeder::class);
    }
}
