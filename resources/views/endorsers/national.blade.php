<x-app-layout>
<div class="flex flex-col items-center justify-center pt-2">

    <div class="flex flex-col items-center justify-center">
        <a href="{{ auth()->check() ? route('dashboard') : url('/') }}">
            <img src="{{asset('logo.png')}}" class="w-auto h-24 transform hover:scale-105">
        </a>
        <img src="{{asset('header_national.png')}}" class="w-auto h-20 py-4 transform hover:scale-105">
    </div>

    <div class="grid grid-cols-1 gap-4 mx-20 md:grid-cols-3 lg:xl:grid-cols-4 xl:grid-cols-5">
    
        @foreach($endorsers as $endorser)
        <a href="{{route('endorsers.show',$endorser->id)}}">
        <div class="flex flex-col items-center justify-center p-4 transform bg-gray-100 shadow rounded-xl hover:scale-105">
            <div class="inline-flex w-40 h-40 overflow-hidden">
                <img src="{{is_null($endorser->image) ? asset('placeholder1.png') : asset('/endorsers/'.$endorser->image)}}" class="z-20 w-full h-full shadow-xl">
            </div>

            <h2 class="mt-2 font-bold text-blue-900 uppercase text-md">{{$endorser->name}}</h2>
            <h6 class="text-sm font-medium">{{$endorser->farm}}</h6>

        </div>
        </a>
        @endforeach
        
    </div>
</div>
</x-app-layout>