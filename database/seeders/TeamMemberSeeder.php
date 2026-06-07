<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TeamMemberSeeder extends Seeder
{
    public function run(): void
    {
        $teamMembers = [
            // Principal
            [
                'department_id' => null,
                'role_id' => 1,
                'section_assigned' => null,
                'email' => 'principal@tetutvc.ac.ke',
                'name' => 'Mr. David M. Kariuki',
                'photo' => null,
                'qualification' => '',
                'phone' => '+254758660300',
            ],
            // Deputy Principals
            [
                'department_id' => null,
                'role_id' => 2,
                'section_assigned' => 'Administration',
                'email' => 'deputy.admin@tetutvc.ac.ke',
                'name' => 'Lydia Ndirangu',
                'photo' => null,
                'qualification' => '',
                'phone' => '+254758660301',
            ],
            [
                'department_id' => null,
                'role_id' => 2,
                'section_assigned' => 'Academics',
                'email' => 'deputy.academics@tetutvc.ac.ke',
                'name' => 'Joshua Mwangi',
                'photo' => null,
                'qualification' => '',
                'phone' => '+254758660302',
            ],

            // =========================
            // ADMINISTRATORS (NEW)
            // =========================

            [
                'department_id' => null,
                'role_id' => 3,
                'section_assigned' => 'Registrar Office',
                'email' => 'registrar@tetutvc.ac.ke',
                'name' => 'Kenneth Muriuki',
                'phone' => '+254700000001',
            ],
            [
                'department_id' => null,
                'role_id' => 3,
                'section_assigned' => 'Dean of Students',
                'email' => 'dean.students@tetutvc.ac.ke',
                'name' => 'Elly Mburu',
                'phone' => '+254700000002',
            ],
            [
                'department_id' => null,
                'role_id' => 3,
                'section_assigned' => 'Finance Office',
                'email' => 'finance@tetutvc.ac.ke',
                'name' => 'Kevin Wachira',
                'phone' => '+254700000003',
            ],
            [
                'department_id' => null,
                'role_id' => 3,
                'section_assigned' => 'Procurement Office',
                'email' => 'procurement@tetutvc.ac.ke',
                'name' => 'Cynthia Wanjiru',
                'phone' => '+254700000004',
            ],

            // HODs - Academic Departments (8 departments)
            [
                'department_id' => 1, // Cosmetology
                'role_id' => 3,
                'section_assigned' => null,
                'email' => 'hod.cosmetology@tetutvc.ac.ke',
                'name' => 'Jacob Nyaga',
                'photo' => null,
                'phone' => '+254758660303',
            ],
            [
                'department_id' => 2, // Hospitality
                'role_id' => 3,
                'section_assigned' => null,
                'email' => 'hod.hospitality@tetutvc.ac.ke',
                'name' => 'Lily Mugo',
                'photo' => null,
                'phone' => '+254758660304',
            ],
            [
                'department_id' => 3, // Fashion and Textile
                'role_id' => 3,
                'section_assigned' => null,
                'email' => 'hod.fashion@tetutvc.ac.ke',
                'name' => 'Madam Jane',
                'photo' => null,
                'phone' => '+254758660305',
            ],
            [
                'department_id' => 4, // Building and Civil
                'role_id' => 3,
                'section_assigned' => null,
                'email' => 'hod.building@tetutvc.ac.ke',
                'name' => 'Gideon Muraguri',
                'photo' => null,
                'phone' => '+254758660306',
            ],
            [
                'department_id' => 5, // Electrical
                'role_id' => 3,
                'section_assigned' => null,
                'email' => 'hod.electrical@tetutvc.ac.ke',
                'name' => 'Mr. Josiah',
                'photo' => null,
                'phone' => '+254758660307',
            ],
            [
                'department_id' => 6, // ICT
                'role_id' => 3,
                'section_assigned' => null,
                'email' => 'hod.ict@tetutvc.ac.ke',
                'name' => 'Ascar Jebet',
                'photo' => null,
                'phone' => '+254758660308',
            ],
            [
                'department_id' => 7, // Agriculture
                'role_id' => 3,
                'section_assigned' => null,
                'email' => 'hod.agriculture@tetutvc.ac.ke',
                'name' => 'Anthony S.',
                'photo' => null,
                'phone' => '+254758660309',
            ],
            [
                'department_id' => 8, // Mechanical
                'role_id' => 3,
                'section_assigned' => null,
                'email' => 'hod.mechanical@tetutvc.ac.ke',
                'name' => 'Mugure Ngigi',
                'photo' => null,
                'phone' => '+254758660310',
            ],
            // Section Leaders (HOS) / Coordinators - Non-Academic Departments (5 departments)
            [
                'department_id' => null,  // belongs to hospitality department
                'role_id' => 3,
                'section_assigned' => 'Guiding & Counselling',
                'email' => 'hod.counselling@tetutvc.ac.ke',
                'name' => 'Mrs. Grace Wanjiku',
                'photo' => null,
                'phone' => '+254758660321',
            ],
            [
                'department_id' => 2, // //belongs to Hospitality department
                'role_id' => 3,
                'section_assigned' => 'Industrial Liaison Office (ILO)',
                'email' => 'hos.ilo@tetutvc.ac.ke',
                'name' => 'Joan Weru',
                'photo' => null,
                'phone' => '+254758660322',
            ],
            [
                'department_id' => 7, // belongs to agric department
                'role_id' => 3,
                'section_assigned' => 'Sports',
                'email' => 'hos.sports@tetutvc.ac.ke',
                'name' => 'Dennis Njeru',
                'photo' => null,
                'phone' => '+254758660323',
            ],
            [
                'department_id' => 6, // belongs to ict department
                'role_id' => 3,
                'section_assigned' => 'Music and Arts',
                'email' => 'hos.musicarts@tetutvc.ac.ke',
                'name' => 'Joseph Ambrose',
                'photo' => null,
                'phone' => '+254758660324',
            ],

            [
                'department_id' => 3, // belongs to fashion department
                'role_id' => 3,
                'section_assigned' => 'Research & innovations',
                'email' => 'hos.research@tetutvc.ac.ke',
                'name' => 'Rose Kiarie',
                'photo' => null,
                'phone' => '+254758660324',
            ],

            // Trainers
            [
                'department_id' => 4, // Building and Civil
                'role_id' => 4,
                'section_assigned' => null,
                'email' => 'felix@tetutvc.ac.ke',
                'name' => 'Felix Njeru',
                'photo' => null,
                'phone' => '+254758660311',
            ],
            [
                'department_id' => 4,
                'role_id' => 4,
                'section_assigned' => null,
                'email' => 'festus@tetutvc.ac.ke',
                'name' => 'Festus Chesaro',
                'photo' => null,
                'qualification' => '',
                'phone' => '+254758660312',
            ],
            [
                'department_id' => 4,
                'role_id' => 4,
                'section_assigned' => null,
                'email' => 'alphonse@tetutvc.ac.ke',
                'name' => 'Alphonse Otieno',
                'photo' => null,
                'phone' => '+254758660313',
            ],
            [
                'department_id' => 2, // Hospitality
                'role_id' => 4,
                'section_assigned' => null,
                'email' => 'lucy@tetutvc.ac.ke',
                'name' => 'Madam Lucy O.',
                'photo' => null,
                'phone' => '+254758660314',
            ],
            [
                'department_id' => 4,
                'role_id' => 4,
                'section_assigned' => null,
                'email' => 'njeri@tetutvc.ac.ke',
                'name' => 'Madam Njeri',
                'photo' => null,
                'phone' => '+254758660315',
            ],
            [
                'department_id' => 3, // Fashion and Textile
                'role_id' => 4,
                'section_assigned' => null,
                'email' => 'faithfashion@tetutvc.ac.ke',
                'name' => 'Madam Faith',
                'photo' => null,
                'phone' => '+254758660316',
            ],
            [
                'department_id' => 1, // Cosmetology
                'role_id' => 4,
                'section_assigned' => null,
                'email' => 'peninah@tetutvc.ac.ke',
                'name' => 'Madam Peninah',
                'photo' => null,
                'phone' => '+254758660401',
            ],
            [
                'department_id' => 6, // ICT
                'role_id' => 4,
                'section_assigned' => null,
                'email' => 'lawrence@tetutvc.ac.ke',
                'name' => 'Lawrence Mwaniki',
                'photo' => null,
                'phone' => '+254758660402',
            ],
            [
                'department_id' => 6,
                'role_id' => 4,
                'section_assigned' => null,
                'email' => 'titus@tetutvc.ac.ke',
                'name' => 'Titus Tum',
                'photo' => null,
                'phone' => '+254758660403',
            ],
            [
                'department_id' => 8, // Mechanical
                'role_id' => 4,
                'section_assigned' => null,
                'email' => 'evans@tetutvc.ac.ke',
                'name' => 'Evans Odima',
                'photo' => null,
                'phone' => '+254758660404',
            ],
            [
                'department_id' => 6,
                'role_id' => 4,
                'section_assigned' => null,
                'email' => 'june@tetutvc.ac.ke',
                'name' => 'June Njagi',
                'photo' => null,
                'phone' => '+254758660405',
            ],
            [
                'department_id' => 2,
                'role_id' => 4,
                'section_assigned' => null,
                'email' => 'mercy@tetutvc.ac.ke',
                'name' => 'Madam Mercy',
                'photo' => null,
                'phone' => '+254758660406',
            ],
            [
                'department_id' => 2,
                'role_id' => 4,
                'section_assigned' => null,
                'email' => 'kioko@tetutvc.ac.ke',
                'name' => 'Mr. Kioko',
                'photo' => null,
                'phone' => '+254758660407',
            ],
            [
                'department_id' => 4,
                'role_id' => 4,
                'section_assigned' => null,
                'email' => 'dennis@tetutvc.ac.ke',
                'name' => 'Mr. Dennis',
                'photo' => null,
                'phone' => '+254758660408',
            ],
            [
                'department_id' => 3,
                'role_id' => 4,
                'section_assigned' => null,
                'email' => 'kimathi@tetutvc.ac.ke',
                'name' => 'Kimathi Mwiti',
                'photo' => null,
                'phone' => '+254758660409',
            ],
            [
                'department_id' => 4,
                'role_id' => 4,
                'section_assigned' => null,
                'email' => 'aminga@tetutvc.ac.ke',
                'name' => "Mr. Aming'a",
                'photo' => null,
                'phone' => '+254758660410',
            ],
            [
                'department_id' => 6,
                'role_id' => 4,
                'section_assigned' => null,
                'email' => 'graceni@tetutvc.ac.ke',
                'name' => 'Madam Grace N.',
                'photo' => null,
                'phone' => '+254758660411',
            ],
            [
                'department_id' => 6,
                'role_id' => 4,
                'section_assigned' => null,
                'email' => 'bilhah@tetutvc.ac.ke',
                'name' => 'Madam Bilhah',
                'photo' => null,
                'phone' => '+254758660412',
            ],
            [
                'department_id' => 6,
                'role_id' => 4,
                'section_assigned' => null,
                'email' => 'ambrose@tetutvc.ac.ke',
                'name' => 'Mr. Ambrose',
                'photo' => null,
                'phone' => '+254758660413',
            ],
            [
                'department_id' => 8,
                'role_id' => 4,
                'section_assigned' => null,
                'email' => 'thomas@tetutvc.ac.ke',
                'name' => 'Mr. Thomas',
                'photo' => null,
                'phone' => '+254758660414',
            ],
            [
                'department_id' => 2,
                'role_id' => 4,
                'section_assigned' => null,
                'email' => 'evelynne@tetutvc.ac.ke',
                'name' => 'Evelynne Donga',
                'photo' => null,
                'phone' => '+254758660415',
            ],
            [
                'department_id' => 1,
                'role_id' => 4,
                'section_assigned' => null,
                'email' => 'fernice@tetutvc.ac.ke',
                'name' => 'Fernice Gichevu',
                'photo' => null,
                'phone' => '+254758660416',
            ],
            [
                'department_id' => 1,
                'role_id' => 4,
                'section_assigned' => null,
                'email' => 'monica@tetutvc.ac.ke',
                'name' => 'Madam Monica',
                'photo' => null,
                'phone' => '+254758660417',
            ],
            [
                'department_id' => 5, // Electrical
                'role_id' => 4,
                'section_assigned' => null,
                'email' => 'okacha@tetutvc.ac.ke',
                'name' => 'Mr. Okacha',
                'photo' => null,
                'phone' => '+254758660418',
            ],

            // =========================
            // SUPPORT STAFF
            // =========================

            [
                'department_id' => null,
                'role_id' => 5,
                'section_assigned' => 'Administration',
                'email' => 'secretary@tetutvc.ac.ke',
                'name' => 'Iddah Warui',
                'photo' => null,
                'qualification' => '',
                'phone' => '+254700000010',
            ],

            [
                'department_id' => null,
                'role_id' => 5,
                'section_assigned' => 'Library',
                'email' => 'librarian@tetutvc.ac.ke',
                'name' => 'John Nguma',
                'photo' => null,
                'qualification' => '',
                'phone' => '+254700000011',
            ],

            [
                'department_id' => null,
                'role_id' => 5,
                'section_assigned' => 'Transport',
                'email' => 'driver@tetutvc.ac.ke',
                'name' => 'George Mwangi',
                'photo' => null,
                'qualification' => '',
                'phone' => '+254700000012',
            ],

            [
                'department_id' => null,
                'role_id' => 5,
                'section_assigned' => 'Maintenance',
                'email' => 'grounds@tetutvc.ac.ke',
                'name' => 'Wambugu Njoroge',
                'photo' => null,
                'qualification' => '',
                'phone' => '+254700000013',
            ],

            [
                'department_id' => null,
                'role_id' => 5,
                'section_assigned' => 'Catering',
                'email' => 'cook1@tetutvc.ac.ke',
                'name' => 'Esther Wanjiku',
                'photo' => null,
                'qualification' => '',
                'phone' => '+254700000014',
            ],

            [
                'department_id' => null,
                'role_id' => 5,
                'section_assigned' => 'Catering',
                'email' => 'cook2@tetutvc.ac.ke',
                'name' => 'Lucy Wairimu',
                'photo' => null,
                'qualification' => '',
                'phone' => '+254700000015',
            ],

        ];

        foreach ($teamMembers as $member) {
            $teamMemberId = DB::table('team_members')->insertGetId([
                'institution_id' => 1,
                'email' => $member['email'],
                'phone' => $member['phone'] ?? null,
                'name' => $member['name'],
                'photo' => $member['photo'] ?? null,
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            if ($member['department_id']) {
                DB::table('department_team_member')->insert([
                    'institution_id' => 1,
                    'department_id' => $member['department_id'],
                    'team_member_id' => $teamMemberId,
                    'role_id' => $member['role_id'],
                    'custom_title' => $member['section_assigned'] ?? null,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        }
    }
}
