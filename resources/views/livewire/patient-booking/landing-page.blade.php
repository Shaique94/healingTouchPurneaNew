<div>
    <!-- Hero Section with improved layout and animations -->
    <section class="relative pt-28 pb-20 md:pt-36 md:pb-32 bg-gradient-to-r from-sky-50 to-sky-100 overflow-hidden">
        <div class="absolute inset-0 bg-pattern opacity-5"></div>
        <div class="container mx-auto px-4 flex flex-col md:flex-row items-center relative z-10">
            <div class="md:w-1/2 mb-10 md:mb-0 px-6 animate-fadeIn">
                <h1 class="text-4xl md:text-5xl font-bold text-gray-800 leading-tight mb-4">
                    Compassionate Healthcare <span class="text-sky-600 block mt-1">For Your Family</span>
                </h1>
                <p class="text-lg text-gray-600 mb-8 leading-relaxed">
                    Experience world-class medical care with our team of dedicated specialists and
                    patient-centered approach. Your health is our priority.
                </p>
                <div class="flex flex-col sm:flex-row gap-4">
                    <a href="{{route('manage.appointments'}}" class="group relative bg-sky-600 hover:bg-sky-700 text-white px-8 py-3.5 rounded-lg transition-all duration-300 shadow-lg hover:shadow-xl text-lg font-medium flex items-center justify-center">
                        <span>Book Appointment</span>
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ml-2 group-hover:translate-x-1 transition-transform" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M10.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L12.586 11H5a1 1 0 110-2h7.586l-2.293-2.293a1 1 0 010-1.414z" clip-rule="evenodd" />
                        </svg>
                        
                        <!-- Improved Ping Animation -->
                        <span class="absolute top-0 right-0 -mt-1 -mr-1 flex h-3 w-3">
                            <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-sky-400 opacity-75"></span>
                            <span class="relative inline-flex rounded-full h-3 w-3 bg-sky-500"></span>
                        </span>
                    </a>
                    
                    <a href="#about" class="bg-transparent border-2 border-gray-700 hover:bg-gray-700 hover:text-white text-gray-700 px-8 py-3.5 rounded-lg transition-colors duration-300 text-lg font-medium flex items-center justify-center">
                        Learn More
                    </a>
                </div>
                
                <!-- Quick Stats -->
                <div class="flex flex-wrap gap-6 mt-10">
                    <div class="flex items-center">
                        <div class="bg-sky-100 p-3 rounded-full mr-3">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-sky-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                            </svg>
                        </div>
                        <div>
                            <p class="font-bold text-2xl text-gray-800">25+</p>
                            <p class="text-sm text-gray-600">Expert Doctors</p>
                        </div>
                    </div>
                    <div class="flex items-center">
                        <div class="bg-sky-100 p-3 rounded-full mr-3">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-sky-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z" />
                            </svg>
                        </div>
                        <div>
                            <p class="font-bold text-2xl text-gray-800">10K+</p>
                            <p class="text-sm text-gray-600">Successful Treatments</p>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="md:w-1/2 relative animate-slideInRight">
                <div class="relative">
                    <div class="absolute -inset-4 bg-gradient-to-r from-sky-200 to-sky-300 rounded-full blur-lg opacity-70"></div>
                    <img src="{{ asset('images/heroImageHt.jpg') }}" alt="Doctor with patient" class="w-full h-auto rounded-2xl shadow-2xl relative" onerror="this.src='/api/placeholder/600/400'; this.onerror=null;">
                </div>
                
                <!-- Floating Elements -->
                <div class="absolute -bottom-6 -left-6 bg-white p-4 rounded-lg shadow-lg flex items-center space-x-3 animate-float">
                    <div class="bg-sky-100 p-2 rounded-full">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-sky-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
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

    <!-- Facilities Section with improved cards -->
    <section class="py-20 bg-white">
        <div class="container mx-auto px-4">
            <div class="text-center mb-16">
                <span class="text-sky-600 font-semibold text-sm uppercase tracking-wider">World-Class Medical Care</span>
                <h2 class="text-3xl md:text-4xl font-bold text-gray-800 mt-2 mb-4">Our <span class="text-sky-600">Facilities</span></h2>
                <div class="w-24 h-1 bg-sky-400 mx-auto mb-6"></div>
                <p class="max-w-2xl mx-auto text-gray-600">Experience healthcare excellence with our state-of-the-art facilities and compassionate medical professionals.</p>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div class="bg-white p-8 rounded-xl shadow-lg hover:shadow-xl transition-shadow duration-300 border border-gray-100 group hover:-translate-y-1 transition-transform duration-300">
                    <div class="bg-sky-100 p-4 rounded-full inline-block mb-6 group-hover:bg-sky-200 transition-colors duration-300">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 text-sky-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-gray-800 mb-3">Expert Doctors</h3>
                    <p class="text-gray-600 leading-relaxed">Board-certified specialists with years of experience dedicated to providing compassionate patient care.</p>
                    <div class="mt-6 flex items-center text-sky-600 font-medium">
                        <span>Learn more</span>
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ml-1 group-hover:translate-x-1 transition-transform" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M12.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-2.293-2.293a1 1 0 010-1.414z" clip-rule="evenodd" />
                        </svg>
                    </div>
                </div>
                
                <div class="bg-white p-8 rounded-xl shadow-lg hover:shadow-xl transition-shadow duration-300 border border-gray-100 group hover:-translate-y-1 transition-transform duration-300">
                    <div class="bg-sky-100 p-4 rounded-full inline-block mb-6 group-hover:bg-sky-200 transition-colors duration-300">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 text-sky-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-gray-800 mb-3">Advanced Facilities</h3>
                    <p class="text-gray-600 leading-relaxed">State-of-the-art medical equipment and modern healing environments designed for optimal patient recovery.</p>
                    <div class="mt-6 flex items-center text-sky-600 font-medium">
                        <span>Learn more</span>
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ml-1 group-hover:translate-x-1 transition-transform" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M12.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-2.293-2.293a1 1 0 010-1.414z" clip-rule="evenodd" />
                        </svg>
                    </div>
                </div>
                
                <div class="bg-white p-8 rounded-xl shadow-lg hover:shadow-xl transition-shadow duration-300 border border-gray-100 group hover:-translate-y-1 transition-transform duration-300">
                    <div class="bg-sky-100 p-4 rounded-full inline-block mb-6 group-hover:bg-sky-200 transition-colors duration-300">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 text-sky-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-gray-800 mb-3">Patient-Centered Care</h3>
                    <p class="text-gray-600 leading-relaxed">Personalized treatment plans focused on your health and comfort, putting your needs at the center of everything we do.</p>
                    <div class="mt-6 flex items-center text-sky-600 font-medium">
                        <span>Learn more</span>
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ml-1 group-hover:translate-x-1 transition-transform" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M12.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-2.293-2.293a1 1 0 010-1.414z" clip-rule="evenodd" />
                        </svg>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Testimonials Section (New) -->
    <section class="py-16 bg-gray-50">
        <div class="container mx-auto px-4">
            <div class="text-center mb-16">
                <span class="text-sky-600 font-semibold text-sm uppercase tracking-wider">Patient Stories</span>
                <h2 class="text-3xl md:text-4xl font-bold text-gray-800 mt-2 mb-4">What Our <span class="text-sky-600">Patients Say</span></h2>
                <div class="w-24 h-1 bg-sky-400 mx-auto mb-6"></div>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div class="bg-white p-6 rounded-xl shadow-md">
                    <div class="flex items-center mb-4">
                        <div class="text-sky-400">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 inline" viewBox="0 0 20 20" fill="currentColor">
                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                            </svg>
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 inline" viewBox="0 0 20 20" fill="currentColor">
                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                            </svg>
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 inline" viewBox="0 0 20 20" fill="currentColor">
                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                            </svg>
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 inline" viewBox="0 0 20 20" fill="currentColor">
                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                            </svg>
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 inline" viewBox="0 0 20 20" fill="currentColor">
                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                            </svg>
                        </div>
                    </div>
                    <p class="text-gray-600 italic mb-4">"The care I received at Healing Touch Hospital was exceptional. The doctors were knowledgeable and took the time to explain everything to me."</p>
                    <div class="flex items-center">
                        <div class="w-12 h-12 rounded-full bg-gray-300 mr-4"></div>
                        <div>
                            <p class="font-semibold text-gray-800">Rajesh Kumar</p>
                            <p class="text-gray-500 text-sm">Patient</p>
                        </div>
                    </div>
                </div>
                
                <div class="bg-white p-6 rounded-xl shadow-md">
                    <div class="flex items-center mb-4">
                        <div class="text-sky-400">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 inline" viewBox="0 0 20 20" fill="currentColor">
                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                            </svg>
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 inline" viewBox="0 0 20 20" fill="currentColor">
                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                            </svg>
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 inline" viewBox="0 0 20 20" fill="currentColor">
                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                            </svg>
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 inline" viewBox="0 0 20 20" fill="currentColor">
                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                            </svg>
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 inline" viewBox="0 0 20 20" fill="currentColor">
                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                            </svg>
                        </div>
                    </div>
                    <p class="text-gray-600 italic mb-4">"From admission to discharge, the staff was professional and caring. The facilities are modern and clean. I couldn't ask for better care."</p>
                    <div class="flex items-center">
                        <div class="w-12 h-12 rounded-full bg-gray-300 mr-4"></div>
                        <div>
                            <p class="font-semibold text-gray-800">Priya Sharma</p>
                            <p class="text-gray-500 text-sm">Patient</p>
                        </div>
                    </div>
                </div>
                
                <div class="bg-white p-6 rounded-xl shadow-md">
                    <div class="flex items-center mb-4">
                        <div class="text-sky-400">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 inline" viewBox="0 0 20 20" fill="currentColor">
                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                            </svg>
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 inline" viewBox="0 0 20 20" fill="currentColor">
                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                            </svg>
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 inline" viewBox="0 0 20 20" fill="currentColor">
                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                            </svg>
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 inline" viewBox="0 0 20 20" fill="currentColor">
                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                            </svg>
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 inline" viewBox="0 0 20 20" fill="currentColor">
                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                            </svg>
                        </div>
                    </div>
                    <p class="text-gray-600 italic mb-4">"The online appointment booking was so convenient. My entire family now gets treated at Healing Touch because of their exceptional service and care."</p>
                    <div class="flex items-center">
                        <div class="w-12 h-12 rounded-full bg-gray-300 mr-4"></div>
                        <div>
                            <p class="font-semibold text-gray-800">Amit Patel</p>
                            <p class="text-gray-500 text-sm">Patient</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- About Us Section - Improved -->
    <section id="about" class="py-20 bg-gradient-to-r from-sky-50 to-sky-100">
        <div class="container mx-auto px-4">
            <div class="text-center mb-12">
                <span class="text-sky-600 font-semibold text-sm uppercase tracking-wider">Our Story</span>
                <h2 class="text-3xl md:text-4xl font-bold text-gray-800 mt-2 mb-4">About <span class="text-sky-600">Healing Touch Hospital</span></h2>
                <div class="w-24 h-1 bg-sky-400 mx-auto mb-6"></div>
                <p class="text-gray-600 max-w-3xl mx-auto">
                    Founded with a mission to provide accessible and exceptional healthcare to our community, serving with compassion since 1995.
                </p>
            </div>

            <div class="flex flex-col md:flex-row items-center gap-12">
                <div class="md:w-1/2">
                    <div class="relative">
                        <div class="absolute -inset-4 bg-gradient-to-r from-sky-200 to-sky-300 rounded-xl blur-lg opacity-70 -z-10"></div>
                        <img src="{{asset('images/heroImageHt.jpg')}}" alt="Healing Touch Hospital Building" class="w-full h-auto rounded-xl shadow-lg" onerror="this.src='/api/placeholder/600/400'; this.onerror=null;">
                        <!-- Experience Badge -->
                        <div class="absolute -bottom-6 -right-6 bg-white py-3 px-6 rounded-full shadow-lg">
                            <p class="text-gray-800 font-bold text-xl">25+ Years of Excellence</p>
                        </div>
                    </div>
                </div>
                <div class="md:w-1/2">
                    <h3 class="text-2xl font-bold text-gray-800 mb-6 flex items-center">
                        <span class="bg-sky-100 text-sky-600 p-2 rounded-full mr-3">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </span>
                        Our Mission
                    </h3>
                    <p class="text-gray-600 mb-8 leading-relaxed">
                        At Healing Touch Hospital, our mission is to enhance the health and wellbeing of the communities we serve by providing patient-centered care that is compassionate, accessible, and of the highest quality. We're committed to innovation, continuous improvement, and creating a healing environment for our patients and their families.
                    </p>

                    <h3 class="text-2xl font-bold text-gray-800 mb-6 flex items-center">
                        <span class="bg-sky-100 text-sky-600 p-2 rounded-full mr-3">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z" />
                            </svg>
                        </span>
                        Our Values
                    </h3>
                    <ul class="space-y-4 text-gray-600">
                        <li class="flex items-start bg-white p-4 rounded-lg shadow-sm">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-sky-600 mr-3 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                            </svg>
                            <div>
                                <span class="font-bold text-gray-800">Excellence:</span>
                                <span class="ml-1">Delivering the highest standard of care in every interaction</span>
                            </div>
                        </li>
                        <li class="flex items-start bg-white p-4 rounded-lg shadow-sm">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-sky-600 mr-3 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                            </svg>
                            <div>
                                <span class="font-bold text-gray-800">Compassion:</span>
                                <span class="ml-1">Treating every patient with dignity, respect, and empathy</span>
                            </div>
                        </li>
                        <li class="flex items-start bg-white p-4 rounded-lg shadow-sm">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-sky-600 mr-3 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                            </svg>
                            <div>
                                <span class="font-bold text-gray-800">Innovation:</span>
                                <span class="ml-1">Embracing cutting-edge technology and medical advances</span>
                            </div>
                        </li>
                        <li class="flex items-start bg-white p-4 rounded-lg shadow-sm">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-sky-600 mr-3 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
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
    
    <!-- Add JavaScript for scroll functionality and animations -->
    <script>
        function scrollToBooking() {
            window.location.href = "{{ route('book.appointment') }}";
        }
        
        // Add these classes to your tailwind.config.js
        // @keyframes fadeIn { from { opacity: 0; } to { opacity: 1; } }
        // @keyframes slideInRight { from { transform: translateX(50px); opacity: 0; } to { transform: translateX(0); opacity: 1; } }
        // @keyframes float { 0% { transform: translateY(0px); } 50% { transform: translateY(-10px); } 100% { transform: translateY(0px); } }
    </script>
</div>