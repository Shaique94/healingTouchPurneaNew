<div class="bg-gray-100 md:bg-[url('{{ asset('images/hospital1.jpg') }}')] md:bg-cover md:bg-center flex items-center justify-center h-screen" wire:ignore.self>
    <div class="w-full max-w-md bg-white rounded-2xl p-8 space-y-6">

        <!-- Logo -->
        <div class="flex justify-center">
            <img src="{{ asset('healingTouchLogo.jpeg') }}" alt="Hospital Logo" class="w-20 h-20 rounded-full" />
        </div>

        <!-- Title -->
        <h1 class="text-center text-2xl font-bold text-gray-700">Hospital Admin Login</h1>

        <!-- Login Form -->
        <form wire:submit.prevent="login" class="space-y-4 relative">
            <!-- Loading Overlay -->
            <div wire:loading.flex wire:target="login" class="absolute inset-0 bg-white/50 backdrop-blur-sm z-10 items-center justify-center">
                <div class="flex items-center space-x-2 text-beige-600">
                    <svg class="animate-spin h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                        <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                    </svg>
                    <span class="text-sm font-medium">Authenticating...</span>
                </div>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-600">Email</label>
                <input type="email" wire:model.live="email" placeholder="saum@gmail.com"
                    wire:loading.attr="disabled" wire:target="login"
                    class="mt-1 w-full px-4 py-2 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-beige-500 disabled:opacity-50 disabled:cursor-not-allowed" />
                @error('email') <span class="text-sm text-red-500">{{ $message }}</span> @enderror
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-600">Password</label>
                <input type="password" wire:model.live="password" placeholder="********"
                    wire:loading.attr="disabled" wire:target="login"
                    class="mt-1 w-full px-4 py-2 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-beige-500 disabled:opacity-50 disabled:cursor-not-allowed" />
                @error('password') <span class="text-sm text-red-500">{{ $message }}</span> @enderror
            </div>

            <!-- Login Button -->
            <button type="submit" 
                wire:loading.class="opacity-70 cursor-wait" 
                wire:loading.attr="disabled"
                class="w-full bg-beige-600 text-white py-2 rounded-xl hover:bg-beige-700 transition duration-200 font-semibold flex items-center justify-center disabled:opacity-50 disabled:cursor-not-allowed">
                <span wire:loading.remove wire:target="login">Login</span>
                <span wire:loading wire:target="login" class="flex items-center">
                    <svg class="animate-spin -ml-1 mr-3 h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                        <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                    </svg>
                </span>
            </button>

            <!-- Home Link -->
            <div class="text-center">
                <a wire:navigate href="{{route('userlandingpage')}}" class="text-beige-600 hover:underline inline-flex items-center justify-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                    </svg>
                    Back to Home
                </a>
            </div>
        </form>
    </div>
</div>