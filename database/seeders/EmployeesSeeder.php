<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Carbon\Carbon;

class EmployeesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('employees')->truncate();
        DB::statement('ALTER TABLE employees AUTO_INCREMENT = 1');

        $positionsData = DB::table('positions')->get();
        $positions = [];
        foreach ($positionsData as $position) {
            $positions[$position->name] = $position->id;
        }

        $departmentsData = DB::table('departments')->get();
        $departments = [];
        foreach ($departmentsData as $department) {
            $departments[$department->name] = $department->id;
        }

        $names = [
            'John', 'Michael', 'David', 'Jennifer', 'Emily', 'Jessica',
            'William', 'Christopher', 'Linda', 'Patricia', 'Richard', 'Susan',
        ];

        $surnames = [
            'Smith', 'Johnson', 'Williams', 'Jones', 'Brown', 'Davis',
            'Miller', 'Wilson', 'Moore', 'Taylor', 'Anderson', 'Thomas',
        ];

        // directors
        $employees = [
            [
                'position' => 'CEO',
                'department' => 'management',
                'salary' => rand(150, 200) * 100,
            ],
            [
                'position' => 'CTO',
                'department' => 'development',
                'salary' => rand(100, 150) * 100,
            ],
        ];

        // no departments
        $noDepartmentPositions = ['Accountant', 'HR Manager'];
        for($i = 0; $i < 2; $i++) {
            foreach($noDepartmentPositions as $position) {
                $employees[] = [
                    'position' => $position,
                    'department' => null,
                    'salary' => rand(15, 20) * 100,
                ];
            }
        }

        // managers and analytics
        $managementPositions = ['Project Manager', 'Business Analyst'];
        for($i = 0; $i < 3; $i++) {
            foreach($managementPositions as $position) {
                $employees[] = [
                    'position' => $position,
                    'department' => 'management',
                    'salary' => rand(25, 40) * 100,
                ];
            }
        }

        // developers and designers
        $excludedPositions = array_merge($noDepartmentPositions, $managementPositions, ['CEO', 'CTO']);
        $devPositions = array_diff($positions, $excludedPositions);
        for($i = 0; $i < 50; $i++) {
            $position = array_rand($devPositions);

            if (Str::contains($position, 'Junior')) {
                $salary = rand(15, 23) * 100;
            } elseif (Str::contains($position, 'Senior')) {
                $salary = rand(40, 70) * 100;
            } else {
                $salary = rand(25, 40) * 100;
            }

            $employees[] = [
                'position' => $position,
                'department' => ['development', 'support'][array_rand(['development', 'support'])],
                'salary' => $salary,
            ];
        }

        foreach($employees as $employee) {
            DB::table('employees')->insert([
                'name' => $names[array_rand($names)] . ' ' . $surnames[array_rand($surnames)],
                'position_id' => $positions[$employee['position']],
                'department_id' => $employee['department'] ? $departments[$employee['department']] : null,
                'salary' => $employee['salary'],
                'employment_date' => Carbon::now()->subDays(rand(1, 3650))->toDateString(), // Random date within 10 years
            ]);
        }
    }
}
