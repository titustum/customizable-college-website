<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GallerySeeder extends Seeder
{
    public function run(): void
    {
        $galleries = [
            [
                'name' => 'Campus Life',
                'description' => 'Explore our vibrant campus life and student activities',
                'image' => 'images/gate.jpg',
            ],
            [
                'name' => 'Events',
                'description' => 'Annual events, ceremonies and special occasions',
                'image' => 'images/gate.jpg',
            ],
            [
                'name' => 'Academic',
                'description' => 'Hands-on training and academic activities',
                'image' => 'images/gate.jpg',
            ],
            [
                'name' => 'Sports',
                'description' => 'Sports activities and athletic competitions',
                'image' => 'images/gate.jpg',
            ],
            [
                'name' => 'Graduation',
                'description' => 'Graduation ceremonies and achievements',
                'image' => 'images/gate.jpg',
            ],
        ];

        foreach ($galleries as $gallery) {
            $galleryId = DB::table('galleries')->insertGetId([
                'name' => $gallery['name'],
                'description' => $gallery['description'],
                'image' => $gallery['image'],
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            $items = [
                [
                    'name' => $gallery['name'].' 1',
                    'category' => $gallery['name'],
                    'description' => 'Description for '.$gallery['name'].' image 1',
                    'image' => 'images/gate.jpg',
                ],
                [
                    'name' => $gallery['name'].' 2',
                    'category' => $gallery['name'],
                    'description' => 'Description for '.$gallery['name'].' image 2',
                    'image' => 'images/gate.jpg',
                ],
                [
                    'name' => $gallery['name'].' 3',
                    'category' => $gallery['name'],
                    'description' => 'Description for '.$gallery['name'].' image 3',
                    'image' => 'images/gate.jpg',
                ],
            ];

            foreach ($items as $item) {
                DB::table('gallery_items')->insert([
                    'gallery_id' => $galleryId,
                    'name' => $item['name'],
                    'category' => $item['category'],
                    'description' => $item['description'],
                    'image' => $item['image'],
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        }
    }
}
