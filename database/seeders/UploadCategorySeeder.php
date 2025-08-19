<?php

namespace Database\Seeders;

use App\Models\UploadCategory;
use Illuminate\Database\Seeder;

class UploadCategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            ['name' => 'Past Papers', 'slug' => 'past-papers'],
            ['name' => 'Vacancies', 'slug' => 'vacancies'],
            ['name' => 'Tenders', 'slug' => 'tenders'],
            ['name' => 'Brochures', 'slug' => 'brochures'],
            ['name' => 'Fee Structure', 'slug' => 'fee-structure'],
            ['name' => 'Organization Documents', 'slug' => 'organization-documents'],
        ];

        foreach ($categories as $category) {
            UploadCategory::firstOrCreate(['slug' => $category['slug']], $category);
        }
    }
}
