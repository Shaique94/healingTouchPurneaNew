<header class="fixed z-50 top-4 left-8 right-8 bg-white shadow-md rounded-lg">
    <div class="px-4 py-3 flex justify-between items-center">
        <div class="flex items-center">
            <a href="/home" class="flex items-center">
                <img src="{{ asset('healingTouchLogo.jpeg') }}" alt="Healing Touch Hospital Logo" class="h-10 w-10 object-contain" />
                <span class="ml-2 text-xl font-bold text-lime-600">Healing Touch Hospital</span>
            </a>
        </div>

        <nav class="hidden md:block">
            <ul class="flex space-x-8">
                <li><a href="/" class="hover:text-blue-600 transition-colors">Home</a></li>
                <li><a href="#services" class="hover:text-blue-600 transition-colors">Services</a></li>
                <li><a href="#about" class="hover:text-blue-600 transition-colors">About Us</a></li>
                <li><a href="#doctors" class="hover:text-blue-600 transition-colors">Our Doctors</a></li>
                <li><a href="#contact" class="hover:text-blue-600 transition-colors">Career</a></li>
                <li><a href="#contact" class="hover:text-blue-600 transition-colors">Contact</a></li>
            </ul>
        </nav>

        <div>
            <button
                class="bg-amber-400 hover:bg-amber-700 text-white px-5 py-2 rounded-md transition-colors"
                x-data
                @click="$dispatch('open-modal', { name: 'book-appointment' })">
                Book Appointment
            </button>
        </div>

        <!-- Mobile menu button -->
        <div class="md:hidden">
            <button type="button" class="text-gray-500 hover:text-gray-600" x-data @click="$dispatch('open-modal', { name: 'mobile-menu' })">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                </svg>
            </button>
        </div>
    </div>
</header>