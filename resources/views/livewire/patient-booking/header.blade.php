<div>
<header x-data="{ 
    open: false,
    scrolled: false,
    activeSection: 'home',
    init() {
        window.addEventListener('scroll', () => {
            this.scrolled = window.scrollY > 30;
        });
    }
}" 
    class="fixed w-full z-50 transition-all duration-300"
    :class="{ 'bg-white/95 backdrop-blur-md shadow-md py-5': scrolled, 'bg-transparent py-4': !scrolled }"
    @scroll.window="scrolled = (window.pageYOffset > 30)">
    
    <div class="container mx-auto px-4 lg:px-8">
        <div class="flex justify-between items-center">
            <!-- Logo Area -->
            <div class="flex items-center">
                <a href="/" class="flex items-center space-x-2 group">
                    <div class="overflow-hidden rounded-lg h-11 w-11 flex items-center justify-center transition-all duration-300">
                        <img src="{{ asset('healingTouchLogo.jpeg') }}" alt="Healing Touch Hospital Logo" class="h-15 w-15 object-contain transform group-hover:scale-110 transition-transform duration-300" />
                    </div>
                    <div>
                        <span class=" sm:inline-block font-bold text-xl text-gray-800 group-hover:text-sky-600 transition-colors duration-300">
                            <span class="text-sky-600">Healing</span> Touch
                        </span>
                        <span class="block text-xs text-gray-500">24x7 Service</span>
                    </div>
                </a>
            </div>

            <!-- Desktop Navigation -->
            <nav class="hidden lg:flex items-center space-x-1">
                <a href="/" 
                    class="px-4 py-2 rounded-lg text-gray-700 hover:text-sky-600 hover:bg-sky-50 transition-colors relative"
                    :class="{ 'text-sky-600 font-medium': activeSection === 'home' }">
                    Home
                    <span class="absolute bottom-0 left-0 h-0.5 bg-sky-500 transition-all duration-300" 
                          :class="activeSection === 'home' ? 'w-full' : 'w-0'"></span>
                </a>
                <a href="{{ route('services') }}" 
                    class="px-4 py-2 rounded-lg text-gray-700 hover:text-sky-600 hover:bg-sky-50 transition-colors relative"
                    :class="{ 'text-sky-600 font-medium': activeSection === 'services' }">
                    Services
                    <span class="absolute bottom-0 left-0 h-0.5 bg-sky-500 transition-all duration-300" 
                          :class="activeSection === 'services' ? 'w-full' : 'w-0'"></span>
                </a>
                <a href="{{ route('doctors') }}" 
                    class="px-4 py-2 rounded-lg text-gray-700 hover:text-sky-600 hover:bg-sky-50 transition-colors relative"
                    :class="{ 'text-sky-600 font-medium': activeSection === 'doctors' }">
                    Our Doctors
                    <span class="absolute bottom-0 left-0 h-0.5 bg-sky-500 transition-all duration-300" 
                          :class="activeSection === 'doctors' ? 'w-full' : 'w-0'"></span>
                </a>
                <a href="{{ route('about') }}" 
                    class="px-4 py-2 rounded-lg text-gray-700 hover:text-sky-600 hover:bg-sky-50 transition-colors relative"
                    :class="{ 'text-sky-600 font-medium': activeSection === 'about' }">
                    About Us
                    <span class="absolute bottom-0 left-0 h-0.5 bg-sky-500 transition-all duration-300" 
                          :class="activeSection === 'about' ? 'w-full' : 'w-0'"></span>
                </a>
                <a href="{{ route('careers') }}" 
                    class="px-4 py-2 rounded-lg text-gray-700 hover:text-sky-600 hover:bg-sky-50 transition-colors relative"
                    :class="{ 'text-sky-600 font-medium': activeSection === 'careers' }">
                    Careers
                    <span class="absolute bottom-0 left-0 h-0.5 bg-sky-500 transition-all duration-300" 
                          :class="activeSection === 'careers' ? 'w-full' : 'w-0'"></span>
                </a>
                <a href="{{ route('contact') }}" 
                    class="px-4 py-2 rounded-lg text-gray-700 hover:text-sky-600 hover:bg-sky-50 transition-colors relative"
                    :class="{ 'text-sky-600 font-medium': activeSection === 'contact' }">
                    Contact
                    <span class="absolute bottom-0 left-0 h-0.5 bg-sky-500 transition-all duration-300" 
                          :class="activeSection === 'contact' ? 'w-full' : 'w-0'"></span>
                </a>
            </nav>

            <!-- Appointment Button -->
            <div class="hidden md:block">
                <a href="{{route('book.appointment')}}" 
                    class="group bg-sky-700 text-white px-6 py-2.5 rounded-lg transition-all duration-300 shadow-md hover:shadow-lg hover:bg-sky-900 font-medium flex items-center space-x-2 overflow-hidden">
                    <span class="z-10">Book Appointment</span>
                </a>
            </div>

            <!-- Mobile Header Actions -->
            <div class="lg:hidden flex items-center space-x-3">
                <!-- Mobile Appointment Button -->
                <a href="{{route('book.appointment')}}" 
                    class="bg-sky-700 text-white px-3 py-1.5 text-sm rounded-lg shadow-sm hover:bg-sky-900 transition-colors">
                    <span class="flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                        </svg>
                        Book
                    </span>
                </a>

                <!-- Mobile Menu Toggle -->
                <button type="button" class="text-gray-500 hover:text-sky-600 focus:outline-none" @click="open = !open">
                    <svg x-show="!open" xmlns="http://www.w3.org/2000/svg" class="h-7 w-7" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                    <svg x-show="open" xmlns="http://www.w3.org/2000/svg" class="h-7 w-7" fill="none" viewBox="0 0 24 24" stroke="currentColor" x-cloak>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Mobile Navigation Menu -->
    <div 
        x-show="open" 
        x-transition:enter="transition ease-out duration-200"
        x-transition:enter-start="opacity-0 -translate-y-4"
        x-transition:enter-end="opacity-100 translate-y-0"
        x-transition:leave="transition ease-in duration-150"
        x-transition:leave-start="opacity-100 translate-y-0"
        x-transition:leave-end="opacity-0 -translate-y-4"
        class="lg:hidden bg-white shadow-xl border-t absolute left-0 right-0 overflow-hidden" 
        x-cloak>
        <nav class="container mx-auto px-6 py-4 flex flex-col divide-y divide-gray-100">
            <a href="/" class="py-3 flex items-center space-x-3 text-gray-700 hover:text-sky-600" @click="open = false; activeSection = 'home'">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                </svg>
                <span>Home</span>
            </a>
            <a href="{{ route('services') }}" class="py-3 flex items-center space-x-3 text-gray-700 hover:text-sky-600" @click="open = false;">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
                </svg>
                <span>Services</span>
            </a>
            <a href="{{ route('doctors') }}" class="py-3 flex items-center space-x-3 text-gray-700 hover:text-sky-600" @click="open = false;">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                </svg>
                <span>Our Doctors</span>
            </a>
            <a href="{{ route('about') }}" class="py-3 flex items-center space-x-3 text-gray-700 hover:text-sky-600" @click="open = false;">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
                <span>About Us</span>
            </a>
            <a href="{{ route('careers') }}" class="py-3 flex items-center space-x-3 text-gray-700 hover:text-sky-600" @click="open = false;">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                </svg>
                <span>Careers</span>
            </a>
            <a href="{{ route('contact') }}" class="py-3 flex items-center space-x-3 text-gray-700 hover:text-sky-600" @click="open = false;">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                </svg>
                <span>Contact</span>
            </a>
            <div class="py-4">
                <a href="{{route('book.appointment')}}" 
                    class="w-full bg-sky-800 px-3 text-white py-3 rounded-lg transition-all duration-300 shadow font-medium text-center"
                    @click="open = false;">
                    Book Appointment
                </a>
            </div>
        </nav>
    </div>
    
   
</header>

<!-- Add this to your main CSS file or in the tailwind.config.js as needed -->
<style>
    [x-cloak] { display: none !important; }
    
    /* Optional - add this to your tailwind.config.js */
    .animate-float {
        animation: float 3s ease-in-out infinite;
    }
</style>
 <!-- Small Screen Call to Action Button (Fixed) -->
 <div class="md:hidden fixed bottom-4 right-4 z-50">
        <a href="{{route('manage.appointments')}}" 
            class="bg-gradient-to-r from-sky-500 to-sky-700 hover:from-sky-600 hover:to-sky-800 text-white w-14 h-14 rounded-full shadow-lg flex items-center justify-center transition-all duration-300 hover:shadow-xl">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
            </svg>
        </a>
    </div>
</div>