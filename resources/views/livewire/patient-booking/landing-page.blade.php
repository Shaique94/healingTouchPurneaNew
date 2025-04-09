<div>
    <section class="relative pt-28 pb-20 md:pt-40 md:pb-32 bg-gradient-to-r from-lime-100 to-amber-50">
        <div class="container mx-auto px-4 flex flex-col md:flex-row items-center">
            <div class="md:w-1/2 mb-10 md:mb-0 px-6">
                <h1 class="text-4xl md:text-5xl font-bold text-gray-800 leading-tight mb-4">
                    Compassionate Healthcare for<p class="text-lime-600"> Your Family</p>
                </h1>
                <p class="text-lg text-gray-600 mb-8">
                    Experience world-class medical care with our team of dedicated specialists,
                    and patient-centered approach.
                </p>
                <div class="flex flex-col sm:flex-row gap-4">
                    <button class="relative bg-amber-400 hover:bg-lime-700 text-white px-6 py-3 rounded-md transition-colors text-lg font-medium">
                        Book Appointment

                        <!-- Ping Animation Circle -->
                        <span class="absolute top-0 right-0 -mt-1 -mr-1 flex h-3 w-3">
                            <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-amber-500 opacity-75"></span>
                            <span class="relative inline-flex rounded-full h-3 w-3 bg-lime-500"></span>
                        </span>
                    </button>


                </div>
            </div>
            <div class="hidden md:block md:w-1/2">
                <img src="{{ asset('images/heroImageHt.jpg') }}" alt="Doctor with patient" class="w-full h-auto rounded-lg shadow-xl" onerror="this.src='/api/placeholder/600/400'; this.onerror=null;">
            </div>
        </div>

    </section>
    <!-- Stats Section -->
    <div class="container mx-auto px-4 mt-16 mb-8">
    <div class="text-center mb-12">
                <h2 class="text-3xl font-bold text-grey-600 mb-4">Our <span class="text-lime-600">Facilities</span></h2>
                <div class="w-24 h-1 bg-gray-600 mx-auto mb-6"></div>
               
            </div>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <div class="bg-white p-6 rounded-lg shadow-md text-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 mx-auto mb-4 text-black" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                </svg>
                <h3 class="text-lg font-semibold text-gray-800 mb-2">Expert Doctors</h3>
                <p class="text-gray-600">Board-certified specialists dedicated to compassionate patient care</p>
            </div>
            <div class="bg-white p-6 rounded-lg shadow-md text-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 mx-auto mb-4 text-black" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                </svg>
                <h3 class="text-lg font-semibold text-gray-800 mb-2">Advanced Facilities</h3>
                <p class="text-gray-600">State-of-the-art medical equipment and modern healing environments</p>
            </div>
            <div class="bg-white p-6 rounded-lg shadow-md text-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 mx-auto mb-4 text-black" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                </svg>
                <h3 class="text-lg font-semibold text-gray-800 mb-2">Patient-Centered Care</h3>
                <p class="text-gray-600">Personalized treatment plans focused on your health and comfort</p>
            </div>
        </div>
    </div>

    <!-- About Us Section -->
    <section id="about" class="py-16  bg-gradient-to-r from-lime-100 to-amber-50">
        <div class="container mx-auto px-4">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold text-gray-800 mb-4">About <span class="text-lime-600">Healing Touch Hospital</span></h2>
                <div class="w-24 h-1 bg-gray-600 mx-auto mb-6"></div>
                <p class="text-gray-600 max-w-3xl mx-auto">
                    Founded with a mission to provide accessible and exceptional healthcare to our community.
                </p>
            </div>

            <div class="flex flex-col md:flex-row items-center gap-10">
                <div class="md:w-1/2">
                    <img src="{{asset('images/heroImageHt.jpg')}}" alt="Healing Touch Hospital Building" class="w-full h-auto rounded-lg shadow-lg" onerror="this.src='/api/placeholder/600/400'; this.onerror=null;">
                </div>
                <div class="md:w-1/2">
                    <h3 class="text-2xl font-semibold text-gray-800 mb-4">Our Mission</h3>
                    <p class="text-gray-600 mb-6">
                        At Healing Touch Hospital, our mission is to enhance the health and wellbeing of the communities we serve by providing patient-centered care that is compassionate, accessible, and of the highest quality. We're committed to innovation, continuous improvement, and creating a healing environment for our patients and their families.
                    </p>

                    <h3 class="text-2xl font-semibold text-gray-800 mb-4">Our Values</h3>
                    <ul class="space-y-3 text-gray-600">
                        <li class="flex items-start">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-blue-600 mr-2 mt-1" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                            </svg>
                            <span><strong>Excellence:</strong> Delivering the highest standard of care in every interaction</span>
                        </li>
                        <li class="flex items-start">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-blue-600 mr-2 mt-1" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                            </svg>
                            <span><strong>Compassion:</strong> Treating every patient with dignity, respect, and empathy</span>
                        </li>
                        <li class="flex items-start">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-blue-600 mr-2 mt-1" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                            </svg>
                            <span><strong>Innovation:</strong> Embracing cutting-edge technology and medical advances</span>
                        </li>
                        <li class="flex items-start">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-blue-600 mr-2 mt-1" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                            </svg>
                            <span><strong>Integrity:</strong> Maintaining the highest ethical standards in all we do</span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <livewire:patient-booking.our-services />
</div>