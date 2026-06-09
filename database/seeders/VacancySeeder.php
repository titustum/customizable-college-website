<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class VacancySeeder extends Seeder
{
    public function run(): void
    {
        $departments = DB::table('departments')->where('type', 'academic')->pluck('id')->toArray();

        if (empty($departments)) {
            $departments = [1, 2, 3, 4, 5, 6, 7, 8];
        }

        $vacancies = [
            [
                'title' => 'ICT Lecturer',
                'description' => 'We are seeking a qualified ICT lecturer to teach programming, networking, and computer maintenance courses. The ideal candidate should have a degree in Computer Science or related field with at least 3 years of teaching experience.',
                'reference_number' => 'TTVCT/HR/2025/001',
                'department_id' => $departments[array_search('ICT', $departments) ?? 0] ?? $departments[0],
                'published_at' => now()->subDays(5),
                'application_deadline' => now()->addDays(25),
                'status' => 'open',
            ],
            [
                'title' => 'Agricultural Sciences Lecturer',
                'description' => 'Join our agriculture department to teach crop production and animal husbandry. Practical farming experience preferred.',
                'reference_number' => 'TTVCT/HR/2025/005',
                'department_id' => $departments[array_search('Agriculture', $departments) ?? 6] ?? $departments[6],
                'published_at' => now()->subDays(7),
                'application_deadline' => now()->addDays(15),
                'status' => 'open',
            ],
        ];

        foreach ($vacancies as $vacancy) {
            DB::table('vacancies')->insert([
                'title' => $vacancy['title'],
                'description' => $vacancy['description'],
                'reference_number' => $vacancy['reference_number'],
                'department_id' => $vacancy['department_id'],
                'published_at' => $vacancy['published_at'],
                'application_deadline' => $vacancy['application_deadline'],
                'attachment_path' => null,
                'status' => $vacancy['status'],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
