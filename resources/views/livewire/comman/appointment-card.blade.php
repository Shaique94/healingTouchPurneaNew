
        <!-- Book Appointment Banner -->
    <div class="max-w-6xl mx-auto mb-10">
        <div class="flex flex-col md:flex-row items-center justify-between border border-beige-200 bg-white rounded-2xl p-6">
            <div class="mb-6 md:mb-0 md:mr-6 text-center md:text-left">
                <h2 class="text-2xl font-bold text-gray-800 mb-2">Book Your Appointment Today</h2>
                <p class="text-gray-600 max-w-xl">
                    Schedule a consultation with our specialists in just a few clicks. We offer next-day appointments 
                    and personalized care plans tailored to your needs.
                </p>
                <ul class="mt-3 flex flex-wrap gap-2 justify-start">
                    <li class="flex items-center mr-6 mb-2">
                        <svg class="w-5 h-5 text-green-500 mr-2" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                        </svg>
                        <span class="text-sm">Online Booking</span>
                    </li>
                    <li class="flex items-center mr-6 mb-2">
                        <svg class="w-5 h-5 text-green-500 mr-2" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                        </svg>
                        <span class="text-sm">Next-Day Appointments</span>
                    </li>
                </ul>
            </div>
            <div class="flex-shrink-0">
                <a href="{{ route('book.appointment') }}" class="inline-flex items-center bg-beige-600 border-0 py-3 px-6 focus:outline-none hover:bg-beige-700 rounded-lg text-white font-medium transition-colors">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                    </svg>
                    Book Appointment
                </a>
                <p class="text-xs text-gray-500 mt-2 text-center">Or call us at: +91 {{ $contact_phone ?? '1234567890' }}</p>
            </div>
        </div>
    </div>