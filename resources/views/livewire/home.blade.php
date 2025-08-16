<?php

use Livewire\Volt\Component;
use Livewire\Volt\Attributes\Title;
use Livewire\Volt\Attributes\Description; 

new  
#[Title('Welcome to Our College')]
#[Description('Empowering education through modern web solutions.')] 
class extends Component {
    //
}; 
?>

<main role="main" class="font-sans antialiased text-gray-900">

    <!-- Hero Section -->
    <section aria-label="Hero section" class="relative bg-gradient-to-r from-blue-700 to-indigo-800 text-white">
        <div class="max-w-7xl mx-auto px-6 py-20 md:py-32 flex flex-col md:flex-row items-center md:items-start gap-10">

            <!-- Text Content -->
            <div class="md:w-1/2 space-y-6">
                <h1 class="text-4xl md:text-5xl font-extrabold leading-tight drop-shadow-lg">
                    Empowering Futures Through Quality Education
                </h1>
                <p class="text-lg md:text-xl text-blue-200 max-w-md drop-shadow">
                    Join Tetu Technical and Vocational College to build your career with hands-on training and expert
                    mentorship.
                </p>
                <div class="flex space-x-4">
                    <a href="#"
                        class="px-6 py-3 bg-white text-blue-700 font-semibold rounded-md shadow hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition"
                        aria-label="Apply now for admission">
                        Apply Now
                    </a>
                    <a href="#"
                        class="px-6 py-3 border border-white text-white rounded-md font-semibold hover:bg-white hover:text-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-white transition"
                        aria-label="Learn more about our college">
                        Learn More
                    </a>
                </div>
            </div>

            <!-- Image or Illustration -->
            <div class="md:w-1/2">
                <img src="https://images.unsplash.com/photo-1503676260728-1c00da094a0b?auto=format&fit=crop&w=800&q=80"
                    alt="Students collaborating and learning in a modern classroom setting"
                    class="rounded-lg shadow-lg object-cover w-full max-h-96" loading="lazy" />
            </div>

        </div>
    </section>




    <section class="bg-white py-16">
        <div class="max-w-7xl mx-auto px-6">
            <div class="text-center max-w-3xl mx-auto mb-12">
                <h2 class="text-3xl font-extrabold text-gray-900 mb-4">About Tetu Technical and Vocational College</h2>
                <p class="text-gray-600 text-lg">
                    At Tetu TVC, we are committed to empowering futures through quality education and hands-on training.
                    Our mission is to equip students with industry-relevant skills that prepare them for successful
                    careers.
                </p>
            </div>
            <div class="grid md:grid-cols-3 gap-10">
                <div class="space-y-4">
                    <h3 class="text-xl font-semibold text-gray-800">Our Mission</h3>
                    <p class="text-gray-600">
                        To provide accessible, high-quality technical and vocational education that empowers students to
                        excel in their chosen fields.
                    </p>
                </div>
                <div class="space-y-4">
                    <h3 class="text-xl font-semibold text-gray-800">Our Vision</h3>
                    <p class="text-gray-600">
                        To be a leading institution in technical and vocational education, known for innovation,
                        excellence, and community impact.
                    </p>
                </div>
                <div class="space-y-4">
                    <h3 class="text-xl font-semibold text-gray-800">Message from the Principal</h3>
                    <p class="text-gray-600 italic">
                        "Welcome to Tetu TVC, where we nurture talents and prepare leaders of tomorrow. Join us on a
                        journey of growth and excellence."
                    </p>
                    <p class="text-gray-700 font-semibold mt-2">— David Mugambi Kariuki, College Principal</p>
                </div>
            </div>
        </div>
    </section>



    <section class="bg-gray-50 py-16">
        <div class="max-w-7xl mx-auto px-6">
            <div class="text-center max-w-3xl mx-auto mb-12">
                <h2 class="text-3xl font-extrabold text-gray-900 mb-4">Our Programs</h2>
                <p class="text-gray-600 text-lg">
                    Discover a wide range of technical and vocational programs designed to equip you with the skills
                    needed in today’s job market.
                </p>
            </div>

            <div class="grid gap-8 sm:grid-cols-2 md:grid-cols-3">
                <!-- Course Card Example -->
                <div class="bg-white rounded-lg shadow-md p-6 hover:shadow-xl transition">
                    <h3 class="text-xl font-semibold text-blue-700 mb-2">Electrical Engineering</h3>
                    <p class="text-gray-600 mb-4">
                        Hands-on training in electrical systems, installation, and maintenance for a rewarding career.
                    </p>
                    <a href="#" class="text-blue-600 font-semibold hover:underline">Explore Program</a>
                </div>

                <div class="bg-white rounded-lg shadow-md p-6 hover:shadow-xl transition">
                    <h3 class="text-xl font-semibold text-blue-700 mb-2">Hospitality Management</h3>
                    <p class="text-gray-600 mb-4">
                        Develop skills in culinary arts, hotel operations, and customer service excellence.
                    </p>
                    <a href="#" class="text-blue-600 font-semibold hover:underline">Explore Program</a>
                </div>

                <div class="bg-white rounded-lg shadow-md p-6 hover:shadow-xl transition">
                    <h3 class="text-xl font-semibold text-blue-700 mb-2">ICT & Software Development</h3>
                    <p class="text-gray-600 mb-4">
                        Learn the latest technologies and programming skills to thrive in the digital world.
                    </p>
                    <a href="#" class="text-blue-600 font-semibold hover:underline">Explore Program</a>
                </div>

                <!-- Add more courses similarly -->
            </div>

            <div class="text-center mt-12">
                <a href="#"
                    class="inline-block bg-blue-600 text-white font-semibold px-8 py-3 rounded-md shadow hover:bg-blue-700 transition">
                    View All Programs
                </a>
            </div>
        </div>
    </section>


    <section class="bg-white py-16">
        <div class="max-w-7xl mx-auto px-6">
            <div class="text-center max-w-3xl mx-auto mb-12">
                <h2 class="text-3xl font-extrabold text-gray-900 mb-4">Our Departments</h2>
                <p class="text-gray-600 text-lg">
                    Explore our outstanding academic and technical departments designed to provide you with
                    industry-relevant skills and knowledge.
                </p>
            </div>

            <div class="grid gap-8 sm:grid-cols-2 md:grid-cols-4">
                <!-- Department Card -->
                <div class="bg-gray-50 rounded-lg shadow p-6 hover:shadow-lg transition cursor-pointer">
                    <h3 class="text-xl font-semibold text-blue-700 mb-2">Cosmetology</h3>
                    <p class="text-gray-600">
                        Master the art and science of beauty therapy and hairdressing with our expert-led programs.
                    </p>
                    <a href="#" class="mt-3 inline-block text-blue-600 font-semibold hover:underline">Explore
                        Department</a>
                </div>

                <div class="bg-gray-50 rounded-lg shadow p-6 hover:shadow-lg transition cursor-pointer">
                    <h3 class="text-xl font-semibold text-blue-700 mb-2">Hospitality</h3>
                    <p class="text-gray-600">
                        Excel in culinary arts, hotel management, and customer service excellence.
                    </p>
                    <a href="#" class="mt-3 inline-block text-blue-600 font-semibold hover:underline">Explore
                        Department</a>
                </div>

                <div class="bg-gray-50 rounded-lg shadow p-6 hover:shadow-lg transition cursor-pointer">
                    <h3 class="text-xl font-semibold text-blue-700 mb-2">Fashion and Textile</h3>
                    <p class="text-gray-600">
                        Unleash your creativity with courses in fashion design and clothing technology.
                    </p>
                    <a href="#" class="mt-3 inline-block text-blue-600 font-semibold hover:underline">Explore
                        Department</a>
                </div>

                <div class="bg-gray-50 rounded-lg shadow p-6 hover:shadow-lg transition cursor-pointer">
                    <h3 class="text-xl font-semibold text-blue-700 mb-2">Electrical Engineering</h3>
                    <p class="text-gray-600">
                        Build a solid foundation in electrical systems and technologies.
                    </p>
                    <a href="#" class="mt-3 inline-block text-blue-600 font-semibold hover:underline">Explore
                        Department</a>
                </div>

                <!-- Add more departments as needed -->
            </div>

            <div class="text-center mt-12">
                <a href="#"
                    class="inline-block bg-blue-600 text-white font-semibold px-8 py-3 rounded-md shadow hover:bg-blue-700 transition">
                    View All Departments
                </a>
            </div>
        </div>
    </section>


    <section class="bg-blue-600 text-white py-16">
        <div class="max-w-7xl mx-auto px-6 text-center">
            <h2 class="text-3xl font-extrabold mb-4">Admissions Ongoing!</h2>
            <p class="mb-8 max-w-xl mx-auto text-lg">
                Apply now for Artisan, Certificate, and Diploma programs in various technical fields. Join Tetu TVC and
                start shaping your future today!
            </p>
            <a href="#"
                class="inline-block bg-white text-blue-600 font-semibold px-8 py-3 rounded-md shadow hover:bg-gray-100 transition">
                Apply Now
            </a>
        </div>
    </section>


    <section class="bg-white py-16">
        <div class="max-w-7xl mx-auto px-6">
            <div class="text-center max-w-3xl mx-auto mb-12">
                <h2 class="text-3xl font-extrabold text-gray-900 mb-4">Latest News & Events</h2>
                <p class="text-gray-600 text-lg">
                    Stay updated with our latest news, announcements, and upcoming events at Tetu Technical and
                    Vocational College.
                </p>
            </div>

            <div class="grid gap-8 md:grid-cols-3">
                <!-- News/Event Card -->
                <article class="bg-gray-50 rounded-lg shadow p-6 hover:shadow-lg transition cursor-pointer">
                    <h3 class="text-xl font-semibold text-blue-700 mb-2">Groundbreaking of 8 New Classrooms</h3>
                    <p class="text-gray-600 mb-4">We are proud to announce the groundbreaking ceremony for 8 new
                        classrooms to expand our learning facilities.</p>
                    <a href="#" class="text-blue-600 font-semibold hover:underline">Read More</a>
                </article>

                <article class="bg-gray-50 rounded-lg shadow p-6 hover:shadow-lg transition cursor-pointer">
                    <h3 class="text-xl font-semibold text-blue-700 mb-2">Nyeri County Senator Champions Our Growth</h3>
                    <p class="text-gray-600 mb-4">The Senator has pledged support towards our college’s development and
                        educational initiatives.</p>
                    <a href="#" class="text-blue-600 font-semibold hover:underline">Read More</a>
                </article>

                <article class="bg-gray-50 rounded-lg shadow p-6 hover:shadow-lg transition cursor-pointer">
                    <h3 class="text-xl font-semibold text-blue-700 mb-2">Investing in Education, Building the Future
                    </h3>
                    <p class="text-gray-600 mb-4">Discover how we’re investing in innovative education to prepare
                        students for tomorrow’s challenges.</p>
                    <a href="#" class="text-blue-600 font-semibold hover:underline">Read More</a>
                </article>
            </div>

            <div class="text-center mt-12">
                <a href="#"
                    class="inline-block bg-blue-600 text-white font-semibold px-8 py-3 rounded-md shadow hover:bg-blue-700 transition">
                    View All News & Events
                </a>
            </div>
        </div>
    </section>


    <section class="bg-gray-50 py-16">
        <div class="max-w-7xl mx-auto px-6">
            <div class="text-center max-w-3xl mx-auto mb-12">
                <h2 class="text-3xl font-extrabold text-gray-900 mb-4">Student Success Stories</h2>
                <p class="text-gray-600 text-lg">
                    Meet our graduates who have transformed their education into successful careers.
                </p>
            </div>

            <div class="grid gap-8 md:grid-cols-3">
                <!-- Testimonial Card -->
                <div class="bg-white rounded-lg shadow p-6">
                    <h3 class="text-xl font-semibold text-blue-700 mb-2">Rashid Abdala</h3>
                    <p class="italic text-gray-700 mb-2">Diploma in Electrical Engineering, Class of 2024</p>
                    <p class="text-gray-600 mb-4">
                        “Tetu TVC equipped me with practical skills that employers value. Within three months of
                        graduation, I secured a position at Kenya Power as a technician.”
                    </p>
                    <p class="font-semibold text-gray-800">Currently: Electrical Technician at Kenya Power</p>
                </div>

                <div class="bg-white rounded-lg shadow p-6">
                    <h3 class="text-xl font-semibold text-blue-700 mb-2">Grace Wanjiku</h3>
                    <p class="italic text-gray-700 mb-2">Certificate in Hospitality Management, Class of 2023</p>
                    <p class="text-gray-600 mb-4">
                        “The industry connections at Tetu TVC opened doors for me. Through the college's placement
                        program, I interned at Serena Hotel, which led to my current role.”
                    </p>
                    <p class="font-semibold text-gray-800">Currently: Assistant Manager at Serena Hotel</p>
                </div>

                <div class="bg-white rounded-lg shadow p-6">
                    <h3 class="text-xl font-semibold text-blue-700 mb-2">James Kiragu</h3>
                    <p class="italic text-gray-700 mb-2">Diploma in ICT, Class of 2023</p>
                    <p class="text-gray-600 mb-4">
                        “The entrepreneurship module alongside my technical training gave me the confidence to start my
                        own business. Today, my web development company employs three other Tetu TVC graduates.”
                    </p>
                    <p class="font-semibold text-gray-800">Currently: Software Engineer at Nyota Digital Solutions</p>
                </div>
            </div>

            <div class="text-center mt-12">
                <a href="#"
                    class="inline-block bg-blue-600 text-white font-semibold px-8 py-3 rounded-md shadow hover:bg-blue-700 transition">
                    View All Success Stories
                </a>
            </div>
        </div>
    </section>


    <section class="bg-white py-16">
        <div class="max-w-7xl mx-auto px-6 text-center">
            <h2 class="text-3xl font-extrabold text-gray-900 mb-8">Our Partners</h2>
            <div class="flex flex-wrap justify-center items-center gap-10">
                <img src="https://via.placeholder.com/150x80?text=Konza+Metropolis" alt="Konza Metropolis"
                    class="h-20 object-contain">
                <img src="https://via.placeholder.com/150x80?text=KNEC" alt="KNEC" class="h-20 object-contain">
                <img src="https://via.placeholder.com/150x80?text=NITA" alt="NITA" class="h-20 object-contain">
                <img src="https://via.placeholder.com/150x80?text=KATTI" alt="KATTI" class="h-20 object-contain">
                <img src="https://via.placeholder.com/150x80?text=CDACC" alt="CDACC" class="h-20 object-contain">
                <img src="https://via.placeholder.com/150x80?text=Ministry+of+Education" alt="Ministry of Education"
                    class="h-20 object-contain">
                <img src="https://via.placeholder.com/150x80?text=KUCCPS" alt="KUCCPS" class="h-20 object-contain">
                <img src="https://via.placeholder.com/150x80?text=HELB" alt="HELB" class="h-20 object-contain">
            </div>
        </div>
    </section>


</main>