<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Studentseeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Query Builder
        DB::table('Students')->insert([
            'name' => 'Testely',
            'email' => 'elyexample@gmail.com',
            'phone' => '0834256782',
            'class' => '6',
            'address' => 'palembang',
            'gender' => 'male',
            'status' => 'active',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
