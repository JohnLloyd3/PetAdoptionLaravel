<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('user_statuses')->insert([
            ['id' => 1, 'status_name' => 'Active'],
            ['id' => 2, 'status_name' => 'Inactive'],
            // Add other statuses as needed
        ]);
    }
}
