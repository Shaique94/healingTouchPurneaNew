<div class="max-w-7xl mx-auto px-4 py-12 space-y-12">
    {{-- Header Section --}}
    <div class="text-center">
        <h1 class="text-4xl font-bold text-gray-800">Join Our Team</h1>
        <p class="mt-4 text-lg text-gray-600">
            We’re always looking for passionate professionals to help us provide world-class care.
        </p>
    </div>

    {{-- Livewire Job Listings --}}
    <div class="space-y-6">
    {{-- Search Bar --}}
    <div class="flex justify-center">
        <input type="text"
               wire:model.debounce.300ms="search"
               placeholder="Search for a job title..."
               class="w-full max-w-md px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring focus:ring-blue-200">
    </div>

    {{-- Job Cards --}}
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        


    </div>
</div>

    {{-- Submit Resume CTA --}}
    <div class="bg-blue-100 p-8 rounded-xl text-center">
        <h2 class="text-2xl font-semibold text-blue-900">Can't find a role that fits?</h2>
        <p class="mt-2 text-blue-800">We're always accepting resumes from great people.</p>
        <a href=""
           class="inline-block mt-4 px-6 py-3 bg-blue-600 text-white rounded-full hover:bg-blue-700 transition">
            Submit Your Resume
        </a>
    </div>
</div>

