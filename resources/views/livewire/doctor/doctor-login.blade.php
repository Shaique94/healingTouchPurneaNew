<div class=" min-h-screen flex items-center justify-center p-4 bg-gradient-to-br from-blue-50 to-gray-100">
    <div class="bg-white rounded-xl shadow-xl w-full max-w-md overflow-hidden">
        <!-- Header with logo area -->
        <div class=" p-6 text-white">
            <div class="flex items-center justify-center">
                <!-- Logo placeholder - replace with your actual logo -->
                <div class="bg-white p-3 rounded-full shadow-md mr-4">
                    <img src="{{ asset('healingTouchLogo.jpeg') }}" alt="Healing Touch Logo" class="h-10 w-10">
                </div>
            </div>
        </div>

        <!-- Login Form Container -->
        <div class="p-8">
            <div class="text-center mb-8">
                <h2 class="text-2xl font-semibold text-gray-800">Doctor Login</h2>
                <p class="text-sm text-gray-500 mt-1">Secure access to patient records & appointments</p>
            </div>

            <form wire:submit.prevent="login">
                <div class="mb-5">
                    <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Email Address</label>
                    <div class="relative">

                        <div class="relative">
                            <input type="email" id="email" wire:model="email"
                                class="pl-10 w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200"
                                placeholder="doctor@healingtouch.com">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-5 h-5 text-gray-400">
                                    <path d="M3 4a2 2 0 00-2 2v1.161l8.441 4.221a1.25 1.25 0 001.118 0L19 7.162V6a2 2 0 00-2-2H3z" />
                                    <path d="M19 8.839l-7.77 3.885a2.75 2.75 0 01-2.46 0L1 8.839V14a2 2 0 002 2h14a2 2 0 002-2V8.839z" />
                                </svg>
                            </div>
                        </div>
                    </div>
                    @error('email')
                    <span class="text-sm text-red-500 mt-1 block">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mb-6">
                    <label for="password" class="block text-sm font-medium text-gray-700 mb-1">Password</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-5 h-5 text-gray-400">
                                <path fill-rule="evenodd" d="M10 1a4.5 4.5 0 00-4.5 4.5V9H5a2 2 0 00-2 2v6a2 2 0 002 2h10a2 2 0 002-2v-6a2 2 0 00-2-2h-.5V5.5A4.5 4.5 0 0010 1zm3 8V5.5a3 3 0 10-6 0V9h6z" clip-rule="evenodd" />
                            </svg>
                        </div>
                        <input type="password" id="password" wire:model="password"
                            class="pl-10 w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200"
                            placeholder="••••••••">
                    </div>
                    @error('password')
                    <span class="text-sm text-red-500 mt-1 block">{{ $message }}</span>
                    @enderror
                </div>

                <div class="flex items-center justify-between mb-6">
                    <label class="flex items-center">
                        <input type="checkbox" wire:model="remember" class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300 rounded">
                        <span class="ml-2 text-sm text-gray-600">Remember me</span>
                    </label>
                </div>

                <button type="submit"
                    class="w-full bg-blue-600 text-white py-3 px-4 rounded-lg hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition duration-200 flex items-center justify-center font-medium">
                    <i class="fas fa-sign-in-alt mr-2"></i> Login to Dashboard
                </button>

                @if ($errorMessage)
                <div class="mt-4 bg-red-50 border-l-4 border-red-500 p-4 text-red-700 text-sm">
                    <div class="flex">
                        <div class="flex-shrink-0">
                            <i class="fas fa-exclamation-circle"></i>
                        </div>
                        <div class="ml-3">
                            <p>{{ $errorMessage }}</p>
                        </div>
                    </div>
                </div>
                @endif
            </form>

            <div class="mt-6 text-center text-xs text-gray-500">
                &copy; {{ now()->year }} Healing Touch. All rights reserved.
            </div>
        </div>
    </div>
</div>