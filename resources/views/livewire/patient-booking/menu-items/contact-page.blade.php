<div class="py-10 px-4 sm:px-6 lg:px-8 max-w-6xl mt-12 mx-auto">
    <div class="text-center mb-10">
        <h1 class="text-3xl md:text-4xl font-bold text-gray-800 mb-4">Get in Touch</h1>
        <p class="text-gray-600 max-w-2xl mx-auto">We're here to help and answer any questions you might have. We look
            forward to hearing from you.</p>
    </div>

    <div class="grid md:grid-cols-3 gap-8">
        <!-- Contact Information Card -->
        <div class="md:col-span-2">
            <div class="bg-white rounded-2xl border border-gray-200 overflow-hidden">
                <div class="bg-gradient-to-r from-beige-600 to-beige-800 py-6 px-8 relative">
                    <div
                        class="absolute right-0 top-0 w-24 h-24 bg-white opacity-10 rounded-full -translate-y-1/3 translate-x-1/3">
                    </div>
                    <h3 class="text-2xl font-bold text-white relative z-10">Contact Information</h3>
                </div>

                <div class="p-8">
                    <div class="grid sm:grid-cols-2 gap-8">
                        <!-- Phone Section -->
                        <div class="flex items-start">
                            <div class="bg-beige-100 p-3 rounded-full mr-4 flex-shrink-0">
                                <svg class="h-6 w-6 text-beige-600" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                                </svg>
                            </div>
                            <div>
                                <p class="font-semibold text-gray-800 text-lg">Phone</p>
                                <a  href="tel:{{ $contact_phone }}"
                                    class="text-beige-600 font-medium text-lg hover:text-beige-800 transition-colors">
                                    {{ $contact_phone }}</a>
                                <p class="text-gray-500 text-sm mt-1">Available 24/7 for emergencies</p>
                            </div>
                        </div>

                        <!-- Email Section -->
                        <div class="flex items-start">
                            <div class="bg-beige-100 p-3 rounded-full mr-4 flex-shrink-0">
                                <svg class="h-6 w-6 text-beige-600" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                </svg>
                            </div>
                            <div>
                                <p class="font-semibold text-gray-800 text-lg">Email</p>
                                <a  href="mailto:{{ $contact_email }}"
                                    class="text-beige-600 font-medium text-lg hover:text-beige-800 transition-colors">{{ $contact_email }}</a>
                                <p class="text-gray-500 text-sm mt-1">We respond within 24 hours</p>
                            </div>
                        </div>

                        <!-- Support Hours Section -->
                        <div class="flex items-start">
                            <div class="bg-beige-100 p-3 rounded-full mr-4 flex-shrink-0">
                                <svg class="h-6 w-6 text-beige-600" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor">
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
                                <svg class="h-6 w-6 text-beige-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8h2a2 2 0 012 2v6a2 2 0 01-2 2h-2v4l-4-4H9a1.994 1.994 0 01-1.414-.586m0 0L11 14h4a2 2 0 002-2V6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2v4l.586-.586z"/>
                                </svg>
                            </div>
                            <div>
                                <p class="font-semibold text-gray-800 text-lg">Social Media</p>
                                <!-- Social Media Links -->
                                <div class="flex space-x-3">
                                    @if ($facebook_link && $facebook_link !== '#')
                                        <a href="{{ $facebook_link }}" target="_blank"
                                            class="bg-blue-600 text-white p-2 rounded-full hover:bg-blue-700"
                                            title="Facebook">
                                            <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 24 24">
                                                <path d="M14 13.5h2.5l1-4H14v-2c0-1.03 0-2 2-2h1.5V2.14c-.326-.043-1.557-.14-2.857-.14C11.928 2 10 3.657 10 6.7v2.8H7v4h3V22h4v-8.5z"/>
                                            </svg>
                                        </a>
                                    @endif
                                    @if ($instagram_link && $instagram_link !== '#')
                                        <a href="{{ $instagram_link }}" target="_blank"
                                            class="bg-pink-600 text-white p-2 rounded-full hover:bg-pink-700"
                                            title="Instagram">
                                            <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 24 24">
                                                <path d="M12 9a3 3 0 1 0 0 6 3 3 0 0 0 0-6zm0-2a5 5 0 1 1 0 10 5 5 0 0 1 0-10zm6.5-.25a1.25 1.25 0 0 1-2.5 0 1.25 1.25 0 0 1 2.5 0zM12 4c-2.474 0-2.878.007-4.029.058-.784.037-1.31.142-1.798.332-.434.168-.747.369-1.08.703a2.89 2.89 0 0 0-.704 1.08c-.19.49-.295 1.015-.331 1.798C4.006 9.075 4 9.461 4 12c0 2.474.007 2.878.058 4.029.037.783.142 1.31.331 1.797.17.435.37.748.702 1.08.337.336.65.537 1.08.703.494.191 1.02.297 1.8.333C9.075 19.994 9.461 20 12 20c2.474 0 2.878-.007 4.029-.058.782-.037 1.309-.142 1.797-.331.433-.169.748-.37 1.08-.702.337-.337.538-.65.704-1.08.19-.493.296-1.02.332-1.8.052-1.104.058-1.49.058-4.029 0-2.474-.007-2.878-.058-4.029-.037-.782-.142-1.31-.332-1.798a2.911 2.911 0 0 0-.703-1.08 2.884 2.884 0 0 0-1.08-.704c-.49-.19-1.016-.295-1.798-.331C14.925 4.006 14.539 4 12 4zm0-2c2.717 0 3.056.01 4.122.06 1.065.05 1.79.217 2.428.465.66.254 1.216.598 1.772 1.153a4.908 4.908 0 0 1 1.153 1.772c.247.637.415 1.363.465 2.428.047 1.066.06 1.405.06 4.122 0 2.717-.01 3.056-.06 4.122-.05 1.065-.218 1.79-.465 2.428a4.883 4.883 0 0 1-1.153 1.772 4.915 4.915 0 0 1-1.772 1.153c-.637.247-1.363.415-2.428.465-1.066.047-1.405.06-4.122.06-2.717 0-3.056-.01-4.122-.06-1.065-.05-1.79-.218-2.428-.465a4.89 4.89 0 0 1-1.772-1.153 4.904 4.904 0 0 1-1.153-1.772c-.248-.637-.415-1.363-.465-2.428C2.013 15.056 2 14.717 2 12c0-2.717.01-3.056.06-4.122.05-1.066.217-1.79.465-2.428a4.88 4.88 0 0 1 1.153-1.772A4.897 4.897 0 0 1 5.45 2.525c.638-.248 1.362-.415 2.428-.465C8.944 2.013 9.283 2 12 2z"/>
                                            </svg>
                                        </a>
                                    @endif
                                    @if ($twitter_link && $twitter_link !== '#')
                                        <a href="{{ $twitter_link }}" target="__blank"
                                            class="bg-blue-400 text-white p-2 rounded-full hover:bg-blue-500"
                                            title="Twitter">
                                            <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 24 24">
                                                <path d="M23 3a10.9 10.9 0 0 1-3.14 1.53 4.48 4.48 0 0 0-7.86 3v1A10.66 10.66 0 0 1 3 4s-4 9 5 13a11.64 11.64 0 0 1-7 2c9 5 20 0 20-11.5a4.5 4.5 0 0 0-.08-.83A7.72 7.72 0 0 0 23 3z"/>
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
                                <svg class="h-6 w-6 text-beige-600" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                </svg>
                            </div>
                            <div>
                                <p class="font-semibold text-gray-800 text-lg">Address</p>
                                <p class="text-gray-700 mt-1">{!! nl2br(e($address)) !!}</p>
                                <a  href="{{ $map_url }}" target="_blank"
                                    class="inline-flex items-center text-beige-600 font-medium mt-2 hover:text-beige-800 transition-colors">
                                    Get Directions
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-1" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M14 5l7 7m0 0l-7 7m7-7H3" />
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
                            width="100%" height="100%" class="absolute inset-0" style="border:0;"
                            allowfullscreen="" loading="lazy">
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
