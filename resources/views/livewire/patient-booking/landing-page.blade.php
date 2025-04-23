<div>
    <!-- Hero Section with beige theme -->
    <section class="relative pt-28 pb-20 md:pt-36 md:pb-32 bg-gradient-to-r from-beige-50 to-beige-100 overflow-hidden">
        <div class="absolute inset-0 bg-pattern opacity-5"></div>
        <div class="container mx-auto px-4 flex flex-col md:flex-row items-center relative z-10">
            <div class="md:w-1/2 mb-10 md:mb-0 px-6 animate-fadeIn">
                <h1 class="text-4xl md:text-5xl font-bold text-neutral-800 leading-tight mb-4">
                    Compassionate Healthcare <span class="text-beige-700 block mt-1">For Your Family</span>
                </h1>
                <p class="text-lg text-gray-600 mb-8 leading-relaxed">
                    Experience world-class medical care with our team of dedicated specialists and
                    patient-centered ap/our-doctorsproach. Your health is our priority.
                </p>
                <div class="flex flex-col sm:flex-row gap-4">
                    <a wire:navigate href="{{route('book.appointment')}}" class="group relative bg-beige-600 hover:bg-beige-700 text-white px-8 py-3.5 rounded-lg transition-all duration-300 shadow-lg hover:shadow-xl text-lg font-medium flex items-center justify-center">
                        <span>Book Appointment</span>
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ml-2 group-hover:translate-x-1 transition-transform" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M10.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L12.586 11H5a1 1 0 110-2h7.586l-2.293-2.293a1 1 0 010-1.414z" clip-rule="evenodd" />
                        </svg>

                        <!-- Improved Ping Animation -->
                        <span class="absolute top-0 right-0 -mt-1 -mr-1 flex h-3 w-3">
                            <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-beige-400 opacity-75"></span>
                            <span class="relative inline-flex rounded-full h-3 w-3 bg-beige-500"></span>
                        </span>
                    </a>


                </div>

                <!-- Quick Stats -->
                <div class="flex flex-wrap gap-6 mt-10">
                    <div class="flex items-center">
                        <div class="bg-beige-100 p-3 rounded-full mr-3">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-beige-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </div>
                        <div>
                            <p class="font-bold text-2xl text-gray-800">10+</p>
                            <p class="text-sm text-gray-600">Years of Experience</p>
                        </div>
                    </div>
                    <div class="flex items-center">
                        <div class="bg-beige-100 p-3 rounded-full mr-3">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-beige-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z" />
                            </svg>
                        </div>
                        <div>
                            <p class="font-bold text-2xl text-gray-800">5000+</p>
                            <p class="text-sm text-gray-600">Successful Treatments</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="md:w-1/2 relative animate-slideInRight">
                <div class="relative">
                    <div class="absolute -inset-4 bg-gradient-to-r from-beige-200 to-beige-300 rounded-full blur-lg opacity-70"></div>
                    <img src="{{ asset('images/heroImageHt.jpg') }}" alt="Doctor with patient" class="w-full h-auto rounded-2xl shadow-2xl relative" onerror="this.src='/api/placeholder/600/400'; this.onerror=null;">
                </div>

                <!-- Floating Elements -->
                <div class="absolute -bottom-6 -left-6 bg-white p-4 rounded-lg shadow-lg flex items-center space-x-3 animate-float">
                    <div class="bg-beige-100 p-2 rounded-full">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-beige-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                    <div>
                        <p class="font-bold text-gray-800">Safe & Quality Care</p>
                        <p class="text-xs text-gray-500">Advanced protocols</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Facilities Section -->
    <section class="py-12 bg-white">
        <div class="container mx-auto px-4">
            <div class="text-center mb-16">
                <span class="text-beige-600 font-semibold text-sm uppercase tracking-wider">World-Class Medical Care</span>
                <h2 class="text-3xl md:text-4xl font-bold text-beige-900 mt-2 mb-4">Our <span class="text-beige-600">Facilities</span></h2>
                <div class="w-24 h-1 bg-beige-400 mx-auto mb-6"></div>
                <p class="max-w-2xl mx-auto text-gray-600">Experience healthcare excellence with our state-of-the-art facilities and compassionate medical professionals.</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div class="bg-white p-8 rounded-xl shadow-lg hover:shadow-xl transition-shadow duration-300 border border-gray-100 group hover:-translate-y-1 transition-transform duration-300">
                    <div class="bg-beige-100 p-4 rounded-full inline-block mb-6 group-hover:bg-beige-200 transition-colors duration-300">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 text-beige-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-gray-800 mb-3">Expert Doctors</h3>
                    <p class="text-gray-600 leading-relaxed">Board-certified specialists with years of experience dedicated to providing compassionate patient care.</p>
                    <div class="mt-6 flex items-center text-beige-600 font-medium">
                      <a href="{{route('our.doctors')}}" wire:navigate><span>Learn more</span></a>  
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ml-1 group-hover:translate-x-1 transition-transform" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M12.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-2.293-2.293a1 1 0 010-1.414z" clip-rule="evenodd" />
                        </svg>
                    </div>
                </div>

                <div class="bg-white p-8 rounded-xl shadow-lg hover:shadow-xl transition-shadow duration-300 border border-gray-100 group hover:-translate-y-1 transition-transform duration-300">
                    <div class="bg-beige-100 p-4 rounded-full inline-block mb-6 group-hover:bg-beige-200 transition-colors duration-300">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 text-beige-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-gray-800 mb-3">Advanced Facilities</h3>
                    <p class="text-gray-600 leading-relaxed">State-of-the-art medical equipment and modern healing environments designed for optimal patient recovery.</p>
                    <div class="mt-6 flex items-center text-beige-600 font-medium">
                       <a href="{{route('services.page')}}" wire:navigate><span>Learn more</span></a>
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ml-1 group-hover:translate-x-1 transition-transform" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M12.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-2.293-2.293a1 1 0 010-1.414z" clip-rule="evenodd" />
                        </svg>
                    </div>
                </div>

                <div class="bg-white p-8 rounded-xl shadow-lg hover:shadow-xl transition-shadow duration-300 border border-gray-100 group hover:-translate-y-1 transition-transform duration-300">
                    <div class="bg-beige-100 p-4 rounded-full inline-block mb-6 group-hover:bg-beige-200 transition-colors duration-300">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 text-beige-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-gray-800 mb-3">Patient-Centered Care</h3>
                    <p class="text-gray-600 leading-relaxed">Personalized treatment plans focused on your health and comfort, putting your needs at the center of everything we do.</p>
                    <div class="mt-6 flex items-center text-beige-600 font-medium">
                     <a href="{{route('manage.appointments')}}" wire:navigate><span>Learn more</span></a>
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ml-1 group-hover:translate-x-1 transition-transform" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M12.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-2.293-2.293a1 1 0 010-1.414z" clip-rule="evenodd" />
                        </svg>
                    </div>
                </div>
            </div>
        </div>
    </section>



    <!-- About Us Section -->
    <section id="about" class="py-12 bg-gradient-to-r from-beige-50 to-beige-100">
        <div class="container mx-auto px-4">
            <div class="text-center mb-12">
                <span class="text-beige-600 font-semibold text-sm uppercase tracking-wider">Our Story</span>
                <h2 class="text-3xl md:text-4xl font-bold text-beige-900 mt-2 mb-4">About <span class="text-beige-600">{{ $hospital_name }}</span></h2>
                <div class="w-24 h-1 bg-beige-400 mx-auto mb-6"></div>
                <p class="text-gray-600 max-w-3xl mx-auto">
                    Founded with a mission to provide accessible and exceptional healthcare to our community, serving with compassion since 1995.
                </p>
            </div>

            <div class="flex flex-col md:flex-row items-center gap-12">
                <div class="md:w-1/2">
                    <div class="relative">
                        <div class="absolute -inset-4 bg-gradient-to-r from-beige-200 to-beige-300 rounded-xl blur-lg opacity-70 -z-10"></div>
                        <img src="{{asset('images/hospital1.jpg')}}" alt="Healing Touch Hospital Building" class="w-full h-auto rounded-xl shadow-lg" onerror="this.src='/api/placeholder/600/400'; this.onerror=null;">
                        <!-- Experience Badge -->
                        <div class="absolute -bottom-6 -right-6 bg-white py-3 px-6 rounded-full shadow-lg">
                            <p class="text-gray-800 font-bold text-xl">25+ Years of Excellence</p>
                        </div>
                    </div>
                </div>
                <div class="md:w-1/2">
                    <h3 class="text-2xl font-bold text-beige-800 mb-6 flex items-center">
                        <span class="bg-beige-100 text-beige-600 p-2 rounded-full mr-3">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </span>
                        Our Mission
                    </h3>
                    <p class="text-beige-700 mb-8 leading-relaxed">
                        At {{ $hospital_name }}, our mission is to enhance the health and wellbeing of the communities we serve by providing patient-centered care that is compassionate, accessible, and of the highest quality. We're committed to innovation, continuous improvement, and creating a healing environment for our patients and their families.
                    </p>

                    <h3 class="text-2xl font-bold text-gray-800 mb-6 flex items-center">
                        <span class="bg-beige-100 text-beige-600 p-2 rounded-full mr-3">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z" />
                            </svg>
                        </span>
                        Our Values
                    </h3>
                    <ul class="space-y-4 text-beige-700">
                        <li class="flex items-start bg-white p-4 rounded-lg shadow-sm">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-beige-600 mr-3 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                            </svg>
                            <div>
                                <span class="font-bold text-gray-800">Excellence:</span>
                                <span class="ml-1">Delivering the highest standard of care in every interaction</span>
                            </div>
                        </li>
                        <li class="flex items-start bg-white p-4 rounded-lg shadow-sm">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-beige-600 mr-3 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                            </svg>
                            <div>
                                <span class="font-bold text-gray-800">Compassion:</span>
                                <span class="ml-1">Treating every patient with dignity, respect, and empathy</span>
                            </div>
                        </li>
                        <li class="flex items-start bg-white p-4 rounded-lg shadow-sm">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-beige-600 mr-3 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                            </svg>
                            <div>
                                <span class="font-bold text-gray-800">Innovation:</span>
                                <span class="ml-1">Embracing cutting-edge technology and medical advances</span>
                            </div>
                        </li>
                        <li class="flex items-start bg-white p-4 rounded-lg shadow-sm">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-beige-600 mr-3 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                            </svg>
                            <div>
                                <span class="font-bold text-gray-800">Integrity:</span>
                                <span class="ml-1">Maintaining the highest ethical standards in all we do</span>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <!-- Our Services Component -->
    <livewire:patient-booking.our-services />

    <!-- Mobile Fixed Book Appointment Button -->
    <div id="mobile-book-btn"
        class="fixed bottom-8 right-4 md:hidden z-50 opacity-0 transition-all duration-300 ease-in-out">
        <a wire:navigate href="{{route('book.appointment')}}"
            class="bg-beige-600 hover:bg-beige-700 text-white px-4 py-2 rounded-lg shadow-lg hover:shadow-2xl 
                  flex items-center gap-2 transition-all duration-300 group">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
            </svg>
            <span class="text-sm font-medium whitespace-nowrap">Book Now</span>
        </a>
    </div>

    <script>
        function scrollToBooking() {
            window.location.href = "{{ route('book.appointment') }}";
        }

        // Add these classes to your tailwind.config.js
        // @keyframes fadeIn { from { opacity: 0; } to { opacity: 1; } }
        // @keyframes slideInRight { from { transform: translateX(50px); opacity: 0; } to { transform: translateX(0); opacity: 1); } }
        // @keyframes float { 0% { transform: translateY(0px); } 50% { transform: translateY(-10px); } 100% { transform: translateY(0px); } }

        // Mobile booking button scroll behavior
        document.addEventListener('DOMContentLoaded', function() {
            const mobileBtn = document.getElementById('mobile-book-btn');
            let lastScrollY = window.scrollY;
            let ticking = false;

            window.addEventListener('scroll', function() {
                if (!ticking) {
                    window.requestAnimationFrame(function() {
                        if (window.scrollY > 300) {
                            mobileBtn.style.opacity = '1';
                            mobileBtn.style.transform = 'translateY(0)';
                        } else {
                            mobileBtn.style.opacity = '0';
                            mobileBtn.style.transform = 'translateY(20px)';
                        }
                        lastScrollY = window.scrollY;
                        ticking = false;
                    });
                    ticking = true;
                }
            });
        });
    </script>
</div>