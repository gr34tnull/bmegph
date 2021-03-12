<x-app-layout>
<div class="flex flex-col items-center justify-center p-2 space-x-10 lg:flex-row lg:px-32 lg:py-10">
    <div class="w-full lg:w-1/5">
        <div class="flex flex-col items-center justify-center p-4 bg-gray-100 shadow rounded-xl bg-opacity-80">
            <div class="inline-flex w-40 h-40 overflow-hidden">
                <img src="{{is_null($endorser->image) ? asset('placeholder1.png') : asset('/endorsers/'.$endorser->image)}}" class="z-20 w-full h-full shadow-xl">
            </div>

            <h2 class="mt-2 font-bold text-blue-900 uppercase text-md">{{$endorser->name}}</h2>
            <h6 class="text-sm font-medium">{{$endorser->farm}}</h6>

            <div class="mx-6 mt-2">
                <ul class="text-xs">
                    <li><i class="fas fa-map-marker-alt"></i> {{$endorser->address}}</li>
                    <li><i class="fas fa-at"></i> {{$endorser->email}}</li>
                    <li><i class="fa fa-phone"></i> {{$endorser->contact}}</li>
                    <li class="{{is_null($endorser->fb) ? 'hidden' : ''}}"><i class="fab fa-facebook-square"></i> {{$endorser->fb}}</li>
                    <li class="{{is_null($endorser->ig) ? 'hidden' : ''}}"><i class="fab fa-instagram-square"></i> {{$endorser->ig}}</li>
                </ul>    
            </div>

        </div>
        <div class="flex flex-col items-center justify-center p-4 mt-2 transform bg-gray-100 shadow rounded-xl bg-opacity-80">

            <h2 class="mt-2 font-bold text-blue-900 uppercase text-md">ACHIEVEMENTS</h2>
            <h6 class="text-xs font-medium">{{$endorser->achievements}}</h6>

        </div>
    </div>
    <div class="w-full overflow-y-auto lg:w-4/5">
        <div class="flex flex-col items-center justify-center px-10 pt-6 bg-gray-100 shadow rounded-xl bg-opacity-80">
            
            <div class="inline-block w-full">
                <h1 class="text-4xl font-bold text-left text-red-900 uppercase">BLOODLINES</h1>
            </div>
            
            <div class="grid grid-cols-1 gap-2 p-2 md:grid-cols-3 lg:grid-cols-3">
                @foreach($bloodlines as $bloodline)
                <div class="">
                    <button type="button" onclick="toggleElement('image{{$bloodline->id}}')">
                        <img alt="gallery" class="block object-center w-full h-48 transform border border-gray-900 rounded-xl hover:scale-105" src="{{is_null($bloodline->image) ? asset('placeholder2.png') : asset('/bloodlines/'.$bloodline->image)}}">
                    </button>
                    <p class="font-extrabold text-center text-blue-900 uppercase text-md">{{$bloodline->name}}</p>
                </div>
                
                <div id="image{{$bloodline->id}}" class="fixed inset-0 z-30 hidden overflow-y-auto">
                    <div class="flex items-end justify-center min-h-screen px-4 pt-4 pb-20 text-center sm:block sm:p-0">
                        <div class="fixed inset-0 transition-opacity" aria-hidden="true">
                        <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
                        </div>
                        <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>
                        <div class="inline-block overflow-hidden text-left align-bottom transition-all transform bg-white border border-gray-900 rounded-lg shadow-xl sm:my-8 sm:align-middle sm:max-w-lg sm:w-full" role="dialog" aria-modal="true" aria-labelledby="modal-headline">
                        
                        <div class="p-6 bg-white">
                            <div class="flex flex-col">
                                <img id="feature" class="w-full border border-gray-900 rounded-md h-72" src="{{is_null($bloodline->image) ? asset('placeholder2.png') : asset('/bloodlines/'.$bloodline->image)}}" />
                                <p class="pt-2 font-extrabold text-center text-gray-900 uppercase text-md">{{$bloodline->name}}</p>
                                <small class="text-sm text-center uppercase">{{$bloodline->description}}</small>
                            </div>
                        </div>

                        <div class="px-4 py-2 bg-gray-50 sm:px-6 sm:flex sm:flex-row-reverse">
                            <button type="button" class="inline-flex justify-center w-full px-4 py-2 mt-3 text-base font-medium text-gray-700 bg-white border border-gray-300 rounded-md shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-300 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm" onclick="toggleElement('image{{$bloodline->id}}')">
                            Close
                            </button>
                        </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>

            <div class="inline-block w-full pt-6">
                <h1 class="text-4xl font-bold text-left text-red-900 uppercase">VIDEOS</h1>
            </div>
            
            <div class="grid grid-cols-1 gap-2 p-2 md:grid-cols-3 lg:grid-cols-3">
                @foreach($galleries as $gallery)
                <div class="w-full h-64">
                    <div class="relative flex flex-col items-center justify-center">
                        <video class="border-gray-900 border-1" controls>
                            <source src="{{asset('gallery/'.$gallery->video)}}" type="video/mp4">
                        </video>
                        <small class="py-2 font-extrabold text-center text-blue-900 uppercase text-md">{{$gallery->name}}</small>
                    </div>
                </div>
                @endforeach
            </div>

        </div>
    </div>
</div>
</x-app-layout>