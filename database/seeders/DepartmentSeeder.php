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
                'name' => 'Cosmetology',
                'slug' => Str::slug('Cosmetology'),
                'type' => 'academic',
                'photo' => $placeholderPhoto,
                'short_desc' => 'Master the art and science of Beauty Therapy and Hairdressing with our amazing programs.',
                'full_desc' => 'Our Cosmetology department offers comprehensive programs in beauty therapy, hairdressing, and nail technology. Students gain hands-on experience in skincare, makeup artistry, and professional hairstyling to prepare them for careers in the beauty industry.',
                'banner_pic' => '',
            ],
            [
                'name' => 'Hospitality',
                'slug' => Str::slug('Hospitality'),
                'type' => 'academic',
                'photo' => $placeholderPhoto,
                'short_desc' => 'Excel in the Hospitality industry with our tailored courses in culinary arts, hotel management, and more.',
                'full_desc' => 'Our Hospitality department prepares students for dynamic careers in hotels, restaurants, event management, and travel agencies. Programs include culinary arts, front office operations, and tourism management with a focus on exceptional guest experiences.',
                'banner_pic' => '',
            ],
            [
                'name' => 'Fashion and Textile',
                'slug' => Str::slug('Fashion and Textile'),
                'type' => 'academic',
                'photo' => $placeholderPhoto,
                'short_desc' => 'Unleash your creativity and style with our courses in fashion design and clothing technology.',
                'full_desc' => 'Our Fashion and Textile department teaches garment making, fashion design, pattern making, and textile technology. Students learn to create innovative designs and start their own tailoring businesses in the fashion industry.',
                'banner_pic' => '',
            ],
            [
                'name' => 'Building and Civil',
                'slug' => Str::slug('Building and Civil'),
                'type' => 'academic',
                'photo' => $placeholderPhoto,
                'short_desc' => 'Build a solid foundation for your future with our courses in construction and civil engineering.',
                'full_desc' => 'Our Building and Civil Engineering department provides hands-on training in construction technology, masonry, carpentry, and civil engineering fundamentals. Students are prepared for careers in the construction industry as skilled technicians.',
                'banner_pic' => '',
            ],
            [
                'name' => 'Electrical',
                'slug' => Str::slug('Electrical'),
                'type' => 'academic',
                'photo' => $placeholderPhoto,
                'short_desc' => 'Light up your career with our specialized courses in electrical engineering and technology.',
                'full_desc' => 'Our Electrical department offers training in electrical wiring, instrumentation, and renewable energy systems. Students gain practical skills in electrical installation, maintenance, and repair for careers in electrical engineering.',
                'banner_pic' => '',
            ],
            [
                'name' => 'ICT',
                'slug' => Str::slug('ICT'),
                'type' => 'academic',
                'photo' => $placeholderPhoto,
                'short_desc' => 'Stay ahead in the digital age with our cutting-edge ICT courses and training programs.',
                'full_desc' => 'Our ICT department offers comprehensive programs in software development, computer packages, networking, and cybersecurity. Students receive practical and theoretical knowledge to excel in the digital era.',
                'banner_pic' => '',
            ],
            [
                'name' => 'Agriculture',
                'slug' => Str::slug('Agriculture'),
                'type' => 'academic',
                'photo' => $placeholderPhoto,
                'short_desc' => 'Cultivate your future with our comprehensive agricultural courses and training programs.',
                'full_desc' => 'The Agriculture department provides hands-on training in crop production, livestock management, and agribusiness. Students are empowered to lead in sustainable food systems and agricultural entrepreneurship.',
                'banner_pic' => '',
            ],
            [
                'name' => 'Mechanical',
                'slug' => Str::slug('Mechanical'),
                'type' => 'academic',
                'photo' => $placeholderPhoto,
                'short_desc' => 'Get equipped with hands-on skills and technical knowledge in design, manufacturing, maintenance, and operation of mechanical systems, to prepare you for careers in modern industry.',
                'full_desc' => 'Our Mechanical department offers training in automotive mechanics, welding, fabrication, and mechanical engineering fundamentals. Students gain practical skills for careers in manufacturing, automotive repair, and mechanical engineering.',
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
