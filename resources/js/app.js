import './bootstrap';


document.addEventListener('DOMContentLoaded', function () {

// left sliding drawer + overlay
const drawer = document.getElementById('mobile-drawer');
const overlay = document.getElementById('drawer-overlay');
const openBtn = document.getElementById('menu-drawer-btn');
const closeBtn = document.getElementById('close-drawer-btn');

function openDrawer() {
    drawer.classList.add('open');
    overlay.classList.add('open');
    document.body.classList.add('drawer-open');
}

function closeDrawer() {
    drawer.classList.remove('open');
    overlay.classList.remove('open');
    document.body.classList.remove('drawer-open');
}
openBtn?.addEventListener('click', openDrawer);
closeBtn?.addEventListener('click', closeDrawer);
overlay?.addEventListener('click', closeDrawer);
document.querySelectorAll('#mobile-drawer a').forEach(link => {
    link.addEventListener('click', closeDrawer);
});
// navbar scroll effect
const navbar = document.getElementById('navbar');
window.addEventListener('scroll', () => {
    if (window.scrollY > 10) navbar.classList.add('scrolled');
    else navbar.classList.remove('scrolled');
});
// scroll reveal
const revealEls = document.querySelectorAll('.reveal');
const observer = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
        if (entry.isIntersecting) {
            entry.target.classList.add('visible');
            observer.unobserve(entry.target);
        }
    });
}, {
    threshold: 0.1
});
revealEls.forEach(el => observer.observe(el));
// smooth anchor
document.querySelectorAll('a[href^="#"]').forEach(anchor => {
    anchor.addEventListener('click', function(e) {
        const target = document.querySelector(this.getAttribute('href'));
        if (target && this.getAttribute('href').length > 1) {
            e.preventDefault();
            target.scrollIntoView({
                behavior: 'smooth'
            });
            closeDrawer();
        }
    });
});



//  Counter Script
    document.querySelectorAll('.counter').forEach(counter => {
        const observer = new IntersectionObserver(entries => {
            entries.forEach(entry => {
                if (!entry.isIntersecting) return;
                const target = +counter.getAttribute('data-target');
                const duration = 1800;
                const step = Math.ceil(target / (duration / 16));
                let current = 0;
                const tick = () => {
                    current = Math.min(current + step, target);
                    counter.textContent = current;
                    if (current < target) requestAnimationFrame(tick);
                };
                requestAnimationFrame(tick);
                observer.unobserve(counter);
            });
        }, { threshold: 0.5 });
        observer.observe(counter);
    });




    // ── AOS ──────────────────────────────────
    AOS.init({ duration: 900, once: true, easing: 'ease-out-cubic' });

});


// Service Charter Language Switcher
window.switchCharter = function(lang) {
    const enContent = document.getElementById('en-content');
    const swContent = document.getElementById('sw-content');
    const charterImage = document.getElementById('charter-image');
    const btnEn = document.getElementById('btn-en');
    const btnSw = document.getElementById('btn-sw');

    if (lang === 'en') {
        enContent?.classList.remove('hidden');
        swContent?.classList.add('hidden');
        if (charterImage) charterImage.src = '/images/placeholders/service-charter-en.jpg';
        if (btnEn) {
            btnEn.classList.add('bg-primary', 'text-white');
            btnEn.classList.remove('bg-gray-200', 'text-gray-600');
        }
        if (btnSw) {
            btnSw.classList.remove('bg-primary', 'text-white');
            btnSw.classList.add('bg-gray-200', 'text-gray-600');
        }
    } else {
        enContent?.classList.add('hidden');
        swContent?.classList.remove('hidden');
        if (charterImage) charterImage.src = '/images/placeholders/service-charter-sw.jpg';
        if (btnSw) {
            btnSw.classList.add('bg-primary', 'text-white');
            btnSw.classList.remove('bg-gray-200', 'text-gray-600');
        }
        if (btnEn) {
            btnEn.classList.remove('bg-primary', 'text-white');
            btnEn.classList.add('bg-gray-200', 'text-gray-600');
        }
    }
};

// Hero Swiper Slider
function initHeroSwiper() {
    const heroSwiperEl = document.querySelector('.heroSwiper');
    if (!heroSwiperEl || typeof Swiper === 'undefined') return;

    const existingSwiper = heroSwiperEl.swiper;
    if (existingSwiper) {
        existingSwiper.destroy(true, true);
    }

    const swiper = new Swiper('.heroSwiper', {
        loop: true,
        autoplay: {
            delay: 5000,
            disableOnInteraction: false,
        },
        navigation: {
            nextEl: '.hero-next',
            prevEl: '.hero-prev',
        },
        effect: 'fade',
        fadeEffect: {
            crossFade: true
        }
    });

    const pauseBtn = document.getElementById('heroPauseBtn');
    if (pauseBtn) {
        pauseBtn.onclick = function() {
            if (swiper.autoplay.running) {
                swiper.autoplay.stop();
                this.querySelector('.pause-icon').classList.add('hidden');
                this.querySelector('.play-icon').classList.remove('hidden');
            } else {
                swiper.autoplay.start();
                this.querySelector('.pause-icon').classList.remove('hidden');
                this.querySelector('.play-icon').classList.add('hidden');
            }
        };
    }
}

document.addEventListener('DOMContentLoaded', initHeroSwiper);
window.addEventListener('load', initHeroSwiper);
window.addEventListener('livewire:navigated', initHeroSwiper);