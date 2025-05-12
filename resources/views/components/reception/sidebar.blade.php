<div class="min-h-screen bg-gradient-to-br from-beige-50 to-gray-100 flex flex-col md:flex-row">
     <!-- Mobile header with menu toggle -->
    <div class="md:hidden bg-white shadow-md p-4 flex items-center justify-between">
        <div class="flex items-center space-x-3">
            <div class="bg-beige-600 h-9 w-9 rounded-lg flex items-center justify-center shadow-sm">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                </svg>
            </div>
            <h2 class="text-xl font-bold text-gray-800">Reception</h2>
        </div>
        <button
            id="mobileMenuToggle"
            class="text-gray-600 hover:text-beige-700 focus:outline-none transition-colors"
            aria-label="Toggle menu">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
            </svg>
        </button>
    </div>

    <!-- Sidebar for desktop and mobile (when opened) -->
    <aside id="sidebar" class="w-full md:w-64 bg-white shadow-lg p-6 md:block fixed md:static inset-0 z-20 transform -translate-x-full md:translate-x-0 transition-transform duration-300 ease-in-out">
        <!-- Close button for mobile -->
        <button
            id="closeMobileMenu"
            class="md:hidden absolute top-4 right-4 text-gray-500 hover:text-gray-700 focus:outline-none"
            aria-label="Close menu">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
            </svg>
        </button>

        <div class="flex items-center space-x-3 mb-8 md:mt-0 mt-8">
            <div class="bg-beige-600 h-9 w-9 rounded-lg flex items-center justify-center shadow-sm">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                </svg>
            </div>
            <h2 class="text-xl font-bold text-gray-800">Reception</h2>
        </div>

        <nav class="space-y-2">
            <a wire:navigate href="{{ route('reception.dashboard') }}" 
               class="flex items-center px-4 py-3 rounded-lg {{ request()->routeIs('reception.dashboard') ? 'bg-beige-600 text-white' : 'text-gray-700 hover:bg-beige-100 hover:text-beige-700' }} font-medium transition-all duration-200">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                </svg>
                Dashboard
            </a>
            <button wire:click="openModal" 
                    class="flex w-full items-center px-4 py-3 rounded-lg {{ $showModal ? 'bg-beige-600 text-white' : 'text-gray-700 hover:bg-beige-100 hover:text-beige-700' }} font-medium transition-all duration-200">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M9 12h6m-3-3v6m-6 6h12a2 2 0 002-2V7a2 2 0 00-2-2h-3.586a1 1 0 01-.707-.293l-.707-.707A1 1 0 0012 4h-1a1 1 0 00-.707.293l-.707.707A1 1 0 019.586 5H6a2 2 0 00-2 2v13a2 2 0 002 2z" />
                </svg>
                Add OPD Patient
            </button>

            <a class="flex flex-col px-4 py-3 rounded-lg text-gray-700 hover:bg-beige-100 hover:text-beige-700 font-medium transition-all duration-200">
                <div class="flex items-center mb-2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 16v2a2 2 0 002 2h12a2 2 0 002-2v-2M7 10l5 5m0 0l5-5m-5 5V4" />
                    </svg>
                    <span>Nextday Appointments</span>
                </div>

                <select id="doctor-select" wire:model="selectedDoctorId"
                    class="mb-2 block w-full px-3 py-2 border border-gray-300 rounded-md text-sm shadow-sm focus:outline-none focus:ring-beige-500 focus:border-beige-500">
                    <option value="">All Doctors</option>
                    @foreach ($doctors as $doctor)
                    <option value="{{ $doctor->id }}">{{ $doctor->user->name }}</option>
                    @endforeach
                </select>

                <button wire:click="downloadTomorrowAppointmentsPDF"
                    wire:loading.attr="disabled"
                    wire:target="downloadTomorrowAppointmentsPDF"
                    class="w-full flex items-center justify-center px-3 py-2 rounded-md bg-beige-600 text-white text-sm hover:bg-beige-700 transition relative">

                    <svg xmlns="http://www.w3.org/2000/svg" 
                         class="h-4 w-4 mr-2"
                         wire:loading.class="hidden"
                         wire:target="downloadTomorrowAppointmentsPDF"
                         fill="none" 
                         viewBox="0 0 24 24"
                         stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 16v2a2 2 0 002 2h12a2 2 0 002-2v-2M7 10l5 5m0 0l5-5m-5 5V4" />
                    </svg>

                    <span wire:loading.remove wire:target="downloadTomorrowAppointmentsPDF">
                        Download PDF
                    </span>

                    <span wire:loading wire:target="downloadTomorrowAppointmentsPDF">
                        Downloading...
                        <svg class="animate-spin h-4 w-4 ml-2 inline-block" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 24 24">
                            <circle class="opacity-25" cx="12" cy="12" r="10"
                                stroke="currentColor" stroke-width="4"></circle>
                            <path class="opacity-75" fill="currentColor"
                                d="M4 12a8 8 0 018-8v4l3-3-3-3v4a8 8 0 100 16v-4l-3 3 3 3v-4a8 8 0 01-8-8z">
                            </path>
                        </svg>
                    </span>
                </button>

            </a>

            <div class="pt-6 mt-6 border-t border-gray-200">
                <a wire:navigate wire:click="logout" class="flex items-center px-4 py-3 rounded-lg text-red-600 hover:bg-red-50 font-medium transition-all duration-200">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                    </svg>
                    Logout
                </a>
            </div>
        </nav>
    </aside>

    <!-- Mobile overlay when menu is open -->
    <div id="sidebarOverlay" class="md:hidden fixed inset-0 bg-black bg-opacity-50 z-10 opacity-0 pointer-events-none transition-opacity duration-300"></div>
 <script>
    document.addEventListener('DOMContentLoaded', function() {
        const sidebar = document.getElementById('sidebar');
        const overlay = document.getElementById('sidebarOverlay');
        const toggleButton = document.getElementById('mobileMenuToggle');
        const closeButton = document.getElementById('closeMobileMenu');

        function openMobileMenu() {
            sidebar.classList.remove('-translate-x-full');
            overlay.classList.remove('opacity-0', 'pointer-events-none');
            overlay.classList.add('opacity-100', 'pointer-events-auto');
        }

        function closeMobileMenu() {
            sidebar.classList.add('-translate-x-full');
            overlay.classList.remove('opacity-100', 'pointer-events-auto');
            overlay.classList.add('opacity-0', 'pointer-events-none');
        }

        toggleButton.addEventListener('click', openMobileMenu);
        closeButton.addEventListener('click', closeMobileMenu);
        overlay.addEventListener('click', closeMobileMenu);
    });
</script>
</div>