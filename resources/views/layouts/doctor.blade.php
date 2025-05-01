<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="https://cdn.tailwindcss.com"></script>

    <title>
        {{ isset($title) ? $title . ' | ' . config('app.name', 'Healing Touch Hospital | Online Appointment Booking') : config('app.name', 'Healing Touch Hospital | Online Appointment Booking') }}
    </title>

    <meta property="og:url" content="{{ url()->current() }}">
    <link rel="canonical" href="{{ url()->current() }}">

    <meta name="description"
        content="Healing Touch Hospital, Linebazar, Purnea offers online appointments, specialist doctors, and complete healthcare services.">


    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
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


    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles

    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-SX9KFPHCCD"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'G-SX9KFPHCCD');
    </script>
</head>

<body class="w-full flex flex-col min-h-screen">
    <div class="min-h-screen flex flex-col sm:justify-center items-center pt-0 bg-gray-100">
        <div class="w-full bg-white shadow-md overflow-hidden rounded-lg">
            {{ $slot }}
        </div>
    </div>
    @livewireScripts
</body>

</html>
