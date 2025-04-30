<div>
    <section id="services" class="py-16 bg-gradient-to-b from-white to-gray-50">
        <div class="container mx-auto px-4">
            <!-- Improved Header Section -->
            <div class="text-center mb-16">
                <span class="text-beige-600 text-sm font-semibold tracking-wider uppercase mb-2 inline-block">Our Medical Services</span>
                <h2 class="text-4xl md:text-5xl font-bold text-gray-900 mb-4">
                    Comprehensive <span class="text-beige-600">Healthcare</span> Solutions
                </h2>
                <div class="w-20 h-1.5 bg-beige-600 mx-auto mb-6 rounded-full"></div>
                <p class="text-gray-600 max-w-2xl mx-auto text-lg">
                    Delivering excellence in healthcare with cutting-edge medical services and compassionate care
                </p>
            </div>

            <!-- Redesigned Services Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <!-- Service 1 -->
                <div class="group bg-white rounded-2xl shadow-sm hover:shadow-xl transition-all duration-300 overflow-hidden border border-gray-100">
                    <div class="p-8">
                        <div class="flex items-center justify-center h-20 w-20 bg-beige-50 group-hover:bg-beige-100 rounded-2xl mb-6 mx-auto transform group-hover:scale-110 transition-transform duration-300">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 text-beige-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                            </svg>
                        </div>
                        <h3 class="text-2xl font-bold text-gray-900 text-center mb-4 group-hover:text-beige-600 transition-colors">Cardiology</h3>
                        <p class="text-gray-600 text-center leading-relaxed">
                            Expert cardiac care utilizing advanced technology for heart health and treatment of cardiovascular conditions.
                        </p>
                    </div>
                </div>

                <!-- Service 2 -->
                <div class="group bg-white rounded-2xl shadow-sm hover:shadow-xl transition-all duration-300 overflow-hidden border border-gray-100">
                    <div class="p-8">
                        <div class="flex items-center justify-center h-20 w-20 bg-beige-50 group-hover:bg-beige-100 rounded-2xl mb-6 mx-auto transform group-hover:scale-110 transition-transform duration-300">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 text-beige-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                            </svg>
                        </div>
                        <h3 class="text-2xl font-bold text-gray-900 text-center mb-4 group-hover:text-beige-600 transition-colors">Neurology</h3>
                        <p class="text-gray-600 text-center leading-relaxed">
                            Specialized care for neurological disorders with state-of-the-art diagnostic and treatment approaches.
                        </p>
                    </div>
                </div>

                <!-- Service 3 -->
                <div class="group bg-white rounded-2xl shadow-sm hover:shadow-xl transition-all duration-300 overflow-hidden border border-gray-100">
                    <div class="p-8">
                        <div class="flex items-center justify-center h-20 w-20 bg-beige-50 group-hover:bg-beige-100 rounded-2xl mb-6 mx-auto transform group-hover:scale-110 transition-transform duration-300">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 text-beige-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                            </svg>
                        </div>
                        <h3 class="text-2xl font-bold text-gray-900 text-center mb-4 group-hover:text-beige-600 transition-colors">Orthopedics</h3>
                        <p class="text-gray-600 text-center leading-relaxed">
                            Comprehensive orthopedic care featuring advanced treatments for bone, joint, and muscle conditions.
                        </p>
                    </div>
                </div>
            </div>

            <!-- Improved CTA Button -->
            <div class="text-center mt-12">
                <a wire:navigate href="{{route('services.page')}}" 
                   class="inline-flex items-center px-8 py-4 bg-beige-600 hover:bg-beige-700 text-white font-semibold rounded-full transition-all duration-300 transform hover:scale-105 hover:shadow-lg">
                    <span>Explore All Services</span>
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ml-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6" />
                    </svg>
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
                    <a href="{{ route('doctors.detail', ['doctorId' => $doctor->doctor->id]) }}" wire:navigate class="block">
                        <div class="h-auto bg-gray-200">
                            <img
                                src="{{ $doctor->doctor && $doctor->doctor->image ? asset('storage/' . $doctor->doctor->image) : asset('images/default.jpg') }}"
                                alt="{{ $doctor->name }}"
                                class="w-full h-auto hover:opacity-90 transition-opacity" />
                        </div>
                    </a>
                    <div class="p-6">
                        <a href="{{ route('doctors.detail', ['doctorId' => $doctor->doctor->id]) }}" wire:navigate class="block hover:text-beige-600 transition-colors">
                            <h3 class="text-xl font-semibold mb-1">Dr. {{$doctor->name}}</h3>
                        </a>
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
                <a href="{{ route('doctors.detail', ['doctorId' => $doctor->doctor->id]) }}" wire:navigate class="block">
                    <div class="h-64 bg-gray-200">
                        <img src="{{ asset('storage/'.$doctor->image) }}" 
                             alt="{{$doctor->name}}" 
                             class="w-full h-full object-cover hover:opacity-90 transition-opacity" 
                             onerror="this.src='/api/placeholder/300/300'; this.onerror=null;">
                    </div>
                </a>
                <div class="p-6">
                    <a href="{{ route('doctors.detail', ['doctorId' => $doctor->doctor->id]) }}" wire:navigate class="block hover:text-beige-600 transition-colors">
                        <h3 class="text-xl font-semibold mb-1">Dr. {{$doctor->name}}</h3>
                    </a>
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