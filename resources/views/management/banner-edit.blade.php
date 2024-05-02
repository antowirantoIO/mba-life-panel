<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Banner') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="px-4 py-4">
                    <form class="max-w-sm mx-auto" method="POST" action="{{ route('management.banner.update', $banner->id) }}" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-5">
                            <label for="title" class="block mb-2 text-sm font-medium text-gray-900">
                                Judul Banner
                            </label>
                            <input type="text" id="title"
                                   value="{{ $banner->title }}"
                                   name="title"
                                   class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                   required/>
                        </div>
                        <div class="mb-5">
                            <label for="title" class="block mb-2 text-sm font-medium text-gray-900">
                                Urutan
                            </label>
                            <input type="number" id="sequance"
                                   value="{{ $banner->order }}"
                                      name="order"
                                   class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                   required/>
                        </div>
                        <div class="mb-5">
                            <label class="block mb-2 text-sm font-medium text-gray-900"
                                   for="user_avatar">Upload file</label>
                            <input
                                class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 focus:outline-none"
                                accept="image/*"
                                id="banner_upload"
                                name="image"
                                aria-describedby="user_avatar_help" type="file">
                            <div class="mt-1 text-sm text-gray-500" id="user_avatar_help">
                                File harus berformat JPG, JPEG, PNG, dan maksimal 10MB
                            </div>
                        </div>
                        <div class="mb-5">
                            <div id="banner_container" style="position: relative; display: inline-block;">
                                <img class="h-auto max-w-60 rounded-lg" id="banner_preview"
                                     data-src="{{ $banner->image }}"
                                     style="display: none; opacity: 0; transition: opacity 0.5s ease; width: 100%;">
                                <button id="delete_banner"
                                        style="display: none; position: absolute; top: 10px; right: 10px; opacity: 0; transition: opacity 0.5s ease;">
                                    <span
                                        class="inline-flex items-center justify-center w-6 h-6 me-2 text-sm font-semibold text-red-800 bg-red-100 rounded-full">

                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                             viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                             stroke-linecap="round" stroke-linejoin="round"
                                             class="w-2.5 h-2.5"><path
                                                stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M18 6l-12 12"/><path
                                                d="M6 6l12 12"/></svg>
                                            <span class="sr-only">Icon description</span>
                                    </span>
                                </button>
                            </div>
                        </div>
                        <div class="flex gap-2">
                            <a
                                href="{{ route('management.banner') }}"
                                class="text-white bg-red-500 hover:bg-red-700 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                                Cancel
                            </a>
                            <button type="submit"
                                    class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                                Update Banner
                            </button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>

</x-app-layout>
