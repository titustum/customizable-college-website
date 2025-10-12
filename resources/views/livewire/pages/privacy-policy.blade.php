<main class="overflow-hidden">

    <!-- 🟦 Hero Section -->
    <section class="relative py-24 bg-gray-900">
        <div class="absolute inset-0">
            <img src="{{ asset('images/gate.jpg') }}" alt="Tetu TVC Campus"
                class="w-full h-full object-cover opacity-25">
            <div class="absolute inset-0 bg-gradient-to-b from-gray-900/70 to-gray-900/90"></div>
        </div>
        <div class="relative z-10 text-center px-6 md:px-8">
            <h1 class="text-4xl md:text-5xl lg:text-6xl font-extrabold text-white mb-4">
                Privacy Policy
            </h1>
            <p class="text-lg md:text-xl text-gray-300 max-w-2xl mx-auto">
                How {{ $institution->name }} collects, uses, and protects your information.
            </p>
        </div>
    </section>

    <!-- 📄 Privacy Policy Section -->
    <section class="py-20 bg-white">
        <div class="max-w-4xl mx-auto px-6 md:px-10 lg:px-12 text-gray-800">
            <!-- Section: Overview -->
            <h2 class="text-2xl font-bold mb-4">Overview</h2>
            <p class="mb-6 leading-relaxed">
                This Privacy Policy outlines how we handle your personal data when you use our website and services.
            </p>

            <!-- Section: Information We Collect -->
            <h2 class="text-xl font-semibold mb-3">Information We Collect</h2>
            <ul class="list-disc pl-6 space-y-2 mb-6">
                <li>Your name and contact information</li>
                <li>Usage and analytics data</li>
                <li>Cookies and session information</li>
            </ul>

            <!-- Section: How We Use Information -->
            <h2 class="text-xl font-semibold mb-3">How We Use Your Information</h2>
            <ul class="list-disc pl-6 space-y-2 mb-6">
                <li>Improve our services and your experience</li>
                <li>Respond to inquiries and provide support</li>
                <li>Meet legal, regulatory, and security requirements</li>
            </ul>

            <!-- Section: Your Rights -->
            <h2 class="text-xl font-semibold mb-3">Your Rights</h2>
            <ul class="list-disc pl-6 space-y-2 mb-6">
                <li>Access your personal data</li>
                <li>Request updates or deletion</li>
                <li>Withdraw consent at any time</li>
            </ul>

            <!-- Section: Contact -->
            <h2 class="text-xl font-semibold mb-3">Contact Us</h2>
            <p class="mb-2 leading-relaxed">
                If you have any questions about this policy, feel free to contact us at:
            </p>
            <a href="mailto:{{ $institution->email }}" class="text-primary font-medium hover:underline">
                {{ $institution->email }}
            </a>
        </div>
    </section>

</main>