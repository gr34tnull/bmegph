<x-app-layout>
    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-xl sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="flex flex-col">
                        <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                            <div class="inline-block min-w-full py-2 align-middle sm:px-6 lg:px-8">
                            <div class="overflow-hidden border-b border-gray-200 shadow sm:rounded-lg">
                                <table class="min-w-full divide-y divide-gray-200">
                                <thead class="bg-gray-50">
                                    <tr>
                                    <th scope="col" class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                                        Video
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                                        Option
                                    </th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200">
                                @foreach($galleries as $gallery)
                                    <tr>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="flex items-center">
                                        <div class="flex-shrink-0 w-10 h-10">
                                            <button type="button" onclick="toggleElement('video{{$gallery->id}}')">
                                                <i class="fas fa-play"></i>
                                            </button>
                                        </div>
                                        <div class="mb-4">
                                            <div class="text-sm font-medium text-gray-900">
                                            {{$gallery->name}}
                                            </div>
                                        </div>
                                        </div>
                                    </td>
                                    <td class="inline-flex px-6 py-4 text-sm font-medium text-center whitespace-nowrap">
                                        <div class="flex flex-col items-center justify-center mx-2">
                                            <div class="text-sm font-medium text-gray-900">
                                                <button class="pr-2 text-gray-600 hover:text-gray-900 focus:outline-none" onclick="toggleElement('gallery{{$gallery->id}}')" ><i class="fas fa-edit"></i></button>
                                            </div>
                                            <div class="text-xs text-gray-500">
                                                Edit
                                            </div>
                                        </div>
                                        <div class="flex flex-col items-center justify-center mx-2">
                                            <div class="text-sm font-medium text-gray-900">
                                                <form method="POST" action="{{route('galleries.destroy',$gallery->id)}}">
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

                                    <div id="video{{$gallery->id}}" class="fixed inset-0 z-30 hidden overflow-y-auto">
                                        <div class="flex items-end justify-center min-h-screen px-4 pt-4 pb-20 text-center sm:block sm:p-0">
                                            <div class="fixed inset-0 transition-opacity" aria-hidden="true">
                                            <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
                                            </div>
                                            <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>
                                            <div class="inline-block overflow-hidden text-left align-bottom transition-all transform bg-white border border-gray-900 rounded-lg shadow-xl sm:my-8 sm:align-middle sm:max-w-lg sm:w-full" role="dialog" aria-modal="true" aria-labelledby="modal-headline">
                                            
                                            <div class="p-6 bg-white">
                                                <div class="w-full h-64">
                                                    <div class="relative flex flex-col items-center justify-center">
                                                        <video class="border-1 border->gray-900" controls>
                                                            <source src="{{asset('gallery/'.$gallery->video)}}" type="video/mp4">
                                                        </video>
                                                        <small class="py-2 text-xs font-extrabold text-center text-gray-900 uppercase">{{$gallery->name}}</small>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="px-4 py-2 bg-gray-50 sm:px-6 sm:flex sm:flex-row-reverse">
                                                <button type="button" class="inline-flex justify-center w-full px-4 py-2 mt-3 text-base font-medium text-gray-700 bg-white border border-gray-300 rounded-md shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-300 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm" onclick="toggleElement('video{{$gallery->id}}')">
                                                Close
                                                </button>
                                            </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!--Modal -->
                                    <div id="gallery{{$gallery->id}}" class="fixed inset-0 z-30 hidden overflow-y-auto">
                                        <form method="POST" action="{{route('galleries.update',$gallery->id)}}" enctype="multipart/form-data">
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
                                                    Video Information
                                                    </h3>
                                                    <p class="max-w-2xl mt-1 text-sm text-gray-500">
                                                    Video Information details.
                                                    </p>
                                                </div>
                                                <div class="border-t border-gray-200">
                                                    <dl>
                                                    <div class="px-4 py-2 bg-gray-50 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                                        <dt class="mt-3 text-sm font-medium text-gray-500">
                                                        Name
                                                        </dt>
                                                        <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                                            <x-jet-input id="name" class="block w-full" type="text" name="name" value="{{$gallery->name}}" required autofocus />
                                                        </dd>
                                                    </div>
                                                    <div class="px-4 py-2 bg-white sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                                    <dt class="mt-3 text-sm font-medium text-gray-500">
                                                        Video
                                                        </dt>
                                                        <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                                            <div class="flex items-center mt-1">
                                                                <div class="flex w-full text-sm text-gray-600">
                                                                    <label for="video" class="w-full px-3 py-2 text-sm font-medium leading-4 text-center text-gray-700 bg-white border border-gray-300 rounded-md shadow-sm cursor-pointer hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                                                    <span>Upload Video</span>
                                                                    <input id="video" name="video" type="file" class="sr-only" accept="video/*">
                                                                    </label>
                                                                <div>
                                                            </div>
                                                        </dd>
                                                    </div>
                                                    </dl>
                                                </div>
                                            </div>

                                            <div class="px-4 py-2 bg-gray-50 sm:px-6 sm:flex sm:flex-row-reverse">
                                                <button type="submit" class="inline-flex justify-center w-full px-4 py-2 text-base font-medium text-white bg-gray-600 border border-transparent rounded-md shadow-sm hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500 sm:ml-3 sm:w-auto sm:text-sm">
                                                Update
                                                </button>
                                                <button type="button" class="inline-flex justify-center w-full px-4 py-2 mt-3 text-base font-medium text-gray-700 bg-white border border-gray-300 rounded-md shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-300 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm" onclick="toggleElement('gallery{{$gallery->id}}')">
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
            <i class="fas fa-plus" onclick="toggleElement('addVideo')"></i>
        </div>
    </button>

    <div id="addVideo" class="fixed inset-0 z-30 hidden overflow-y-auto">
        <form method="POST" action="{{route('galleries.store')}}" enctype="multipart/form-data">
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
                    Add Videos
                    </h3>
                    <p class="max-w-2xl mt-1 text-sm text-gray-500">
                    Add videos for endorser profile.
                    </p>
                </div>
                <div class="border-t border-gray-200">
                    <dl>
                    <div class="px-4 py-2 bg-gray-50 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="mt-3 text-sm font-medium text-gray-500">
                        Title
                        </dt>
                        <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                            <input name="endorser_id" type="hidden" value="{{$endorser->id}}">
                            <x-jet-input class="block w-full" type="text" name="name" required autofocus />
                        </dd>
                    </div>
                    <div class="px-4 py-2 bg-white sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                    <dt class="mt-3 text-sm font-medium text-gray-500">
                        Video
                        </dt>
                        <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                            <div class="flex items-center mt-1">
                                <div class="flex w-full text-sm text-gray-600">
                                    <label for="video" class="w-full px-3 py-2 text-sm font-medium leading-4 text-center text-gray-700 bg-white border border-gray-300 rounded-md shadow-sm cursor-pointer hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                    <span>Upload Video</span>
                                    <input id="video" name="video" type="file" class="sr-only" accept="video/*" required>
                                    </label>
                                <div>
                            </div>
                        </dd>
                    </div>
                    </dl>
                </div>
            </div>

            <div class="px-4 py-4 bg-white sm:px-6 sm:flex sm:flex-row-reverse">
                <button type="submit" class="inline-flex justify-center w-full px-4 py-2 text-base font-medium text-white bg-gray-600 border border-transparent rounded-md shadow-sm hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500 sm:ml-3 sm:w-auto sm:text-sm">
                Create
                </button>
                <button type="button" class="inline-flex justify-center w-full px-4 py-2 mt-3 text-base font-medium text-gray-700 bg-white border border-gray-300 rounded-md shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-300 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm" onclick="toggleElement('addVideo')">
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