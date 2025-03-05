<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // $teachers = [
        //     [
        //         'name' => 'Test1',
        //         'email' => 'test1@example.com',
        //         'phone' => '081274630516',
        //         'address' => 'Lampung',
        //         'gender' => 'male',
        //         'status' => 'active',
        //         'created_at' => now(),
        //         'updated_at' => now(),
        //     ],
        //     [
        //         'name' => 'Test2',
        //         'email' => 'test2@example.com',
        //         'phone' => '081234567890',
        //         'address' => 'Jakarta',
        //         'gender' => 'female',
        //         'status' => 'inactive',
        //         'created_at' => now(),
        //         'updated_at' => now(),
        //     ],
        //     [
        //         'name' => 'Test3',
        //         'email' => 'test3@example.com',
        //         'phone' => '081298765432',
        //         'address' => 'Bandung',
        //         'gender' => 'male',
        //         'status' => 'active',
        //         'created_at' => now(),
        //         'updated_at' => now(),
        //     ],
        // ];

        // foreach ($teachers as $teacher) {
        //     DB::table('teacher')->insert($teacher);
        // }

        $this->call([
            Studentseeder::class,
            Teacherseeder::class,
        ]);


    }
}
