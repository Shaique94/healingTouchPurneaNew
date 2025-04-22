@extends('layouts.app')

@section('meta')
<meta name="description" content="Meet our experienced team of doctors at Healing Touch Hospital, Purnea. Our specialists are committed to providing high-quality healthcare with compassion and expertise.">
<meta name="keywords" content="doctors, specialists, Healing Touch Hospital, Purnea, healthcare, medical professionals">
<title>Our Doctors | Healing Touch Hospital - Purnea</title>
<meta property="og:title" content="Our Doctors | Healing Touch Hospital - Purnea">
<meta property="og:description" content="Meet our experienced team of doctors at Healing Touch Hospital, Purnea.">
<meta property="og:type" content="website">
<meta property="og:url" content="{{ url()->current() }}">
<meta property="og:image" content="{{ asset('images/doctors-team.jpg') }}">
@endsection

@section('content')
<div class="pt-24 pb-16 bg-gradient-to-r from-sky-600 to-sky-800">
    <div class="container mx-auto px-4">
        <div class="text-center text-white">
            <h1 class="text-4xl md:text-5xl font-bold mb-4">Our Expert Doctors</h1>
            <p class="text-xl text-sky-100 max-w-3xl mx-auto">Meet our team of highly qualified medical specialists committed to providing exceptional care</p>
        </div>
    </div>
</div>

<div class="py-16">
    <div class="container mx-auto px-4">
        <div class="mb-12 text-center">
            <span class="text-sky-600 font-semibold text-sm uppercase tracking-wider">Healthcare Professionals</span>
            <h2 class="text-3xl md:text-4xl font-bold text-gray-800 mt-2">Our Medical Specialists</h2>
            <div class="w-24 h-1 bg-sky-500 mx-auto my-4"></div>
            <p class="max-w-2xl mx-auto text-gray-600">Our team of doctors combines years of experience with the latest medical knowledge to deliver the best care possible.</p>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <!-- Doctor Card Template - Repeat for each doctor -->
            <div class="bg-white rounded-lg overflow-hidden shadow-lg transition-transform hover:-translate-y-1 duration-300">
                <div class="h-64 overflow-hidden">
                    <img src="{{ asset('images/doctor-placeholder.jpg') }}" alt="Dr. John Smith" class="w-full h-full object-cover">
                </div>
                <div class="p-6">
                    <h3 class="text-xl font-bold text-gray-800">Dr. John Smith</h3>
                    <p class="text-sky-600 mb-2">Cardiologist</p>
                    <p class="text-gray-600 mb-4">MBBS, MD (Cardiology), Fellowship in Interventional Cardiology</p>
                    <div class="flex items-center text-gray-500 text-sm">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        <span>Mon-Fri, 9:00 AM - 5:00 PM</span>
                    </div>
                </div>
                <div class="px-6 py-4 bg-gray-50 border-t border-gray-100">
                    <a wire:navigate  href="{{ route('book.appointment') }}" class="block text-center bg-sky-600 hover:bg-sky-700 text-white font-medium py-2 px-4 rounded transition-colors">
                        Book Appointment
                    </a>
                </div>
            </div>
            
            <!-- Add more doctor cards as needed -->
        </div>
        
        <div class="text-center mt-12">
            <a wire:navigate  href="{{ route('book.appointment') }}" class="inline-flex items-center px-6 py-3 bg-sky-600 hover:bg-sky-700 text-white font-medium rounded-lg transition-colors">
                <span>Book an Appointment</span>
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ml-2" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M12.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-2.293-2.293a1 1 0 010-1.414z" clip-rule="evenodd" />
                </svg>
            </a>
        </div>
    </div>
</div>

@endsection
