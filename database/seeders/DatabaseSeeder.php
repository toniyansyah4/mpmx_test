<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Database\Seeders\LevelSeeder;
use Database\Seeders\UsersSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $this->call(LevelSeeder::class);
        $this->call(UsersSeeder::class);
    }
}
