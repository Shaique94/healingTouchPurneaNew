<div class="min-h-screen flex items-center justify-center bg-gray-100">
    <div class="w-full max-w-md bg-white p-8 rounded-2xl shadow-lg">
        <h2 class="text-2xl font-bold text-center mb-6 text-gray-800">Reception Login</h2>

        {{-- Display error message --}}
        @if (session()->has('error'))
            <div class="mb-4 text-sm text-red-600 bg-red-100 p-2 rounded">
                {{ session('error') }}
            </div>
        @endif

        {{-- Login Form --}}
        <form wire:submit.prevent="login" class="space-y-4">
            {{-- Email --}}
            <div>
                <label class="block text-sm font-medium text-gray-700">Email</label>
                <input
                    type="email"
                    wire:model.lazy="email"
                    class="mt-1 w-full px-4 py-2 border border-gray-300 rounded-xl shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-300"
                    placeholder="reception@example.com"
                >
                @error('email') <span class="text-xs text-red-500">{{ $message }}</span> @enderror
            </div>

            {{-- Password --}}
            <div>
                <label class="block text-sm font-medium text-gray-700">Password</label>
                <input
                    type="password"
                    wire:model.lazy="password"
                    class="mt-1 w-full px-4 py-2 border border-gray-300 rounded-xl shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-300"
                    placeholder="••••••••"
                >
                @error('password') <span class="text-xs text-red-500">{{ $message }}</span> @enderror
            </div>

            {{-- Submit --}}
            <div>
                <button
                    type="submit"
                    class="w-full bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded-xl transition"
                >
                    Login
                </button>
            </div>
        </form>
    </div>
</div>

