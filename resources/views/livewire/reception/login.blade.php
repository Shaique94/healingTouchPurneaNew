<div class="min-h-screen flex items-center justify-center bg-gray-50">
    <div class="w-full max-w-md bg-white p-8 rounded-lg shadow-md border border-gray-200">
        <!-- Logo/Icon -->
        <div class="flex justify-center mb-6">
            <div class="h-16 w-16 bg-beige-100 rounded-full flex items-center justify-center shadow-md">
                <img src="{{asset('healingTouchLogo.jpeg')}}" alt="healing touch logo" class="h-12 w-12">
            </div>
        </div>
        
        <h1 class="text-2xl font-bold text-center mb-2 text-gray-800">Reception <span class="text-beige-600">Login</span></h1>
        <div class="w-24 h-1 bg-gray-600 mx-auto mb-4"></div>
        <p class="text-center text-gray-600 mb-6 text-sm">Enter your credentials to access the dashboard</p>

        {{-- Display error message --}}
        @if (session()->has('error'))
            <div class="mb-4 text-sm text-red-600 bg-red-50 p-3 rounded-lg border border-red-100 flex items-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-red-500 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
                {{ session('error') }}
            </div>
        @endif

        {{-- Login Form --}}
        <form wire:submit.prevent="login" class="space-y-5">
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Email Address</label>
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207" />
                        </svg>
                    </div>
                    <input
                        type="email"
                        wire:model="email"
                        class="mt-1 w-full pl-10 pr-4 py-3 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-beige-500 focus:border-beige-500 transition"
                        placeholder="reception@example.com"
                    >
                </div>
                @error('email') <span class="text-xs text-red-500 mt-1 block">{{ $message }}</span> @enderror
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Password</label>
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                        </svg>
                    </div>
                    <input
                        type="password"
                        wire:model="password"
                        class="mt-1 w-full pl-10 pr-4 py-3 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-beige-500 focus:border-beige-500 transition"
                        placeholder="••••••••"
                    >
                </div>
                @error('password') <span class="text-xs text-red-500 mt-1 block">{{ $message }}</span> @enderror
            </div>

            <!-- Remember me and forgot password -->
            <div class="flex items-center justify-between text-sm">
                <div class="flex items-center">
                    <input id="remember-me" type="checkbox" class="h-4 w-4 text-beige-600 focus:ring-beige-500 border-gray-300 rounded">
                    <label for="remember-me" class="ml-2 block text-gray-700">Remember me</label>
                </div>
                <a wire:navigate  href="#" class="text-beige-600 hover:text-beige-800 font-medium">Forgot password?</a>
            </div>

            <div>
                <button
                    type="submit"
                    class="w-full bg-beige-400 hover:bg-beige-700 text-white font-medium py-3 px-4 rounded-md transition duration-200 ease-in-out transform hover:-translate-y-1 focus:outline-none focus:ring-2 focus:ring-beige-500 focus:ring-opacity-50 shadow-md"
                >
                    Sign In
                </button>
            </div>
        </form>
        
        <!-- Additional help text -->
        <p class="text-center text-gray-600 text-sm mt-6">
            Need assistance? Contact <a wire:navigate  href="#" class="text-beige-600 hover:underline">Admin</a>
        </p>
        <p class="text-center text-gray-600 text-sm mt-2">
            <a wire:navigate href="{{route('userlandingpage')}}" class="text-beige-600 hover:underline inline-flex items-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                </svg>
                Back to Home
            </a>
        </p>
    </div>
</div>