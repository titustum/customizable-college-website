<?php

namespace Database\Seeders;

use App\Models\Department;
use App\Models\Role;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TeamMemberSeeder extends Seeder
{
    public function run(): void
    {
        $roles = [
            'principal' => Role::where('slug', 'principal')->value('id'),
            'deputy_principal' => Role::where('slug', 'deputy-principal')->value('id'),
            'registrar' => Role::where('slug', 'registrar')->value('id'),
            'dean_of_students' => Role::where('slug', 'dean-of-students')->value('id'),
            'finance_officer' => Role::where('slug', 'finance-officer')->value('id'),
            'procurement_officer' => Role::where('slug', 'procurement-officer')->value('id'),
            'hod' => Role::where('slug', 'hod')->value('id'),
            'coordinator' => Role::where('slug', 'coordinator')->value('id'),
            'trainer' => Role::where('slug', 'trainer')->value('id'),
            'support_staff' => Role::where('slug', 'support-staff')->value('id'),
            'coach' => Role::where('slug', 'coach')->value('id'),
            'counsellor' => Role::where('slug', 'counsellor')->value('id'),
        ];

        $departments = [
            'cosmetology' => Department::where('slug', 'cosmetology')->value('id'),
            'hospitality' => Department::where('slug', 'hospitality')->value('id'),
            'fashion' => Department::where('slug', 'fashion-and-textile')->value('id'),
            'building' => Department::where('slug', 'building-and-civil')->value('id'),
            'electrical' => Department::where('slug', 'electrical')->value('id'),
            'ict' => Department::where('slug', 'ict')->value('id'),
            'agriculture' => Department::where('slug', 'agriculture')->value('id'),
            'mechanical' => Department::where('slug', 'mechanical')->value('id'),
            'finance' => Department::where('slug', 'finance')->value('id'),
            'student_affairs' => Department::where('slug', 'student-affairs')->value('id'),
            'counselling' => Department::where('slug', 'guiding-and-counselling')->value('id'),
            'ilo' => Department::where('slug', 'industrial-liaison-office-ilo')->value('id'),
            'procurement' => Department::where('slug', 'procurement')->value('id'),
            'sports' => Department::where('slug', 'sports')->value('id'),
            'music_arts' => Department::where('slug', 'music-and-arts')->value('id'),
            'library' => Department::where('slug', 'library')->value('id'),
            'administration' => Department::where('slug', 'administration')->value('id'),
            'odel' => Department::where('slug', 'odel')->value('id'),
        ];

        $teamMembers = [

            // ─── Multi-Assignment People ───────────────────────────────────

            [
                'name' => 'Dennis Njeru',
                'email' => 'dennis@tetutvc.ac.ke',
                'phone' => '+254758660323',
                'photo' => null,
                'assignments' => [
                    [
                        'department_id' => $departments['agriculture'],
                        'role_id' => $roles['trainer'],
                    ],
                    [
                        'department_id' => $departments['sports'],
                        'role_id' => $roles['coordinator'],
                        'custom_title' => 'Sports Coordinator',
                    ],
                ],
            ],

            [
                'name' => 'Joseph Ambrose',
                'email' => 'ambrose@tetutvc.ac.ke',
                'phone' => '+254758660413',
                'photo' => null,
                'assignments' => [
                    [
                        'department_id' => $departments['ict'],
                        'role_id' => $roles['trainer'],
                    ],
                    [
                        'department_id' => $departments['music_arts'],
                        'role_id' => $roles['coordinator'],
                        'custom_title' => 'Music and Arts',
                    ],
                    ['department_id' => $departments['counselling'], 'role_id' => $roles['counsellor']],
                ],
            ],

            // ─── Principal ─────────────────────────────────────────────────

            [
                'name' => 'Mr. David M. Kariuki',
                'email' => 'principal@tetutvc.ac.ke',
                'phone' => '+254758660300',
                'photo' => null,
                'assignments' => [
                    ['department_id' => $departments['administration'], 'role_id' => $roles['principal']],
                ],
            ],

            // ─── Deputy Principals ─────────────────────────────────────────

            [
                'name' => 'Lydia Ndirangu',
                'email' => 'deputy.admin@tetutvc.ac.ke',
                'phone' => '+254758660301',
                'photo' => null,
                'assignments' => [
                   ['department_id' => $departments['administration'], 'role_id' => $roles['deputy_principal'], 'custom_title' => 'Administration'],
                    ['department_id' => $departments['hospitality'], 'role_id' => $roles['trainer'] ],
                ],
            ],

            [
                'name' => 'Joshua Mwangi',
                'email' => 'deputy.academics@tetutvc.ac.ke',
                'phone' => '+254758660302',
                'photo' => null,
                'assignments' => [
                    ['department_id' => $departments['administration'], 'role_id' => $roles['deputy_principal'], 'custom_title' => 'Academics'],
                    ['department_id' => $departments['ict'], 'role_id' => $roles['trainer'] ],
                ],
            ],

            // ─── Administrators ───────────────────────────────────────────

            [
                'name' => 'Kenneth Muriuki',
                'email' => 'registrar@tetutvc.ac.ke',
                'phone' => '+254700000001',
                'photo' => null,
                'assignments' => [
                    ['department_id' => $departments['administration'], 'role_id' => $roles['registrar']],
                    ['department_id' => $departments['hospitality'], 'role_id' => $roles['trainer'] ],
                ],
            ],

            [
                'name' => 'Elly Mburu',
                'email' => 'dean.students@tetutvc.ac.ke',
                'phone' => '+254700000002',
                'photo' => null,
                'assignments' => [
                    ['department_id' => $departments['administration'], 'role_id' => $roles['dean_of_students']],
                    ['department_id' => $departments['building'], 'role_id' => $roles['trainer'] ],
                ],
            ],

            [
                'name' => 'Kevin Wachira',
                'email' => 'finance@tetutvc.ac.ke',
                'phone' => '+254700000003',
                'photo' => null,
                'assignments' => [
                    ['department_id' => $departments['administration'], 'role_id' => $roles['finance_officer']],
                    ['department_id' => $departments['finance'], 'role_id' => $roles['coordinator'], 'custom_title'=>'Finance Officer' ],
                    ['department_id' => $departments['ict'], 'role_id' => $roles['trainer'] ],
                ],
            ],

            [
                'name' => 'Cynthia Wanjiru',
                'email' => 'procurement@tetutvc.ac.ke',
                'phone' => '+254700000004',
                'photo' => null,
                'assignments' => [
                    ['department_id' => $departments['administration'], 'role_id' => $roles['procurement_officer']],
                ],
            ],

            // ─── HODs ─────────────────────────────────────────────────────

            [
                'name' => 'Jacob Nyaga',
                'email' => 'hod.cosmetology@tetutvc.ac.ke',
                'phone' => '+254758660303',
                'photo' => null,
                'assignments' => [
                    ['department_id' => $departments['cosmetology'], 'role_id' => $roles['hod']],
                ],
            ],

            [
                'name' => 'Lily Mugo',
                'email' => 'hod.hospitality@tetutvc.ac.ke',
                'phone' => '+254758660304',
                'photo' => null,
                'assignments' => [
                    ['department_id' => $departments['hospitality'], 'role_id' => $roles['hod'] ],
                    ['department_id' => $departments['sports'], 'role_id' => $roles['coach'], 'custom_title'=>'Volleyball Coach'],

                ],
            ],

            [
                'name' => 'Madam Jane',
                'email' => 'hod.fashion@tetutvc.ac.ke',
                'phone' => '+254758660305',
                'photo' => null,
                'assignments' => [
                    ['department_id' => $departments['fashion'], 'role_id' => $roles['hod']],
                ],
            ],

            [
                'name' => 'Gideon Muraguri',
                'email' => 'hod.building@tetutvc.ac.ke',
                'phone' => '+254758660306',
                'photo' => null,
                'assignments' => [
                    ['department_id' => $departments['building'], 'role_id' => $roles['hod']],
                ],
            ],

            [
                'name' => 'Mr. Josiah',
                'email' => 'hod.electrical@tetutvc.ac.ke',
                'phone' => '+254758660307',
                'photo' => null,
                'assignments' => [
                    ['department_id' => $departments['electrical'], 'role_id' => $roles['hod']],
                    ['department_id' => $departments['sports'], 'role_id' => $roles['coach'], 'custom_title'=>'Volleyball Coach'],
                ],
            ],

            [
                'name' => 'Ascar Jebet',
                'email' => 'hod.ict@tetutvc.ac.ke',
                'phone' => '+254758660308',
                'photo' => null,
                'assignments' => [
                    ['department_id' => $departments['ict'], 'role_id' => $roles['hod']],
                ],
            ],

            [
                'name' => 'Anthony Kosgei',
                'email' => 'hod.agriculture@tetutvc.ac.ke',
                'phone' => '+254758660309',
                'photo' => null,
                'assignments' => [
                    ['department_id' => $departments['agriculture'], 'role_id' => $roles['hod']],
                ],
            ],

            [
                'name' => 'Mugure Ngigi',
                'email' => 'hod.mechanical@tetutvc.ac.ke',
                'phone' => '+254758660310',
                'photo' => null,
                'assignments' => [
                    ['department_id' => $departments['mechanical'], 'role_id' => $roles['hod']],
                ],
            ],

            // ─── HOS (Section Heads) ─────────────────────────────────────

            [
                'name' => 'Patricia Wanjiru',
                'email' => 'finance2@tetutvc.ac.ke',
                'phone' => '+254758660320',
                'photo' => null,
                'assignments' => [
                    ['department_id' => $departments['finance'], 'role_id' => $roles['support_staff']],
                ],
            ],

            [
                'name' => 'Fredrick Kamau',
                'email' => 'hos.counselling@tetutvc.ac.ke',
                'phone' => '+254758660321',
                'photo' => null,
                'assignments' => [
                    ['department_id' => $departments['counselling'], 'role_id' => $roles['coordinator'], 'custom_title'=>'Student Counsellor'],
                    ['department_id' => $departments['hospitality'], 'role_id' => $roles['trainer']],
                ],
            ],

            [
                'name' => 'Joan Weru',
                'email' => 'hos.ilo@tetutvc.ac.ke',
                'phone' => '+254758660322',
                'photo' => null,
                'assignments' => [
                    ['department_id' => $departments['ilo'], 'role_id' => $roles['coordinator']],
                    ['department_id' => $departments['hospitality'], 'role_id' => $roles['trainer']],
                ],
            ],

            [
                'name' => 'MC Odhis Oloo',
                'email' => 'hos.procurement@tetutvc.ac.ke',
                'phone' => '+254758660325',
                'photo' => null,
                'assignments' => [
                    ['department_id' => $departments['procurement'], 'role_id' => $roles['support_staff']],
                    ['department_id' => $departments['sports'], 'role_id' => $roles['coach'], 'custom_title'=>'Athletics Coach'],
                ],
            ],


            // ─── Coordinators ─────────────────────────────────────────────

            [
                'name' => 'Rose Kiarie',
                'email' => 'coord.research@tetutvc.ac.ke',
                'phone' => '+254758660327',
                'photo' => null,
                'assignments' => [
                    ['department_id' => $departments['administration'], 'role_id' => $roles['coordinator'], 'custom_title' => 'Research & Innovations'],
                    ['department_id' => $departments['fashion'], 'role_id' => $roles['trainer']],
                ],
            ],

            // ─── Trainers ─────────────────────────────────────────────────

            [
                'name' => 'Madam Peninah',
                'email' => 'peninah@tetutvc.ac.ke',
                'phone' => '+254758660401',
                'photo' => null,
                'assignments' => [
                    ['department_id' => $departments['cosmetology'], 'role_id' => $roles['trainer']],
                ],
            ],

            [
                'name' => 'Fernice Gichevu',
                'email' => 'fernice@tetutvc.ac.ke',
                'phone' => '+254758660416',
                'photo' => null,
                'assignments' => [
                    ['department_id' => $departments['cosmetology'], 'role_id' => $roles['trainer']],
                ],
            ],

            [
                'name' => 'Madam Monica',
                'email' => 'monica@tetutvc.ac.ke',
                'phone' => '+254758660417',
                'photo' => null,
                'assignments' => [
                    ['department_id' => $departments['cosmetology'], 'role_id' => $roles['trainer']],
                ],
            ],

            [
                'name' => 'Madam Lucy O.',
                'email' => 'lucy@tetutvc.ac.ke',
                'phone' => '+254758660314',
                'photo' => null,
                'assignments' => [
                    ['department_id' => $departments['hospitality'], 'role_id' => $roles['trainer']],
                ],
            ],

            [
                'name' => 'Madam Mercy',
                'email' => 'mercy@tetutvc.ac.ke',
                'phone' => '+254758660406',
                'photo' => null,
                'assignments' => [
                    ['department_id' => $departments['hospitality'], 'role_id' => $roles['trainer']],
                ],
            ],

            [
                'name' => 'Mr. Kioko',
                'email' => 'kioko@tetutvc.ac.ke',
                'phone' => '+254758660407',
                'photo' => null,
                'assignments' => [
                    ['department_id' => $departments['hospitality'], 'role_id' => $roles['trainer']],
                ],
            ],

            [
                'name' => 'Evelynne Donga',
                'email' => 'evelynne@tetutvc.ac.ke',
                'phone' => '+254758660415',
                'photo' => null,
                'assignments' => [
                    ['department_id' => $departments['hospitality'], 'role_id' => $roles['trainer']],
                ],
            ],

            [
                'name' => 'Madam Faith',
                'email' => 'faithfashion@tetutvc.ac.ke',
                'phone' => '+254758660316',
                'photo' => null,
                'assignments' => [
                    ['department_id' => $departments['fashion'], 'role_id' => $roles['trainer']],
                ],
            ],

            [
                'name' => 'Kimathi Mwiti',
                'email' => 'kimathi@tetutvc.ac.ke',
                'phone' => '+254758660409',
                'photo' => null,
                'assignments' => [
                    ['department_id' => $departments['fashion'], 'role_id' => $roles['trainer']],
                    ['department_id' => $departments['sports'], 'role_id' => $roles['coach'], 'custom_title'=>'Rugby Coach'],

                ],
            ],

            [
                'name' => 'Felix Njeru',
                'email' => 'felix@tetutvc.ac.ke',
                'phone' => '+254758660311',
                'photo' => null,
                'assignments' => [
                    ['department_id' => $departments['building'], 'role_id' => $roles['trainer']],
                    ['department_id' => $departments['sports'], 'role_id' => $roles['coach'], 'custom_title'=>'Football Coach'],
                ],
            ],

            [
                'name' => 'Festus Chesaro',
                'email' => 'festus@tetutvc.ac.ke',
                'phone' => '+254758660312',
                'photo' => null,
                'assignments' => [
                    ['department_id' => $departments['building'], 'role_id' => $roles['trainer']],
                ],
            ],

            [
                'name' => 'Madam Njeri',
                'email' => 'njeri@tetutvc.ac.ke',
                'phone' => '+254758660315',
                'photo' => null,
                'assignments' => [
                    ['department_id' => $departments['building'], 'role_id' => $roles['trainer']],
                ],
            ],

            [
                'name' => 'Mr. Wairegi',
                'email' => 'wairegi@tetutvc.ac.ke',
                'phone' => '+254758660418',
                'photo' => null,
                'assignments' => [
                    ['department_id' => $departments['electrical'], 'role_id' => $roles['trainer']],
                ],
            ],

            [
                'name' => 'Lawrence Mwaniki',
                'email' => 'lawrence@tetutvc.ac.ke',
                'phone' => '+254758660402',
                'photo' => null,
                'assignments' => [
                    ['department_id' => $departments['ict'], 'role_id' => $roles['trainer']],
                    ['department_id' => $departments['sports'], 'role_id' => $roles['coach'], 'custom_title'=>'Football Coach'],
                ],
            ],

            [
                'name' => 'Titus Tum',
                'email' => 'titus@tetutvc.ac.ke',
                'phone' => '+254758660403',
                'photo' => null,
                'assignments' => [
                    ['department_id' => $departments['odel'], 'role_id' => $roles['coordinator'], 'custom_title' => 'ODEL Coordinator'],
                ],
            ],

            [
                'name' => 'June Njagi',
                'email' => 'june@tetutvc.ac.ke',
                'phone' => '+254758660405',
                'photo' => null,
                'assignments' => [
                    ['department_id' => $departments['ict'], 'role_id' => $roles['trainer']],
                ],
            ],

            [
                'name' => 'Madam Grace N.',
                'email' => 'graceni@tetutvc.ac.ke',
                'phone' => '+254758660411',
                'photo' => null,
                'assignments' => [
                    ['department_id' => $departments['ict'], 'role_id' => $roles['trainer']],
                ],
            ],

            [
                'name' => 'Mr. Kibet',
                'email' => 'kibet@tetutvc.ac.ke',
                'phone' => '+254758660404',
                'photo' => null,
                'assignments' => [
                    ['department_id' => $departments['mechanical'], 'role_id' => $roles['trainer']],
                ],
            ],

            [
                'name' => 'Mr. Thomas',
                'email' => 'thomas@tetutvc.ac.ke',
                'phone' => '+254758660414',
                'photo' => null,
                'assignments' => [
                    ['department_id' => $departments['mechanical'], 'role_id' => $roles['trainer']],
                    ['department_id' => $departments['sports'], 'role_id' => $roles['coach'], 'custom_title'=>'Football Coach'],
                ],
            ],

            // ─── Support Staff ────────────────────────────────────────────

            [
                'name' => 'Iddah Warui',
                'email' => 'secretary@tetutvc.ac.ke',
                'phone' => '+254700000010',
                'photo' => null,
                'assignments' => [
                    ['department_id' => $departments['administration'], 'role_id' => $roles['support_staff'], 'custom_title' => 'Secretary'],
                ],
            ],

            [
                'name' => 'John Nguma',
                'email' => 'librarian@tetutvc.ac.ke',
                'phone' => '+254700000011',
                'photo' => null,
                'assignments' => [
                    ['department_id' => $departments['library'], 'role_id' => $roles['support_staff'], 'custom_title' => 'Librarian'],
                ],
            ],

            [
                'name' => 'George Mwangi',
                'email' => 'driver@tetutvc.ac.ke',
                'phone' => '+254700000012',
                'photo' => null,
                'assignments' => [
                    ['department_id' => $departments['administration'], 'role_id' => $roles['support_staff'], 'custom_title' => 'Driver'],
                    ['department_id' => $departments['sports'], 'role_id' => $roles['coach'], 'custom_title'=>'Volleyball Coach'],
                ],
            ],

            [
                'name' => 'Wambugu Njoroge',
                'email' => 'grounds@tetutvc.ac.ke',
                'phone' => '+254700000013',
                'photo' => null,
                'assignments' => [
                    ['department_id' => $departments['administration'], 'role_id' => $roles['support_staff'], 'custom_title' => 'Maintenance'],
                ],
            ],

            [
                'name' => 'Esther Wanjiku',
                'email' => 'cook1@tetutvc.ac.ke',
                'phone' => '+254700000014',
                'photo' => null,
                'assignments' => [
                    ['department_id' => $departments['administration'], 'role_id' => $roles['support_staff'], 'custom_title' => 'Catering'],
                ],
            ],

            [
                'name' => 'Lucy Wairimu',
                'email' => 'cook2@tetutvc.ac.ke',
                'phone' => '+254700000015',
                'photo' => null,
                'assignments' => [
                    ['department_id' => $departments['administration'], 'role_id' => $roles['support_staff'], 'custom_title' => 'Catering'],
                ],
            ],
        ];

        foreach ($teamMembers as $member) {
            $teamMemberId = DB::table('team_members')->insertGetId([
                'name' => $member['name'],
                'email' => $member['email'],
                'phone' => $member['phone'],
                'photo' => $member['photo'],
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            foreach ($member['assignments'] as $assignment) {
                DB::table('department_team_member')->insert([
                    'department_id' => $assignment['department_id'],
                    'team_member_id' => $teamMemberId,
                    'role_id' => $assignment['role_id'],
                    'custom_title' => $assignment['custom_title'] ?? null,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        }
    }
}
