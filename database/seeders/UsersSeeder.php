<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'name' => 'Admin',
                'email' => 'admin@mail.com',
                'email_verified_at' => Carbon::now(),
                'password' => bcrypt('admin1234'),
                'level_id' => 1
            ],
            [
                'name' => 'Employee',
                'email' => 'employee@mail.com',
                'email_verified_at' => Carbon::now(),
                'password' => bcrypt('employee1234'),
                'level_id' => 2
            ]
        ]);
    }
}
