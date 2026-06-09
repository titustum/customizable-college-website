<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class DepartmentSeeder extends Seeder
{
    public function run(): void
    {
        $placeholderPhoto = null;

        $departments = [
            // Academic Departments
            [
                'name' => 'Cosmetology',
                'slug' => Str::slug('Cosmetology'),
                'type' => 'academic',
                'photo' => $placeholderPhoto,
                'short_description' => 'Master the art and science of Beauty Therapy and Hairdressing with our amazing programs.',
                'full_description' => 'The Cosmetology department at TETU TVC is a vibrant hub of creativity and professional skill development, offering a comprehensive range of programs in beauty therapy, hairdressing, and nail technology. Our curriculum is meticulously designed to blend theoretical knowledge with extensive hands-on practice, ensuring our graduates are fully prepared to meet the demands of the dynamic beauty industry.
                    Students undergo rigorous training in skincare analysis and treatments, professional makeup artistry for various occasions including bridal and editorial work, advanced hairstyling techniques such as chemical texturizing, coloring, and precision cutting, as well as manicure and pedicure procedures. Our state-of-the-art salon facilities provide a real-world environment where learners perfect their craft under the guidance of experienced instructors certified by the Kenya National Examination Council (KNEC) and the Curriculum Development, Assessment and Certification Council (CDACC).
                    Beyond technical skills, the department emphasizes customer service excellence, salon management, entrepreneurship, and health and safety standards. Graduates emerge as competent professionals ready to pursue careers as beauty therapists, salon managers, makeup artists, or beauty entrepreneurs. Many of our alumni have successfully established their own salons or secured positions in leading hotels, spas, and wellness centers across the country and beyond.',
                'banner_photo' => '',
                'leader_message' => 'Welcome to Cosmetology. Our department is dedicated to nurturing creative talent and professional excellence in beauty therapy and hairdressing.',
            ],
            [
                'name' => 'Hospitality',
                'slug' => Str::slug('Hospitality'),
                'type' => 'academic',
                'photo' => $placeholderPhoto,
                'short_description' => 'Excel in the Hospitality industry with our tailored courses in culinary arts, hotel management, and more.',
                'full_description' => 'The Hospitality department at TETU TVC stands as a center of excellence in culinary arts and hotel management education, preparing students for dynamic and rewarding careers in the global hospitality industry. Our programs are carefully structured to provide a perfect balance of theoretical foundations and practical application, delivered through our modern training kitchens, mock hotel reception areas, and housekeeping laboratories.
                    Students engage in comprehensive training across multiple disciplines including professional cooking techniques, baking and pastry arts, food and beverage service, front office operations, housekeeping management, and tour guiding. The curriculum emphasizes international service standards while incorporating local hospitality practices, ensuring our graduates are competitive both locally and internationally. Our qualified instructors bring years of industry experience, guiding students through the Kenya National Examination Council (KNEC) and IATA/UFTAA certification pathways.
                    The department places strong emphasis on industrial attachment and work-integrated learning, partnering with leading hotels, lodges, and tour companies to provide students with invaluable real-world experience. Career opportunities for our graduates include positions in hotel management, restaurant supervision, event planning, cruise ship hospitality, airline catering, and tourism consultancy. Our alumni network continues to grow across East Africa and beyond, with many holding management positions in prestigious hospitality establishments.',
                'banner_photo' => '',
                'leader_message' => 'Welcome to Hospitality. Our department prepares students for rewarding careers in the dynamic hospitality industry.',
            ],
            [
                'name' => 'Fashion and Textile',
                'slug' => Str::slug('Fashion and Textile'),
                'type' => 'academic',
                'photo' => $placeholderPhoto,
                'short_description' => 'Unleash your creativity and style with our courses in fashion design and clothing technology.',
                'full_description' => 'The Fashion and Textile department at TETU TVC is a creative powerhouse where innovation meets craftsmanship, offering students a comprehensive education in garment making, fashion design, and textile technology. Our programs are designed to nurture creative talent while building solid technical competencies that prepare graduates for the competitive fashion industry.
                    Students develop expertise in pattern drafting and grading, garment construction techniques, fashion illustration, fabric selection and textile science, and traditional Kenyan textile crafts. Our well-equipped sewing laboratories feature industrial-grade machines and equipment, allowing learners to work with various fabrics and techniques. The curriculum integrates computer-aided fashion design (CAD) alongside traditional handcraft methods, ensuring graduates are versatile and technologically adept.
                    The department places strong emphasis on entrepreneurship and small business development, encouraging students to view fashion as a viable career path. Learners are guided through the complete process of creating a fashion collection, from conceptualization to final product. Our graduates go on to successful careers as fashion designers, tailors, pattern makers, textile technologists, fashion merchandisers, and boutique owners. Many have launched their own clothing lines and tailoring businesses, contributing to the growing Kenyan fashion industry and the Big Four government agenda on manufacturing.',
                'banner_photo' => '',
                'leader_message' => 'Welcome to Fashion and Textile. Unleash your creativity and develop professional skills in garment making and fashion design.',
            ],
            [
                'name' => 'Building and Civil',
                'slug' => Str::slug('Building and Civil'),
                'type' => 'academic',
                'photo' => $placeholderPhoto,
                'short_description' => 'Build a solid foundation for your future with our courses in construction and civil engineering.',
                'full_description' => 'The Building and Civil Engineering department at TETU TVC provides a solid foundation for students aspiring to excel in the construction industry. Our programs combine rigorous theoretical instruction with extensive practical training in modern construction techniques and civil engineering principles. The department is equipped with workshops and laboratories that simulate real construction environments, enabling students to develop competence in various building trades.
                    Training areas include construction technology and building science, masonry and brickwork, carpentry and joinery, plumbing and pipe fitting, concrete technology, and basic structural design. Students learn to read and interpret architectural drawings, perform site surveys and leveling, estimate material quantities, and supervise construction projects. Our curriculum aligns with KNEC and CDACC standards, and incorporates modern construction practices including green building techniques and sustainable construction methods.
                    The department maintains strong linkages with construction firms and contractors in the region, facilitating industrial attachment and apprenticeship opportunities for students. Career prospects for our graduates are excellent, with demand for skilled building and civil engineering professionals continuing to grow in Kenya\'s expanding construction sector. Graduates work as construction supervisors, site managers, quantity surveyors, building technicians, and entrepreneurs in the building and construction industry.',
                'banner_photo' => '',
                'leader_message' => 'Welcome to Building and Civil Engineering. Build a solid foundation for your career in construction and civil engineering.',
            ],
            [
                'name' => 'Electrical',
                'slug' => Str::slug('Electrical'),
                'type' => 'academic',
                'photo' => $placeholderPhoto,
                'short_description' => 'Light up your career with our specialized courses in electrical engineering and technology.',
                'full_description' => 'The Electrical Engineering department at TETU TVC delivers comprehensive training in electrical and electronics technology, preparing students for diverse careers in the ever-evolving electrical industry. Our programs are designed to produce competent electrical technicians who can design, install, maintain, and repair electrical systems in residential, commercial, and industrial settings.
                    Students receive thorough instruction in electrical wiring and installation techniques, electrical circuit analysis and design, electrical machines and transformers, power generation, transmission and distribution, instrumentation and process control, solar energy systems and renewable technologies, as well as basic electronics and telecommunications. Our modern electrical workshops feature industry-standard equipment including various motor types, switchgear, control panels, solar PV training rigs, and programmable logic controllers (PLCs).
                    The department emphasizes practical competence and safety consciousness, with students undertaking numerous hands-on projects throughout their training. The curriculum is aligned with KNEC and CDACC standards and incorporates emerging technologies in renewable energy and smart grid systems. Graduates find employment as electrical technicians in the energy sector, manufacturing industries, construction companies, telecommunications firms, and as self-employed electrical contractors. The growing demand for solar energy technicians in Kenya presents particularly promising opportunities for our graduates.',
                'banner_photo' => '',
                'leader_message' => 'Welcome to Electrical Engineering. Light up your career with specialized training in electrical and electronic technology.',
            ],
            [
                'name' => 'ICT',
                'slug' => Str::slug('ICT'),
                'type' => 'academic',
                'photo' => $placeholderPhoto,
                'short_description' => 'Stay ahead in the digital age with our cutting-edge ICT courses and training programs.',
                'full_description' => 'The ICT department at TETU TVC is at the forefront of digital skills development, equipping students with the technological competencies required to thrive in the modern digital economy. Our comprehensive programs cater to learners at various levels, from foundational computer skills to advanced programming and network administration, ensuring a clear progression pathway for every student.
                    Students gain expertise in computer applications and office productivity tools, web development and design, programming languages including Python, Java, and PHP, database management systems, computer networking and cybersecurity fundamentals, graphic design and multimedia production, and system analysis and design. Our computer laboratories are equipped with modern hardware and software, providing an optimal learning environment. The department also offers specialized training in emerging fields such as data science and artificial intelligence.
                    The curriculum is continuously updated to reflect industry trends and employer expectations, with regular input from our industry advisory board. Students participate in project-based learning, building real-world applications and solving practical problems. Partnerships with technology companies provide internship opportunities and expose students to industry best practices. Our graduates pursue successful careers as software developers, network administrators, database managers, ICT support specialists, cybersecurity analysts, and digital entrepreneurs. Many have also advanced to university programs in computer science and information technology.',
                'banner_photo' => '',
                'leader_message' => 'Welcome to ICT. Stay ahead in the digital age with our cutting-edge technology and computing programs.',
            ],
            [
                'name' => 'Agriculture',
                'slug' => Str::slug('Agriculture'),
                'type' => 'academic',
                'photo' => $placeholderPhoto,
                'short_description' => 'Cultivate your future with our comprehensive agricultural courses and training programs.',
                'full_description' => 'The Agriculture department at TETU TVC is dedicated to transforming students into skilled agricultural professionals who can contribute to Kenya\'s food security and agricultural development. Our programs provide comprehensive training in modern agricultural practices, combining traditional farming knowledge with contemporary agribusiness approaches and sustainable farming technologies.
                    Students receive hands-on training in crop production and horticulture, livestock and poultry management, soil science and land use management, agricultural economics and farm management, agribusiness and value addition, irrigation and water management, and apiculture (beekeeping). The department maintains a demonstration farm where students practice what they learn in the classroom, cultivating crops, rearing livestock, and managing agricultural enterprises. This practical exposure ensures graduates are job-ready from day one.
                    The curriculum emphasizes climate-smart agriculture, sustainable farming practices, and entrepreneurship. Students are encouraged to view agriculture as a viable business enterprise, with training in record keeping, marketing, and financial management. Our graduates are well-prepared for careers in agricultural extension services, farm management, agribusiness, agricultural research, and food processing. Many graduates have successfully established their own farming enterprises, creating employment and contributing to community food security. The department also supports students in accessing Youth in Agriculture programs and government agricultural initiatives.',
                'banner_photo' => '',
                'leader_message' => 'Welcome to Agriculture. Cultivate your future with our comprehensive agricultural training programs.',
            ],
            [
                'name' => 'Mechanical',
                'slug' => Str::slug('Mechanical'),
                'type' => 'academic',
                'photo' => $placeholderPhoto,
                'short_description' => 'Get equipped with hands-on skills and technical knowledge in design, manufacturing, maintenance, and operation of mechanical systems, to prepare you for careers in modern industry.',
                'full_description' => 'The Mechanical Engineering department at TETU TVC offers rigorous training in the design, manufacturing, maintenance, and operation of mechanical systems, preparing students for rewarding careers in Kenya\'s growing industrial and manufacturing sector. Our programs are structured to develop competent mechanical technicians who can diagnose, repair, and maintain a wide range of mechanical equipment and systems.
                    Students engage in comprehensive training encompassing automotive mechanics and engine systems, welding and fabrication technology, machine shop operations including turning, milling, and fitting, mechanical drawing and CAD (Computer-Aided Design), plant maintenance and repair, hydraulic and pneumatic systems, and basic thermodynamics and fluid mechanics. Our workshops house a variety of equipment including lathe machines, milling machines, welding booths, automotive hoists, and diagnostic tools that provide students with practical experience on industry-relevant equipment.
                    The department emphasizes safety, precision, and workmanship in all its training activities. Students complete numerous practical projects and industrial attachments, developing competence and confidence in their technical abilities. The curriculum follows KNEC and CDACC guidelines while incorporating modern industrial practices and technologies. Our graduates find employment as automotive technicians, plant maintenance engineers, welding and fabrication specialists, machine operators, and quality control inspectors in manufacturing, transport, and construction industries. Many also pursue self-employment through well-equipped mechanical workshops, serving the vibrant informal sector and contributing to Kenya\'s industrialization agenda.',
                'banner_photo' => '',
                'leader_message' => 'Welcome to Mechanical Engineering. Get equipped with hands-on skills in design, manufacturing, and maintenance of mechanical systems.',
            ],

            // Section Departments
            [
                'name' => 'Finance',
                'slug' => Str::slug('Finance'),
                'type' => 'section',
                'photo' => $placeholderPhoto,
                'short_description' => 'Managing institutional finances and student fee transactions with integrity and transparency.',
                'full_description' => 'The Finance section at TETU TVC is responsible for the prudent management of institutional finances, ensuring that all financial operations are conducted with the highest standards of integrity, transparency, and accountability. Our team works diligently to support the college\'s mission by maintaining robust financial systems and processes.
                    Key functions include budgeting and financial planning, fee collection and accounting, payroll processing, procurement and payment processing, financial reporting and audit coordination, and grants and project fund management. The section operates an open-door policy where students and parents can inquire about fee structures, payment plans, and financial statements during designated hours.
                    The Finance section plays a critical role in the college\'s strategic planning, providing financial data and analysis that informs decision-making at the highest level. We are committed to continuous improvement in our financial management practices, leveraging modern accounting software and adhering to public financial management regulations. Our team regularly undergoes professional development to stay abreast of evolving financial standards and best practices in the education sector.',
                'banner_photo' => '',
                'leader_message' => 'Managing institutional finances with integrity and transparency to support the college\'s mission.',
            ],
            [
                'name' => 'Student Affairs',
                'slug' => Str::slug('Student Affairs'),
                'type' => 'section',
                'photo' => $placeholderPhoto,
                'short_description' => 'Supporting student welfare, discipline, clubs, and holistic development outside the classroom.',
                'full_description' => 'The Student Affairs section at TETU TVC is the heart of student life on campus, dedicated to fostering a supportive, inclusive, and vibrant environment that promotes holistic student development. We believe that education extends beyond the classroom, and our programs are designed to nurture students\' social, emotional, and leadership capabilities.
                    Our services encompass student welfare and counseling support, discipline and code of conduct management, clubs and societies coordination, sports and recreational activities, accommodation and catering services oversight, student leadership development and mentorship, as well as health services and wellness programs. The section serves as the primary link between students and college administration, advocating for student interests while maintaining a conducive learning environment.
                    The section organizes regular events including career fairs, cultural festivals, wellness campaigns, and leadership workshops that enrich the student experience. We maintain open communication channels through student representatives and suggestion boxes, ensuring that student voices are heard and acted upon. Our goal is to produce well-rounded graduates who excel not only academically but also as responsible citizens and community leaders.',
                'banner_photo' => '',
                'leader_message' => 'Supporting student welfare, discipline, and holistic development outside the classroom.',
            ],
            [
                'name' => 'Guiding and Counselling',
                'slug' => Str::slug('Guiding and Counselling'),
                'type' => 'section',
                'photo' => $placeholderPhoto,
                'short_description' => 'Providing professional academic, career, and personal counseling services to all students.',
                'full_description' => 'The Guiding and Counselling section at TETU TVC is committed to supporting students\' mental health, academic success, and personal growth through professional guidance and counseling services. We recognize that students face various challenges during their college journey, and our trained counselors provide a safe, confidential, and non-judgmental space for students to explore their concerns.
                    Our services include academic guidance and course selection advice, career counseling and job placement support, personal and emotional counseling, stress and anxiety management, conflict resolution and peer mediation, HIV/AIDS awareness and life skills education, as well as referral services for specialized professional support. We conduct regular wellness workshops, mentorship programs, and awareness campaigns that empower students with coping strategies and life skills.
                    The section works closely with faculty, parents, and external professional bodies to ensure comprehensive support for every student. Counselors are available for both individual and group counseling sessions, and all services are provided free of charge to enrolled students. We maintain strict confidentiality protocols and adhere to professional ethical standards in all our interactions. Our ultimate goal is to help students overcome barriers to learning and achieve their full potential.',
                'banner_photo' => '',

                'leader_message' => 'Providing professional counseling services to support students\' mental health and academic success.',
            ],
            [
                'name' => 'Industrial Liaison Office (ILO)',
                'slug' => Str::slug('Industrial Liaison Office ILO'),
                'type' => 'section',
                'photo' => $placeholderPhoto,
                'short_description' => 'Bridging the gap between academic training and industry expectations through partnerships and attachments.',
                'full_description' => 'The Industrial Liaison Office (ILO) at TETU TVC serves as the strategic bridge between the college and the world of work, ensuring that our training programs remain relevant and responsive to industry needs. We foster strong partnerships with employers, industry associations, and professional bodies to create valuable opportunities for our students and graduates.
                    Core functions include industrial attachment placement and supervision, industry advisory board coordination, employer engagement and partnership development, job placement and graduate tracking, curriculum review input based on industry feedback, and organizing career fairs, industry visits, and guest speaker sessions. The ILO maintains an extensive database of partner organizations across various sectors, facilitating meaningful attachment experiences that enhance students\' practical skills and employability.
                    The office also conducts tracer studies to track graduate outcomes, using this data to continuously improve training programs and better align them with labor market demands. Students are encouraged to visit the ILO for guidance on attachment applications, resume writing, interview preparation, and career planning. Our strong industry linkages have resulted in attachment and employment opportunities for hundreds of graduates, contributing to the college\'s excellent reputation among employers.',
                'banner_photo' => '',
                'leader_message' => 'Bridging the gap between academic training and industry expectations through strategic partnerships.',
            ],
            [
                'name' => 'Procurement',
                'slug' => Str::slug('Procurement'),
                'type' => 'section',
                'photo' => $placeholderPhoto,
                'short_description' => 'Ensuring efficient and transparent procurement of goods, services, and works for the college.',
                'full_description' => 'The Procurement section at TETU TVC is responsible for the acquisition of all goods, services, and works required for the effective functioning of the college, adhering to the principles of transparency, fairness, competition, and value for money. Our operations are guided by the Public Procurement and Asset Disposal Act and the college\'s internal procurement policies.
                    Key responsibilities include procurement planning and budgeting, tendering and contract management, supplier prequalification and evaluation, stock control and inventory management, asset disposal, and compliance monitoring and reporting. The section manages a wide array of procurements ranging from laboratory equipment and teaching materials to catering supplies and maintenance services, ensuring that all college departments receive quality inputs in a timely manner.
                    The section has embraced e-procurement systems to enhance efficiency and transparency in the procurement process. We maintain a register of approved suppliers and conduct regular market surveys to ensure competitive pricing. Our commitment to ethical procurement practices ensures that all stakeholders have confidence in the integrity of the college\'s procurement processes. The section also provides guidance to user departments on specification development and procurement planning.',
                'banner_photo' => '',
                'leader_message' => 'Ensuring efficient and transparent procurement of goods and services for the college.',
            ],
            [
                'name' => 'Sports',
                'slug' => Str::slug('Sports'),
                'type' => 'section',
                'photo' => $placeholderPhoto,
                'short_description' => 'Promoting physical fitness, talent development, and competitive sportsmanship among students.',
                'full_description' => 'The Sports section at TETU TVC is dedicated to promoting physical fitness, talent development, and character building through a diverse range of sporting activities. We believe that sports play a vital role in holistic education, teaching students valuable life skills such as teamwork, discipline, resilience, and leadership.
                    The section organizes and manages various sports programs including athletics (track and field), football, volleyball, basketball, netball, handball, rugby, table tennis, badminton, and indoor games. Our sports facilities include a well-maintained field, courts for various ball games, and a gymnasium that supports both training and inter-institutional competitions. Students receive coaching from qualified instructors and have opportunities to represent the college at regional and national competitions.
                    Beyond competitive sports, we promote fitness and wellness through recreational activities, wellness challenges, and mass exercise programs that encourage all students to maintain an active lifestyle. The section also identifies and nurtures talented athletes, providing pathways for them to advance to higher levels of competition, including national teams. Our sports program has produced several athletes who have excelled at national championships, bringing pride and recognition to the college.',
                'banner_photo' => '',
                'leader_message' => 'Promoting physical fitness, talent development, and competitive sportsmanship among students.',
            ],
            [
                'name' => 'Music and Arts',
                'slug' => Str::slug('Music and Arts'),
                'type' => 'section',
                'photo' => $placeholderPhoto,
                'short_description' => 'Fostering creativity and artistic expression through music, drama, dance, and visual arts.',
                'full_description' => 'The Music and Arts section at TETU TVC is a vibrant creative hub that nurtures artistic talent and cultural expression among students. We provide a platform for students to explore their creative potential, develop performance skills, and appreciate the rich cultural heritage of Kenya and the world.
                    Our programs include vocal and instrumental music training, drama and theatre productions, traditional and contemporary dance, visual arts including painting, drawing, and sculpture, as well as cultural festivals and art exhibitions. The section maintains practice rooms, a music studio with basic recording equipment, and a performance stage where students showcase their talents during college events, national days, and cultural galas.
                    Participation in music and arts develops confidence, creativity, and emotional intelligence while providing a healthy outlet for self-expression. The section organizes annual arts festivals, inter-class drama competitions, and music concerts that bring the entire college community together. Talented students represent the college in national music and drama festivals, consistently earning accolades. The section also collaborates with external artists and cultural organizations to bring diverse artistic experiences to campus.',
                'banner_photo' => '',
                'leader_message' => 'Fostering creativity and artistic expression through music, drama, dance, and visual arts.',
            ],
            [
                'name' => 'Administration',
                'slug' => Str::slug('Administration'),
                'type' => 'section',
                'photo' => $placeholderPhoto,
                'short_description' => 'Central administrative hub overseeing institutional operations, leadership, and support services.',
                'full_description' => 'The Administration department at TETU TVC serves as the central coordinating hub for all institutional operations. It houses the college leadership and administrative functions that ensure smooth day-to-day operations across all academic and section departments.
                    Key functions include institutional leadership and strategic planning, academic and administrative oversight, human resource management, student records and registration, financial management, procurement and supply chain management, and general institutional support services. The department works closely with all other departments to ensure the college achieves its mission of providing quality TVET education.
                    The Administration department is committed to efficiency, transparency, and service excellence in all its operations, supporting both staff and students in their respective roles within the institution.',
                'banner_photo' => '',
                'leader_message' => 'Providing leadership and administrative support to drive the college\'s mission forward.',
            ],

            [
                'name' => 'Library',
                'slug' => Str::slug('Library'),
                'type' => 'section',
                'photo' => $placeholderPhoto,
                'short_description' => 'Providing comprehensive learning resources and academic support services to the college community.',
                'full_description' => 'The Library at TETU TVC is a dynamic learning resource center committed to supporting teaching, learning, and research activities across all departments. Our library provides a conducive environment for study and intellectual exploration, equipped with a growing collection of print and digital resources tailored to the TVET curriculum.
                    Resources and services include an extensive collection of textbooks, reference materials, and periodicals covering all programs offered at the college, e-resources and online databases accessible 24/7, quiet reading areas and group discussion rooms, photocopying and printing services, computer workstations with internet access, as well as information literacy training and research support. Students and staff can access the library catalog online to search for materials and check availability.
                    The library is staffed by professional librarians who provide guidance on information retrieval, citation, and academic writing. We regularly update our collection based on recommendations from departments and emerging trends in various fields. The library also hosts reading clubs, academic writing workshops, and information literacy sessions that enhance students\' research capabilities. Our goal is to instill a culture of reading and lifelong learning that extends beyond students\' time at the college.',
                'banner_photo' => '',
                'leader_message' => 'Providing comprehensive learning resources and academic support to the college community.',
            ],

            [
                'name' => 'Odel',
                'slug' => Str::slug('Odel'),
                'type' => 'section',
                'photo' => $placeholderPhoto,
                'short_description' => 'Coordinating open and distance e-learning programs and digital education initiatives.',
                'full_description' => 'The Odel department at TETU TVC is responsible for coordinating and supporting open and distance e-learning initiatives across the institution. The department ensures that students have access to quality digital learning resources, online course materials, and virtual learning platforms that complement traditional face-to-face instruction.
                    Key functions include managing the institution\'s Learning Management System (LMS), developing and curating digital content, training staff and students on e-learning tools, and supporting blended learning approaches. The department works closely with academic departments to ensure that online and distance learning programs meet the same quality standards as conventional programs.
                    The Odel department is committed to expanding access to education through technology, enabling more students to benefit from TETU TVC\'s programs regardless of their location or circumstances.',
                'banner_photo' => '',
                'leader_message' => 'Expanding access to education through innovative open and distance e-learning solutions.',
            ],
        ];

        foreach ($departments as $department) {
            DB::table('departments')->insert([
                'name' => $department['name'],
                'slug' => $department['slug'],
                'type' => $department['type'],
                'photo' => $department['photo'],
                'short_description' => $department['short_description'],
                'full_description' => $department['full_description'],
                'banner_photo' => $department['banner_photo'],
                'leader_message' => $department['leader_message'],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
