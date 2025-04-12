<div {{ $attributes->merge(['class' => 'fixed inset-0 bg-white bg-opacity-80 z-50 flex items-center justify-center transition-opacity duration-300']) }}>
    <div class="text-center">
        <div class="inline-block relative w-20 h-20">
            <div class="absolute top-0 left-0 right-0 bottom-0 border-4 border-sky-200 rounded-full"></div>
            <div class="absolute top-0 left-0 right-0 bottom-0 border-4 border-sky-600 rounded-full animate-spin" 
                 style="border-bottom-color: transparent; border-left-color: transparent;"></div>
        </div>
        <p class="mt-4 text-sky-600 text-lg font-medium">{{ $slot ?? 'Loading...' }}</p>
    </div>
</div>
