<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DepartmentsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $departments = ['development', 'support', 'management'];

        foreach ($departments as $department) {
            DB::table('departments')->insert([
                'name' => $department,
            ]);
        }
    }
}
