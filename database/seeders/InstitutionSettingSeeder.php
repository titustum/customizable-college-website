<?php

namespace Database\Seeders;

use App\Models\InstitutionSetting;
use Illuminate\Database\Seeder;

class InstitutionSettingSeeder extends Seeder
{
    public function run(): void
    {
        InstitutionSetting::create([
            'id' => 1,
            'name' => 'Tetu TVC',
            'slug' => 'tetu',
            'primary_color' => '#FF5722',
            'primary_font' => 'Inter',
            'welcome_message' => 'It\'s my pleasure to welcome you to Tetu Technical and Vocational College. We are committed to providing quality programs, activities, and services that will enhance and enrich your academic and professional journey.',
            'motto' => 'TVET skills for industrial growth.',
            'vision' => 'To be the premier technical and vocational institution for self and global development.',
            'mission' => 'To provide quality education and training.',
            'about_us' => 'To confer holistic technical training through research, innovation and consultancy for sustainable development.',
            'logo' => '',
            'email' => 'info@tetutvc.ac.ke',
            'phone' => '+254 700 000 000',
            'address' => 'Kenya',
            'latitude' => '-0.434',
            'longitude' => '36.917',
            'facebook' => 'https://facebook.com/TetuTechnicalVocationalCollege',
            'tiktok' => 'https://www.tiktok.com/@tetutvc019',
            'twitter' => '#',
            'youtube' => '#',
        ]);
    }
}
