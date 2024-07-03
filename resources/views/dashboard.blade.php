<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Products') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{--Grid--}}
                    <div class="grid grid-cols-2 md:grid-cols-3 gap-4">
                        {{--User Profile Card--}}
                        @foreach($products as $product)

                            <div
                                class="w-full max-w-sm bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                                <div class="flex justify-end px-4 pt-4">
                                    <button id="{{$product -> id}}-dropdownButton"
                                            data-dropdown-toggle="{{$product -> id}}-dropdown"
                                            class="inline-block text-gray-500 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-700 focus:ring-4 focus:outline-none focus:ring-gray-200 dark:focus:ring-gray-700 rounded-lg text-sm p-1.5" type="button">
                                        <span class="sr-only">Open dropdown</span>
                                        <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 16 3">
                                            <path d="M2 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3Zm6.041 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM14 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3Z"/>
                                        </svg>
                                    </button>
                                    <!-- Dropdown menu -->
                                    @if($product->user->is(auth()->user()))
                                    <div id="{{$product -> id}}-dropdown" class="z-10 hidden text-base list-none bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700">
                                        <ul class="py-2" aria-labelledby="{{$product -> id}}-dropdownButton">
                                            <li>
                                                <a href="{{route('products.edit', $product)}}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Edit</a>
                                            </li>
                                            <li>
                                                <a href="#" class="block px-4 py-2 text-sm text-red-600 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Delete</a>
                                            </li>
                                        </ul>
                                    </div>
                                    @endif
                                </div>


                                <div class="flex flex-col items-center pb-10">
                                    <h5 class="mb-1 text-xl font-medium text-gray-900 dark:text-white">{{$product->name}}</h5>
                                    <span
                                        class="text-sm text-gray-500 dark:text-gray-400">{{$product->description}}</span>
                                    <div class="flex mt-4 md:mt-6">
                                        <a href="#"
                                           class="inline-flex items-center px-4 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                            Add to cart</a>
                                        <a href="#"
                                           class="py-2 px-4 ms-2 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">View
                                            Comments</a>
                                    </div>
                                </div>
                                <div class="flex justify-center px-4 pt-4">
                                    @unless ($product->created_at->eq($product->updated_at))
                                        <div class="p-4 mb-4 text-sm text-yellow-800 rounded-lg bg-yellow-50 dark:bg-gray-800 dark:text-yellow-300" role="alert">
                                            <span class="font-medium">{{ __('New Version') }}</span>
                                        </div>
                                    @endunless
                                </div>
                            </div>
                        @endforeach {{--End Card--}}
                    </div> {{--End Grid--}}

                </div>
            </div>
        </div>
    </div>


</x-app-layout>
