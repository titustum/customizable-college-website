<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class TenderSeeder extends Seeder
{
    public function run(): void
    {
        $tenders = [
            [
                'title' => 'Advertisement- Registration of Suppliers for Financial Year 2026/2027 and 2027/2028',
                'description' => 'We invite eligible and qualified suppliers, contractors, and service providers to apply for registration and prequalification for the supply of goods, provision of services, and execution of works for the 2026/2027 and 2027/2028 financial years.',
                'reference_number' => 'TTVC/TND/001/2026',
                'opening_date' => Carbon::parse('26-05-2026'),
                'closing_date' => Carbon::parse('09-06-2026'),
                'status' => 'open',
            ],
            [
                'title' => 'Construction of Student Dormitory',
                'description' => 'Tetu TVC seeks qualified contractors for the construction of a 100-bed capacity student dormitory building including all necessary infrastructure.',
                'reference_number' => 'TTVCT/PROC/2025/002',
                'opening_date' => Carbon::parse('26-05-2026'),
                'closing_date' => Carbon::parse('09-06-2026'),
                'status' => 'open',
            ]
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
