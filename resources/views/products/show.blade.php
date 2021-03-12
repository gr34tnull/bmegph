<x-app-layout>
<div class="flex flex-col items-center justify-center px-32 py-12">

    <div class="flex flex-col items-center justify-center">
        <a href="{{ auth()->check() ? route('dashboard') : url('/') }}">
            <img src="{{asset('logo.png')}}" class="w-auto h-24 transform hover:scale-105">
        </a>
        <img src="{{asset('header_products.png')}}" class="w-auto h-20 py-4 transform hover:scale-105">
    </div>

    <div class="grid grid-cols-1 gap-4 mx-20 md:grid-cols-3 lg:xl:grid-cols-4 xl:grid-cols-5">
    
        @foreach($products as $product)
        <button class="focus:outline-none" onclick="toggleElement('product{{$product->id}}')">
            <div class="flex flex-col items-center justify-center p-4 transform bg-red-900 border-4 border-yellow-200 rounded-lg shadow hover:scale-105">
                <div class="inline-flex w-48 h-48 overflow-hidden">
                    <img src="{{is_null($product->image) ? asset('placeholder3.png') : asset('/products/'.$product->image)}}" class="w-full h-full">
                </div>

                <h2 class="text-2xl font-bold text-white">{{$product->name}}</h2>
                <h6 class="text-sm font-medium text-white">₱{{number_format($product->price, 2, '.', '')}}</h6>

            </div>
        </button>

        <div id="product{{$product->id}}" class="fixed inset-0 z-10 hidden overflow-y-auto">
            <div class="flex items-end justify-center min-h-screen px-4 pt-4 pb-20 text-center sm:block sm:p-0">
                <div class="fixed inset-0 transition-opacity" aria-hidden="true">
                <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
                </div>

                <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>

                <div class="inline-block overflow-hidden text-left align-bottom transition-all transform bg-red-900 border-4 border-yellow-200 rounded-lg shadow-xl sm:my-8 sm:align-middle sm:max-w-lg sm:w-full" role="dialog" aria-modal="true" aria-labelledby="modal-headline">
                <div class="px-4 pt-5 pb-4 bg-red-900 sm:p-6 sm:pb-4">
                    <div class="flex flex-col items-center justify-center">
                    <div class="mt-3 text-center">
                        <div class="inline-flex w-64 h-64 overflow-hidden">
                            <img src="{{is_null($product->image) ? asset('placeholder3.png') : asset('/products/'.$product->image)}}" class="w-full h-full">
                        </div>
                        <h3 class="text-4xl font-extrabold leading-6 text-white" id="modal-headline">
                        {{$product->name}}
                        </h3>
                        <p class="py-2 text-xs text-white uppercase">
                        {{$product->description}}
                        </p>
                    </div>
                    </div>
                </div>
                <div class="px-4 py-3 bg-red-900 sm:px-6 sm:flex sm:flex-row-reverse">
                    <a href="{{$product->link}}" class="inline-flex justify-center w-full px-4 py-2 text-base font-medium text-black bg-yellow-300 border border-transparent rounded-md shadow-sm hover:bg-gray-700 hover:text-white focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500 sm:ml-3 sm:w-auto sm:text-sm" target="_blank">
                    Go to Shopee
                    </a>
                    <button type="button" class="inline-flex justify-center w-full px-4 py-2 mt-3 text-base font-medium text-gray-700 bg-white border border-gray-300 rounded-md shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm" onclick="toggleElement('product{{$product->id}}')">
                    Close
                    </button>
                </div>
                </div>
            </div>
        </div>
        @endforeach

    </div>
</div>

</x-app-layout>