<?php

use Livewire\Attributes\Title;
use Livewire\Attributes\Layout;
use Livewire\Component;
use App\Models\Institution;

new
#[Title("About Us")]
#[Layout('layouts::app')]
class extends Component
{
    public function with()
    {
        $institution = Institution::first() ?? (object) ['name' => 'Our College', 'motto' => 'Excellence in Technical Education', 'vision' => 'To be a center of excellence in technical and vocational education.', 'mission' => 'To provide quality technical education.', 'established_year' => '2019'];

        return [
            'institution' => $institution,
            'stats' => [
                ['value' => '500', 'suffix' => '+', 'label' => 'Students Enrolled', 'icon' => 'fa-user-graduate'],
                ['value' => '15', 'suffix' => '+', 'label' => 'Technical Programs', 'icon' => 'fa-book'],
                ['value' => '30', 'suffix' => '+', 'label' => 'Qualified Instructors', 'icon' => 'fa-chalkboard-teacher'],
                ['value' => '85', 'suffix' => '%', 'label' => 'Graduate Employment', 'icon' => 'fa-briefcase'],
            ],
            'values' => [
                ['title' => 'Excellence', 'desc' => 'Pursuing the highest standards in all our academic and operational activities.', 'icon' => 'fa-check-circle'],
                ['title' => 'Integrity', 'desc' => 'Upholding honesty, transparency and ethical conduct in all our actions.', 'icon' => 'fa-user-shield'],
                ['title' => 'Innovation', 'desc' => 'Embracing creativity and forward-thinking approaches to educational challenges.', 'icon' => 'fa-lightbulb'],
                ['title' => 'Inclusivity', 'desc' => 'Fostering a diverse and inclusive environment where all individuals can thrive.', 'icon' => 'fa-globe-africa'],
            ],
            'timeline' => [
                ['year' => 'March 2019', 'title' => 'Establishment', 'desc' => 'Establishment of ' . ($institution->name ?? 'Our Institution') . ' through collaboration between the National Government and Tetu NG CDF.'],
                ['year' => '2019-2020', 'title' => 'Initial Growth', 'desc' => 'Growth from initial enrollment of 89 students to become a recognized institution for technical education in the region.'],
                ['year' => 'February 2022', 'title' => 'Strategic Plan', 'desc' => 'Launch of our Strategic Plan (2020-2025) aligning with MoE and TVETA strategic objectives for institutional excellence.'],
                ['year' => 'Present Day', 'title' => 'Continued Excellence', 'desc' => 'Continuing our mission of community engagement, environmental initiatives, and developing industry-aligned technical education.'],
            ],
            'impact' => [
                ['title' => 'Economic Development', 'desc' => 'Providing employment opportunities for local professionals and sourcing produce from local farmers to support the community economy.', 'icon' => 'fa-chart-line'],
                ['title' => 'Environmental Initiatives', 'desc' => 'Promoting sustainable practices through tree seedling distribution and educational programs on environmental conservation.', 'icon' => 'fa-leaf'],
                ['title' => 'Agricultural Innovation', 'desc' => 'Encouraging avocado farming and other agricultural practices to enhance food security and create sustainable livelihoods.', 'icon' => 'fa-seedling'],
            ],
        ];
    }
};
?>

<main class="overflow-hidden">

    <!-- Hero Section with Parallax Effect -->
    <section class="relative clip-diagonal grain py-20 overflow-hidden bg-gray-900">
        <div class="absolute inset-0 z-0">
            <img src="{{ asset('images/gate.jpg') }}" alt="{{ $institution->name }} Campus"
                class="object-cover w-full h-full opacity-30">
            <div class="absolute inset-0 bg-gradient-to-b from-gray-900/70 to-gray-900/90"></div>
        </div>
        <div class="container relative z-10 px-4 mx-auto text-center">
            <span class="inline-block px-4 py-1.5 rounded-full bg-primary/20 text-primary text-xs font-bold tracking-widest uppercase mb-4" data-aos="fade-down">About Us</span>
            <h1 class="hero-display mb-4 text-4xl font-bold text-white md:text-5xl lg:text-6xl" data-aos="fade-up">{{ $institution->name }}</h1>
            <p class="max-w-2xl mx-auto text-lg text-gray-300 md:text-xl" data-aos="fade-up" data-aos-delay="100">Empowering futures through technical education excellence since 2019</p>
        </div>
    </section>

    <!-- Vision and Mission Section -->
    <section class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-4 lg:px-8">
            <div class="grid gap-12 lg:grid-cols-2 lg:items-center lg:gap-16">
                {{-- Content --}}
                <div data-aos="fade-right" class="order-2 lg:order-1">
                    <span class="inline-block px-3 py-1 rounded-full bg-primary/10 text-primary text-xs font-bold tracking-widest uppercase mb-3">Who We Are</span>
                    <h2 class="text-3xl lg:text-4xl font-extrabold text-gray-900 mb-6">Building the Future Through Technical Excellence</h2>

                    <div class="space-y-6">
                        <div class="p-5 border-l-4 border-primary bg-gray-50 rounded-r-lg" data-aos="fade-up" data-aos-delay="100">
                            <h3 class="text-lg font-bold text-gray-800 mb-2">Our Motto</h3>
                            <p class="text-gray-600">{{ $institution->motto }}</p>
                        </div>
                        <div class="p-5 border-l-4 border-primary bg-gray-50 rounded-r-lg" data-aos="fade-up" data-aos-delay="200">
                            <h3 class="text-lg font-bold text-gray-800 mb-2">Our Vision</h3>
                            <p class="text-gray-600">{{ $institution->vision }}</p>
                        </div>
                        <div class="p-5 border-l-4 border-primary bg-gray-50 rounded-r-lg" data-aos="fade-up" data-aos-delay="300">
                            <h3 class="text-lg font-bold text-gray-800 mb-2">Our Mission</h3>
                            <p class="text-gray-600">{{ $institution->mission }}</p>
                        </div>
                    </div>
                </div>

                {{-- Image --}}
                <div data-aos="fade-left" class="relative order-1 lg:order-2">
                    <div class="aspect-[4/3] rounded-2xl overflow-hidden shadow-xl">
                        <img src="{{ asset('images/gate.jpg') }}" alt="{{ $institution->name }} Campus"
                            class="object-cover w-full h-full">
                    </div>
                    <div class="absolute -bottom-4 -right-4 bg-primary text-white px-6 py-4 rounded-xl shadow-lg">
                        <div class="text-3xl font-bold">{{ $institution->established_year ?? '2019' }}</div>
                        <div class="text-xs font-semibold uppercase tracking-wider">Established</div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Core Values Section -->
    <section class="py-20 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 lg:px-8">
            <div class="mb-14 text-center" data-aos="fade-up">
                <span class="inline-block px-4 py-1.5 rounded-full bg-primary/10 text-primary text-xs font-bold tracking-widest uppercase mb-3">Our Values</span>
                <h2 class="text-3xl lg:text-4xl font-extrabold text-gray-900 mb-4">Core Values That Guide Us</h2>
                <p class="max-w-2xl mx-auto text-gray-500 text-base leading-relaxed">These principles define who we are and how we approach technical education.</p>
            </div>

            <div class="grid gap-6 md:grid-cols-2 lg:grid-cols-4">
                @foreach($values as $index => $value)
                <div data-aos="fade-up" data-aos-delay="{{ $index * 100 }}" class="group relative bg-white rounded-2xl overflow-hidden shadow-md hover:shadow-2xl transition-all duration-300 p-6 text-center">
                    <div class="w-14 h-14 rounded-xl bg-primary/10 flex items-center justify-center mx-auto mb-4 group-hover:bg-primary group-hover:scale-110 transition-all duration-300">
                        <i class="fas {{ $value['icon'] }} text-primary text-xl group-hover:text-white transition-all duration-300"></i>
                    </div>
                    <h3 class="text-lg font-bold text-gray-900 mb-2">{{ $value['title'] }}</h3>
                    <p class="text-gray-500 text-sm leading-relaxed">{{ $value['desc'] }}</p>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Statistics Section -->
    <section class="py-16 bg-white border-t border-b border-gray-100">
        <div class="max-w-7xl mx-auto px-4 lg:px-8">
            <div class="grid gap-6 md:grid-cols-2 lg:grid-cols-4">
                @foreach($stats as $index => $stat)
                <div data-aos="fade-up" data-aos-delay="{{ $index * 100 }}" class="flex items-center gap-4 p-5 bg-gray-50 rounded-2xl border border-gray-100 hover:border-primary/20 hover:shadow transition-all">
                    <div class="w-12 h-12 rounded-xl bg-primary flex items-center justify-center shrink-0">
                        <i class="fas {{ $stat['icon'] }} text-white text-lg"></i>
                    </div>
                    <div>
                        <div class="text-3xl font-extrabold text-gray-900 leading-none">
                            <span class="counter" data-target="{{ $stat['value'] }}">0</span>{{ $stat['suffix'] }}
                        </div>
                        <div class="text-gray-500 text-sm mt-0.5">{{ $stat['label'] }}</div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Our Journey Section with Timeline -->
    <section class="py-20 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 lg:px-8">
            <div class="mb-14 text-center" data-aos="fade-up">
                <span class="inline-block px-4 py-1.5 rounded-full bg-primary/10 text-primary text-xs font-bold tracking-widest uppercase mb-3">Our History</span>
                <h2 class="text-3xl lg:text-4xl font-extrabold text-gray-900 mb-4">Our Journey</h2>
                <p class="max-w-2xl mx-auto text-gray-500 text-base leading-relaxed">The story of how we grew from a vision to a leading TVET institution.</p>
            </div>

            <div class="relative">
                <div class="absolute w-1 h-full transform -translate-x-1/2 bg-orange-200 left-1/2 hidden md:block"></div>

                <div class="grid grid-cols-1 gap-8 md:grid-cols-2">
                    @foreach($timeline as $index => $item)
                    @if($index % 2 === 0)
                    <div data-aos="fade-right" class="relative md:col-start-1 md:text-right pr-8 md:pr-0 md:pr-8">
                        <div class="hidden md:block absolute right-0 top-6 w-4 h-4 transform translate-x-1/2 bg-primary rounded-full" style="right: -2px"></div>
                        <div class="p-6 bg-white rounded-xl shadow-md hover:shadow-lg transition-shadow">
                            <h3 class="text-xl font-bold text-primary mb-2">{{ $item['year'] }}</h3>
                            <h4 class="text-lg font-semibold text-gray-800 mb-2">{{ $item['title'] }}</h4>
                            <p class="text-gray-600 text-sm">{{ $item['desc'] }}</p>
                        </div>
                    </div>
                    <div class="hidden md:block"></div>
                    @else
                    <div class="hidden md:block"></div>
                    <div data-aos="fade-left" class="relative md:col-start-2 pl-8">
                        <div class="hidden md:block absolute left-0 top-6 w-4 h-4 transform -translate-x-1/2 bg-primary rounded-full" style="left: -2px"></div>
                        <div class="p-6 bg-white rounded-xl shadow-md hover:shadow-lg transition-shadow">
                            <h3 class="text-xl font-bold text-primary mb-2">{{ $item['year'] }}</h3>
                            <h4 class="text-lg font-semibold text-gray-800 mb-2">{{ $item['title'] }}</h4>
                            <p class="text-gray-600 text-sm">{{ $item['desc'] }}</p>
                        </div>
                    </div>
                    @endif
                    @endforeach
                </div>
            </div>
        </div>
    </section>

    <!-- Community Impact Section -->
    <section class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-4 lg:px-8">
            <div class="mb-14 text-center" data-aos="fade-up">
                <span class="inline-block px-4 py-1.5 rounded-full bg-primary/10 text-primary text-xs font-bold tracking-widest uppercase mb-3">Our Impact</span>
                <h2 class="text-3xl lg:text-4xl font-extrabold text-gray-900 mb-4">Community Impact</h2>
                <p class="max-w-2xl mx-auto text-gray-500 text-base leading-relaxed">How we're making a difference in our community and beyond.</p>
            </div>

            <div class="grid gap-6 md:grid-cols-3">
                @foreach($impact as $index => $item)
                <div data-aos="fade-up" data-aos-delay="{{ $index * 100 }}" class="group relative bg-white rounded-2xl overflow-hidden shadow-md hover:shadow-2xl transition-all duration-300 border border-gray-100 hover:border-primary/30">
                    <div class="h-2 bg-primary group-hover:h-3 transition-all duration-300"></div>
                    <div class="p-6">
                        <div class="w-12 h-12 rounded-xl bg-primary/10 flex items-center justify-center mb-4 group-hover:bg-primary group-hover:scale-110 transition-all duration-300">
                            <i class="fas {{ $item['icon'] }} text-primary text-xl group-hover:text-white transition-all duration-300"></i>
                        </div>
                        <h3 class="text-lg font-bold text-gray-900 mb-3">{{ $item['title'] }}</h3>
                        <p class="text-gray-500 text-sm leading-relaxed">{{ $item['desc'] }}</p>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- CTA Banner -->
    <section class="relative py-16 overflow-hidden bg-cyan-950" data-aos="fade-up" data-aos-duration="800">
        <div class="absolute inset-0 opacity-5" style="background-image: radial-gradient(circle, #fff 1px, transparent 1px); background-size: 30px 30px;"></div>
        <div class="absolute left-0 top-0 h-full w-1 bg-primary" data-aos="fade-left" data-aos-delay="300"></div>

        <div class="relative max-w-4xl mx-auto px-6 text-center">
            <h2 class="text-3xl lg:text-4xl font-extrabold text-white mb-4" data-aos="fade-up" data-aos-delay="100">
                Join Our <span class="text-primary">Technical Education Journey</span>
            </h2>
            <p class="text-gray-400 text-base mb-8 max-w-xl mx-auto leading-relaxed" data-aos="fade-up" data-aos-delay="200">
                {{ $institution->name }} is dedicated to providing equitable access to technical education, fostering innovation, and producing socially responsible graduates.
            </p>
            <div class="flex flex-wrap items-center justify-center gap-4" data-aos="zoom-in" data-aos-delay="300">
                <a href="{{ route('admissions') }}" class="inline-flex items-center gap-2 px-8 py-3.5 bg-primary text-white font-bold rounded-full shadow-lg shadow-primary/30 hover:brightness-110 transition-all">
                    Apply Now <i class="fas fa-arrow-right text-xs"></i>
                </a>
                <a href="{{ route('contact') }}" class="inline-flex items-center gap-2 px-8 py-3.5 bg-white/10 border border-white/20 text-white font-semibold rounded-full hover:bg-white/20 transition-all">
                    <i class="fas fa-envelope text-xs"></i> Contact Us
                </a>
            </div>
        </div>
    </section>

</main>
