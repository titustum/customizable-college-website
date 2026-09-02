<?php

namespace Database\Seeders;

use App\Models\ServiceCharter;
use Illuminate\Database\Seeder;

class ServiceCharterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ServiceCharter::updateOrCreate(
            ['title_en' => 'Service Charter'],
            [
                'title_sw' => 'Mkataba wa Huduma',
                'description_en' => 'Our service charter outlines our commitment to providing quality education and services to our students, parents, and stakeholders. We pledge to maintain the highest standards of professionalism, transparency, and accountability.',
                'description_sw' => 'Mkataba wetu wa huduma unaonyowa ahadi yetu ya kutoa elimu na huduma bora kwa wanafunzi, wazazi, na watendakazi. Tunaahidi kushikamia viwango vya juu vya kitaaluma, uwazi, na uwajibikaji.',
                'commitments_en' => [
                    'Quality technical and vocational education',
                    'Timely response to inquiries',
                    'Transparent admission processes',
                    'Regular progress reports',
                ],
                'commitments_sw' => [
                    'Elimu ya kiwandani na ufundi bora',
                    'Majibu ya haraka kwa maswali',
                    'Mchakato wa usajili wa uwazi',
                    'Ripoti za kawaida za maendeleo',
                ],
                'image_en' => 'service-charters/images/service-charter-en.jpg',
                'image_sw' => 'service-charters/images/service-charter-sw.jpg',
                'audio_en' => null,
                'audio_sw' => null,
                'pdf_en' => null,
                'pdf_sw' => null,
                'is_published' => true,
            ]
        );
    }
}
