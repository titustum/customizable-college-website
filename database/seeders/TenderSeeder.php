<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TenderSeeder extends Seeder
{
    public function run(): void
    {
        $tenders = [
            [
                'title' => 'Supply and Delivery of ICT Equipment',
                'description' => 'The institution invites qualified suppliers to tender for the supply and delivery of computers, printers, and networking equipment for the new ICT laboratory.',
                'reference_number' => 'TTVCT/PROC/2025/001',
                'opening_date' => now()->subDays(10),
                'closing_date' => now()->addDays(20),
                'status' => 'open',
            ],
            [
                'title' => 'Construction of Student Dormitory',
                'description' => 'Tetu TVC seeks qualified contractors for the construction of a 100-bed capacity student dormitory building including all necessary infrastructure.',
                'reference_number' => 'TTVCT/PROC/2025/002',
                'opening_date' => now()->subDays(5),
                'closing_date' => now()->addDays(25),
                'status' => 'open',
            ],
            [
                'title' => 'Supply of Office Furniture',
                'description' => 'Invitation for the supply and delivery of office furniture including desks, chairs, filing cabinets, and conference tables.',
                'reference_number' => 'TTVCT/PROC/2025/003',
                'opening_date' => now()->subDays(15),
                'closing_date' => now()->subDays(2),
                'status' => 'closed',
            ],
            [
                'title' => 'Catering Services Contract',
                'description' => 'Request for proposals from qualified catering companies to provide food services for students and staff for the academic year.',
                'reference_number' => 'TTVCT/PROC/2024/015',
                'opening_date' => now()->subMonths(2),
                'closing_date' => now()->subMonths(1),
                'status' => 'closed',
            ],
            [
                'title' => 'Renovation of Science Laboratories',
                'description' => 'Tetu TVC invites bids for the renovation and upgrade of Chemistry, Physics, and Biology laboratories.',
                'reference_number' => 'TTVCT/PROC/2025/004',
                'opening_date' => now()->subDays(3),
                'closing_date' => now()->addDays(30),
                'status' => 'open',
            ],
        ];

        foreach ($tenders as $tender) {
            DB::table('tenders')->insert([
                'title' => $tender['title'],
                'description' => $tender['description'],
                'reference_number' => $tender['reference_number'],
                'opening_date' => $tender['opening_date'],
                'closing_date' => $tender['closing_date'],
                'attachment_path' => null,
                'status' => $tender['status'],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
