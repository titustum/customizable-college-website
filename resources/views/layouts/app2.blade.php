<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>TETU TVC – Quality Vocational Education</title>

    <!-- Fonts: Clash Display (editorial) + Plus Jakarta Sans (body) -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link
        href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;600;700;900&family=Plus+Jakarta+Sans:wght@300;400;500;600;700&display=swap"
        rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    @livewireStyles

    <style>
        :root {
            --red: #D63A00;
            --red-mid: #E8420A;
            --red-light: #FF6940;
            --ink: #0D0D0D;
            --ink-soft: #1A1A1A;
            --paper: #FAF9F7;
            --paper-mid: #F2EFE9;
            --muted: #8A8078;
            --rule: rgba(0, 0, 0, 0.08);
            --nav-h: 72px;
        }

        *,
        *::before,
        *::after {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        html {
            scroll-behavior: smooth;
        }

        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            background: var(--paper);
            color: var(--ink);
            overflow-x: hidden;
        }

        /* ─── SCROLLBAR ─── */
        ::-webkit-scrollbar {
            width: 4px;
        }

        ::-webkit-scrollbar-track {
            background: var(--paper-mid);
        }

        ::-webkit-scrollbar-thumb {
            background: var(--red);
            border-radius: 2px;
        }

        /* ─── SELECTION ─── */
        ::selection {
            background: var(--red);
            color: #fff;
        }

        /* ══════════════════════════════════════
       TOP BAR
    ══════════════════════════════════════ */
        .topbar {
            background: var(--ink);
            color: rgba(255, 255, 255, 0.55);
            height: 38px;
            display: flex;
            align-items: center;
            font-size: 11.5px;
            font-weight: 500;
            letter-spacing: 0.01em;
        }

        .topbar-inner {
            max-width: 1240px;
            margin: 0 auto;
            padding: 0 28px;
            width: 100%;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .topbar-socials {
            display: flex;
            align-items: center;
            gap: 2px;
        }

        .topbar-social-link {
            width: 28px;
            height: 28px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 6px;
            color: rgba(255, 255, 255, 0.4);
            font-size: 11px;
            text-decoration: none;
            transition: color 0.2s, background 0.2s;
        }

        .topbar-social-link:hover {
            color: #fff;
            background: rgba(255, 255, 255, 0.08);
        }

        .topbar-links {
            display: flex;
            align-items: center;
        }

        .topbar-link {
            display: flex;
            align-items: center;
            gap: 5px;
            padding: 0 12px;
            height: 38px;
            color: rgba(255, 255, 255, 0.5);
            text-decoration: none;
            border-left: 1px solid rgba(255, 255, 255, 0.07);
            transition: color 0.2s;
            white-space: nowrap;
        }

        .topbar-link:hover {
            color: #fff;
        }

        .topbar-link i {
            font-size: 9px;
            opacity: 0.6;
        }

        /* ══════════════════════════════════════
       MAIN NAV
    ══════════════════════════════════════ */
        #mainNav {
            position: sticky;
            top: 0;
            z-index: 100;
            height: var(--nav-h);
            background: rgba(250, 249, 247, 0.97);
            backdrop-filter: blur(16px);
            -webkit-backdrop-filter: blur(16px);
            border-bottom: 1px solid var(--rule);
            display: flex;
            align-items: center;
            transition: box-shadow 0.3s ease;
        }

        #mainNav.scrolled {
            box-shadow: 0 1px 0 var(--rule), 0 8px 32px rgba(0, 0, 0, 0.06);
        }

        .nav-inner {
            max-width: 1240px;
            margin: 0 auto;
            padding: 0 28px;
            width: 100%;
            display: flex;
            align-items: center;
            gap: 0;
        }

        /* Logo */
        .logo {
            display: flex;
            align-items: center;
            gap: 12px;
            text-decoration: none;
            shrink: 0;
            flex-shrink: 0;
        }

        .logo-mark {
            width: 42px;
            height: 42px;
            border-radius: 10px;
            background: var(--red);
            display: flex;
            align-items: center;
            justify-content: center;
            font-family: 'Playfair Display', serif;
            font-weight: 900;
            font-size: 14px;
            color: #fff;
            letter-spacing: -0.5px;
            position: relative;
            overflow: hidden;
        }

        .logo-mark::after {
            content: '';
            position: absolute;
            top: -30%;
            right: -20%;
            width: 60%;
            height: 80%;
            background: rgba(255, 255, 255, 0.12);
            border-radius: 50%;
        }

        .logo-text-primary {
            font-family: 'Playfair Display', serif;
            font-weight: 700;
            font-size: 18px;
            color: var(--ink);
            letter-spacing: -0.3px;
            line-height: 1.1;
        }

        .logo-text-sub {
            font-size: 9.5px;
            font-weight: 600;
            color: var(--muted);
            text-transform: uppercase;
            letter-spacing: 1.8px;
            margin-top: 1px;
        }

        /* Desktop links */
        .nav-links {
            display: flex;
            align-items: center;
            height: var(--nav-h);
            margin-left: auto;
            gap: 0;
        }

        .nav-link {
            position: relative;
            display: flex;
            align-items: center;
            height: 100%;
            padding: 0 14px;
            font-size: 11.5px;
            font-weight: 700;
            letter-spacing: 0.07em;
            text-transform: uppercase;
            color: var(--muted);
            text-decoration: none;
            transition: color 0.22s;
            gap: 5px;
        }

        .nav-link:hover,
        .nav-link.active {
            color: var(--ink);
        }

        .nav-link::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 14px;
            right: 14px;
            height: 2px;
            background: var(--red);
            transform: scaleX(0);
            transform-origin: left;
            transition: transform 0.25s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .nav-link:hover::after,
        .nav-link.active::after {
            transform: scaleX(1);
        }

        /* Dropdown */
        .nav-dropdown {
            position: relative;
            display: flex;
            align-items: center;
            height: 100%;
        }

        .dropdown-panel {
            position: absolute;
            top: calc(100% + 1px);
            left: -4px;
            min-width: 220px;
            background: #fff;
            border: 1px solid rgba(0, 0, 0, 0.09);
            border-radius: 14px;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.12), 0 4px 16px rgba(0, 0, 0, 0.06);
            overflow: hidden;
            opacity: 0;
            visibility: hidden;
            transform: translateY(10px);
            transition: opacity 0.2s ease, transform 0.2s ease, visibility 0.2s;
            pointer-events: none;
        }

        .nav-dropdown:hover .dropdown-panel {
            opacity: 1;
            visibility: visible;
            transform: translateY(0);
            pointer-events: auto;
        }

        .dropdown-header {
            padding: 12px 16px 8px;
            font-size: 9px;
            font-weight: 700;
            letter-spacing: 1.5px;
            text-transform: uppercase;
            color: var(--muted);
            border-bottom: 1px solid var(--rule);
        }

        .dropdown-item {
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 10px 16px;
            font-size: 13px;
            font-weight: 500;
            color: #444;
            text-decoration: none;
            transition: background 0.15s, color 0.15s, padding-left 0.15s;
            border-bottom: 1px solid var(--rule);
        }

        .dropdown-item:last-child {
            border-bottom: none;
        }

        .dropdown-item:hover {
            background: #FFF5F2;
            color: var(--red);
            padding-left: 20px;
        }

        .dropdown-item i {
            width: 16px;
            font-size: 10px;
            color: var(--red-light);
        }

        .chevron {
            font-size: 8px;
            transition: transform 0.22s;
            display: inline-block;
        }

        .nav-dropdown:hover .chevron {
            transform: rotate(180deg);
        }

        /* Apply CTA */
        .btn-apply {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 10px 22px;
            background: var(--red);
            color: #fff;
            font-size: 11px;
            font-weight: 700;
            letter-spacing: 0.1em;
            text-transform: uppercase;
            border-radius: 100px;
            text-decoration: none;
            margin-left: 16px;
            transition: background 0.2s, transform 0.2s, box-shadow 0.2s;
            box-shadow: 0 4px 20px rgba(214, 58, 0, 0.3);
            white-space: nowrap;
        }

        .btn-apply:hover {
            background: var(--red-mid);
            transform: translateY(-1px);
            box-shadow: 0 8px 28px rgba(214, 58, 0, 0.38);
        }

        .btn-apply:active {
            transform: translateY(0);
        }

        /* Hamburger */
        .hamburger {
            display: none;
            flex-direction: column;
            gap: 5px;
            padding: 8px;
            border-radius: 8px;
            background: transparent;
            border: none;
            cursor: pointer;
            margin-right: 12px;
            transition: background 0.2s;
        }

        .hamburger:hover {
            background: var(--paper-mid);
        }

        .ham-line {
            width: 22px;
            height: 2px;
            background: var(--ink);
            border-radius: 2px;
            transform-origin: center;
            transition: transform 0.25s, opacity 0.25s;
        }

        .hamburger.open .ham-line:nth-child(1) {
            transform: translateY(7px) rotate(45deg);
        }

        .hamburger.open .ham-line:nth-child(2) {
            opacity: 0;
            transform: scaleX(0);
        }

        .hamburger.open .ham-line:nth-child(3) {
            transform: translateY(-7px) rotate(-45deg);
        }

        /* Mobile apply compact */
        .btn-apply-mobile {
            font-size: 12px;
            font-weight: 700;
            color: var(--red);
            text-decoration: none;
            display: none;
        }

        /* ══════════════════════════════════════
       OVERLAY + MOBILE MENU
    ══════════════════════════════════════ */
        #overlay {
            position: fixed;
            inset: 0;
            z-index: 150;
            background: rgba(13, 13, 13, 0.5);
            backdrop-filter: blur(4px);
            opacity: 0;
            pointer-events: none;
            transition: opacity 0.25s;
        }

        #overlay.open {
            opacity: 1;
            pointer-events: all;
        }

        #mobile-menu {
            position: fixed;
            top: 0;
            left: 0;
            height: 100dvh;
            width: 320px;
            background: var(--paper);
            z-index: 200;
            overflow-y: auto;
            transform: translateX(-100%);
            transition: transform 0.35s cubic-bezier(0.4, 0, 0.2, 1);
            box-shadow: 20px 0 60px rgba(0, 0, 0, 0.15);
        }

        #mobile-menu.open {
            transform: translateX(0);
        }

        .mobile-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 20px 20px;
            border-bottom: 1px solid var(--rule);
        }

        .mobile-close {
            width: 36px;
            height: 36px;
            border-radius: 8px;
            border: 1px solid var(--rule);
            background: transparent;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            color: var(--muted);
            font-size: 14px;
            transition: background 0.2s, color 0.2s;
        }

        .mobile-close:hover {
            background: #FFF5F2;
            color: var(--red);
        }

        .mobile-nav {
            padding: 12px 12px;
            display: flex;
            flex-direction: column;
            gap: 2px;
        }

        .mobile-link {
            display: flex;
            align-items: center;
            padding: 11px 14px;
            border-radius: 10px;
            font-size: 13px;
            font-weight: 700;
            letter-spacing: 0.05em;
            text-transform: uppercase;
            color: #444;
            text-decoration: none;
            transition: background 0.15s, color 0.15s;
        }

        .mobile-link:hover,
        .mobile-link.active {
            background: #FFF5F2;
            color: var(--red);
        }

        .mobile-link.active {
            background: #FFECE5;
            color: var(--red);
        }

        .mobile-divider {
            height: 1px;
            background: var(--rule);
            margin: 8px 14px;
        }

        .mobile-label {
            font-size: 9.5px;
            font-weight: 700;
            letter-spacing: 1.5px;
            text-transform: uppercase;
            color: var(--muted);
            padding: 6px 14px 2px;
        }

        /* Mobile accordion */
        .acc-btn {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 11px 14px;
            border-radius: 10px;
            font-size: 13px;
            font-weight: 700;
            letter-spacing: 0.05em;
            text-transform: uppercase;
            color: #444;
            background: transparent;
            border: none;
            cursor: pointer;
            width: 100%;
            transition: background 0.15s, color 0.15s;
        }

        .acc-btn:hover {
            background: #FFF5F2;
            color: var(--red);
        }

        .acc-icon {
            font-size: 8px;
            transition: transform 0.22s;
        }

        .acc-content {
            display: none;
            flex-direction: column;
            gap: 2px;
            padding: 4px 0 4px 8px;
        }

        .acc-content.open {
            display: flex;
        }

        .acc-link {
            display: block;
            padding: 8px 14px;
            border-radius: 8px;
            font-size: 13px;
            font-weight: 500;
            color: #666;
            text-decoration: none;
            transition: background 0.15s, color 0.15s;
        }

        .acc-link:hover {
            background: #FFF5F2;
            color: var(--red);
        }

        .mobile-apply {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            padding: 14px;
            background: var(--red);
            color: #fff;
            font-size: 12px;
            font-weight: 700;
            letter-spacing: 0.1em;
            text-transform: uppercase;
            border-radius: 14px;
            text-decoration: none;
            margin: 8px 0 0;
            transition: background 0.2s;
        }

        .mobile-apply:hover {
            background: var(--red-mid);
        }

        /* ══════════════════════════════════════
       HERO SECTION
    ══════════════════════════════════════ */
        .hero {
            position: relative;
            min-height: 380px;
            display: flex;
            align-items: center;
            justify-content: center;
            overflow: hidden;
            background: var(--ink);
            text-align: center;
        }

        .hero-bg {
            position: absolute;
            inset: 0;
            background:
                radial-gradient(ellipse 70% 80% at 30% 50%, rgba(214, 58, 0, 0.22) 0%, transparent 65%),
                radial-gradient(ellipse 50% 60% at 80% 30%, rgba(232, 66, 10, 0.12) 0%, transparent 60%);
        }

        /* Diagonal rule lines overlay */
        .hero-lines {
            position: absolute;
            inset: 0;
            opacity: 0.04;
            background-image: repeating-linear-gradient(-45deg,
                    #fff 0px,
                    #fff 1px,
                    transparent 1px,
                    transparent 60px);
        }

        .hero-inner {
            position: relative;
            padding: 80px 24px;
            max-width: 700px;
        }

        .hero-eyebrow {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            font-size: 10.5px;
            font-weight: 700;
            letter-spacing: 2px;
            text-transform: uppercase;
            color: var(--red-light);
            margin-bottom: 20px;
        }

        .hero-eyebrow::before,
        .hero-eyebrow::after {
            content: '';
            width: 24px;
            height: 1px;
            background: var(--red-light);
            opacity: 0.6;
        }

        .hero-title {
            font-family: 'Playfair Display', serif;
            font-weight: 900;
            font-size: clamp(36px, 6vw, 64px);
            color: #fff;
            letter-spacing: -1px;
            line-height: 1.05;
            margin-bottom: 20px;
        }

        .hero-title em {
            font-style: italic;
            color: var(--red-light);
        }

        .hero-sub {
            font-size: 15px;
            font-weight: 400;
            color: rgba(255, 255, 255, 0.45);
            max-width: 460px;
            margin: 0 auto 32px;
            line-height: 1.7;
        }

        .hero-ctas {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 12px;
            flex-wrap: wrap;
        }

        .btn-hero-primary {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 13px 28px;
            background: var(--red);
            color: #fff;
            font-size: 12px;
            font-weight: 700;
            letter-spacing: 0.1em;
            text-transform: uppercase;
            border-radius: 100px;
            text-decoration: none;
            transition: background 0.2s, transform 0.2s, box-shadow 0.2s;
            box-shadow: 0 8px 32px rgba(214, 58, 0, 0.4);
        }

        .btn-hero-primary:hover {
            background: var(--red-mid);
            transform: translateY(-2px);
            box-shadow: 0 16px 40px rgba(214, 58, 0, 0.5);
        }

        .btn-hero-secondary {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 13px 28px;
            background: rgba(255, 255, 255, 0.08);
            color: rgba(255, 255, 255, 0.75);
            font-size: 12px;
            font-weight: 600;
            letter-spacing: 0.08em;
            text-transform: uppercase;
            border-radius: 100px;
            text-decoration: none;
            border: 1px solid rgba(255, 255, 255, 0.12);
            transition: background 0.2s, color 0.2s, border-color 0.2s, transform 0.2s;
        }

        .btn-hero-secondary:hover {
            background: rgba(255, 255, 255, 0.13);
            color: #fff;
            border-color: rgba(255, 255, 255, 0.22);
            transform: translateY(-2px);
        }

        /* ══════════════════════════════════════
       FOOTER
    ══════════════════════════════════════ */
        footer {
            background: var(--ink-soft);
            color: #fff;
            padding-top: 72px;
        }

        .footer-grid {
            max-width: 1240px;
            margin: 0 auto;
            padding: 0 28px;
            display: grid;
            grid-template-columns: 1.4fr 1fr 1.2fr 1.3fr;
            gap: 48px;
            padding-bottom: 64px;
        }

        .footer-brand-tagline {
            font-size: 13.5px;
            color: rgba(255, 255, 255, 0.38);
            line-height: 1.75;
            margin: 16px 0 20px;
        }

        .footer-cta-link {
            display: inline-flex;
            align-items: center;
            gap: 7px;
            font-size: 12px;
            font-weight: 700;
            letter-spacing: 0.06em;
            text-transform: uppercase;
            color: var(--red-light);
            text-decoration: none;
            transition: gap 0.2s, color 0.2s;
        }

        .footer-cta-link:hover {
            gap: 12px;
            color: #fff;
        }

        .footer-col-label {
            font-size: 9.5px;
            font-weight: 700;
            letter-spacing: 1.8px;
            text-transform: uppercase;
            color: rgba(255, 255, 255, 0.28);
            margin-bottom: 20px;
        }

        .footer-links-list {
            list-style: none;
            display: flex;
            flex-direction: column;
            gap: 10px;
        }

        .footer-link {
            font-size: 13.5px;
            color: rgba(255, 255, 255, 0.5);
            text-decoration: none;
            transition: color 0.2s, padding-left 0.2s;
            display: inline-block;
        }

        .footer-link:hover {
            color: #fff;
            padding-left: 5px;
        }

        .footer-contact-item {
            display: flex;
            align-items: flex-start;
            gap: 12px;
            margin-bottom: 16px;
        }

        .footer-contact-icon {
            width: 32px;
            height: 32px;
            border-radius: 8px;
            background: rgba(214, 58, 0, 0.15);
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--red-light);
            font-size: 11px;
            flex-shrink: 0;
            margin-top: 1px;
        }

        .footer-contact-text {
            font-size: 13.5px;
            color: rgba(255, 255, 255, 0.5);
            line-height: 1.5;
        }

        .newsletter-input-wrap {
            display: flex;
            border-radius: 12px;
            overflow: hidden;
            border: 1px solid rgba(255, 255, 255, 0.1);
            transition: border-color 0.2s;
        }

        .newsletter-input-wrap:focus-within {
            border-color: var(--red);
        }

        .newsletter-input {
            flex: 1;
            padding: 12px 16px;
            background: rgba(255, 255, 255, 0.05);
            border: none;
            outline: none;
            color: #fff;
            font-family: inherit;
            font-size: 13px;
            placeholder-color: rgba(255, 255, 255, 0.25);
        }

        .newsletter-input::placeholder {
            color: rgba(255, 255, 255, 0.25);
        }

        .newsletter-btn {
            padding: 12px 18px;
            background: var(--red);
            color: #fff;
            font-family: inherit;
            font-size: 11px;
            font-weight: 700;
            letter-spacing: 0.1em;
            text-transform: uppercase;
            border: none;
            cursor: pointer;
            white-space: nowrap;
            transition: background 0.2s;
        }

        .newsletter-btn:hover {
            background: var(--red-mid);
        }

        .footer-bottom {
            max-width: 1240px;
            margin: 0 auto;
            padding: 20px 28px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            border-top: 1px solid rgba(255, 255, 255, 0.07);
            gap: 16px;
            flex-wrap: wrap;
        }

        .footer-socials {
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .footer-social {
            width: 36px;
            height: 36px;
            border-radius: 8px;
            background: rgba(255, 255, 255, 0.06);
            border: 1px solid rgba(255, 255, 255, 0.08);
            display: flex;
            align-items: center;
            justify-content: center;
            color: rgba(255, 255, 255, 0.4);
            font-size: 13px;
            text-decoration: none;
            transition: background 0.2s, color 0.2s, border-color 0.2s, transform 0.2s;
        }

        .footer-social:hover {
            background: var(--red);
            color: #fff;
            border-color: var(--red);
            transform: translateY(-2px);
        }

        .footer-copy {
            font-size: 12px;
            color: rgba(255, 255, 255, 0.28);
        }

        .footer-copy a {
            color: rgba(255, 255, 255, 0.45);
            text-decoration: none;
            transition: color 0.2s;
        }

        .footer-copy a:hover {
            color: #fff;
        }

        /* ══════════════════════════════════════
       RESPONSIVE
    ══════════════════════════════════════ */
        @media (max-width: 1200px) {

            .nav-links,
            .btn-apply {
                display: none;
            }

            .hamburger {
                display: flex;
            }

            .btn-apply-mobile {
                display: block;
                margin-left: auto;
            }
        }

        @media (max-width: 960px) {
            .footer-grid {
                grid-template-columns: 1fr 1fr;
            }
        }

        @media (max-width: 640px) {
            .footer-grid {
                grid-template-columns: 1fr;
                gap: 32px;
            }

            .footer-bottom {
                flex-direction: column;
                text-align: center;
            }

            .topbar-socials {
                display: none;
            }

            .topbar-link.desktop-only {
                display: none;
            }
        }
    </style>
</head>

<body>

    <!-- ══════════════════════════════════════
     TOP BAR
══════════════════════════════════════ -->
    <header class="topbar">
        <div class="topbar-inner">
            <!-- Socials -->
            <nav class="topbar-socials" aria-label="Social media">
                <a href="#" aria-label="Facebook" class="topbar-social-link"><i class="fab fa-facebook-f"></i></a>
                <a href="#" aria-label="TikTok" class="topbar-social-link"><i class="fab fa-tiktok"></i></a>
                <a href="#" aria-label="Twitter/X" class="topbar-social-link"><i class="fab fa-x-twitter"></i></a>
                <a href="#" aria-label="YouTube" class="topbar-social-link"><i class="fab fa-youtube"></i></a>
            </nav>

            <!-- Links -->
            <div class="topbar-links">
                <a href="tel:+254700000000" class="topbar-link">
                    <i class="fas fa-phone-alt"></i> +254 700 000 000
                </a>
                <a href="mailto:info@tetutvc.ac.ke" class="topbar-link">
                    <i class="fas fa-envelope"></i> info@tetutvc.ac.ke
                </a>
                <a href="#" class="topbar-link desktop-only">Tenders</a>
                <a href="#" class="topbar-link desktop-only">Downloads</a>
                <a href="#" class="topbar-link desktop-only">Vacancies</a>
                <a href="#" class="topbar-link desktop-only">Past Papers</a>
            </div>
        </div>
    </header>


    <!-- ══════════════════════════════════════
     MAIN NAV
══════════════════════════════════════ -->
    <nav id="mainNav" role="navigation" aria-label="Main navigation">
        <div class="nav-inner">

            <!-- Hamburger -->
            <button id="hamburger" class="hamburger" aria-label="Open menu" aria-expanded="false">
                <span class="ham-line"></span>
                <span class="ham-line"></span>
                <span class="ham-line"></span>
            </button>

            <!-- Logo -->
            <a href="#" class="logo">
                <div class="logo-mark">TV</div>
                <div>
                    <div class="logo-text-primary">TETU TVC</div>
                    <div class="logo-text-sub">Vocational College</div>
                </div>
            </a>

            <!-- Desktop links -->
            <nav class="nav-links" aria-label="Desktop navigation">

                <a href="#" class="nav-link active">Home</a>
                <a href="#" class="nav-link">About Us</a>

                <!-- Administration -->
                <div class="nav-dropdown">
                    <button class="nav-link" style="background:none;border:none;cursor:pointer;font-family:inherit;">
                        Administration <i class="fas fa-chevron-down chevron"></i>
                    </button>
                    <div class="dropdown-panel">
                        <div class="dropdown-header">Leadership</div>
                        <a href="#" class="dropdown-item"><i class="fas fa-user-tie"></i> Principal's Office</a>
                        <a href="#" class="dropdown-item"><i class="fas fa-users"></i> Deputy Principal -
                            Adminstration</a>
                        <a href="#" class="dropdown-item"><i class="fas fa-users"></i> Deputy Principal - Academics</a>
                        <a href="#" class="dropdown-item"><i class="fas fa-users"></i> Dean of Students</a>
                        <a href="#" class="dropdown-item"><i class="fas fa-users"></i> Registry Office</a>
                        <a href="#" class="dropdown-item"><i class="fas fa-users"></i> Teaching - Staff Members</a>
                        <a href="#" class="dropdown-item"><i class="fas fa-users"></i> Non Teaching - Staff Members</a>
                    </div>
                </div>

                <!-- Departments -->
                <div class="nav-dropdown">
                    <a href="#" class="nav-link">
                        Departments <i class="fas fa-chevron-down chevron"></i>
                    </a>
                    <div class="dropdown-panel">
                        <div class="dropdown-header">Academic Departments</div>
                        <a href="#" class="dropdown-item"><i class="fas fa-magic"></i> Cosmetology</a>
                        <a href="#" class="dropdown-item"><i class="fas fa-utensils"></i> Hospitality</a>
                        <a href="#" class="dropdown-item"><i class="fas fa-tshirt"></i> Fashion &amp; Design</a>
                        <a href="#" class="dropdown-item"><i class="fas fa-laptop-code"></i> ICT</a>
                        <a href="#" class="dropdown-item"><i class="fas fa-seedling"></i> Agriculture</a>
                    </div>
                </div>

                <a href="#" class="nav-link">Courses</a>
                <a href="#" class="nav-link">Contact</a>

            </nav>

            <!-- Apply CTA (desktop) -->
            <a href="#" class="btn-apply">
                <i class="fas fa-pen-to-square" style="font-size:10px;"></i>
                Apply Now
            </a>

            <!-- Apply (mobile compact) -->
            <a href="#" class="btn-apply-mobile">Apply →</a>

        </div>
    </nav>


    <!-- ══════════════════════════════════════
     OVERLAY
══════════════════════════════════════ -->
    <div id="overlay" role="presentation"></div>


    <!-- ══════════════════════════════════════
     MOBILE MENU
══════════════════════════════════════ -->
    <aside id="mobile-menu" role="dialog" aria-modal="true" aria-label="Mobile navigation">

        <!-- Header -->
        <div class="mobile-header">
            <div class="logo">
                <div class="logo-mark" style="width:38px;height:38px;font-size:13px;">TV</div>
                <div>
                    <div class="logo-text-primary" style="font-size:16px;">TETU TVC</div>
                    <div class="logo-text-sub">Vocational College</div>
                </div>
            </div>
            <button id="mobile-close" class="mobile-close" aria-label="Close menu">
                <i class="fas fa-xmark"></i>
            </button>
        </div>

        <!-- Nav -->
        <div class="mobile-nav">
            <div class="mobile-label">Menu</div>

            <a href="#" class="mobile-link active">Home</a>
            <a href="#" class="mobile-link">About Us</a>

            <!-- Administration -->
            <button class="acc-btn" data-target="mob-admin">
                Administration <i class="fas fa-chevron-down acc-icon"></i>
            </button>
            <div id="mob-admin" class="acc-content">
                <a href="#" class="acc-link">Principal's Office</a>
                <a href="#" class="acc-link">Our Staff Members</a>
            </div>

            <!-- Departments -->
            <button class="acc-btn" data-target="mob-dept">
                Departments <i class="fas fa-chevron-down acc-icon"></i>
            </button>
            <div id="mob-dept" class="acc-content">
                <a href="#" class="acc-link">Cosmetology</a>
                <a href="#" class="acc-link">Hospitality</a>
                <a href="#" class="acc-link">Fashion &amp; Design</a>
                <a href="#" class="acc-link">ICT</a>
                <a href="#" class="acc-link">Agriculture</a>
            </div>

            <a href="#" class="mobile-link">Courses</a>
            <a href="#" class="mobile-link">Contact</a>

            <div class="mobile-divider"></div>
            <div class="mobile-label">Resources</div>

            <a href="#" class="mobile-link">Downloads</a>
            <a href="#" class="mobile-link">Vacancies</a>
            <a href="#" class="mobile-link">Tenders</a>
            <a href="#" class="mobile-link">Past Papers</a>

            <a href="#" class="mobile-apply">
                <i class="fas fa-pen-to-square"></i>
                Apply Now
            </a>
        </div>

    </aside>


    <!-- ══════════════════════════════════════
    SLOT CONTENT
    ══════════════════════════════════════ -->

    {{ $slot }}

    <!-- ══════════════════════════════════════
        FOOTER
    ══════════════════════════════════════ -->

    <footer>
        <div class="footer-grid">

            <!-- Brand -->
            <div>
                <div class="logo">
                    <div class="logo-mark">TV</div>
                    <div>
                        <div class="logo-text-primary" style="color:#fff;">TETU TVC</div>
                        <div class="logo-text-sub">Vocational College</div>
                    </div>
                </div>
                <p class="footer-brand-tagline">
                    Committed to quality vocational training that equips students with practical skills for meaningful,
                    lasting careers.
                </p>
                <a href="#" class="footer-cta-link">
                    Learn About Us <i class="fas fa-arrow-right" style="font-size:9px;"></i>
                </a>
            </div>

            <!-- Quick Links -->
            <div>
                <p class="footer-col-label">Quick Links</p>
                <ul class="footer-links-list">
                    <li><a href="#" class="footer-link">Programs</a></li>
                    <li><a href="#" class="footer-link">Admissions</a></li>
                    <li><a href="#" class="footer-link">Departments</a></li>
                    <li><a href="#" class="footer-link">Administration</a></li>
                    <li><a href="#" class="footer-link">Downloads</a></li>
                    <li><a href="#" class="footer-link">Past Papers</a></li>
                </ul>
            </div>

            <!-- Contact -->
            <div>
                <p class="footer-col-label">Contact Us</p>
                <div class="footer-contact-item">
                    <div class="footer-contact-icon"><i class="fas fa-map-marker-alt"></i></div>
                    <span class="footer-contact-text">Tetu Sub-County,<br>Nyeri County, Kenya</span>
                </div>
                <div class="footer-contact-item">
                    <div class="footer-contact-icon"><i class="fas fa-phone"></i></div>
                    <span class="footer-contact-text">+254 700 000 000</span>
                </div>
                <div class="footer-contact-item">
                    <div class="footer-contact-icon"><i class="fas fa-envelope"></i></div>
                    <span class="footer-contact-text">info@tetutvc.ac.ke</span>
                </div>
            </div>

            <!-- Newsletter -->
            <div>
                <p class="footer-col-label">Stay Connected</p>
                <p style="font-size:13.5px;color:rgba(255,255,255,0.38);line-height:1.7;margin-bottom:16px;">
                    Get updates on admissions, events, and college news straight to your inbox.
                </p>
                <div class="newsletter-input-wrap">
                    <input type="email" class="newsletter-input" placeholder="your@email.com"
                        aria-label="Email address" />
                    <button type="submit" class="newsletter-btn">Subscribe</button>
                </div>
            </div>

        </div>

        <!-- Bottom bar -->
        <div class="footer-bottom">
            <div class="footer-socials">
                <a href="#" aria-label="Facebook" class="footer-social"><i class="fab fa-facebook-f"></i></a>
                <a href="#" aria-label="TikTok" class="footer-social"><i class="fab fa-tiktok"></i></a>
                <a href="#" aria-label="Twitter/X" class="footer-social"><i class="fab fa-x-twitter"></i></a>
                <a href="#" aria-label="Instagram" class="footer-social"><i class="fab fa-instagram"></i></a>
                <a href="#" aria-label="YouTube" class="footer-social"><i class="fab fa-youtube"></i></a>
            </div>
            <p class="footer-copy">
                © 2026 TETU TVC. Crafted by
                <a href="https://github.com/titustum" target="_blank" rel="noopener">Titus Tum</a>.
            </p>
        </div>
    </footer>

    @livewireScripts
    <!-- ══════════════════════════════════════
     JS
══════════════════════════════════════ -->
    <script>
        // ── Sticky nav shadow
  const nav = document.getElementById('mainNav');
  window.addEventListener('scroll', () => {
    nav.classList.toggle('scrolled', window.scrollY > 8);
  }, { passive: true });

  // ── Mobile menu
  const hamburger   = document.getElementById('hamburger');
  const mobileMenu  = document.getElementById('mobile-menu');
  const overlay     = document.getElementById('overlay');
  const mobileClose = document.getElementById('mobile-close');

  const openMenu = () => {
    mobileMenu.classList.add('open');
    overlay.classList.add('open');
    hamburger.classList.add('open');
    hamburger.setAttribute('aria-expanded', 'true');
    document.body.style.overflow = 'hidden';
  };
  const closeMenu = () => {
    mobileMenu.classList.remove('open');
    overlay.classList.remove('open');
    hamburger.classList.remove('open');
    hamburger.setAttribute('aria-expanded', 'false');
    document.body.style.overflow = '';
  };

  hamburger.addEventListener('click', openMenu);
  mobileClose.addEventListener('click', closeMenu);
  overlay.addEventListener('click', closeMenu);
  document.addEventListener('keydown', e => { if (e.key === 'Escape') closeMenu(); });
  mobileMenu.querySelectorAll('a').forEach(a => a.addEventListener('click', closeMenu));

  // ── Mobile accordions
  document.querySelectorAll('.acc-btn').forEach(btn => {
    btn.addEventListener('click', () => {
      const content = document.getElementById(btn.dataset.target);
      const icon    = btn.querySelector('.acc-icon');
      const isOpen  = content.classList.contains('open');

      document.querySelectorAll('.acc-content').forEach(c => c.classList.remove('open'));
      document.querySelectorAll('.acc-icon').forEach(i => (i.style.transform = ''));

      if (!isOpen) {
        content.classList.add('open');
        icon.style.transform = 'rotate(180deg)';
      }
    });
  });
    </script>

</body>

</html>
