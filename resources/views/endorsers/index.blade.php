<x-app-layout>
    <div class="py-6">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-xl sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="py-4">
                        <form method="post" action="">
                        @csrf
                        <div class="relative pt-2 mx-auto text-gray-600">
                            <input class="w-full h-10 text-sm bg-white border-2 border-gray-300 rounded-lg focus:outline-none" type="search" name="search" placeholder="Search">
                            <button type="submit" class="absolute top-0 right-0 mt-5 mr-8">
                                <svg class="w-4 h-4 text-gray-600 fill-current" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Capa_1" x="0px" y="0px" viewBox="0 0 56.966 56.966" style="enable-background:new 0 0 56.966 56.966;" xml:space="preserve" width="512px" height="512px">
                                <path d="M55.146,51.887L41.588,37.786c3.486-4.144,5.396-9.358,5.396-14.786c0-12.682-10.318-23-23-23s-23,10.318-23,23  s10.318,23,23,23c4.761,0,9.298-1.436,13.177-4.162l13.661,14.208c0.571,0.593,1.339,0.92,2.162,0.92  c0.779,0,1.518-0.297,2.079-0.837C56.255,54.982,56.293,53.08,55.146,51.887z M23.984,6c9.374,0,17,7.626,17,17s-7.626,17-17,17  s-17-7.626-17-17S14.61,6,23.984,6z" />
                                </svg>
                            </button>
                            </div>
                        </form>
                    </div>
                    <div class="flex flex-col">
                        <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                            <div class="inline-block min-w-full py-2 align-middle sm:px-6 lg:px-8">
                            <div class="overflow-hidden border-b border-gray-200 shadow sm:rounded-lg">
                                <table class="min-w-full divide-y divide-gray-200">
                                <thead class="bg-gray-50">
                                    <tr>
                                    <th scope="col" class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                                        Name
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                                        Farm
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                                        Option
                                    </th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200">
                                @foreach($endorsers as $endorser)
                                    <tr>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="flex items-center">
                                        <div class="flex-shrink-0 w-10 h-10">
                                            <button type="button" onclick="toggleElement('imageUpload{{$endorser->id}}')">
                                                <img class="w-10 h-10 rounded-full" src="{{is_null($endorser->image) ? asset('placeholder1.png') : asset('/endorsers/'.$endorser->image)}}" alt="">
                                            </button>
                                        </div>
                                        <div class="ml-4">
                                            <div class="text-sm font-medium text-gray-900">
                                            {{$endorser->name}}
                                            </div>
                                            <div class="text-sm text-gray-500">
                                            {{$endorser->email}}
                                            </div>
                                        </div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm text-gray-900">{{$endorser->farm}}</div>
                                        <div class="text-sm text-gray-500">{{$endorser->address}}</div>
                                    </td>
                                    <td class="inline-flex px-6 py-4 text-sm font-medium text-center whitespace-nowrap">
                                        <div class="flex flex-col items-center justify-center mx-2">
                                            <div class="text-sm font-medium text-gray-900">
                                                <button class="pr-2 text-gray-600 hover:text-gray-900 focus:outline-none" onclick="toggleElement('endorser{{$endorser->id}}')" ><i class="fas fa-edit"></i></button>
                                            </div>
                                            <div class="text-xs text-gray-500">
                                                Edit
                                            </div>
                                        </div>
                                        <div class="flex flex-col items-center justify-center mx-2">
                                            <div class="text-sm font-medium text-gray-900">
                                                <a href="{{route('bloodlines.show',$endorser->id)}}" class="pr-2 text-gray-600 hover:text-gray-900 focus:outline-none"><i class="fas fa-egg"></i></a>
                                            </div>
                                            <div class="text-xs text-gray-500">
                                                Bloodlines
                                            </div>
                                        </div>
                                        <div class="flex flex-col items-center justify-center mx-2">
                                            <div class="text-sm font-medium text-gray-900">
                                                <a href="{{route('galleries.show',$endorser->id)}}" class="pr-2 text-gray-600 hover:text-gray-900 focus:outline-none"><i class="fas fa-photo-video"></i></a>
                                            </div>
                                            <div class="text-xs text-gray-500">
                                                Videos
                                            </div>
                                        </div>
                                        <div class="flex flex-col items-center justify-center mx-2">
                                            <div class="text-sm font-medium text-gray-900">
                                                <form method="POST" action="{{route('endorsers.destroy',$endorser->id)}}">
                                                @csrf
                                                @method('delete')
                                                    <button type="submit" class="text-red-600 hover:text-red-900 focus:outline-none"><i class="fas fa-trash"></i></button>
                                                </form>
                                            </div>
                                            <div class="text-xs text-gray-500">
                                            Delete
                                            </div>
                                        </div>
                                    </td>
                                    </tr>

                                    <!-- Profile Image -->
                                    <div id="imageUpload{{$endorser->id}}" class="fixed inset-0 z-30 hidden overflow-y-auto">
                                        <form method="POST" action="{{route('endorsers.update',$endorser->id)}}" enctype="multipart/form-data">
                                        @csrf
                                        @method('patch')
                                        <div class="flex items-end justify-center min-h-screen px-4 pt-4 pb-20 text-center sm:block sm:p-0">
                                            <div class="fixed inset-0 transition-opacity" aria-hidden="true">
                                            <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
                                            </div>
                                            <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>
                                            <div class="inline-block overflow-hidden text-left align-bottom transition-all transform bg-white rounded-lg shadow-xl sm:my-8 sm:align-middle sm:max-w-lg sm:w-full" role="dialog" aria-modal="true" aria-labelledby="modal-headline">
                                            
                                            <div class="p-6 bg-white">
                                                <div class="flex flex-col">
                                                    <img id="feature" class="w-full h-32 rounded-md lg:h-64" src="{{is_null($endorser->image) ? 'https://via.placeholder.com/500' : asset('/endorsers/'.$endorser->image)}}" />

                                                    <div class="mt-2">
                                                        <x-jet-label for="image" :value="__('Profile Picture')" />
                                                        <input id="image" name="image" type="file" class="items-center block w-full px-4 py-2 mt-2 mr-2 text-xs font-semibold tracking-widest text-center text-gray-700 uppercase transition duration-150 ease-in-out bg-white border border-gray-300 rounded-md shadow-sm hover:text-gray-500 focus:outline-none focus:border-blue-300 focus:shadow-outline-blue active:text-gray-800 active:bg-gray-50" accept="image/*" onchange="readURL(this);">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="px-4 py-2 bg-gray-50 sm:px-6 sm:flex sm:flex-row-reverse">
                                                <button type="submit" class="inline-flex justify-center w-full px-4 py-2 text-base font-medium text-white bg-gray-600 border border-transparent rounded-md shadow-sm hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500 sm:ml-3 sm:w-auto sm:text-sm">
                                                Update
                                                </button>
                                                <button type="button" class="inline-flex justify-center w-full px-4 py-2 mt-3 text-base font-medium text-gray-700 bg-white border border-gray-300 rounded-md shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-300 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm" onclick="toggleElement('imageUpload{{$endorser->id}}')">
                                                Close
                                                </button>
                                            </div>
                                            </div>
                                        </div>
                                        </form>
                                    </div>

                                    <!--Modal -->
                                    <div id="endorser{{$endorser->id}}" class="fixed inset-0 z-30 hidden overflow-y-auto">
                                        <form method="POST" action="{{route('endorsers.update',$endorser->id)}}" enctype="multipart/form-data">
                                        @csrf
                                        @method('patch')
                                        <div class="flex items-end justify-center min-h-screen px-4 pt-4 pb-20 text-center sm:block sm:p-0">
                                            <div class="fixed inset-0 transition-opacity" aria-hidden="true">
                                            <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
                                            </div>
                                            <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>
                                            <div class="inline-block overflow-hidden text-left align-bottom transition-all transform bg-white rounded-lg shadow-xl sm:my-8 sm:align-middle sm:max-w-lg sm:w-full" role="dialog" aria-modal="true" aria-labelledby="modal-headline">
                                            
                                            <div class="overflow-hidden bg-white shadow sm:rounded-lg">
                                                <div class="px-4 py-2 sm:px-6">
                                                    <h3 class="text-lg font-medium leading-6 text-gray-900">
                                                    Endorser's Information
                                                    </h3>
                                                    <p class="max-w-2xl mt-1 text-sm text-gray-500">
                                                    Personal details of the endorser.
                                                    </p>
                                                </div>
                                                <div class="border-t border-gray-200">
                                                    <dl>
                                                    <div class="px-4 py-2 bg-gray-50 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                                        <dt class="mt-3 text-sm font-medium text-gray-500">
                                                        Full Name
                                                        </dt>
                                                        <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                                            <x-jet-input id="name" class="block w-full" type="text" name="name" value="{{$endorser->name}}" required autofocus />
                                                        </dd>
                                                    </div>
                                                    <div class="px-4 py-2 bg-white sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                                        <dt class="mt-3 text-sm font-medium text-gray-500">
                                                        Email Address
                                                        </dt>
                                                        <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                                            <x-jet-input id="email" class="block w-full" type="email" name="email" value="{{$endorser->email}}" required autofocus />
                                                        </dd>
                                                    </div>
                                                    <div class="px-4 py-2 bg-gray-50 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                                        <dt class="mt-3 text-sm font-medium text-gray-500">
                                                        Farm Name
                                                        </dt>
                                                        <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                                            <x-jet-input id="farm" class="block w-full" type="text" name="farm" value="{{$endorser->farm}}" required autofocus />
                                                        </dd>
                                                    </div>
                                                    <div class="px-4 py-2 bg-white sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                                        <dt class="mt-3 text-sm font-medium text-gray-500">
                                                        Farm Address
                                                        </dt>
                                                        <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                                            <x-jet-input id="address" class="block w-full" type="text" name="address" value="{{$endorser->address}}" required autofocus />
                                                        </dd>
                                                    </div>
                                                    <div class="px-4 py-2 bg-gray-50 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                                        <dt class="mt-3 text-sm font-medium text-gray-500">
                                                        Contact Number
                                                        </dt>
                                                        <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                                            <x-jet-input id="contact" class="block w-full" type="text" name="contact" value="{{$endorser->contact}}" required autofocus />
                                                        </dd>
                                                    </div>
                                                    <div class="px-4 py-2 bg-white sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                                        <dt class="mt-3 text-sm font-medium text-gray-500">
                                                        Facebook
                                                        </dt>
                                                        <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                                            <x-jet-input id="fb" class="block w-full" type="text" name="fb" value="{{$endorser->fb}}" autofocus />
                                                        </dd>
                                                    </div>
                                                    <div class="px-4 py-2 bg-gray-50 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                                        <dt class="mt-3 text-sm font-medium text-gray-500">
                                                        Instragram
                                                        </dt>
                                                        <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                                            <x-jet-input id="ig" class="block w-full" type="text" name="ig" value="{{$endorser->ig}}" autofocus />
                                                        </dd>
                                                    </div>
                                                    <div class="px-4 py-2 bg-white sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                                        <dt class="mt-3 text-sm font-medium text-gray-500">
                                                        Endorser Type
                                                        </dt>
                                                        <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                                            <select id="national" name="national" class="w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                                                                <option id="national" name="national" value="1" {{ $endorser->national == 1 ? 'selected' : '' }} >National</option>
                                                                <option id="national" name="national" value="0" {{ $endorser->national == 0 ? 'selected' : '' }} >Regional</option>
                                                            </select>
                                                        </dd>
                                                    </div>
                                                    <div class="px-4 py-2 bg-gray-50 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                                        <dt class="mt-3 text-sm font-medium text-gray-500">
                                                        Achievements
                                                        </dt>
                                                        <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                                            <textarea id="achievements" name="achievements" class="w-full text-sm border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">{{$endorser->achievements}}</textarea>
                                                        </dd>
                                                    </div>
                                                    </dl>
                                                </div>
                                            </div>

                                            <div class="px-4 py-2 bg-gray-50 sm:px-6 sm:flex sm:flex-row-reverse">
                                                <button type="submit" class="inline-flex justify-center w-full px-4 py-2 text-base font-medium text-white bg-gray-600 border border-transparent rounded-md shadow-sm hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500 sm:ml-3 sm:w-auto sm:text-sm">
                                                Update
                                                </button>
                                                <button type="button" class="inline-flex justify-center w-full px-4 py-2 mt-3 text-base font-medium text-gray-700 bg-white border border-gray-300 rounded-md shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-300 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm" onclick="toggleElement('endorser{{$endorser->id}}')">
                                                Close
                                                </button>
                                            </div>
                                            </div>
                                        </div>
                                        </form>
                                    </div>
                                    
                                @endforeach
                                </tbody>
                                </table>
                            </div>
                            <div class="p-2">
                            </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <button type="button" class="text-gray-600">
        <div class="fixed bottom-0 right-0 z-10 flex items-center justify-center w-12 h-12 mb-10 mr-4 bg-white border rounded-full shadow-md cursor-pointer lg:mr-10">
            <i class="fas fa-plus" onclick="toggleElement('createEndorser')"></i>
        </div>
    </button>

    <div id="createEndorser" class="fixed inset-0 z-30 hidden overflow-y-auto">
        <form method="POST" action="{{route('endorsers.store')}}" enctype="multipart/form-data">
        @csrf
        <div class="flex items-end justify-center min-h-screen px-4 pt-4 pb-20 text-center sm:block sm:p-0">
            <div class="fixed inset-0 transition-opacity" aria-hidden="true">
            <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
            </div>
            <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>
            <div class="inline-block overflow-hidden text-left align-bottom transition-all transform bg-white rounded-lg shadow-xl sm:my-8 sm:align-middle sm:max-w-lg sm:w-full" role="dialog" aria-modal="true" aria-labelledby="modal-headline">
            
            <div class="overflow-hidden bg-white shadow sm:rounded-lg">
                <div class="px-4 py-2 sm:px-6">
                    <h3 class="text-lg font-medium leading-6 text-gray-900">
                    Create Endorser
                    </h3>
                    <p class="max-w-2xl mt-1 text-sm text-gray-500">
                    Input personal details of the endorser.
                    </p>
                </div>
                <div class="border-t border-gray-200">
                    <dl>
                    <div class="px-4 py-2 bg-gray-50 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="mt-3 text-sm font-medium text-gray-500">
                        Full Name
                        </dt>
                        <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                            <x-jet-input id="name" class="block w-full" type="text" name="name" required autofocus />
                        </dd>
                    </div>
                    <div class="px-4 py-2 bg-white sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="mt-3 text-sm font-medium text-gray-500">
                        Email Address
                        </dt>
                        <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                            <x-jet-input id="email" class="block w-full" type="email" name="email" required autofocus />
                        </dd>
                    </div>
                    <div class="px-4 py-2 bg-gray-50 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="mt-3 text-sm font-medium text-gray-500">
                        Farm Name
                        </dt>
                        <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                            <x-jet-input id="farm" class="block w-full" type="text" name="farm" required autofocus />
                        </dd>
                    </div>
                    <div class="px-4 py-2 bg-white sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="mt-3 text-sm font-medium text-gray-500">
                        Farm Address
                        </dt>
                        <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                            <x-jet-input id="address" class="block w-full" type="text" name="address" required autofocus />
                        </dd>
                    </div>
                    <div class="px-4 py-2 bg-gray-50 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="mt-3 text-sm font-medium text-gray-500">
                        Contact Number
                        </dt>
                        <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                            <x-jet-input id="contact" class="block w-full" type="text" name="contact" required autofocus />
                        </dd>
                    </div>
                    <div class="px-4 py-2 bg-white sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="mt-3 text-sm font-medium text-gray-500">
                        Facebook
                        </dt>
                        <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                            <x-jet-input id="fb" class="block w-full" type="text" name="fb" autofocus />
                        </dd>
                    </div>
                    <div class="px-4 py-2 bg-gray-50 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="mt-3 text-sm font-medium text-gray-500">
                        Instragram
                        </dt>
                        <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                            <x-jet-input id="ig" class="block w-full" type="text" name="ig" autofocus />
                        </dd>
                    </div>
                    <div class="px-4 py-2 bg-white sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="mt-3 text-sm font-medium text-gray-500">
                        Endorser Type
                        </dt>
                        <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                            <select id="national" name="national" class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-500 focus:ring-opacity-50">
                                <option id="national" name="national" value="1">National</option>
                                <option id="national" name="national" value="0">Regional</option>
                            </select>
                        </dd>
                    </div>
                    <div class="px-4 py-2 bg-gray-50 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="mt-3 text-sm font-medium text-gray-500">
                        Achievements
                        </dt>
                        <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                            <textarea id="achievements" name="achievements" class="w-full text-sm border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"></textarea>
                        </dd>
                    </div>
                    </dl>
                </div>
            </div>

            <div class="px-4 py-4 bg-white sm:px-6 sm:flex sm:flex-row-reverse">
                <button type="submit" class="inline-flex justify-center w-full px-4 py-2 text-base font-medium text-white bg-gray-600 border border-transparent rounded-md shadow-sm hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500 sm:ml-3 sm:w-auto sm:text-sm">
                Create
                </button>
                <button type="button" class="inline-flex justify-center w-full px-4 py-2 mt-3 text-base font-medium text-gray-700 bg-white border border-gray-300 rounded-md shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-300 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm" onclick="toggleElement('createEndorser')">
                Close
                </button>
            </div>
            </div>
        </div>
        </form>
    </div>

    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script>
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#feature')
                    .attr('src', e.target.result);
            };

            reader.readAsDataURL(input.files[0]);
        }
    }

    function editURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#editfeature')
                    .attr('src', e.target.result);
            };

            reader.readAsDataURL(input.files[0]);
        }
    }

    </script>
</x-app-layout>