<?php

use Livewire\Component;
use Livewire\Attributes\Title;
use Livewire\Attributes\Layout;
use App\Models\Department;
use App\Models\SuccessStory;
use App\Models\Partner;
use App\Models\HeroSlide;

new
#[Title('Welcome to Our College')]
#[Layout('layouts::app2')]
class extends Component {

    public function with()
    {
        return [
            'departments' => Department::all(),
            'successStories'=> SuccessStory::where('is_approved', true)
                                            ->latest()
                                            ->take(3)
                                            ->orderBy('created_at', 'desc')
                                            ->get(),
            'partners'=> Partner::all(),
            'heroSlides'=> HeroSlide::all(),
        ];
    }
};
?>

{{-- ═══════════════════════════════════════════════════════
PAGE STYLES (scoped to this view)
═══════════════════════════════════════════════════════ --}}
@push('styles')
<link
    href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,700;0,900;1,700&family=Plus+Jakarta+Sans:wght@300;400;500;600;700&display=swap"
    rel="stylesheet">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />

<style>
    /* ── Tokens ─────────────────────────────────── */
    :root {
        --red: #D63A00;
        --red-mid: #E8420A;
        --red-lt: #FF6940;
        --ink: #0D0D0D;
        --ink2: #1C1C1C;
        --paper: #FAF9F7;
        --paper2: #F3F0EB;
        --muted: #8A8078;
        --rule: rgba(0, 0, 0, .07);
        --serif: 'Playfair Display', Georgia, serif;
        --sans: 'Plus Jakarta Sans', sans-serif;
    }

    *,
    *::before,
    *::after {
        box-sizing: border-box
    }

    body {
        font-family: var(--sans);
        background: var(--paper);
        color: var(--ink);
        overflow-x: hidden
    }

    ::selection {
        background: var(--red);
        color: #fff
    }

    /* ── HERO ──────────────────────────────────── */
    .hero-wrap {
        position: relative;
        height: calc(100vh - 108px);
        min-height: 560px;
        overflow: hidden
    }

    .heroSwiper,
    .swiper-slide {
        height: 100% !important
    }

    .slide-bg {
        position: absolute;
        inset: 0;
        background: center/cover no-repeat;
        transform: scale(1.06);
        transition: transform 7s ease;
    }

    .swiper-slide-active .slide-bg {
        transform: scale(1)
    }

    .slide-overlay {
        position: absolute;
        inset: 0;
        background: linear-gradient(120deg, rgba(10, 6, 4, .82) 0%, rgba(0, 0, 0, .35) 100%);
    }

    .slide-noise {
        position: absolute;
        inset: 0;
        opacity: .04;
        background-image: url("data:image/svg+xml,%3Csvg viewBox='0 0 200 200' xmlns='http://www.w3.org/2000/svg'%3E%3Cfilter id='n'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='.9' numOctaves='4'/%3E%3C/filter%3E%3Crect width='100%25' height='100%25' filter='url(%23n)'/%3E%3C/svg%3E");
    }

    .slide-content {
        position: relative;
        display: flex;
        flex-direction: column;
        justify-content: center;
        height: 100%;
        padding: 0 clamp(24px, 6vw, 100px);
        max-width: 900px;
    }

    .slide-eyebrow {
        display: inline-flex;
        align-items: center;
        gap: 10px;
        font-size: 10px;
        font-weight: 700;
        letter-spacing: 2.5px;
        text-transform: uppercase;
        color: var(--red-lt);
        margin-bottom: 20px;
        opacity: 0;
        animation-name: fadeSlideUp;
        animation-fill-mode: forwards;
    }

    .slide-eyebrow::before {
        content: '';
        width: 28px;
        height: 1px;
        background: currentColor;
        opacity: .6
    }

    .slide-title {
        font-family: var(--serif);
        font-weight: 900;
        font-style: italic;
        font-size: clamp(40px, 7vw, 80px);
        line-height: 1.03;
        color: #fff;
        letter-spacing: -1.5px;
        margin-bottom: 16px;
        opacity: 0;
        animation-name: fadeSlideUp;
        animation-fill-mode: forwards;
        animation-delay: .15s;
    }

    .slide-sub {
        font-size: clamp(15px, 2vw, 19px);
        font-weight: 400;
        color: rgba(255, 255, 255, .55);
        max-width: 520px;
        line-height: 1.7;
        margin-bottom: 32px;
        opacity: 0;
        animation-name: fadeSlideUp;
        animation-fill-mode: forwards;
        animation-delay: .3s;
    }

    .slide-ctas {
        display: flex;
        gap: 12px;
        flex-wrap: wrap;
        opacity: 0;
        animation-name: fadeSlideUp;
        animation-fill-mode: forwards;
        animation-delay: .45s
    }

    @keyframes fadeSlideUp {
        from {
            opacity: 0;
            transform: translateY(24px)
        }

        to {
            opacity: 1;
            transform: none
        }
    }

    .btn-hero-p,
    .btn-hero-s {
        display: inline-flex;
        align-items: center;
        gap: 9px;
        padding: 13px 28px;
        border-radius: 100px;
        font-size: 12px;
        font-weight: 700;
        letter-spacing: .1em;
        text-transform: uppercase;
        text-decoration: none;
        transition: .22s
    }

    .btn-hero-p {
        background: var(--red);
        color: #fff;
        box-shadow: 0 8px 32px rgba(214, 58, 0, .45)
    }

    .btn-hero-p:hover {
        background: var(--red-mid);
        transform: translateY(-2px);
        box-shadow: 0 14px 40px rgba(214, 58, 0, .5)
    }

    .btn-hero-s {
        background: rgba(255, 255, 255, .1);
        color: rgba(255, 255, 255, .8);
        border: 1px solid rgba(255, 255, 255, .18);
        backdrop-filter: blur(6px)
    }

    .btn-hero-s:hover {
        background: rgba(255, 255, 255, .18);
        color: #fff;
        transform: translateY(-2px)
    }

    /* Swiper nav overrides */
    .swiper-button-prev,
    .swiper-button-next {
        width: 44px !important;
        height: 44px !important;
        border-radius: 50%;
        background: rgba(255, 255, 255, .12) !important;
        border: 1px solid rgba(255, 255, 255, .2) !important;
        backdrop-filter: blur(8px);
        color: #fff !important;
        transition: .2s;
    }

    .swiper-button-prev::after,
    .swiper-button-next::after {
        font-size: 14px !important;
        font-weight: 700
    }

    .swiper-button-prev:hover,
    .swiper-button-next:hover {
        background: var(--red) !important;
        border-color: var(--red) !important
    }

    .swiper-pagination-bullet {
        width: 6px !important;
        height: 6px !important;
        background: rgba(255, 255, 255, .4) !important;
        opacity: 1 !important
    }

    .swiper-pagination-bullet-active {
        width: 24px !important;
        border-radius: 3px !important;
        background: var(--red) !important
    }

    /* ── WELCOME BENTO ──────────────────────────── */
    .bento-grid {
        display: grid;
        grid-template-columns: 1fr 1fr;
        grid-template-rows: auto auto;
        gap: 20px
    }

    .bento-principal {
        grid-column: 1;
        grid-row: 1/3
    }

    .bento-card {
        border-radius: 20px;
        overflow: hidden;
        position: relative
    }

    .principal-card {
        background: #fff;
        border: 1px solid var(--rule);
        padding: 36px 32px;
        display: flex;
        flex-direction: column;
        align-items: center;
        text-align: center;
        height: 100%;
    }

    .principal-photo-ring {
        width: 120px;
        height: 120px;
        border-radius: 50%;
        background: linear-gradient(135deg, var(--red), var(--red-lt));
        padding: 3px;
        margin-bottom: 20px;
        flex-shrink: 0;
    }

    .principal-photo-ring img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        border-radius: 50%;
        border: 3px solid #fff
    }

    .principal-name {
        font-family: var(--serif);
        font-size: 20px;
        font-weight: 700;
        color: var(--ink);
        margin-bottom: 4px
    }

    .principal-title {
        font-size: 11px;
        font-weight: 700;
        letter-spacing: 1.5px;
        text-transform: uppercase;
        color: var(--red);
        margin-bottom: 16px
    }

    .principal-msg {
        font-size: 14px;
        color: #666;
        line-height: 1.75;
        flex: 1
    }

    .bento-action-card {
        background: var(--ink2);
        color: #fff;
        padding: 32px 28px;
        display: flex;
        flex-direction: column;
        justify-content: space-between;
    }

    .bento-admit-card {
        background: linear-gradient(135deg, #1d4ed8, #1e40af);
        color: #fff;
        padding: 28px;
        display: flex;
        flex-direction: column;
        justify-content: space-between;
    }

    .bento-res-card {
        background: linear-gradient(135deg, #15803d, #166534);
        color: #fff;
        padding: 28px;
        display: flex;
        flex-direction: column;
        justify-content: space-between;
    }

    .bento-prog-card {
        grid-column: 1/3;
        background: linear-gradient(135deg, var(--red), #7c1a00);
        color: #fff;
        padding: 36px 40px;
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 24px;
    }

    .bento-icon-wrap {
        width: 48px;
        height: 48px;
        border-radius: 12px;
        background: rgba(255, 255, 255, .15);
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 20px;
        margin-bottom: 14px;
    }

    .bento-label {
        font-size: 9px;
        font-weight: 700;
        letter-spacing: 2px;
        text-transform: uppercase;
        opacity: .55;
        margin-bottom: 6px
    }

    .bento-title {
        font-family: var(--serif);
        font-size: 22px;
        font-weight: 700;
        margin-bottom: 8px;
        line-height: 1.2
    }

    .bento-desc {
        font-size: 13.5px;
        opacity: .72;
        line-height: 1.65;
        margin-bottom: 16px
    }

    .btn-bento {
        display: inline-flex;
        align-items: center;
        gap: 7px;
        padding: 10px 20px;
        border-radius: 100px;
        font-size: 11.5px;
        font-weight: 700;
        letter-spacing: .07em;
        text-transform: uppercase;
        text-decoration: none;
        background: #fff;
        transition: .2s;
        white-space: nowrap;
        align-self: flex-start;
    }

    .btn-bento.blue {
        color: #1d4ed8
    }

    .btn-bento.green {
        color: #15803d
    }

    .btn-bento.red {
        color: var(--red)
    }

    .btn-bento.dark {
        color: var(--ink)
    }

    .btn-bento:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 24px rgba(0, 0, 0, .2)
    }

    .btn-outline-white {
        display: inline-flex;
        align-items: center;
        gap: 7px;
        padding: 11px 24px;
        border-radius: 100px;
        font-size: 11.5px;
        font-weight: 700;
        letter-spacing: .07em;
        text-transform: uppercase;
        text-decoration: none;
        border: 1px solid rgba(255, 255, 255, .3);
        color: #fff;
        transition: .2s;
    }

    .btn-outline-white:hover {
        background: rgba(255, 255, 255, .12);
        transform: translateY(-1px)
    }

    /* ── SECTION HEADER ─────────────────────────── */
    .sec-header {
        text-align: center;
        margin-bottom: 64px
    }

    .sec-eyebrow {
        display: inline-flex;
        align-items: center;
        gap: 10px;
        font-size: 10px;
        font-weight: 700;
        letter-spacing: 2.5px;
        text-transform: uppercase;
        color: var(--red);
        margin-bottom: 12px;
    }

    .sec-eyebrow::before,
    .sec-eyebrow::after {
        content: '';
        width: 20px;
        height: 1px;
        background: var(--red);
        opacity: .5
    }

    .sec-title {
        font-family: var(--serif);
        font-size: clamp(30px, 4vw, 46px);
        font-weight: 900;
        color: var(--ink);
        letter-spacing: -1px;
        line-height: 1.1;
        margin-bottom: 14px
    }

    .sec-title em {
        font-style: italic;
        color: var(--red)
    }

    .sec-desc {
        font-size: 15px;
        color: var(--muted);
        max-width: 560px;
        margin: 0 auto;
        line-height: 1.75
    }

    /* ── DEPARTMENTS ────────────────────────────── */
    .dept-grid {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 20px
    }

    .dept-card {
        border-radius: 20px;
        overflow: hidden;
        background: #fff;
        border: 1px solid var(--rule);
        transition: box-shadow .3s, transform .3s;
        display: flex;
        flex-direction: column;
    }

    .dept-card:hover {
        box-shadow: 0 20px 60px rgba(0, 0, 0, .12);
        transform: translateY(-4px)
    }

    .dept-img {
        position: relative;
        height: 220px;
        overflow: hidden
    }

    .dept-img img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform .6s ease
    }

    .dept-card:hover .dept-img img {
        transform: scale(1.07)
    }

    .dept-img-overlay {
        position: absolute;
        inset: 0;
        background: linear-gradient(to top, rgba(0, 0, 0, .65) 0%, transparent 55%);
        opacity: 0;
        transition: opacity .3s;
    }

    .dept-card:hover .dept-img-overlay {
        opacity: 1
    }

    .dept-tag {
        position: absolute;
        top: 14px;
        left: 14px;
        background: var(--red);
        color: #fff;
        font-size: 9.5px;
        font-weight: 700;
        letter-spacing: 1.5px;
        text-transform: uppercase;
        padding: 4px 10px;
        border-radius: 100px;
    }

    .dept-body {
        padding: 22px 24px 24px;
        flex: 1;
        display: flex;
        flex-direction: column
    }

    .dept-name {
        font-family: var(--serif);
        font-size: 20px;
        font-weight: 700;
        color: var(--ink);
        margin-bottom: 8px;
        line-height: 1.2
    }

    .dept-desc {
        font-size: 13.5px;
        color: var(--muted);
        line-height: 1.7;
        flex: 1;
        margin-bottom: 18px;
        display: -webkit-box;
        -webkit-line-clamp: 3;
        -webkit-box-orient: vertical;
        overflow: hidden
    }

    .dept-link {
        display: inline-flex;
        align-items: center;
        gap: 7px;
        font-size: 12px;
        font-weight: 700;
        letter-spacing: .05em;
        text-transform: uppercase;
        color: var(--red);
        text-decoration: none;
        transition: gap .2s, color .2s;
    }

    .dept-link:hover {
        gap: 12px
    }

    .dept-cta-card {
        border-radius: 20px;
        background: var(--ink2);
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        text-align: center;
        padding: 40px 32px;
    }

    /* ── STORIES ────────────────────────────────── */
    .stories-grid {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 24px;
        margin-bottom: 64px
    }

    .story-card {
        background: #fff;
        border: 1px solid var(--rule);
        border-radius: 20px;
        padding: 40px 28px 28px;
        position: relative;
        display: flex;
        flex-direction: column;
        transition: box-shadow .3s, transform .3s;
    }

    .story-card:hover {
        box-shadow: 0 16px 50px rgba(0, 0, 0, .1);
        transform: translateY(-3px)
    }

    .story-avatar-ring {
        position: absolute;
        top: -28px;
        left: 50%;
        transform: translateX(-50%);
        width: 56px;
        height: 56px;
        border-radius: 50%;
        background: linear-gradient(135deg, var(--red), var(--red-lt));
        padding: 3px;
    }

    .story-avatar-ring img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        border-radius: 50%;
        border: 2px solid #fff
    }

    .story-name {
        font-family: var(--serif);
        font-size: 18px;
        font-weight: 700;
        color: var(--ink);
        text-align: center;
        margin-bottom: 4px
    }

    .story-meta {
        font-size: 11.5px;
        font-weight: 600;
        color: var(--red);
        text-align: center;
        margin-bottom: 10px;
        letter-spacing: .02em
    }

    .story-stars {
        display: flex;
        justify-content: center;
        gap: 3px;
        color: var(--red);
        font-size: 11px;
        margin-bottom: 18px
    }

    .story-quote {
        font-size: 13.5px;
        color: #666;
        line-height: 1.75;
        text-align: center;
        flex: 1;
        font-style: italic
    }

    .story-occupation {
        font-size: 12.5px;
        font-weight: 600;
        color: #444;
        text-align: center;
        margin-top: 16px;
        padding-top: 14px;
        border-top: 1px solid var(--rule)
    }

    .story-occupation span {
        color: #16a34a
    }

    /* ── STATS ──────────────────────────────────── */
    .stats-grid {
        display: grid;
        grid-template-columns: repeat(4, 1fr);
        gap: 1px;
        background: var(--rule);
        border-radius: 24px;
        overflow: hidden
    }

    .stat-cell {
        background: var(--paper2);
        padding: 40px 24px;
        text-align: center;
        transition: background .2s;
    }

    .stat-cell:hover {
        background: #fff
    }

    .stat-icon {
        width: 52px;
        height: 52px;
        border-radius: 14px;
        background: linear-gradient(135deg, var(--red), var(--red-lt));
        display: flex;
        align-items: center;
        justify-content: center;
        color: #fff;
        font-size: 20px;
        margin: 0 auto 16px;
    }

    .stat-num {
        font-family: var(--serif);
        font-size: 46px;
        font-weight: 900;
        color: var(--ink);
        line-height: 1;
        margin-bottom: 6px
    }

    .stat-label {
        font-size: 12.5px;
        font-weight: 600;
        color: var(--muted);
        letter-spacing: .04em
    }

    /* ── PARTNERS ───────────────────────────────── */
    .partners-grid {
        display: grid;
        grid-template-columns: repeat(6, 1fr);
        gap: 16px
    }

    .partner-card {
        background: #fff;
        border: 1px solid var(--rule);
        border-radius: 14px;
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 24px 16px;
        transition: box-shadow .2s, transform .2s;
    }

    .partner-card:hover {
        box-shadow: 0 8px 28px rgba(0, 0, 0, .08);
        transform: translateY(-2px)
    }

    .partner-card img {
        height: 48px;
        max-width: 100%;
        object-fit: contain;
        filter: grayscale(100%);
        opacity: .55;
        transition: filter .3s, opacity .3s
    }

    .partner-card:hover img {
        filter: none;
        opacity: 1
    }

    /* ── UTIL ───────────────────────────────────── */
    .section-pad {
        padding: 100px 0
    }

    .container-lg {
        max-width: 1240px;
        margin: 0 auto;
        padding: 0 28px
    }

    .mt-section {
        margin-top: 64px
    }

    .view-all-btn {
        display: inline-flex;
        align-items: center;
        gap: 9px;
        padding: 13px 30px;
        border-radius: 100px;
        background: var(--red);
        color: #fff;
        font-size: 12px;
        font-weight: 700;
        letter-spacing: .1em;
        text-transform: uppercase;
        text-decoration: none;
        transition: .22s;
        box-shadow: 0 6px 24px rgba(214, 58, 0, .35);
    }

    .view-all-btn:hover {
        background: var(--red-mid);
        transform: translateY(-2px);
        box-shadow: 0 12px 32px rgba(214, 58, 0, .45)
    }

    /* ── RESPONSIVE ─────────────────────────────── */
    @media(max-width:960px) {
        .bento-grid {
            grid-template-columns: 1fr
        }

        .bento-principal {
            grid-row: auto
        }

        .bento-prog-card {
            grid-column: 1;
            flex-direction: column
        }

        .dept-grid {
            grid-template-columns: repeat(2, 1fr)
        }

        .stories-grid {
            grid-template-columns: 1fr
        }

        .stats-grid {
            grid-template-columns: repeat(2, 1fr)
        }

        .partners-grid {
            grid-template-columns: repeat(3, 1fr)
        }
    }

    @media(max-width:640px) {
        .dept-grid {
            grid-template-columns: 1fr
        }

        .stats-grid {
            grid-template-columns: 1fr
        }

        .partners-grid {
            grid-template-columns: repeat(2, 1fr)
        }

        .slide-content {
            padding: 0 20px
        }
    }
</style>
@endpush

<main>

    {{-- ════════════════════════════════════════════════
    HERO
    ════════════════════════════════════════════════ --}}
    <section class="hero-wrap">
        <div class="heroSwiper swiper h-full">
            <div class="swiper-wrapper">

                @forelse ($heroSlides as $slide)
                <div class="swiper-slide">
                    <div class="slide-bg" style="background-image:url('{{ asset('storage/'.$slide->image) }}')"></div>
                    <div class="slide-overlay"></div>
                    <div class="slide-noise"></div>
                    <div class="slide-content">
                        <div class="slide-eyebrow" style="animation-duration:.6s">
                            {{ $institution->name ?? 'TETU TVC' }}
                        </div>
                        <h1 class="slide-title" style="animation-duration:.6s">{{ $slide->title }}</h1>
                        @if($slide->subtitle)
                        <p class="slide-sub" style="animation-duration:.6s">{{ $slide->subtitle }}</p>
                        @endif
                        <div class="slide-ctas" style="animation-duration:.6s">
                            <a href="{{ route('admissions') }}" class="btn-hero-p">
                                <i class="fas fa-pen-to-square" style="font-size:10px"></i>
                                {{ $slide->button_text ?? 'Apply Now' }}
                            </a>
                            <a href="{{ route('courses') }}" class="btn-hero-s">
                                <i class="fas fa-book-open" style="font-size:10px"></i>
                                Explore Courses
                            </a>
                        </div>
                    </div>
                </div>

                @empty
                {{-- fallback --}}
                @foreach([1,2] as $i)
                <div class="swiper-slide">
                    <div class="slide-bg" style="background-image:url('{{ asset('images/default-hero.webp') }}')"></div>
                    <div class="slide-overlay"></div>
                    <div class="slide-noise"></div>
                    <div class="slide-content">
                        <div class="slide-eyebrow" style="animation-duration:.6s">Tetu Sub-County, Nyeri County</div>
                        <h1 class="slide-title" style="animation-duration:.6s">
                            Quality Vocational<br>Education
                        </h1>
                        <p class="slide-sub" style="animation-duration:.6s">
                            Empowering students with practical skills for meaningful, lasting careers.
                        </p>
                        <div class="slide-ctas" style="animation-duration:.6s">
                            <a href="{{ route('admissions') }}" class="btn-hero-p">
                                <i class="fas fa-pen-to-square" style="font-size:10px"></i> Apply Now
                            </a>
                            <a href="{{ route('courses') }}" class="btn-hero-s">
                                <i class="fas fa-book-open" style="font-size:10px"></i> Explore Courses
                            </a>
                        </div>
                    </div>
                </div>
                @endforeach
                @endforelse

            </div>
            <div class="swiper-pagination"></div>
            <div class="swiper-button-prev hidden md:flex"></div>
            <div class="swiper-button-next hidden md:flex"></div>
        </div>
    </section>


    {{-- ════════════════════════════════════════════════
    PRINCIPAL + QUICK LINKS (ANNOUNCEMENTS AND UPDATES LIST OF LINKS)
    ════════════════════════════════════════════════ --}}
    <section class="section-pad" style="background:var(--paper)">
        <div class="container-lg">
            <div class="bento-grid">

                {{-- Principal Message Card --}}
                <div class="bento-card bento-principal principal-card" data-aos="fade-right" data-aos-duration="700">
                    <p class="bento-label">From the Principal's Desk</p>
                    <div class="principal-photo-ring">
                        @if($institution->principal_photo)
                        <img src="{{ asset('storage/'.$institution->principal_photo) }}" alt="Principal">
                        @else
                        <img src="{{ asset('images/default-avatar.jpg') }}" alt="Principal">
                        @endif
                    </div>
                    <h3 class="principal-name">{{ $institution->principal_name ?? 'Principal' }}</h3>
                    <p class="principal-title">College Principal</p>
                    <p class="principal-msg">
                        {{ $institution->welcome_message ?? 'Welcome to our institution. We are committed to providing
                        quality vocational education that empowers our students for meaningful careers.' }}
                    </p>
                    <a href="{{ route('staff.members') }}" class="view-all-btn mt-8"
                        style="font-size:11px;padding:11px 24px">
                        Meet Our Team <i class="fas fa-arrow-right" style="font-size:10px"></i>
                    </a>
                </div>

                {{-- Announcements --}}
                <div style="">

                    {{-- add anouncements and updates links (include icons) here --}}


                </div>
            </div>
        </div>
    </section>


    {{-- ════════════════════════════════════════════════
    DEPARTMENTS
    ════════════════════════════════════════════════ --}}
    <section class="section-pad" style="background:#fff">
        <div class="container-lg">
            <div class="sec-header">
                <div class="sec-eyebrow">Academic Departments</div>
                <h2 class="sec-title">Where Skills Meet <em>Passion</em></h2>
                <p class="sec-desc">Explore our outstanding departments — each designed to deliver industry-relevant
                    skills and open pathways to rewarding careers.</p>
            </div>

            <div class="dept-grid">
                @foreach ($departments as $department)
                <div class="dept-card" data-aos="fade-up" data-aos-duration="700"
                    data-aos-delay="{{ $loop->index * 80 }}">
                    <div class="dept-img">
                        <img src="{{ asset('storage/'.$department->photo) }}" alt="{{ $department->name }}">
                        <div class="dept-img-overlay"></div>
                        <span class="dept-tag">{{ $department->name }}</span>
                    </div>
                    <div class="dept-body">
                        <h3 class="dept-name">{{ $department->name }}</h3>
                        <p class="dept-desc">{{ $department->short_desc }}</p>
                        <a href="{{ route('department', $department->slug) }}" class="dept-link">
                            Explore <i class="fas fa-arrow-right" style="font-size:10px"></i>
                        </a>
                    </div>
                </div>
                @endforeach

                {{-- CTA tile --}}
                <div class="dept-cta-card" data-aos="fade-up" data-aos-duration="700"
                    data-aos-delay="{{ count($departments) * 80 }}">
                    <div
                        style="width:64px;height:64px;border-radius:18px;background:rgba(214,58,0,.15);display:flex;align-items:center;justify-content:center;margin:0 auto 20px;font-size:26px;color:var(--red-lt)">
                        <i class="fas fa-layer-group"></i>
                    </div>
                    <h3 style="font-family:var(--serif);font-size:24px;font-weight:700;color:#fff;margin-bottom:12px">
                        All Departments</h3>
                    <p style="font-size:14px;color:rgba(255,255,255,.5);line-height:1.7;margin-bottom:24px">
                        Browse every department and discover the programme that's right for your career goals.
                    </p>
                    <a href="{{ route('departments') }}" class="view-all-btn" style="font-size:11px;padding:11px 24px">
                        View All <i class="fas fa-arrow-right" style="font-size:10px"></i>
                    </a>
                </div>
            </div>
        </div>
    </section>


    {{-- ════════════════════════════════════════════════
    SUCCESS STORIES + STATS
    ════════════════════════════════════════════════ --}}
    <section class="section-pad" style="background:var(--paper)">
        <div class="container-lg">
            <div class="sec-header">
                <div class="sec-eyebrow">Graduate Voices</div>
                <h2 class="sec-title">Stories of <em>Transformation</em></h2>
                <p class="sec-desc">Meet graduates who turned their education into thriving careers. Their journeys
                    prove what's possible.</p>
            </div>

            <div class="stories-grid" style="margin-top:56px">
                @foreach ($successStories as $story)
                <div class="story-card" data-aos="fade-up" data-aos-duration="700"
                    data-aos-delay="{{ $loop->index * 100 }}">
                    <div class="story-avatar-ring">
                        <img src="{{ $story->photo ? asset('storage/'.$story->photo) : asset('images/default-avatar.jpg') }}"
                            alt="{{ $story->name }}">
                    </div>
                    <h4 class="story-name">{{ $story->name }}</h4>
                    <p class="story-meta">{{ $story->course }} · Class of {{ $story->year }}</p>
                    <div class="story-stars">
                        @for($i=0;$i<$story->rating;$i++)<i class="fas fa-star"></i>@endfor
                            @for($i=0;$i<5-$story->rating;$i++)<i class="far fa-star"></i>@endfor
                    </div>
                    <p class="story-quote">"{{ $story->statement }}"</p>
                    <p class="story-occupation">
                        Currently: <span>{{ $story->occupation }} @ {{ $story->company }}</span>
                    </p>
                </div>
                @endforeach
            </div>

            <div style="text-align:center;margin-bottom:80px">
                <a href="{{ route('success.stories') }}" class="view-all-btn">
                    All Success Stories <i class="fas fa-arrow-right" style="font-size:10px"></i>
                </a>
            </div>

            {{-- Stats ─────────────────────────── --}}
            <div class="stats-grid" data-aos="fade-up" data-aos-duration="800">
                <div class="stat-cell">
                    <div class="stat-icon"><i class="fas fa-graduation-cap"></i></div>
                    <div class="stat-num"><span class="counter" data-target="92">0</span>%</div>
                    <div class="stat-label">Graduation Rate</div>
                </div>
                <div class="stat-cell">
                    <div class="stat-icon"><i class="fas fa-briefcase"></i></div>
                    <div class="stat-num"><span class="counter" data-target="85">0</span>%</div>
                    <div class="stat-label">Job Placement Rate</div>
                </div>
                <div class="stat-cell">
                    <div class="stat-icon"><i class="fas fa-handshake"></i></div>
                    <div class="stat-num"><span class="counter" data-target="78">0</span>+</div>
                    <div class="stat-label">Industry Partners</div>
                </div>
                <div class="stat-cell">
                    <div class="stat-icon"><i class="fas fa-award"></i></div>
                    <div class="stat-num"><span class="counter" data-target="120">0</span>+</div>
                    <div class="stat-label">Certifications Awarded</div>
                </div>
            </div>
        </div>
    </section>


    {{-- ════════════════════════════════════════════════
    PARTNERS
    ════════════════════════════════════════════════ --}}
    <section class="section-pad" style="background:#fff;border-top:1px solid var(--rule)">
        <div class="container-lg">
            <div class="sec-header">
                <div class="sec-eyebrow">Trusted By</div>
                <h2 class="sec-title">Our <em>Partners</em></h2>
                <p class="sec-desc">Partnerships with industry leaders and authorities ensure our programmes are always
                    cutting-edge and our graduates ready for the workforce.</p>
            </div>

            <div class="partners-grid">
                @foreach ($partners as $partner)
                <div class="partner-card" title="{{ $partner->name }}" data-aos="fade-up" data-aos-duration="600"
                    data-aos-delay="{{ $loop->index * 50 }}">
                    <img src="{{ asset('storage/'.$partner->logo) }}" alt="{{ $partner->name }}">
                </div>
                @endforeach
            </div>
        </div>
    </section>


    {{-- ════════════════════════════════════════════════
    SCRIPTS
    ════════════════════════════════════════════════ --}}
    @push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script>
        // Hero swiper
const heroSwiper = new Swiper('.heroSwiper', {
  loop: true,
  speed: 900,
  autoplay: { delay: 6000, disableOnInteraction: false },
  pagination: { el: '.swiper-pagination', clickable: true },
  navigation: { nextEl: '.swiper-button-next', prevEl: '.swiper-button-prev' },
  on: {
    slideChangeTransitionStart() {
      // re-trigger slide animations
      document.querySelectorAll('.slide-eyebrow,.slide-title,.slide-sub,.slide-ctas').forEach(el => {
        el.style.opacity = '0';
        el.style.transform = 'translateY(24px)';
        el.style.animationName = 'none';
        void el.offsetWidth;
        el.style.animationName = '';
        el.style.animationDuration = '.6s';
      });
    }
  }
});

// Counter animation (IntersectionObserver)
document.querySelectorAll('.counter').forEach(el => {
  const target = +el.dataset.target;
  const observer = new IntersectionObserver(entries => {
    entries.forEach(entry => {
      if (!entry.isIntersecting) return;
      observer.unobserve(entry.target);
      let current = 0;
      const step = target / 80;
      const tick = () => {
        current = Math.min(current + step, target);
        el.textContent = Math.ceil(current);
        if (current < target) requestAnimationFrame(tick);
      };
      tick();
    });
  }, { threshold: 0.5 });
  observer.observe(el);
});
    </script>
    @endpush

</main>
