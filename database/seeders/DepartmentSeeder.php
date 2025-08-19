<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class DepartmentSeeder extends Seeder
{
    public function run(): void
    {
        $placeholderPhoto = 'image-placeholder.webp';

        $departments = [
            [
                'name' => 'Cosmetology',
                'slug' => Str::slug('Cosmetology'),
                'photo' => $placeholderPhoto,
                'short_desc' => 'Master the art and science of Beauty Therapy and Hairdressing with our amazing programs.',
                'full_desc' => 'Our Cosmetology department equips students with hands-on experience in beauty therapy, hairdressing, skincare, and more, preparing them for successful careers in the beauty industry.',
                'banner_pic' => '',
            ],
            [
                'name' => 'Information and Communication Technology (ICT)',
                'slug' => Str::slug('Information and Communication Technology'),
                'photo' => $placeholderPhoto,
                'short_desc' => 'Build the future with cutting-edge ICT skills and innovation-driven training.',
                'full_desc' => 'Our ICT department offers comprehensive programs in software development, networking, and cybersecurity, designed to equip students with practical and theoretical knowledge for the digital era.',
                'banner_pic' => '',
            ],
            [
                'name' => 'Agriculture',
                'slug' => Str::slug('Agriculture'),
                'photo' => $placeholderPhoto,
                'short_desc' => 'Grow your future with innovative agricultural education and practice.',
                'full_desc' => 'The Agriculture department provides hands-on training in crop production, livestock management, and agribusiness, empowering students to lead in sustainable food systems.',
                'banner_pic' => '',
            ],
        ];

        foreach ($departments as $department) {
            DB::table('departments')->insert([
                'name' => $department['name'],
                'slug' => $department['slug'],
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
