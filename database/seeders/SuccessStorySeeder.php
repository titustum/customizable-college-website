<?php

namespace Database\Seeders;

use App\Models\Department;
use App\Models\SuccessStory;
use Illuminate\Database\Seeder;

class SuccessStorySeeder extends Seeder
{
    public function run(): void
    {
        $departments = Department::where('type', 'academic')->get();

        $stories = [
            'Cosmetology' => [
                [
                    'name' => 'Jane Wanjiku',
                    'course' => 'Diploma in Beauty Therapy',
                    'year' => '2022',
                    'occupation' => 'Senior Beauty Therapist',
                    'company' => 'Spa Luxe Kenya',
                    'statement' => 'TETU TVC gave me the hands-on training I needed to excel in the beauty industry. The instructors were incredibly supportive and the practical sessions prepared me well for the real world.',
                    'photo' => null,
                ],
                [
                    'name' => 'Mary Akinyi',
                    'course' => 'Certificate in Hairdressing',
                    'year' => '2023',
                    'occupation' => 'Salon Owner',
                    'company' => 'Akinyi Hair Studio',
                    'statement' => 'The skills I acquired at TETU TVC empowered me to start my own salon. From hair styling to client management, the training was comprehensive and practical.',
                    'photo' => null,
                ],
                [
                    'name' => 'Susan Chepkoech',
                    'course' => 'Diploma in Cosmetology',
                    'year' => '2021',
                    'occupation' => 'Makeup Artist & Beauty Consultant',
                    'company' => 'Glow Beauty Africa',
                    'statement' => 'My time at TETU TVC was transformative. The beauty therapy program covered everything from skincare to professional makeup, giving me the confidence to serve high-end clients.',
                    'photo' => null,
                ],
            ],
            'Hospitality' => [
                [
                    'name' => 'Peter Kamau',
                    'course' => 'Diploma in Hotel Management',
                    'year' => '2022',
                    'occupation' => 'Assistant Restaurant Manager',
                    'company' => 'Sarova Hotels',
                    'statement' => 'The hospitality program at TETU TVC was world-class. The practical training in the modern kitchen and mock hotel setup gave me a head start in my career.',
                    'photo' => null,
                ],
                [
                    'name' => 'Grace Ndung\'u',
                    'course' => 'Certificate in Food and Beverage',
                    'year' => '2023',
                    'occupation' => 'Head Chef',
                    'company' => 'Nairobi Bistro',
                    'statement' => 'TETU TVC nurtured my passion for culinary arts. The hands-on training and industrial attachment prepared me to take on the role of head chef right after graduation.',
                    'photo' => null,
                ],
                [
                    'name' => 'David Omondi',
                    'course' => 'Diploma in Tour Guiding',
                    'year' => '2021',
                    'occupation' => 'Tour Consultant',
                    'company' => 'Bonfire Adventures',
                    'statement' => 'The tourism and hospitality training at TETU was exceptional. I gained both theoretical knowledge and practical experience that made me stand out in the job market.',
                    'photo' => null,
                ],
            ],
            'Fashion and Textile' => [
                [
                    'name' => 'Faith Mwangi',
                    'course' => 'Diploma in Fashion Design',
                    'year' => '2022',
                    'occupation' => 'Fashion Designer',
                    'company' => 'Mwangii Collections',
                    'statement' => 'TETU TVC unlocked my creative potential. The fashion design program taught me pattern drafting, garment construction, and how to turn my ideas into stunning pieces.',
                    'photo' => null,
                ],
                [
                    'name' => 'Esther Wambui',
                    'course' => 'Certificate in Garment Making',
                    'year' => '2023',
                    'occupation' => 'Tailoring Business Owner',
                    'company' => 'Wambui Fashions',
                    'statement' => 'The practical skills I gained at TETU TVC enabled me to launch my own tailoring business. The entrepreneurship training was especially valuable.',
                    'photo' => null,
                ],
                [
                    'name' => 'Kevin Mutua',
                    'course' => 'Diploma in Textile Technology',
                    'year' => '2021',
                    'occupation' => 'Quality Control Officer',
                    'company' => 'Kenya Textile Mills',
                    'statement' => 'The textile technology program at TETU TVC gave me a deep understanding of fabric science and quality control. I was well-prepared for the manufacturing industry.',
                    'photo' => null,
                ],
            ],
            'Building and Civil' => [
                [
                    'name' => 'James Kiprop',
                    'course' => 'Diploma in Building Technology',
                    'year' => '2022',
                    'occupation' => 'Site Supervisor',
                    'company' => 'Hass Petroleum Construction',
                    'statement' => 'TETU TVC equipped me with solid construction skills. The hands-on training in masonry, carpentry, and site management prepared me for the demanding construction industry.',
                    'photo' => null,
                ],
                [
                    'name' => 'Sarah Wanjala',
                    'course' => 'Certificate in Plumbing',
                    'year' => '2023',
                    'occupation' => 'Plumbing Contractor',
                    'company' => 'Wanjala Plumbing Solutions',
                    'statement' => 'As a female plumber, TETU TVC gave me the confidence and skills to thrive in a male-dominated field. The practical training was thorough and empowering.',
                    'photo' => null,
                ],
                [
                    'name' => 'Patrick Mwangi',
                    'course' => 'Diploma in Civil Engineering',
                    'year' => '2021',
                    'occupation' => 'Assistant Quantity Surveyor',
                    'company' => 'Mwangi Engineering Consultants',
                    'statement' => 'The civil engineering program at TETU TVC provided a strong foundation in structural design and construction management. I was job-ready from day one.',
                    'photo' => null,
                ],
            ],
            'Electrical' => [
                [
                    'name' => 'Brian Kipkoech',
                    'course' => 'Diploma in Electrical Engineering',
                    'year' => '2022',
                    'occupation' => 'Electrical Technician',
                    'company' => 'Kenya Power',
                    'statement' => 'TETU TVC gave me a strong foundation in electrical installations and power systems. The practical sessions in the workshop were invaluable for my career at Kenya Power.',
                    'photo' => null,
                ],
                [
                    'name' => 'Catherine Nyambura',
                    'course' => 'Certificate in Solar PV Installation',
                    'year' => '2023',
                    'occupation' => 'Solar Energy Consultant',
                    'company' => 'SunPower East Africa',
                    'statement' => 'The renewable energy training at TETU TVC was cutting-edge. I gained expertise in solar PV installation and design, which is in high demand in Kenya today.',
                    'photo' => null,
                ],
                [
                    'name' => 'Daniel Otieno',
                    'course' => 'Diploma in Electronics Technology',
                    'year' => '2021',
                    'occupation' => 'Electronics Technician',
                    'company' => 'Safaricom PLC',
                    'statement' => 'The electronics program at TETU TVC prepared me well for the telecommunications industry. The training in circuit analysis and instrumentation was top-notch.',
                    'photo' => null,
                ],
            ],
            'ICT' => [
                [
                    'name' => 'Michael Njoroge',
                    'course' => 'Diploma in Information Technology',
                    'year' => '2022',
                    'occupation' => 'Software Developer',
                    'company' => 'TechTribe Kenya',
                    'statement' => 'TETU TVC ignited my passion for coding. The programming courses were practical and project-based, giving me a portfolio that helped me land my dream job.',
                    'photo' => null,
                ],
                [
                    'name' => 'Amina Hassan',
                    'course' => 'Certificate in Computer Networking',
                    'year' => '2023',
                    'occupation' => 'Network Administrator',
                    'company' => 'Jambonet ISP',
                    'statement' => 'The networking program at TETU TVC was rigorous and hands-on. I gained practical skills in network configuration and cybersecurity that I use every day.',
                    'photo' => null,
                ],
                [
                    'name' => 'Samuel Kipruto',
                    'course' => 'Diploma in ICT',
                    'year' => '2021',
                    'occupation' => 'ICT Support Specialist',
                    'company' => 'Equity Bank',
                    'statement' => 'The comprehensive ICT training at TETU TVC covered everything from hardware to database management. The industrial attachment gave me real workplace exposure.',
                    'photo' => null,
                ],
            ],
            'Agriculture' => [
                [
                    'name' => 'Naomi Chebet',
                    'course' => 'Diploma in Agriculture',
                    'year' => '2022',
                    'occupation' => 'Agribusiness Officer',
                    'company' => 'Kenya Agricultural & Livestock Research Organization',
                    'statement' => 'TETU TVC transformed my view of farming as a business. The agribusiness training and demonstration farm experience were invaluable for my career.',
                    'photo' => null,
                ],
                [
                    'name' => 'Joseph Kiprono',
                    'course' => 'Certificate in Horticulture',
                    'year' => '2023',
                    'occupation' => 'Farm Manager',
                    'company' => 'VegPro Kenya',
                    'statement' => 'The horticulture program at TETU TVC taught me modern farming techniques, irrigation management, and value addition. I now manage a thriving commercial farm.',
                    'photo' => null,
                ],
                [
                    'name' => 'Ruth Akoth',
                    'course' => 'Diploma in Animal Health',
                    'year' => '2021',
                    'occupation' => 'Livestock Officer',
                    'company' => 'County Government of Kisumu',
                    'statement' => 'TETU TVC provided excellent training in livestock management and animal health. The practical sessions on the college farm were particularly beneficial.',
                    'photo' => null,
                ],
            ],
            'Mechanical' => [
                [
                    'name' => 'John Mburu',
                    'course' => 'Diploma in Mechanical Engineering',
                    'year' => '2022',
                    'occupation' => 'Plant Maintenance Technician',
                    'company' => 'Bamburi Cement',
                    'statement' => 'TETU TVC gave me hands-on experience with industrial machinery and welding. The practical training in the workshop prepared me for the manufacturing industry.',
                    'photo' => null,
                ],
                [
                    'name' => 'Patrick Mwangi',
                    'course' => 'Certificate in Automotive Engineering',
                    'year' => '2023',
                    'occupation' => 'Senior Mechanic',
                    'company' => 'Toyota Kenya',
                    'statement' => 'The automotive engineering program at TETU TVC was thorough. I learned engine diagnostics, transmission systems, and modern automotive electronics.',
                    'photo' => null,
                ],
                [
                    'name' => 'Beatrice Wanjiru',
                    'course' => 'Diploma in Welding and Fabrication',
                    'year' => '2021',
                    'occupation' => 'Welding Supervisor',
                    'company' => 'Davis & Shirtliff',
                    'statement' => 'TETU TVC equipped me with advanced welding skills that set me apart in the industry. The fabrication projects I completed during training were impressive portfolio pieces.',
                    'photo' => null,
                ],
            ],
        ];

        foreach ($departments as $department) {
            $departmentStories = $stories[$department->name] ?? [];

            foreach ($departmentStories as $story) {
                SuccessStory::create([
                    'department_id' => $department->id,
                    'name' => $story['name'],
                    'photo' => $story['photo'],
                    'course' => $story['course'],
                    'year' => $story['year'],
                    'occupation' => $story['occupation'],
                    'company' => $story['company'],
                    'statement' => $story['statement'],
                    'rating' => 5,
                    'is_approved' => true,
                ]);
            }
        }
    }
}
