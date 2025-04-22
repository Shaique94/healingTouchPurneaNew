<div class="py-10 px-4 sm:px-6 lg:px-8 max-w-6xl mt-12 mx-auto">
    <div class="text-center mb-10">
        <h2 class="text-3xl md:text-4xl font-bold text-gray-800 mb-4">Get in Touch</h2>
        <p class="text-gray-600 max-w-2xl mx-auto">We're here to help and answer any questions you might have. We look forward to hearing from you.</p>
    </div>
    
    <div class="grid md:grid-cols-3 gap-8">
        <!-- Contact Information Card -->
        <div class="md:col-span-2">
            <div class="bg-white rounded-2xl border border-gray-200 overflow-hidden">
                <div class="bg-gradient-to-r from-beige-600 to-beige-800 py-6 px-8 relative">
                    <div class="absolute right-0 top-0 w-24 h-24 bg-white opacity-10 rounded-full -translate-y-1/3 translate-x-1/3"></div>
                    <h3 class="text-2xl font-bold text-white relative z-10">Contact Information</h3>
                </div>
                
                <div class="p-8">
                    <div class="grid sm:grid-cols-2 gap-8">
                        <!-- Phone Section -->
                        <div class="flex items-start">
                            <div class="bg-beige-100 p-3 rounded-full mr-4 flex-shrink-0">
                                <svg class="h-6 w-6 text-beige-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                                </svg>
                            </div>
                            <div>
                                <p class="font-semibold text-gray-800 text-lg">Phone</p>
                                <a href="tel:{{ $contact_phone }}" class="text-beige-600 font-medium text-lg hover:text-beige-800 transition-colors">+91 {{ $contact_phone }}</a>
                                <p class="text-gray-500 text-sm mt-1">Available 24/7 for emergencies</p>
                            </div>
                        </div>

                        <!-- Email Section -->
                        <div class="flex items-start">
                            <div class="bg-beige-100 p-3 rounded-full mr-4 flex-shrink-0">
                                <svg class="h-6 w-6 text-beige-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                </svg>
                            </div>
                            <div>
                                <p class="font-semibold text-gray-800 text-lg">Email</p>
                                <a href="mailto:{{ $contact_email }}" class="text-beige-600 font-medium text-lg hover:text-beige-800 transition-colors">{{ $contact_email }}</a>
                                <p class="text-gray-500 text-sm mt-1">We respond within 24 hours</p>
                            </div>
                        </div>
                        
                        <!-- Support Hours Section -->
                        <div class="flex items-start">
                            <div class="bg-beige-100 p-3 rounded-full mr-4 flex-shrink-0">
                                <svg class="h-6 w-6 text-beige-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 8v4l3 3m5-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                            </div>
                            <div>
                                <p class="font-semibold text-gray-800 text-lg">Support Hours</p>
                                <p class="text-gray-700">Monday - Saturday: 9:00 AM - 8:00 PM</p>
                                <p class="text-gray-700">Sunday: Closed (Emergency Only)</p>
                            </div>
                        </div>
                        
                        <!-- Social Media Section -->
                        <div class="flex items-start">
                            <div class="bg-beige-100 p-3 rounded-full mr-4 flex-shrink-0">
                                <svg class="h-6 w-6 text-beige-600" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M22 12c0-5.52-4.48-10-10-10S2 6.48 2 12a9.998 9.998 0 0014.49 8.73V14.9h-3.06v-2.9h3.06v-2.22c0-3.04 1.83-4.7 4.57-4.7 1.32 0 2.7.24 2.7.24v2.95h-1.52c-1.5 0-1.97.93-1.97 1.88v2.14h3.34l-.53 2.9h-2.81v5.83A10 10 0 0022 12z" />
                                </svg>
                            </div>
                            <div>
                                <p class="font-semibold text-gray-800 text-lg">Social Media</p>
                                <div class="flex mt-2">
                                    @if($facebook)
                                        <a href="{{ $facebook }}" target="_blank" class="bg-blue-600 text-white p-2 rounded-full hover:bg-blue-700 mr-3" title="Facebook">
                                            <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 24 24">
                                                <path d="M22 12c0-5.52-4.48-10-10-10S2 6.48 2 12a9.998 9.998 0 0014.49 8.73V14.9h-3.06v-2.9h3.06v-2.22c0-3.04 1.83-4.7 4.57-4.7 1.32 0 2.7.24 2.7.24v2.95h-1.52c-1.5 0-1.97.93-1.97 1.88v2.14h3.34l-.53 2.9h-2.81v5.83A10 10 0 0022 12z" />
                                            </svg>
                                        </a>
                                    @endif
                                    @if($instagram)
                                        <a href="{{ $instagram }}" target="_blank" class="bg-pink-600 text-white p-2 rounded-full hover:bg-pink-700" title="Instagram">
                                            <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 24 24">
                                                <path d="M12 2c2.717 0 3.056.01 4.122.06 1.065.05 1.79.217 2.428.465.66.254 1.216.598 1.772 1.153.509.5.902 1.105 1.153 1.772.247.637.415 1.363.465 2.428.047 1.066.06 1.405.06 4.122 0 2.717-.01 3.056-.06 4.122-.05 1.065-.218 1.79-.465 2.428a4.883 4.883 0 01-1.153 1.772c-.5.509-1.105.902-1.772 1.153-.637.247-1.363.415-2.428.465-1.066.047-1.405.06-4.122.06-2.717 0-3.056-.01-4.122-.06-1.065-.05-1.79-.218-2.428-.465a4.883 4.883 0 01-1.772-1.153 4.883 4.883 0 01-1.153-1.772c-.247-.637-.415-1.363-.465-2.428C2.013 15.056 2 14.717 2 12c0-2.717.01-3.056.06-4.122.05-1.066.217-1.79.465-2.428a4.883 4.883 0 011.153-1.772A4.883 4.883 0 015.45 2.525c.638-.248 1.362-.415 2.428-.465C8.944 2.013 9.283 2 12 2zm0 1.8c-2.67 0-2.986.01-4.04.06-.976.045-1.505.207-1.858.344-.466.182-.8.398-1.15.748-.35.35-.566.684-.748 1.15-.137.353-.3.882-.344 1.857-.05 1.055-.06 1.37-.06 4.04 0 2.67.01 2.987.06 4.04.044.976.207 1.505.344 1.858.182.466.398.8.748 1.15.35.35.684.566 1.15.748.353.137.882.3 1.857.344 1.054.05 1.37.06 4.04.06 2.67 0 2.987-.01 4.04-.06.976-.044 1.504-.207 1.858-.344.466-.182.8-.398 1.15-.748.35-.35.566-.684.748-1.15.137-.353.3-.882.344-1.857.05-1.054.06-1.37.06-4.04 0-2.67-.01-2.986-.06-4.04-.044-.976-.207-1.505-.344-1.858a3.09 3.09 0 00-.748-1.15 3.09 3.09 0 00-1.15-.748c-.353-.137-.882-.3-1.857-.344-1.054-.05-1.37-.06-4.04-.06zm0 3.064A5.136 5.136 0 1 1 6.864 12 5.136 5.136 0 0 1 12 6.864zM12 15a3 3 0 1 1 0-6 3 3 0 0 1 0 6zm5.84-7.804a1.2 1.2 0 1 1-2.4 0 1.2 1.2 0 0 1 2.4 0z" />
                                            </svg>
                                        </a>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Address Section -->
                    <div class="mt-8 pt-6 border-t border-gray-100">
                        <div class="flex items-start">
                            <div class="bg-beige-100 p-3 rounded-full mr-4 flex-shrink-0">
                                <svg class="h-6 w-6 text-beige-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                </svg>
                            </div>
                            <div>
                                <p class="font-semibold text-gray-800 text-lg">Address</p>
                                <p class="text-gray-700 mt-1">{!! nl2br(e($address)) !!}</p>
                                <a href="{{ $map_url }}" target="_blank" class="inline-flex items-center text-beige-600 font-medium mt-2 hover:text-beige-800 transition-colors">
                                    Get Directions
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3" />
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Map Section -->
        <div class="md:col-span-1">
            <div class="bg-white rounded-2xl border border-gray-200 overflow-hidden h-full">
                <div class="p-4">
                    <h3 class="font-semibold text-lg text-gray-800 mb-4">Our Location</h3>
                    <div class="aspect-video relative rounded-lg overflow-hidden border border-gray-200">
                        <iframe 
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3573.094466674104!2d87.4907502!3d25.7888735!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39eff90052a98551%3A0x4c8f3eaf163940d3!2sHealing%20Touch%20Hospital!5e0!3m2!1sen!2sin!4v1731949200000!5m2!1sen!2sin"
                    width="100%" 
                    height="100%" 
                    class="absolute inset-0"
                    style="border:0;" 
                    allowfullscreen="" 
                    loading="lazy">
                </iframe> 
                    </div>
                    <div class="bg-beige-50 rounded-lg p-4 mt-4">
                        <p class="text-gray-700 text-sm">
                            <span class="font-medium">Visiting Hours:</span><br>
                            9:00 AM - 8:00 PM (Monday - Saturday)<br>
                            24/7 Emergency Services Available
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>