<?php

namespace Database\Seeders;

use App\Models\Faq;
use Illuminate\Database\Seeder;

class FaqSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faqs = [
            ['Where is Tetu TVC located?', 'Tetu TVC is located in Nyeri County, Tetu Constituency, Giakanja-Kagwathi a few minutes from Nyeri town.'],
            ['Is Tetu TVC a government institution?', 'Yes, Tetu TVC is a government-funded institution.'],
            ['Which courses does Tetu TVC offer?', 'Tetu TVC offers courses under the following departments; Hospitality, Cosmetology, Fashion and Design, Agriculture, ICT, Electrical Engineering, Building and Civil Engineering and Mechanical Engineering.'],
            ['When does Tetu TVC admit new trainees?', 'We have 3 intakes; January, May and September.'],
            ['How does someone apply for admission?', 'You can apply through KUCCPS or at the college.'],
            ['Do trainees receive government funding, scholarships, HELB/HEF or bursaries?', 'Yes, Tetu TVC being a government-funded institution we receive the funds and help the trainees apply for them.'],
            ['Do trainees get industrial attachment?', 'Yes we link and source for trainees industry training.'],
            ['Does Tetu TVC offer dual TVET?', 'We have partnered with industries that we train with for both day release and block release.'],
            ['Are there opportunities for trainees to participate in competitions?', 'We participate in co-curricular activities E.g. TVET fairs, skills competitions, sports, drama, music, athletics etc.'],
            ['Do trainees have access to internet/Wi-Fi?', 'Yes we have internet available 24/7.'],
        ];

        foreach ($faqs as $index => [$question, $answer]) {
            Faq::updateOrCreate(
                ['question' => $question],
                [
                    'answer' => $answer,
                    'sort_order' => $index + 1,
                    'is_published' => true,
                ]
            );
        }
    }
}
