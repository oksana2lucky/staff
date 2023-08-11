<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PositionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $languages = ['PHP', 'Java', 'Python', 'Frontend', 'IOS', 'Android', '.NET'];
        $positionPrefixes = ['Senior', 'Junior', ''];

        $additionalPositions = [
            'CEO', 'CTO', 'Project Manager',
            'Accountant', 'HR Manager', 'Designer', 'Business Analyst',
        ];

        foreach ($languages as $language) {
            foreach ($positionPrefixes as $prefix) {
                if (!empty($prefix)) {
                    $positionName = $prefix . ' ' . $language . ' Developer';
                } else {
                    $positionName = $language . ' Developer';
                }

                DB::table('positions')->insert([
                    'name' => $positionName,
                ]);
            }
        }

        foreach ($additionalPositions as $positionName) {
            DB::table('positions')->insert([
                'name' => $positionName,
            ]);
        }
    }
}
