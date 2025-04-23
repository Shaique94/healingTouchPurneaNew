<div>

    <!-- Service Details -->
    <section id="services" class="py-16 mt-14">
        <div class="container mx-auto px-4">
            <div class="text-center mb-16">
                <h2 class="text-3xl md:text-4xl font-bold text-gray-800 mb-4">Our Medical Services</h2>
                <p class="text-gray-600 max-w-3xl mx-auto">We offer a comprehensive range of medical services designed to meet the needs of our community with excellence and compassion.</p>
            </div>

                <livewire:comman.appointment-card />

            <div class="flex flex-col lg:flex-row gap-16 lg:px-10">
                <!-- Sidebar -->
                <div class="lg:w-1/3">
                    <!-- Service List Card -->
                    <div class="bg-white rounded-2xl border border-gray-200 overflow-hidden sticky top-24">
                        <div class="bg-beige-600 p-6">
                            <h3 class="text-2xl font-bold text-white flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-white mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
                                </svg>
                                Our Services
                            </h3>
                        </div>
                        <div class="p-6">
                            <ul class="space-y-1">
                                <li class="group">
                                    <a wire:navigate  href="#multispeciality" class="flex items-center p-3 rounded-lg hover:bg-beige-50 transition duration-300">
                                        <span class="text-beige-600 mr-3">
                                            <i class="fas fa-hospital"></i>
                                        </span>
                                        <span class="font-medium group-hover:text-beige-600">Multispeciality</span>
                                    </a>
                                </li>
                                <li class="group">
                                    <a wire:navigate  href="#icu" class="flex items-center p-3 rounded-lg hover:bg-beige-50 transition duration-300">
                                        <span class="text-beige-600 mr-3">
                                            <i class="fas fa-procedures"></i>
                                        </span>
                                        <span class="font-medium group-hover:text-beige-600">ICU</span>
                                    </a>
                                </li>
                                <li class="group">
                                    <a wire:navigate  href="#nicu" class="flex items-center p-3 rounded-lg hover:bg-beige-50 transition duration-300">
                                        <span class="text-beige-600 mr-3">
                                            <i class="fas fa-baby"></i>
                                        </span>
                                        <span class="font-medium group-hover:text-beige-600">NICU</span>
                                    </a>
                                </li>
                                <li class="group">
                                    <a wire:navigate  href="#ultrasound" class="flex items-center p-3 rounded-lg hover:bg-beige-50 transition duration-300">
                                        <span class="text-beige-600 mr-3">
                                            <i class="fas fa-wave-square"></i>
                                        </span>
                                        <span class="font-medium group-hover:text-beige-600">Ultrasound</span>
                                    </a>
                                </li>
                                <li class="group">
                                    <a wire:navigate  href="#neurosurgery" class="flex items-center p-3 rounded-lg hover:bg-beige-50 transition duration-300">
                                        <span class="text-beige-600 mr-3">
                                            <i class="fas fa-brain"></i>
                                        </span>
                                        <span class="font-medium group-hover:text-beige-600">Neurosurgery</span>
                                    </a>
                                </li>
                                <li class="group">
                                    <a wire:navigate  href="#xray" class="flex items-center p-3 rounded-lg hover:bg-beige-50 transition duration-300">
                                        <span class="text-beige-600 mr-3">
                                            <i class="fas fa-x-ray"></i>
                                        </span>
                                        <span class="font-medium group-hover:text-beige-600">X-RAY</span>
                                    </a>
                                </li>
                                <li class="group">
                                    <a wire:navigate  href="#pathology" class="flex items-center p-3 rounded-lg hover:bg-beige-50 transition duration-300">
                                        <span class="text-beige-600 mr-3">
                                            <i class="fas fa-microscope"></i>
                                        </span>
                                        <span class="font-medium group-hover:text-beige-600">Pathology</span>
                                    </a>
                                </li>
                                <li class="group">
                                    <a wire:navigate  href="#painless-delivery" class="flex items-center p-3 rounded-lg hover:bg-beige-50 transition duration-300">
                                        <span class="text-beige-600 mr-3">
                                            <i class="fas fa-baby-carriage"></i>
                                        </span>
                                        <span class="font-medium group-hover:text-beige-600">Painless Normal Delivery</span>
                                    </a>
                                </li>
                                <li class="group">
                                    <a wire:navigate  href="#delivery-service" class="flex items-center p-3 rounded-lg hover:bg-beige-50 transition duration-300">
                                        <span class="text-beige-600 mr-3">
                                            <i class="fas fa-clock"></i>
                                        </span>
                                        <span class="font-medium group-hover:text-beige-600">24 hrs Delivery Service</span>
                                    </a>
                                </li>
                            </ul>
                        </div>

                        <!-- Hours Card -->
                        <div class="mt-8 border-t border-gray-100 pt-6 px-6 pb-6">
                            <h4 class="font-bold text-lg text-gray-800 mb-4 flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-beige-600 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                                Operating Hours
                            </h4>
                            <div class="space-y-2">
                                <div class="flex justify-between items-center py-1">
                                    <span class="text-gray-600">Monday - Friday</span>
                                    <span class="font-medium text-beige-600">8:00 AM - 6:00 PM</span>
                                </div>
                                <div class="flex justify-between items-center py-1">
                                    <span class="text-gray-600">Saturday</span>
                                    <span class="font-medium text-beige-600">9:00 AM - 4:00 PM</span>
                                </div>
                                <div class="flex justify-between items-center py-1">
                                    <span class="text-gray-600">Sunday</span>
                                    <span class="font-medium text-beige-600">Closed</span>
                                </div>
                            </div>
                            <div class="mt-4 bg-beige-50 rounded-lg p-3">
                                <p class="text-beige-800 text-sm flex items-center">
                                    <span class="text-red-600 mr-2">
                                        <i class="fas fa-ambulance"></i>
                                    </span>
                                    Emergency care available 24/7
                                </p>
                            </div>
                        </div>

                        <!-- Contact Card -->
                        <div class="mt-4 px-6 pb-6">
                            <div class="bg-gray-50 rounded-xl p-4">
                                <h4 class="font-bold text-gray-800 mb-3">Need Help?</h4>
                                <p class="text-gray-600 text-sm mb-3">Contact us for appointments or questions</p>
                                <a wire:navigate  href="#" class="bg-beige-600 hover:bg-beige-700 text-white text-center rounded-lg py-2 px-4 block transition duration-300 w-full sm:w-auto">
                                    <span class="mr-2">
                                        <i class="fas fa-phone-alt"></i>
                                    </span>
                                    Call Now
                                </a>
                            </div>
                        </div>

                    </div>
                </div>

                <!-- Service Descriptions -->
                <div class="lg:w-2/3 space-y-8">

                    <!-- Multispeciality -->
                    <div id="multispeciality" class="bg-white rounded-2xl border border-gray-200 overflow-hidden transform transition duration-300 hover:-translate-y-1">
                        <div class="md:flex">
                            <div class="md:w-1/3 relative overflow-hidden" style="adding-bottom: 33%;"> <!-- 16:9 aspect ratio -->
                                <img src="{{ asset('images/hospital1.jpg') }}" 
                                    alt="Multispeciality Care" 
                                    class="absolute top-0 left-0 h-full w-full object-cover object-center">
                                
                            </div>
                            <div class="md:w-2/3 p-8">
                                <h3 class="text-2xl font-bold text-gray-800 mb-4">Multispeciality Care</h3>
                                <p class="text-gray-600">Our multispeciality care unit provides expert consultation and treatment across various specialties including cardiology, orthopedics, gynecology.</p>
                            </div>
                        </div>
                    </div>

                    <!-- ICU -->
                    <div id="icu" class="bg-white rounded-2xl border border-gray-200 overflow-hidden transform transition duration-300 hover:-translate-y-1">
                        <div class="md:flex">
                            <div class="md:w-1/3 relative overflow-hidden" style="adding-bottom: 33%;"> <!-- 16:9 aspect ratio -->
                                <img src="{{ asset('images/hospital3.jpg') }}" 
                                    alt="ICU Services" 
                                    class="absolute top-0 left-0 h-full w-full object-cover object-center">
                              
                            </div>
                            <div class="md:w-2/3 p-8">
                                <h3 class="text-2xl font-bold text-gray-800 mb-4">ICU Services</h3>
                                <p class="text-gray-600">Our ICU provides advanced critical care and monitoring for patients who are critically ill or recovering from surgery.</p>
                            </div>
                        </div>
                    </div>

                    <!-- NICU -->
                    <div id="nicu" class="bg-white rounded-2xl border border-gray-200 overflow-hidden transform transition duration-300 hover:-translate-y-1">
                        <div class="md:flex">
                            <div class="md:w-1/3 relative overflow-hidden" style="adding-bottom: 33%;"> <!-- 16:9 aspect ratio -->
                                <img src="{{ asset('images/hospital4.jpg') }}" 
                                    alt="NICU Services" 
                                    class="absolute top-0 left-0 h-full w-full object-cover object-center" >
                              
                            </div>
                            <div class="md:w-2/3 p-8">
                                <h3 class="text-2xl font-bold text-gray-800 mb-4">NICU Services</h3>
                                <p class="text-gray-600">Our Neonatal Intensive Care Unit (NICU) provides specialized care for premature and critically ill newborns.</p>
                            </div>
                        </div>
                    </div>

                    <!-- Ultrasound -->
                    <div id="ultrasound" class="bg-white rounded-2xl border border-gray-200 overflow-hidden transform transition duration-300 hover:-translate-y-1">
                        <div class="md:flex">
                            <div class="md:w-1/3 relative overflow-hidden" style="adding-bottom: 33%;"> <!-- 16:9 aspect ratio -->
                                <img src="{{ asset('images/hospital5.jpg') }}" 
                                    alt="Ultrasound Services" 
                                    class="absolute top-0 left-0 h-full w-full object-cover object-center" 
                                   >
                               
                            </div>
                            <div class="md:w-2/3 p-8">
                                <h3 class="text-2xl font-bold text-gray-800 mb-4">Ultrasound Services</h3>
                                <p class="text-gray-600">We offer a wide range of ultrasound services to diagnose and monitor various health conditions.</p>
                            </div>
                        </div>
                    </div>

                    <!-- Neurosurgery -->
                    <div id="neurosurgery" class="bg-white rounded-2xl border border-gray-200 overflow-hidden transform transition duration-300 hover:-translate-y-1">
                        <div class="md:flex">
                            <div class="md:w-1/3 relative overflow-hidden" style="adding-bottom: 33%;"> <!-- 16:9 aspect ratio -->
                                <img src="{{ asset('images/hospital6.jpg') }}" 
                                    alt="Neurosurgery" 
                                    class="absolute top-0 left-0 h-full w-full object-cover object-center" 
                                   >
                               
                            </div>
                            <div class="md:w-2/3 p-8">
                                <h3 class="text-2xl font-bold text-gray-800 mb-4">Neurosurgery</h3>
                                <p class="text-gray-600">Our neurosurgery department specializes in the diagnosis and surgical treatment of neurological disorders, including brain and spinal surgeries.</p>
                            </div>
                        </div>
                    </div>

                    <!-- X-Ray -->
                    <div id="xray" class="bg-white rounded-2xl border border-gray-200 overflow-hidden transform transition duration-300 hover:-translate-y-1">
                        <div class="md:flex">
                            <div class="md:w-1/3 relative overflow-hidden" style="adding-bottom: 33%;"> <!-- 16:9 aspect ratio -->
                                <img src="{{ asset('images/hospital7.jpg') }}" 
                                    alt="X-RAY Services" 
                                    class="absolute top-0 left-0 h-full w-full object-cover object-center" 
                                    onerror="this.src='https://via.placeholder.com/300x250?text=X-Ray'; this.onerror=null;">
                             
                            </div>
                            <div class="md:w-2/3 p-8">
                                <h3 class="text-2xl font-bold text-gray-800 mb-4">X-RAY Services</h3>
                                <p class="text-gray-600">We provide advanced X-ray imaging services to help diagnose injuries and other medical conditions quickly and accurately.</p>
                            </div>
                        </div>
                    </div>

                    <!-- Pathology -->
                    <div id="pathology" class="bg-white rounded-2xl border border-gray-200 overflow-hidden transform transition duration-300 hover:-translate-y-1">
                        <div class="md:flex">
                            <div class="md:w-1/3 relative overflow-hidden" style="adding-bottom: 33%;"> <!-- 16:9 aspect ratio -->
                                <img src="{{ asset('images/hospital8.jpg') }}" 
                                    alt="Pathology Services" 
                                    class="absolute top-0 left-0 h-full w-full object-cover object-center" 
                                   >
                            
                            </div>
                            <div class="md:w-2/3 p-8">
                                <h3 class="text-2xl font-bold text-gray-800 mb-4">Pathology Services</h3>
                                <p class="text-gray-600">Our pathology department offers a wide range of diagnostic tests and services to help diagnose medical conditions accurately and swiftly.</p>
                            </div>
                        </div>
                    </div>

                    <!-- Painless Normal Delivery -->
                    <div id="painless-delivery" class="bg-white rounded-2xl border border-gray-200 overflow-hidden transform transition duration-300 hover:-translate-y-1">
                        <div class="md:flex">
                            <div class="md:w-1/3 relative overflow-hidden" style="adding-bottom: 33%;"> <!-- 16:9 aspect ratio -->
                                <img src="{{ asset('images/hospital3.jpg') }}" 
                                    alt="Painless Normal Delivery" 
                                    class="absolute top-0 left-0 h-full w-full object-cover object-center" 
                                    >
                               
                            </div>
                            <div class="md:w-2/3 p-8">
                                <h3 class="text-2xl font-bold text-gray-800 mb-4">Painless Normal Delivery</h3>
                                <p class="text-gray-600">We offer painless normal delivery options, ensuring a comfortable and safe childbirth experience.</p>
                            </div>
                        </div>
                    </div>

                    <!-- 24 hrs Delivery Service -->
                    <div id="delivery-service" class="bg-white rounded-2xl border border-gray-200 overflow-hidden transform transition duration-300 hover:-translate-y-1">
                        <div class="md:flex">
                            <div class="md:w-1/3 relative overflow-hidden" style="adding-bottom: 33%;"> <!-- 16:9 aspect ratio -->
                                <img src="{{ asset('images/hospital5.jpg') }}" 
                                    alt="24 hrs Delivery Service" 
                                    class="absolute top-0 left-0 h-full w-full object-cover object-center">
                            </div>
                            <div class="md:w-2/3 p-8">
                                <h3 class="text-2xl font-bold text-gray-800 mb-4">24 hrs Delivery Service</h3>
                                <p class="text-gray-600">Our delivery service is available 24/7, ensuring you have access to expert care at any time of day or night.</p>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>
</div>