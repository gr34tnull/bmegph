<x-app-layout>
<div class="flex flex-col items-center justify-center px-32 py-12">

    <a href="{{ auth()->check() ? route('dashboard') : url('/') }}">
        <img src="{{asset('logo.png')}}" class="w-auto h-20 transform hover:scale-105">
    </a>
    <h1 class="pb-5 text-3xl font-extrabold text-center text-gray-300 uppercase">PRODUCTS</h1>

    <div class="grid gap-10 py-10 mx-20 lg:grid-cols-5">
    
        <a href="{{route('products.show',1)}}">
            <div class="flex flex-col items-center justify-center p-4 transform bg-red-900 border-4 border-yellow-200 shadow rounded-xl hover:scale-105">
                <div class="inline-flex w-64 h-64 overflow-hidden">
                    <img src="{{asset('category1.png')}}" class="z-20 w-full h-full shadow-xl">
                </div>

                <h2 class="mt-2 font-bold text-white uppercase text-md">FEEDS</h2>
                <h6 class="text-sm font-medium"></h6>

            </div>
        </a>

        <a href="{{route('products.show',2)}}">
            <div class="flex flex-col items-center justify-center p-4 transform bg-red-900 border-4 border-yellow-200 shadow rounded-xl hover:scale-105">
                <div class="inline-flex w-64 h-64 overflow-hidden">
                    <img src="{{asset('category2.png')}}" class="z-20 w-full h-full shadow-xl">
                </div>

                <h2 class="mt-2 font-bold text-white uppercase text-md">DISINFECTANT</h2>
                <h6 class="text-sm font-medium"></h6>

            </div>
        </a>

        <a href="{{route('products.show',3)}}">
            <div class="flex flex-col items-center justify-center p-4 transform bg-red-900 border-4 border-yellow-200 shadow rounded-xl hover:scale-105">
                <div class="inline-flex w-64 h-64 overflow-hidden">
                    <img src="{{asset('category3.png')}}" class="z-20 w-full h-full shadow-xl">
                </div>

                <h2 class="mt-2 font-bold text-white uppercase text-md">SUPPLEMENT</h2>
                <h6 class="text-sm font-medium"></h6>

            </div>
        </a>

        <a href="{{route('products.show',4)}}">
            <div class="flex flex-col items-center justify-center p-4 transform bg-red-900 border-4 border-yellow-200 shadow rounded-xl hover:scale-105">
                <div class="inline-flex w-64 h-64 overflow-hidden">
                    <img src="{{asset('category4.png')}}" class="z-20 w-full h-full shadow-xl">
                </div>

                <h2 class="mt-2 font-bold text-white uppercase text-md">SHAMPOO</h2>
                <h6 class="text-sm font-medium"></h6>

            </div>
        </a>

        <a href="{{route('products.show',5)}}">
            <div class="flex flex-col items-center justify-center p-4 transform bg-red-900 border-4 border-yellow-200 shadow rounded-xl hover:scale-105">
                <div class="inline-flex w-64 h-64 overflow-hidden">
                    <img src="{{asset('category5.png')}}" class="z-20 w-full h-full shadow-xl">
                </div>

                <h2 class="mt-2 font-bold text-white uppercase text-md">ANTIBIOTICS</h2>
                <h6 class="text-sm font-medium"></h6>

            </div>
        </a>

    </div>
</div>

</x-app-layout>