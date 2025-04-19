<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ $title ?? config('app.name', 'Healing Touch Hospital') }}</title>
    <!-- SEO Meta Tags -->
    <meta name="description"
        content="Healing Touch Hospital located at Hope Chauraha, Rambagh Road, Linebazar, Purnea, offers online appointment booking, specialist doctors, and comprehensive healthcare services.">
    <meta name="keywords"
        content="Healing Touch Hospital, hospital Purnea, online doctor appointment Purnea, healthcare services Linebazar, specialist doctors Rambagh Road, medical consultation Purnea, best hospital Bihar, online healthcare booking, emergency hospital services Purnea">

    <!-- Open Graph Meta Tags for Social Media -->
    <meta property="og:title" content="Healing Touch Hospital | Quality Healthcare & Online Appointments">
    <meta property="og:description"
        content="Book your appointment online with specialist doctors at Healing Touch Hospital, Hope Chauraha, Rambagh Road, Linebazar, Purnea. Comprehensive healthcare services available.">
    <meta property="og:type" content="website">
    <meta property="og:url" content="https://healingtouchpurnea.com/">
    <meta property="og:image" content="https://healingtouchpurnea.com/healingTouchLogo.jpeg">

    <!-- Twitter Card Meta Tags -->
    {{-- <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="Healing Touch Hospital | Specialist Doctors & Online Appointments">
    <meta name="twitter:description"
        content="Online appointments, expert doctors, and quality medical care at Healing Touch Hospital in Purnea, Bihar.">
    <meta name="twitter:image" content="https://healingtouchpurnea.com/assets/images/hospital-twitter-card.jpg"> --}}

    <!-- Canonical URL -->
    <link rel="canonical" href="https://healingtouchpurnea.com/">

    <!-- Structured Data with JSON-LD -->
    <script type="application/ld+json">
    {
      "@context": "https://schema.org",
      "@type": "Hospital",
      "name": "Healing Touch Hospital",
      "url": "https://healingtouchpurnea.com/",
      "logo": "https://healingtouchpurnea.com/assets/images/logo.png",
      "address": {
        "@type": "PostalAddress",
        "streetAddress": "Hope Chauraha, Rambagh Road, Linebazar",
        "addressLocality": "Purnea",
        "addressRegion": "Bihar",
        "postalCode": "854301",
        "addressCountry": "India"
      },
      "contactPoint": {
        "@type": "ContactPoint",
        "telephone": "+91-9471659700",
        "contactType": "Customer Support",
        "areaServed": "IN",
        "availableLanguage": ["English", "Hindi"]
      },
      "medicalSpecialty": [
        "Cardiology",
        "Neurology",
        "Orthopedics",
        "Gynecology",
        "General Medicine"
      ],
      "sameAs": [
        "https://www.facebook.com/healingtouchhospital",
        "https://www.instagram.com/_healingtouchhospital_?utm_source=ig_web_button_share_sheet&igsh=ZDNlZDc0MzIxNw==",
        "https://www.linkedin.com/company/healingtouchhospital"
      ]
    }
    </script>

    <link rel="icon" href="https://healingtouchpurnea.com/healingTouchLogo.jpeg" type="image/x-icon">

    @php
        $manifest = json_decode(file_get_contents(public_path('build/manifest.json')), true);
        $js = $manifest['resources/js/app.js']['file'] ?? null;
        $css = $manifest['resources/css/app.css']['css'][0] ?? null;
    @endphp

    @if ($js && $css)
        <link rel="stylesheet" href="{{ asset("build/{$css}") }}">
        <script type="module" src="{{ asset("build/{$js}") }}"></script>
    @endif

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
</head>
<livewire:patient-booking.header />

<body class="w-full flex flex-col min-h-screen">
    <div class="min-h-screen flex flex-col sm:justify-center items-center pt-0 bg-gray-100">
        <div class="w-full  shadow-md overflow-hidden rounded-lg ">
            {{ $slot }}
        </div>
    </div>
    @livewireScripts
</body>
<livewire:patient-booking.footer />

</html>
