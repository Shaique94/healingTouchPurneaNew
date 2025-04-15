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
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <i class="fas fa-envelope text-gray-400"></i>
                        </div>
                        <input type="email" id="email" wire:model.lazy="email"
                            class="pl-10 w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200"
                            placeholder="doctor@healingtouch.com">
                    </div>
                    @error('email')
                        <span class="text-sm text-red-500 mt-1 block">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mb-6">
                    <label for="password" class="block text-sm font-medium text-gray-700 mb-1">Password</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <i class="fas fa-lock text-gray-400"></i>
                        </div>
                        <input type="password" id="password" wire:model.lazy="password"
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