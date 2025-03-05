<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Teacherseeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Query Builder
        DB::table('teacher')->insert([
            'name' => 'Testely',
            'email' => 'elyexample@gmail.com',
            'phone' => '0834256782',
            'address' => 'palembang',
            'gender' => 'male',
            'status' => 'active',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
