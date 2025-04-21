<div class="min-h-screen flex items-center justify-center bg-gray-50">
    <div class="w-full max-w-md bg-white p-8 rounded-lg shadow-md border border-gray-200">
        <!-- Logo/Icon -->
        <div class="flex justify-center mb-6">
            <div class="h-16 w-16 bg-beige-100 rounded-full flex items-center justify-center shadow-md">
                <img src="{{ asset('healingTouchLogo.jpeg') }}" alt="healing touch logo" class="h-12 w-12">
            </div>
        </div>
        
        <h2 class="text-2xl font-bold text-center mb-2 text-gray-800">Doctor <span class="text-beige-600">Login</span></h2>
        <div class="w-24 h-1 bg-gray-600 mx-auto mb-4"></div>
        <p class="text-center text-gray-600 mb-6 text-sm">Secure access to patient records & appointments</p>

        <!-- Display error message -->
        @if ($errorMessage)
            <div class="mb-4 text-sm text-red-600 bg-red-50 p-3 rounded-lg border border-red-100 flex items-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-red-500 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
                {{ $errorMessage }}
            </div>
        @endif

        <!-- Login Form -->
        <form wire:submit.prevent="login" class="space-y-5">
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Email Address</label>
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-5 h-5 text-gray-400">
                            <path d="M3 4a2 2 0 00-2 2v1.161l8.441 4.221a1.25 1.25 0 001.118 0L19 7.162V6a2 2 0 00-2-2H3z" />
                            <path d="M19 8.839l-7.77 3.885a2.75 2.75 0 01-2.46 0L1 8.839V14a2 2 0 002 2h14a2 2 0 002-2V8.839z" />
                        </svg>
                    </div>
                    <input
                        type="email"
                        id="email"
                        wire:model="email"
                        class="mt-1 w-full pl-10 pr-4 py-3 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-beige-500 focus:border-beige-500 transition"
                        placeholder="doctor@healingtouch.com"
                    >
                </div>
                @error('email') <span class="text-xs text-red-500 mt-1 block">{{ $message }}</span> @enderror
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Password</label>
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-5 h-5 text-gray-400">
                            <path fill-rule="evenodd" d="M10 1a4.5 4.5 0 00-4.5 4.5V9H5a2 2 0 00-2 2v6a2 2 0 002 2h10a2 2 0 002-2v-6a2 2 0 00-2-2h-.5V5.5A4.5 4.5 0 0010 1zm3 8V5.5a3 3 0 10-6 0V9h6z" clip-rule="evenodd" />
                        </svg>
                    </div>
                    <input
                        type="password"
                        id="password"
                        wire:model="password"
                        class="mt-1 w-full pl-10 pr-4 py-3 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-beige-500 focus:border-beige-500 transition"
                        placeholder="••••••••"
                    >
                </div>
                @error('password') <span class="text-xs text-red-500 mt-1 block">{{ $message }}</span> @enderror
            </div>

            <!-- Remember me -->
            <div class="flex items-center justify-between text-sm">
                <div class="flex items-center">
                    <input id="remember-me" type="checkbox" wire:model="remember" class="h-4 w-4 text-beige-600 focus:ring-beige-500 border-gray-300 rounded">
                    <label for="remember-me" class="ml-2 block text-gray-700">Remember me</label>
                </div>
            </div>

            <div>
                <button
                    type="submit"
                    class="w-full bg-beige-400 hover:bg-beige-700 text-white font-medium py-3 px-4 rounded-md transition duration-200 ease-in-out transform hover:-translate-y-1 focus:outline-none focus:ring-2 focus:ring-beige-500 focus:ring-opacity-50 shadow-md"
                >
                    Login to Dashboard
                </button>
            </div>
        </form>
        
        <!-- Footer -->
        <div class="mt-6 text-center text-xs text-gray-500">
            &copy; {{ now()->year }} Healing Touch. All rights reserved.
        </div>
    </div>
</div>