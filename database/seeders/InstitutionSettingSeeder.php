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
            'principal_name' => 'David Kariuki',
            'principal_photo' => '',
            'welcome_message' => 'Welcome to Tetu TVC',
            'motto' => 'Empowering through skills.',
            'vision' => 'To be a leading technical institution.',
            'mission' => 'To provide quality education and training.',
            'about_us' => 'Tetu TVC is a leading technical institution.',
            'logo' => '',
            'email' => 'info@tetutvc.ac.ke',
            'phone' => '+254 700 000 000',
            'address' => 'Kenya',
            'latitude' => null,
            'longitude' => null,
            'facebook' => '#',
            'tiktok' => '#',
            'twitter' => '#',
            'youtube' => '#',
        ]);
    }
}
