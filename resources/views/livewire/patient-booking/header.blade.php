<div>
    <header x-data="{ 
        open: false,
        scrolled: false,
        activeSection: '{{ Route::currentRouteName() }}',
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
                    <a wire:navigate href="/" class="flex items-center space-x-2 group">
                        <div class="overflow-hidden rounded-lg h-11 w-11 flex items-center justify-center transition-all duration-300">
                            <img src="{{ $logoPath }}" alt="{{ $hospitalName }} Logo" class="h-15 w-15 object-contain transform group-hover:scale-110 transition-transform duration-300" />
                        </div>
                        <div>
                            <span class="sm:inline-block font-bold text-xl text-gray-800 group-hover:text-beige-600 transition-colors duration-300">
                                <span class="text-beige-600">{{ explode(' ', $hospitalName)[0] }}</span> {{ implode(' ', array_slice(explode(' ', $hospitalName), 1)) }}
                            </span>
                            <span class="block -mt-1 text-base text-gray-500">Hospital (Purnea)</span>
                        </div>
                    </a>
                </div>

                <!-- Desktop Navigation -->
                <nav class="hidden lg:flex items-center space-x-1">
                    <a wire:navigate href="/"
                        class="px-4 py-2 rounded-lg text-gray-700 hover:text-beige-600 hover:bg-beige-50 transition-colors relative"
                        :class="{ 'text-beige-600 font-medium': activeSection === 'home' }">
                        Home
                        <span class="absolute bottom-0 left-0 h-0.5 bg-beige-500 transition-all duration-300"
                            :class="activeSection === 'home' ? 'w-full' : 'w-0'"></span>
                    </a>
                    <a wire:navigate href="{{ route('services.page') }}"
                        class="px-4 py-2 rounded-lg text-gray-700 hover:text-beige-600 hover:bg-beige-50 transition-colors relative"
                        :class="{ 'text-beige-600 font-medium': activeSection === 'services.page' }">
                        Services
                        <span class="absolute bottom-0 left-0 h-0.5 bg-beige-500 transition-all duration-300"
                            :class="activeSection === 'services.page' ? 'w-full' : 'w-0'"></span>
                    </a>
                    <a wire:navigate href="{{ route('our.doctors') }}"
                        class="px-4 py-2 rounded-lg text-gray-700 hover:text-beige-600 hover:bg-beige-50 transition-colors relative"
                        :class="{ 'text-beige-600 font-medium': activeSection === 'our.doctors' }">
                        Our Doctors
                        <span class="absolute bottom-0 left-0 h-0.5 bg-beige-500 transition-all duration-300"
                            :class="activeSection === 'our.doctors' ? 'w-full' : 'w-0'"></span>
                    </a>
                    <a wire:navigate href="{{ route('about.page') }}"
                        class="px-4 py-2 rounded-lg text-gray-700 hover:text-beige-600 hover:bg-beige-50 transition-colors relative"
                        :class="{ 'text-beige-600 font-medium': activeSection === 'about.page' }">
                        About Us
                        <span class="absolute bottom-0 left-0 h-0.5 bg-beige-500 transition-all duration-300"
                            :class="activeSection === 'about.page' ? 'w-full' : 'w-0'"></span>
                    </a>
                    <a wire:navigate href="{{ route('gallery.page') }}"
                        class="px-4 py-2 rounded-lg text-gray-700 hover:text-beige-600 hover:bg-beige-50 transition-colors relative"
                        :class="{ 'text-beige-600 font-medium': activeSection === 'gallery.page' }">
                        Gallery
                        <span class="absolute bottom-0 left-0 h-0.5 bg-beige-500 transition-all duration-300"
                            :class="activeSection === 'gallery.page' ? 'w-full' : 'w-0'"></span>
                    </a>
                    <a wire:navigate href="{{ route('contact.page') }}"
                        class="px-4 py-2 rounded-lg text-gray-700 hover:text-beige-600 hover:bg-beige-50 transition-colors relative"
                        :class="{ 'text-beige-600 font-medium': activeSection === 'contact.page' }">
                        Contact
                        <span class="absolute bottom-0 left-0 h-0.5 bg-beige-500 transition-all duration-300"
                            :class="activeSection === 'contact.page' ? 'w-full' : 'w-0'"></span>
                    </a>
                </nav>

                <!-- Appointment Button -->
                <div class="hidden md:block">
                    <a wire:navigate href="{{ route('book.appointment') }}"
                        class="group bg-beige-700 text-white px-6 py-2.5 rounded-lg transition-all duration-300 shadow-md hover:shadow-lg hover:bg-beige-900 font-medium flex items-center space-x-2 overflow-hidden">
                        <span class="z-10">Book Appointment</span>
                    </a>
                </div>

                <!-- Mobile Header Actions -->
                <div class="lg:hidden flex items-center space-x-3">
                    <!-- Mobile Appointment Button -->
                    <a wire:navigate href="{{ route('book.appointment') }}"
                        class="bg-beige-700 text-white px-3 py-1.5 text-sm rounded-lg shadow-sm hover:bg-beige-900 transition-colors">
                        <span class="flex items-center truncate">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                            </svg>
                            Appointment
                        </span>
                    </a>

                    <!-- Mobile Menu Toggle -->
                    <button type="button" aria-label="Menu" class="text-gray-500 hover:text-beige-600 focus:outline-none" @click="open = !open">
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

        <!-- Mobile Menu -->
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
                <!-- Home Link with Icon -->
                <a wire:navigate href="/" class="py-3 flex items-center space-x-3 text-gray-700 hover:text-beige-600" @click="open = false; activeSection = 'home'">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                    </svg>
                    <span>Home</span>
                </a>

                <!-- Services Link with Icon -->
                <a wire:navigate href="{{ route('services.page') }}" class="py-3 flex items-center space-x-3 text-gray-700 hover:text-beige-600" @click="open = false;">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 0h4m-4 0H8" />
                    </svg>
                    <span>Services</span>
                </a>

                <!-- Doctors Link with Icon -->
                <a wire:navigate href="{{ route('our.doctors') }}" class="py-3 flex items-center space-x-3 text-gray-700 hover:text-beige-600" @click="open = false;">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5.121 17.804A13.937 13.937 0 0112 16c2.5 0 4.847.655 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0zm6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    <span>Our Doctors</span>
                </a>

                <!-- About Link with Icon -->
                <a wire:navigate href="{{ route('about.page') }}" class="py-3 flex items-center space-x-3 text-gray-700 hover:text-beige-600" @click="open = false;">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    <span>About</span>
                </a>
                <a wire:navigate href="{{ route('gallery.page') }}" class="py-3 flex items-center space-x-3 text-gray-700 hover:text-beige-600" @click="open = false;">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4-4a3 3 0 014 0l4 4m4-10v14a2 2 0 01-2 2H6a2 2 0 01-2-2V6a2 2 0 012-2h12a2 2 0 012 2z" />
                    </svg>
                    <span>Gallery</span>
                </a>

                <!-- Careers Link with Icon -->
                <a wire:navigate href="{{ route('careers.page') }}" class="py-3 flex items-center space-x-3 text-gray-700 hover:text-beige-600" @click="open = false;">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                    </svg>
                    <span>Jobs</span>
                </a>

                <!-- Contact Link with Icon -->
                <a wire:navigate href="{{ route('contact.page') }}" class="py-3 flex items-center space-x-3 text-gray-700 hover:text-beige-600" @click="open = false;">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                    </svg>
                    <span>Contact</span>
                </a>
            </nav>
        </div>
    </header>
</div>