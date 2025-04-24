<div>
    <section id="services" class="py-16 bg-gray-50">
        <div class="container mx-auto px-4">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold text-gray-800 mb-4">Our <span class="text-beige-600">Services</span></h2>
                <div class="w-24 h-1 bg-gray-600 mx-auto mb-6"></div>
                <p class="text-gray-600 max-w-3xl mx-auto">
                    We offer a comprehensive range of medical services to meet all your healthcare needs
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <!-- Service 1 -->
                <div class="bg-white rounded-lg border border-gray-200 overflow-hidden transition-transform duration-300 hover:-translate-y-1">
                    <div class="p-6">
                        <div class="flex items-center justify-center h-16 w-16 bg-beige-100 rounded-full mb-4 mx-auto">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-beige-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                            </svg>
                        </div>
                        <h3 class="text-xl font-semibold text-center mb-3">Cardiology</h3>
                        <p class="text-gray-600 text-center mb-4">Comprehensive heart care from prevention to specialized treatments for all cardiac conditions.</p>
                        <div class="text-center">

                        </div>
                    </div>
                </div>

                <!-- Service 2 -->
                <div class="bg-white rounded-lg border border-gray-200 overflow-hidden transition-transform duration-300 hover:-translate-y-1">
                    <div class="p-6">
                        <div class="flex items-center justify-center h-16 w-16 bg-beige-100 rounded-full mb-4 mx-auto">
                            <svg xmlns="http://wwbeigew.w3.org/2000/svg" class="h-8 w-8 text-beige-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                            </svg>
                        </div>
                        <h3 class="text-xl font-semibold text-center mb-3">Neurology</h3>
                        <p class="text-gray-600 text-center mb-4">Expert diagnosis and treatment of disorders affecting the brain, spinal cord, and nervous system.</p>
                        <div class="text-center">

                        </div>
                    </div>
                </div>

                <!-- Service 3 -->
                <div class="bg-white rounded-lg border border-gray-200 overflow-hidden transition-transform duration-300 hover:-translate-y-1">
                    <div class="p-6">
                        <div class="flex items-center justify-center h-16 w-16 bg-beige-100 rounded-full mb-4 mx-auto">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-beige-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                            </svg>
                        </div>
                        <h3 class="text-xl font-semibold text-center mb-3">Orthopedics</h3>
                        <p class="text-gray-600 text-center mb-4">Advanced care for your muscles, bones and joints, from sports injuries to joint replacements.</p>
                        <div class="text-center">

                        </div>
                    </div>
                </div>

            </div>

            <div class="text-center mt-10">
                <a wire:navigate  href="#" class="inline-block bg-beige-400 hover:bg-beige-700 text-white font-medium py-3 px-6 rounded-md transition-colors">
                    View All Services
                </a>
            </div>
        </div>
    </section>
    <section id="doctors" class="py-16 bg-white">
        <div class="container mx-auto px-4">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold text-gray-800 mb-4">Meet Our<span class="text-beige-600"> Healthcare Professionals</span></h2>
                <div class="w-24 h-1 bg-gray-600 mx-auto mb-6"></div>
                <p class="text-gray-600 max-w-3xl mx-auto">
                    Our team of experienced doctors and specialists are committed to providing exceptional care
                </p>
            </div>

            @if($doctorCount <= 3)
                <div class="flex justify-center flex-wrap gap-8">
                @foreach($doctors as $doctor)
                <div class="bg-white rounded-lg border border-gray-200 overflow-hidden transition-transform duration-300 hover:-translate-y-1 w-full max-w-xs">
                    <div class="h-64 bg-gray-200">
                        <img
                            src="{{ $doctor->doctor && $doctor->doctor->image ? asset('storage/' . $doctor->doctor->image) : asset('images/default.jpg') }}"
                            alt="{{ $doctor->name }}"
                            class="w-full h-auto" />
                    </div>
                    <div class="p-6">
                        <h3 class="text-xl font-semibold mb-1">Dr. {{$doctor->name}}</h3>
                        <p class="text-beige-600 font-xs mb-2 line-clamp-2">
                            {{ is_array($doctor->doctor->qualification ?? null) 
                            ? Str::limit(implode(', ', $doctor->doctor->qualification), 80)
                            : Str::limit($doctor->doctor->qualification, 80) }}
                        </p>
                        <p class="text-gray-600 text-sm mb-4">
                            {{ Str::limit($doctor->description, 50) }}
                        </p>
                        <div class="flex justify-center space-x-3">
                            <button 
                                wire:click="bookAppointment({{$doctor->doctor->id}})" 
                                class="w-full inline-flex items-center justify-center bg-beige-600 border-0 py-2 lg:py-3 px-4 lg:px-6 focus:outline-none hover:bg-beige-700 rounded-lg text-white font-medium transition-colors {{ $doctorStatus ? '' : 'opacity-50 cursor-not-allowed' }}"
                                @if(!$doctorStatus) disabled @endif
                            >
                                <svg class="w-4 h-4 lg:w-5 lg:h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                </svg>
                                Book Appointment
                            </button>
                        </div>
                    </div>
                </div>
                @endforeach
        </div>
        @else
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
            @foreach($doctors as $doctor)
            <div class="bg-white rounded-lg border border-gray-200 overflow-hidden transition-transform duration-300 hover:-translate-y-1">
                <div class="h-64 bg-gray-200">
                    <img src="{{ asset('storage/'.$doctor->image) }}" alt="{{$doctor->name}}" class="w-full h-full object-cover" onerror="this.src='/api/placeholder/300/300'; this.onerror=null;">
                </div>
                <div class="p-6">
                    <h3 class="text-xl font-semibold mb-1">Dr. {{$doctor->name}}</h3>
                    <p class="text-beige-600 font-medium mb-2">
                        {{ is_array($doctor->doctor->qualification ?? null) 
                            ? Str::limit(implode(', ', $doctor->doctor->qualification), 20)
                            : Str::limit($doctor->doctor->qualification, 20) }}
                    </p>
                    <p class="text-gray-600 text-sm mb-4">
                        {{ Str::limit($doctor->description, 50) }}
                    </p>
                    <div class="flex justify-center space-x-3">
                        <button 
                        wire:click="bookAppointment({{$doctor->doctor->id}})" 
                        class="w-full inline-flex items-center justify-center bg-beige-600 border-0 py-2 lg:py-3 px-4 lg:px-6 focus:outline-none hover:bg-beige-700 rounded-lg text-white font-medium transition-colors {{ $doctorStatus ? '' : 'opacity-50 cursor-not-allowed' }}"
                        @if(!$doctorStatus) disabled @endif
                    >
                        <svg class="w-4 h-4 lg:w-5 lg:h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                        </svg>
                        Book Appointment
                    </button>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        @endif