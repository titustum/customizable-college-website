<?php

namespace Database\Seeders;

use App\Models\Institution;
use Illuminate\Database\Seeder;

class InstitutionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        Institution::create([
            'name' => 'Sample College',
            'logo' => 'images/sample_logo.jpg',
            'principal_name' => 'Ms. Jane Doe',
            'principal_photo' => 'images/sample_principal.jpg',
            'welcome_message' => 'Welcome to Sample College, where education meets innovation.',
            'motto' => 'Learning for Tomorrow',
            'vision' => 'To be a beacon of knowledge and innovation.',
            'mission' => 'To provide quality education that fosters creativity and critical thinking.',
            'about_us' => 'Sample College is dedicated to nurturing future leaders...',
            'primary_color' => '#3b82f6',
            'phone' => '+254 798765432',
            'email' => 'info@samplecollege.ac.ke',
            'address' => 'P.O. Box 1716-10100, Sample Town, Kenya',
            'facebook' => 'https://facebook.com/samplecollege',
            'tiktok' => 'https://tiktok.com/@samplecollege',
            'x' => 'https://x.com/samplecollege',
            'youtube' => 'https://youtube.com/@samplecollege',
        ]);

    }
}
