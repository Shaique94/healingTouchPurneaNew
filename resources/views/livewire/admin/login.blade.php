
<div class="bg-gray-100 flex items-center justify-center h-screen" wire:ignore.self>
    <div class="w-full max-w-md bg-white rounded-2xl shadow-xl p-8 space-y-6">

        <!-- Logo -->
        <div class="flex justify-center">
            <img src="{{asset('healingTouchLogo.jpeg') }}" alt="Hospital Logo" class="w-20 h-20 rounded-full shadow-md" />
        </div>

        <!-- Title -->
        <h2 class="text-center text-2xl font-bold text-gray-700">Hospital Admin Login</h2>

        <!-- Login Form -->
        <form wire:submit.prevent="login" class="space-y-4">
            <div>
                <label class="block text-sm font-medium text-gray-600">Email</label>
                <input type="email" wire:model.lazy="email" required
                    class="mt-1 w-full px-4 py-2 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500" />
                @error('email') <span class="text-sm text-red-500">{{ $message }}</span> @enderror
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-600">Password</label>
                <input type="password" wire:model.lazy="password" required
                    class="mt-1 w-full px-4 py-2 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500" />
                @error('password') <span class="text-sm text-red-500">{{ $message }}</span> @enderror
            </div>

            <!-- Login Button -->
            <button type="submit"
                class="w-full bg-blue-600 text-white py-2 rounded-xl hover:bg-blue-700 transition duration-200 font-semibold">
                Login
            </button>
        </form>

        <!-- Optional Footer -->
        <div class="text-center text-sm text-gray-500">
            &copy; 2025 Hospital Management System
        </div>
    </div>
</div>

