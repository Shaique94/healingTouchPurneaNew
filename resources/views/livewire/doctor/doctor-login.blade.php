<div class="min-h-screen bg-gray-100 flex items-center justify-center">
    <div class="bg-white shadow-lg rounded-lg w-full max-w-md p-8">
        <!-- Title -->
        <div class="flex items-center justify-center mb-6">
            <div class="text-2xl font-bold text-indigo-800">Healing Touch</div>
        </div>

        <!-- Header -->
        <div class="mb-6 text-center">
            <h2 class="text-2xl font-semibold text-gray-800">Doctor Login</h2>
            <p class="text-sm text-gray-500">Enter your credentials to access the dashboard</p>
        </div>

        <!-- Login Form -->
        <form wire:submit.prevent="login">
            <div class="mb-4">
                <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Email</label>
                <input type="email" id="email" wire:model.lazy="email"
                    class="w-full px-4 py-2 border rounded focus:outline-none focus:ring-2 focus:ring-indigo-600">
                @error('email')
                    <span class="text-sm text-red-500">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-4">
                <label for="password" class="block text-sm font-medium text-gray-700 mb-1">Password</label>
                <input type="password" id="password" wire:model.lazy="password"
                    class="w-full px-4 py-2 border rounded focus:outline-none focus:ring-2 focus:ring-indigo-600">
                @error('password')
                    <span class="text-sm text-red-500">{{ $message }}</span>
                @enderror
            </div>

            <div class="flex items-center justify-between mb-6">
                <label class="flex items-center">
                    <input type="checkbox" wire:model="remember" class="mr-2">
                    <span class="text-sm text-gray-600">Remember me</span>
                </label>
                <a href="#" class="text-sm text-indigo-600 hover:underline">Forgot Password?</a>
            </div>

            <button type="submit"
                class="w-full bg-indigo-600 text-white py-2 px-4 rounded hover:bg-indigo-700 transition duration-200">
                Login
            </button>

            @if ($errorMessage)
                <div class="mt-4 text-red-600 text-sm text-center">
                    {{ $errorMessage }}
                </div>
            @endif
        </form>

        <div class="mt-6 text-center text-sm text-gray-500">
            &copy; {{ now()->year }} Healing Touch. All rights reserved.
        </div>
    </div>
</div>

