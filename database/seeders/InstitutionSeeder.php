<?php

namespace Database\Seeders;

use App\Models\Institution;
use Illuminate\Database\Seeder;

class InstitutionSeeder extends Seeder
{
    public function run(): void
    {
        $institutions = [
            [
                'name' => 'Tetu TVC',
                'slug' => 'tetu',
                'primary_color' => '#FF5722',
                'principal_name' => 'David Kariuki',
                'email' => 'info@tetutvc.ac.ke',
            ],
            [
                'name' => 'Nairobi Technical Institute',
                'slug' => 'nairobi-tech',
                'primary_color' => '#1E88E5',
                'principal_name' => 'Grace Wanjiku',
                'email' => 'info@nait.ac.ke',
            ],
            [
                'name' => 'Kisumu Technical College',
                'slug' => 'kisumu-tech',
                'primary_color' => '#43A047',
                'principal_name' => 'Peter Ochieng',
                'email' => 'info@kisumutec.ac.ke',
            ],
            [
                'name' => 'Mombasa Polytechnic Institute',
                'slug' => 'mombasa-poly',
                'primary_color' => '#F4511E',
                'principal_name' => 'Ali Hassan',
                'email' => 'info@mombasapoly.ac.ke',
            ],
            [
                'name' => 'Eldoret Technical College',
                'slug' => 'eldoret-tech',
                'primary_color' => '#8E24AA',
                'principal_name' => 'Samuel Kiprotich',
                'email' => 'info@eldorettc.ac.ke',
            ],
        ];

        foreach ($institutions as $data) {
            Institution::create(array_merge([
                'logo' => '',
                'principal_photo' => '',
                'welcome_message' => 'Welcome to '.$data['name'],
                'motto' => 'Empowering through skills.',
                'vision' => 'To be a leading technical institution.',
                'mission' => 'To provide quality education and training.',
                'about_us' => $data['name'].' is a leading technical institution.',
                'primary_font' => 'Inter',
                'phone' => '+254 700 000 000',
                'address' => 'Kenya',
                'latitude' => null,
                'longitude' => null,
                'facebook' => '#',
                'tiktok' => '#',
                'twitter' => '#',
                'youtube' => '#',
            ], $data));
        }
    }
}
