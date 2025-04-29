<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>
        {{ isset($title) ? $title . ' | ' . config('app.name', 'Healing Touch Hospital') : config('app.name', 'Healing Touch Hospital') }}</title>
    <!-- SEO Meta Tags -->
    @php
        $route = request()->route()?->getName();
        $doctorId = $doctor->id ?? request()->route('doctorId') ?? null;
        $metaTags = App\Services\MetaTagsService::getTags($route, ['doctor' => $doctorId]);
    @endphp
    <meta name="keywords" content="{{ $metaTags['keywords'] ?? '' }}">
    <meta name="description" content="{{ $metaTags['description'] ?? '' }}">

    <!-- Open Graph Meta Tags for Social Media -->
    <meta property="og:description"
        content="Book appointments with top doctors at Healing Touch Hospital, Linebazar, Purnea. Quality healthcare services under one roof.">

    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:image" content="https://healingtouchpurnea.com/healingTouchLogo.jpeg">

    <!-- Twitter Card Meta Tags -->
    {{-- <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="Healing Touch Hospital | Specialist Doctors & Online Appointments">
    <meta name="twitter:description"
        content="Online appointments, expert doctors, and quality medical care at Healing Touch Hospital in Purnea, Bihar.">
    <meta name="twitter:image" content="https://healingtouchpurnea.com/assets/images/hospital-twitter-card.jpg"> --}}

    <!-- Canonical URL -->
    <link rel="canonical" href="{{ url()->current() }}">
    <meta property="og:title"
        content="{{ isset($title) ? $title . ' | ' . config('app.name', 'Healing Touch Hospital') : config('app.name', 'Healing Touch Hospital') }}  | Online Doctor Booking">

    <!-- Structured Data with JSON-LD -->
    <script type="application/ld+json">
    {
      "@context": "https://schema.org",
      "@type": "Hospital",
      "name": "Healing Touch Hospital",
      "url": "https://healingtouchpurnea.com/",
      "logo": "https://healingtouchpurnea.com/healingTouchLogo.jpeg",
      "address": {
        "@type": "PostalAddress",
        "streetAddress": "Hope Chauraha, Rambagh Road, Linebazar",
        "addressLocality": "Purnea",
        "addressRegion": "Bihar",
        "postalCode": "854301",
        "addressCountry": "IN"
      },
      "contactPoint": {
        "@type": "ContactPoint",
        "telephone": "+91-9471659700",
        "contactType": "Customer Support",
        "areaServed": "IN",
        "availableLanguage": ["English", "Hindi"]
      },
      "description": "Healing Touch Hospital offers online appointment booking with expert surgeons and gynecologists in Purnea, Bihar.",
        "medicalSpecialty": ["Laparoscopic Surgery", "Laser Surgery", "Gynecology", "General Surgery"],
        "department": [
            {
            "@type": "MedicalClinic",
            "name": "Surgery Department",
            "medicalSpecialty": "General Surgery",
            "availableService": "Laparoscopic and laser surgeries",
            "physician": {
                "@type": "Physician",
                "name": "Dr. Charly Kumar Sinha",
                "medicalSpecialty": "Surgery",
                "jobTitle": "Senior Surgeon"
            }
            },
        ]
    {
      "@type": "MedicalClinic",
      "name": "Gynecology Department",
      "medicalSpecialty": "Gynecology",
      "physician": {
        "@type": "Physician",
        "name": "Dr. Kiran Kumari",
        "medicalSpecialty": "Gynecology"
      }
    }
      "sameAs": [
        "https://www.facebook.com/profile.php?id=61573927387041",
        "https://www.instagram.com/_healingtouchhospital_?igsh=cDh4cDJjMGRpMnNx",
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

    <!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-SX9KFPHCCD"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-SX9KFPHCCD');
</script>
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
