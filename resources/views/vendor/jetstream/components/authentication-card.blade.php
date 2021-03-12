<div class="flex flex-col items-center min-h-screen pt-6 sm:justify-center sm:pt-0">
    <div class="z-10">
        {{ $logo }}
    </div>

    <div class="z-0 w-full px-6 pt-10 pb-6 -mt-10 overflow-hidden bg-red-900 bg-cover border-4 border-white shadow-md sm:max-w-md sm:rounded-lg"  style="background-image: url({{asset('card.png')}})">
        {{ $slot }}
    </div>
</div>
