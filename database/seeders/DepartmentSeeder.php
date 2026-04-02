<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class DepartmentSeeder extends Seeder
{
    public function run(): void
    {
        $placeholderPhoto = null;

        $departments = [
            [
                'name' => 'ICT',
                'slug' => Str::slug('ICT'),
                'type' => 'academic',
                'photo' => $placeholderPhoto,
                'short_desc' => 'Build the future with cutting-edge ICT skills and innovation-driven training.',
                'full_desc' => 'Our ICT department offers comprehensive programs in software development, networking, and cybersecurity, designed to equip students with practical and theoretical knowledge for the digital era.',
                'banner_pic' => '',
            ],
            [
                'name' => 'Electrical',
                'slug' => Str::slug('Electrical'),
                'type' => 'academic',
                'photo' => $placeholderPhoto,
                'short_desc' => 'Master electrical engineering and wiring technologies for modern industries.',
                'full_desc' => 'Our Electrical department provides hands-on training in electrical wiring, instrumentation, and renewable energy systems, preparing students for careers in electrical engineering and maintenance.',
                'banner_pic' => '',
            ],
            [
                'name' => 'Hospitality',
                'slug' => Str::slug('Hospitality'),
                'type' => 'academic',
                'photo' => $placeholderPhoto,
                'short_desc' => 'Embark on an exciting journey in hospitality management and tourism services.',
                'full_desc' => 'Our Hospitality department prepares students for dynamic careers in hotels, restaurants, event management, and travel agencies, with a focus on exceptional guest experiences.',
                'banner_pic' => '',
            ],
            [
                'name' => 'Mechanical',
                'slug' => Str::slug('Mechanical'),
                'type' => 'academic',
                'photo' => $placeholderPhoto,
                'short_desc' => 'Build hands-on skills in mechanical engineering and automotive technology.',
                'full_desc' => 'Our Mechanical department offers training in automotive mechanics, welding, fabrication, and mechanical engineering fundamentals, equipping students with practical skills for the manufacturing industry.',
                'banner_pic' => '',
            ],
            [
                'name' => 'Agriculture',
                'slug' => Str::slug('Agriculture'),
                'type' => 'academic',
                'photo' => $placeholderPhoto,
                'short_desc' => 'Grow your future with innovative agricultural education and practice.',
                'full_desc' => 'The Agriculture department provides hands-on training in crop production, livestock management, and agribusiness, empowering students to lead in sustainable food systems.',
                'banner_pic' => '',
            ],
            [
                'name' => 'Fashion',
                'slug' => Str::slug('Fashion'),
                'type' => 'academic',
                'photo' => $placeholderPhoto,
                'short_desc' => 'Design your future with creative fashion and textile technology skills.',
                'full_desc' => 'Our Fashion department teaches garment making, fashion design, and textile technology, preparing students for careers in the fashion industry and tailoring businesses.',
                'banner_pic' => '',
            ],
            [
                'name' => 'Finance',
                'slug' => Str::slug('Finance'),
                'type' => 'non-academic',
                'photo' => $placeholderPhoto,
                'short_desc' => 'Managing institutional finances and student fee transactions.',
                'full_desc' => 'The Finance department handles budgeting, accounting, fee collection, and financial reporting for the college.',
                'banner_pic' => '',
            ],
            [
                'name' => 'Student Affairs',
                'slug' => Str::slug('Student Affairs'),
                'type' => 'non-academic',
                'photo' => $placeholderPhoto,
                'short_desc' => 'Supporting student welfare, clubs, and extracurricular activities.',
                'full_desc' => 'The Student Affairs department manages student welfare, clubs, sports, counseling, and extracurricular activities to ensure holistic student development.',
                'banner_pic' => '',
            ],
            [
                'name' => 'Procurement',
                'slug' => Str::slug('Procurement'),
                'type' => 'non-academic',
                'photo' => $placeholderPhoto,
                'short_desc' => 'Managing college procurement and supply chain operations.',
                'full_desc' => 'The Procurement department handles purchasing, supplies, and vendor management for the college to ensure smooth operations.',
                'banner_pic' => '',
            ],
            [
                'name' => 'Library',
                'slug' => Str::slug('Library'),
                'type' => 'non-academic',
                'photo' => $placeholderPhoto,
                'short_desc' => 'Providing learning resources and academic support services.',
                'full_desc' => 'The Library offers books, journals, digital resources, and study spaces to support student learning and research.',
                'banner_pic' => '',
            ],
            [
                'name' => 'Sports',
                'slug' => Str::slug('Sports'),
                'type' => 'non-academic',
                'photo' => $placeholderPhoto,
                'short_desc' => 'Promoting sports, fitness, and athletic development.',
                'full_desc' => 'The Sports department organizes athletic activities, tournaments, and fitness programs to promote student health and teamwork.',
                'banner_pic' => '',
            ],
            [
                'name' => 'Music & Arts',
                'slug' => Str::slug('Music & Arts'),
                'type' => 'non-academic',
                'photo' => $placeholderPhoto,
                'short_desc' => 'Fostering creativity through music, art, and cultural activities.',
                'full_desc' => 'The Music & Arts department nurtures creative talents through music, visual arts, drama, and cultural performances.',
                'banner_pic' => '',
            ],
        ];

        foreach ($departments as $department) {
            DB::table('departments')->insert([
                'name' => $department['name'],
                'slug' => $department['slug'],
                'type' => $department['type'],
                'photo' => $department['photo'],
                'short_desc' => $department['short_desc'],
                'full_desc' => $department['full_desc'],
                'banner_pic' => $department['banner_pic'],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
