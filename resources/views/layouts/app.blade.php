<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>
        {{ isset($title) ? $title . ' | ' . config('app.name', 'Healing Touch Hospital') : config('app.name', 'Healing Touch Hospital') }}
    </title>
    <meta property="og:url" content="{{ url()->current() }}">
    <link rel="canonical" href="{{ url()->current() }}">

    <meta name="description"
        content="Healing Touch Hospital, Linebazar, Purnea offers online appointments, specialist doctors, and complete healthcare services.">

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
              ],
              "sameAs": [
                "https://www.facebook.com/profile.php?id=61573927387041",
                "https://www.instagram.com/_healingtouchhospital_?igsh=cDh4cDJjMGRpMnNx"
              ]
            }
            </script>

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

<body class="font-sans antialiased">
    <div class="min-h-screen bg-gray-100">
        <livewire:layout.navigation />

        <!-- Page Heading -->
        @if (isset($header))
            <header class="bg-white shadow">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    {{ $header }}
                </div>
            </header>
        @endif

        <!-- Page Content -->
        <main>
            {{ $slot }}
        </main>
    </div>
    @livewireScripts

</body>

</html>
