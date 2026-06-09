<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class NewsSeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            ['name' => 'Announcements', 'description' => 'Official college announcements'],
            ['name' => 'Events', 'description' => 'College events and activities'],
            ['name' => 'Academic', 'description' => 'Academic news and updates'],
            ['name' => 'Sports', 'description' => 'Sports news and achievements'],
            ['name' => 'Achievements', 'description' => 'Student and staff achievements'],
        ];

        $categoryIds = [];
        foreach ($categories as $category) {
            $categoryIds[] = DB::table('news_categories')->insertGetId([
                'name' => $category['name'],
                'slug' => Str::slug($category['name']),
                'description' => $category['description'],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

        $newsItems = [
            [
                'title' => 'Upcoming Intake Registration Now Open',
                'excerpt' => 'Registration for the next academic intake is now open. Apply now to secure your spot.',
                'content' => 'We are pleased to announce that registration for the upcoming academic intake is now open. Prospective students are encouraged to apply early to secure their places in their desired programs. Our admissions team is ready to assist you with the application process.',
                'image' => 'images/gate.jpg',
                'is_published' => true,
                'published_at' => now(),
            ],
            [
                'title' => 'Annual Sports Day Success',
                'excerpt' => 'Our annual sports day was a huge success with participation from all departments.',
                'content' => 'The college recently held its annual sports day, bringing together students from all departments in a celebration of athletic achievement and teamwork. The event showcased various sports including football, volleyball, athletics, and more.',
                'image' => 'images/gate.jpg',
                'is_published' => true,
                'published_at' => now()->subDays(2),
            ],
            [
                'title' => 'New ICT Lab Inauguration',
                'excerpt' => 'We are excited to announce the opening of our state-of-the-art ICT laboratory.',
                'content' => 'Tetu TVC is proud to announce the inauguration of our new ICT laboratory equipped with the latest computers and software. This facility will enhance our students\' digital literacy skills and prepare them for the modern workplace.',
                'image' => 'images/gate.jpg',
                'is_published' => true,
                'published_at' => now()->subDays(5),
            ],
            [
                'title' => 'College Achieves TVETA Accreditation',
                'excerpt' => 'Our college has received full accreditation from TVETA for all our programs.',
                'content' => 'We are delighted to announce that Tetu TVC has received full accreditation from the Technical and Vocational Education and Training Authority (TVETA) for all our programs. This achievement reflects our commitment to quality technical education.',
                'image' => 'images/gate.jpg',
                'is_published' => true,
                'published_at' => now()->subDays(10),
            ],
        ];

        foreach ($newsItems as $index => $item) {
            DB::table('news_items')->insert([
                'news_category_id' => $categoryIds[$index % count($categoryIds)],
                'title' => $item['title'],
                'slug' => Str::slug($item['title']),
                'excerpt' => $item['excerpt'],
                'content' => $item['content'],
                'image' => $item['image'],
                'is_published' => $item['is_published'],
                'published_at' => $item['published_at'],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
