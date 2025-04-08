<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Healing Touch Hospital - Coming Soon</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/feather-icons/4.29.0/feather.min.js"></script>
  <script>
    tailwind.config = {
      theme: {
        extend: {
          colors: {
            'hospital-blue': {
              100: '#ebf8ff',
              200: '#bee3f8',
              300: '#90cdf4',
              400: '#63b3ed',
              500: '#4299e1',
              600: '#3182ce',
              700: '#2b6cb0',
              800: '#2c5282',
              900: '#2a4365',
            },
          }
        }
      }
    }
  </script>
</head>

<body class="bg-gray-50">
  <div class="relative h-screen w-full flex flex-col items-center justify-center text-center text-gray-800">
    <!-- Background image with overlay -->
    <div class="absolute inset-0 bg-cover bg-center" style="background-image: url('/api/placeholder/1920/1080'); opacity: 0.1;"></div>
    <div class="absolute inset-0 bg-white bg-opacity-90"></div>

    <!-- Logo container -->
    <div class="z-10 mb-6">
      <img src="{{ asset('healingTouchLogo.jpeg') }}" alt="Healing Touch Hospital Logo" class="w-32 sm:w-40 md:w-48 lg:w-56 xl:w-64 mx-auto" />
    </div>

    <!-- Tagline -->
    <h1 class="z-10 text-base font-semibold uppercase tracking-wider text-blue-500 mb-6 flex items-center justify-center gap-2">
      <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-blue-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6v5a5 5 0 005 5v2a3 3 0 006 0v-2M4 6h4M20 6h-4M20 6v5a5 5 0 01-5 5" />
      </svg>
      Healing Touch Hospital
    </h1>
    <!-- Countdown -->
    <div class="z-10 flex flex-wrap justify-center mb-8" id="countdown">
      <div class="m-3 sm:m-4">
        <span class="block text-3xl sm:text-4xl font-bold text-blue-700" id="days">07</span>
        <span class="text-sm uppercase tracking-wide text-gray-600">Days</span>
      </div>
      <div class="m-3 sm:m-4">
        <span class="block text-3xl sm:text-4xl font-bold text-blue-700" id="hours">00</span>
        <span class="text-sm uppercase tracking-wide text-gray-600">Hours</span>
      </div>
      <div class="m-3 sm:m-4">
        <span class="block text-3xl sm:text-4xl font-bold text-blue-700" id="minutes">00</span>
        <span class="text-sm uppercase tracking-wide text-gray-600">Minutes</span>
      </div>
      <div class="m-3 sm:m-4">
        <span class="block text-3xl sm:text-4xl font-bold text-blue-700" id="seconds">00</span>
        <span class="text-sm uppercase tracking-wide text-gray-600">Seconds</span>
      </div>
    </div>

    <!-- Launch Date -->
    <div class="z-10 mb-6">
      <span class="font-semibold text-lg text-blue-600">Our website will be launching soon!</span>
    </div>



    <div class="z-10 bg-white rounded-xl shadow-lg p-8 max-w-md w-full  overflow-hidden relative">
      <!-- Decorative Elements -->
      <div class="absolute -top-10 -right-10 w-40 h-40 bg-blue-100 rounded-full opacity-50"></div>
      <div class="absolute -bottom-12 -left-12 w-48 h-48 bg-blue-50 rounded-full opacity-60"></div>

      <div class="relative">
        <!-- Header with Icon -->
        <div class="flex items-center mb-6">
          <div class="bg-blue-500 text-white p-3 rounded-lg mr-4 shadow-md">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-map-pin">
              <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path>
              <circle cx="12" cy="10" r="3"></circle>
            </svg>
          </div>
          <h3 class="font-bold text-gray-800 text-xl">Our Location</h3>
        </div>

        <!-- Contact Information -->
        <div class="text-gray-600 space-y-4">

          <!-- Address -->
          <div class="flex items-start">
            <div class="text-blue-400 mr-3 mt-1">
              <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-home">
                <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path>
                <polyline points="9 22 9 12 15 12 15 22"></polyline>
              </svg>
            </div>
            <div class="text-left">
              <p class="mb-1">
                Hope Chauraha, Rambagh Road,<br>
                Linebazar, Purnea
              </p>
            </div>
          </div>

          <!-- Contact -->
          <div class="flex items-center">
            <div class="text-blue-400 mr-3">
              <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-phone">
                <path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"></path>
              </svg>
            </div>
            <p>+91 9471659700</p>
          </div>

          <!-- Email -->
          <div class="flex items-center">
            <div class="text-blue-400 mr-3">
              <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-mail">
                <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path>
                <polyline points="22,6 12,13 2,6"></polyline>
              </svg>
            </div>
            <a href="mailto:info@healingtouch.example" class="text-blue-500 hover:underline">info@healingtouch.example</a>
          </div>
        </div>

      </div>
    </div>



    <div class="  bottom-4 text-xs text-gray-500">
      © 2025 Healing Touch Hospital. All rights reserved.
    </div>
  </div>

  <script>
    document.addEventListener('DOMContentLoaded', function() {
      feather.replace();
    });

    const countDownDate = new Date("April 15, 2025 00:00:00").getTime();

    const countdownTimer = setInterval(function() {
      const now = new Date().getTime();

      const distance = countDownDate - now;

      const days = Math.floor(distance / (1000 * 60 * 60 * 24));
      const hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
      const minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
      const seconds = Math.floor((distance % (1000 * 60)) / 1000);

      document.getElementById("days").innerHTML = days < 10 ? "0" + days : days;
      document.getElementById("hours").innerHTML = hours < 10 ? "0" + hours : hours;
      document.getElementById("minutes").innerHTML = minutes < 10 ? "0" + minutes : minutes;
      document.getElementById("seconds").innerHTML = seconds < 10 ? "0" + seconds : seconds;

      if (distance < 0) {
        clearInterval(countdownTimer);
        document.getElementById("countdown").innerHTML = "<div class='text-2xl font-bold text-green-600'>We Are Now Open!</div>";
      }
    }, 1000);
  </script>
</body>

</html>