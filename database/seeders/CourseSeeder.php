<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CourseSeeder extends Seeder
{
    public function run(): void
    {
        $courses = [
            // Cosmetology (dept 1)
            ['department_id' => 1, 'name' => 'Cosmetology Level 6', 'requirement' => 'KCSE C- & Above', 'duration' => '9 Terms', 'exam_body' => 'KNQA'],
            ['department_id' => 1, 'name' => 'Cosmetology Level 5', 'requirement' => 'KCSE D & Above', 'duration' => '5 Terms', 'exam_body' => 'KNQA'],
            ['department_id' => 1, 'name' => 'Cosmetology Level 4', 'requirement' => 'KCSE', 'duration' => '3 Terms', 'exam_body' => 'KNQA'],
            ['department_id' => 1, 'name' => 'Cosmetology Level 3', 'requirement' => 'KCPE/KCSE', 'duration' => '2 Terms', 'exam_body' => 'KNQA'],

            // Hospitality (dept 2)
            ['department_id' => 2, 'name' => 'Food & Beverage Sales and Service Management Level 6', 'requirement' => 'KCSE C- & Above', 'duration' => '7 Terms', 'exam_body' => 'KNQA'],
            ['department_id' => 2, 'name' => 'Food & Beverage Sales and Service Management Level 5', 'requirement' => 'KCSE D & Above', 'duration' => '5 Terms', 'exam_body' => 'KNQA'],
            ['department_id' => 2, 'name' => 'Food & Beverage Sales and Service Management Level 4', 'requirement' => 'KCSE', 'duration' => '3 Terms', 'exam_body' => 'KNQA'],
            ['department_id' => 2, 'name' => 'Food & Beverage Production (Culinary Art) Level 6', 'requirement' => 'KCSE C- & Above', 'duration' => '7 Terms', 'exam_body' => 'KNQA'],
            ['department_id' => 2, 'name' => 'Food & Beverage Production Level 5', 'requirement' => 'KCSE D & Above', 'duration' => '4 Terms', 'exam_body' => 'KNQA'],
            ['department_id' => 2, 'name' => 'Housekeeping and Accommodation Level 5', 'requirement' => 'KCSE D & Above', 'duration' => '4 Terms', 'exam_body' => 'KNQA'],
            ['department_id' => 2, 'name' => 'Catering and Accommodation Management Level 6', 'requirement' => 'KCSE C- & Above', 'duration' => '9 Terms', 'exam_body' => 'KNQA'],
            ['department_id' => 2, 'name' => 'Catering and Accommodation Management Level 5', 'requirement' => 'KCSE D & Above', 'duration' => '5 Terms', 'exam_body' => 'KNQA'],
            ['department_id' => 2, 'name' => 'Accommodation Operator Level 4', 'requirement' => 'KCSE', 'duration' => '3 Terms', 'exam_body' => 'KNQA'],
            ['department_id' => 2, 'name' => 'Food and Beverage Operator Level 5', 'requirement' => 'KCSE D & Above', 'duration' => '5 Terms', 'exam_body' => 'KNQA'],
            ['department_id' => 2, 'name' => 'Food and Beverage Operator Level 4', 'requirement' => 'KCSE', 'duration' => '3 Terms', 'exam_body' => 'KNQA'],
            ['department_id' => 2, 'name' => 'Food and Beverage Management Level 6', 'requirement' => 'KCSE C- & Above', 'duration' => '9 Terms', 'exam_body' => 'KNQA'],
            ['department_id' => 2, 'name' => 'Food and Beverage Waiter Level 4', 'requirement' => 'KCSE', 'duration' => '3 Terms', 'exam_body' => 'KNQA'],

            // Fashion and Textile (dept 3)
            ['department_id' => 3, 'name' => 'Fashion Design Management Level 6', 'requirement' => 'KCSE C-', 'duration' => '9 Terms', 'exam_body' => 'KNQA'],
            ['department_id' => 3, 'name' => 'Fashion Design Level 5', 'requirement' => 'KCSE D', 'duration' => '5 Terms', 'exam_body' => 'KNQA'],
            ['department_id' => 3, 'name' => 'Fashion Design Level 4', 'requirement' => 'KCSE', 'duration' => '3 Terms', 'exam_body' => 'KNQA'],

            // Building and Civil (dept 4)
            ['department_id' => 4, 'name' => 'Civil Engineering Level 6', 'requirement' => 'KCSE C- & Above', 'duration' => '9 Terms', 'exam_body' => 'KNQA'],
            ['department_id' => 4, 'name' => 'Building Technician Level 5', 'requirement' => 'KCSE D & Above', 'duration' => '5 Terms', 'exam_body' => 'KNQA'],
            ['department_id' => 4, 'name' => 'Building Artisan Level 4', 'requirement' => 'KCSE', 'duration' => '3 Terms', 'exam_body' => 'KNQA'],
            ['department_id' => 4, 'name' => 'Masonry Level 4', 'requirement' => 'KCSE', 'duration' => '3 Terms', 'exam_body' => 'KNQA'],
            ['department_id' => 4, 'name' => 'Plumbing and Water Services Level 5', 'requirement' => 'KCSE D & Above', 'duration' => '5 Terms', 'exam_body' => 'KNQA'],
            ['department_id' => 4, 'name' => 'Plumbing and Water Services Level 4', 'requirement' => 'KCSE', 'duration' => '3 Terms', 'exam_body' => 'KNQA'],
            ['department_id' => 4, 'name' => 'Scaffolding Technology Level 4', 'requirement' => 'KCSE', 'duration' => '3 Terms', 'exam_body' => 'KNQA'],
            ['department_id' => 4, 'name' => 'Carpentry and Joinery Level 6', 'requirement' => 'KCSE C- & Above', 'duration' => '9 Terms', 'exam_body' => 'KNQA'],
            ['department_id' => 4, 'name' => 'Carpentry and Joinery Level 5', 'requirement' => 'KCSE D & Above', 'duration' => '5 Terms', 'exam_body' => 'KNQA'],
            ['department_id' => 4, 'name' => 'Water Engineering Level 6', 'requirement' => 'KCSE C- & Above', 'duration' => '9 Terms', 'exam_body' => 'KNQA'],

            // Electrical (dept 5)
            ['department_id' => 5, 'name' => 'Electrical Installation Level 6', 'requirement' => 'KCSE C- & Above', 'duration' => '9 Terms', 'exam_body' => 'KNQA'],
            ['department_id' => 5, 'name' => 'Electrical Installation Level 5', 'requirement' => 'KCSE D & Above', 'duration' => '5 Terms', 'exam_body' => 'KNQA'],
            ['department_id' => 5, 'name' => 'Electrical Installation Level 4', 'requirement' => 'KCSE', 'duration' => '3 Terms', 'exam_body' => 'KNQA'],
            ['department_id' => 5, 'name' => 'Electrical Operations Level 6', 'requirement' => 'KCSE C- & Above', 'duration' => '9 Terms', 'exam_body' => 'KNQA'],
            ['department_id' => 5, 'name' => 'Electronics Engineering Level 6', 'requirement' => 'KCSE C- & Above', 'duration' => '9 Terms', 'exam_body' => 'KNQA'],
            ['department_id' => 5, 'name' => 'Electronics Engineering Level 5', 'requirement' => 'KCSE D & Above', 'duration' => '5 Terms', 'exam_body' => 'KNQA'],
            ['department_id' => 5, 'name' => 'Electrical Engineering Level 6', 'requirement' => 'KCSE C- & Above', 'duration' => '9 Terms', 'exam_body' => 'KNQA'],

            // ICT (dept 6)
            ['department_id' => 6, 'name' => 'ICT Technician Level 6', 'requirement' => 'KCSE C-', 'duration' => '9 Terms', 'exam_body' => 'KNQA'],
            ['department_id' => 6, 'name' => 'ICT Technician Level 5', 'requirement' => 'KCSE D', 'duration' => '5 Terms', 'exam_body' => 'KNQA'],
            ['department_id' => 6, 'name' => 'ICT Technician Level 4', 'requirement' => 'KCSE', 'duration' => '3 Terms', 'exam_body' => 'KNQA'],
            ['department_id' => 6, 'name' => 'Office Administration Level 5', 'requirement' => 'KCSE D & Above', 'duration' => '4 Terms', 'exam_body' => 'KNQA'],
            ['department_id' => 6, 'name' => 'Office Administrator Level 6', 'requirement' => 'KCSE C- & Above', 'duration' => '9 Terms', 'exam_body' => 'KNQA'],
            ['department_id' => 6, 'name' => 'Office Administrator Level 5', 'requirement' => 'KCSE D & Above', 'duration' => '5 Terms', 'exam_body' => 'KNQA'],
            ['department_id' => 6, 'name' => 'Marketing Management Level 6', 'requirement' => 'KCSE C- & Above', 'duration' => '9 Terms', 'exam_body' => 'KNQA'],
            ['department_id' => 6, 'name' => 'Marketing Management Level 5', 'requirement' => 'KCSE D & Above', 'duration' => '5 Terms', 'exam_body' => 'KNQA'],
            ['department_id' => 6, 'name' => 'Social Work Level 6', 'requirement' => 'KCSE C- & Above', 'duration' => '9 Terms', 'exam_body' => 'KNQA'],
            ['department_id' => 6, 'name' => 'Social Work Level 5', 'requirement' => 'KCSE D & Above', 'duration' => '5 Terms', 'exam_body' => 'KNQA'],
            ['department_id' => 6, 'name' => 'Procurement Management Level 6', 'requirement' => 'KCSE C- & Above', 'duration' => '9 Terms', 'exam_body' => 'KNQA'],
            ['department_id' => 6, 'name' => 'Procurement Management Level 5', 'requirement' => 'KCSE D & Above', 'duration' => '5 Terms', 'exam_body' => 'KNQA'],

            // Agriculture (dept 7)
            ['department_id' => 7, 'name' => 'Agriculture Extension Level 6', 'requirement' => 'KCSE C- & Above', 'duration' => '9 Terms', 'exam_body' => 'KNQA'],
            ['department_id' => 7, 'name' => 'Agriculture Extension Level 5', 'requirement' => 'KCSE C- & Above', 'duration' => '5 Terms', 'exam_body' => 'KNQA'],
            ['department_id' => 7, 'name' => 'General Agriculture Level 4', 'requirement' => 'KCSE', 'duration' => '3 Terms', 'exam_body' => 'KNQA'],

            // Mechanical (dept 8)
            ['department_id' => 8, 'name' => 'Welding (Gas Welding and Gas Tungsten Arc Welding) Level 4', 'requirement' => 'KCSE', 'duration' => '3 Terms', 'exam_body' => 'KNQA'],
            ['department_id' => 8, 'name' => 'Welding (Gas Welding) Level 3', 'requirement' => 'KCSE', 'duration' => '3 Terms', 'exam_body' => 'KNQA'],
            ['department_id' => 8, 'name' => 'Welding and Fabrication Level 6', 'requirement' => 'KCSE C- & Above', 'duration' => '9 Terms', 'exam_body' => 'KNQA'],
            ['department_id' => 8, 'name' => 'Mechanical Engineering (Production) Level 6', 'requirement' => 'KCSE C- & Above', 'duration' => '7 Terms', 'exam_body' => 'KNQA'],
            ['department_id' => 8, 'name' => 'Mechanical Engineering (Production) Level 4', 'requirement' => 'KCSE', 'duration' => '4 Terms', 'exam_body' => 'KNQA'],
            ['department_id' => 8, 'name' => 'Welding and Fabrication Level 3', 'requirement' => 'KCSE', 'duration' => '2 Terms', 'exam_body' => 'KNQA'],
            ['department_id' => 8, 'name' => 'Welding (Manual Metal Arc and Gas Metal Arc Welding) Level 4', 'requirement' => 'KCSE', 'duration' => '3 Terms', 'exam_body' => 'KNQA'],
        ];

        foreach ($courses as $course) {
            DB::table('courses')->insert($course);
        }
    }
}
