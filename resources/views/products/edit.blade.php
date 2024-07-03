<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Edit Page') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{--                    default form--}}
                    <section class="bg-white dark:bg-gray-900">
                        <div class="py-8 px-4 mx-auto max-w-2xl lg:py-16">
                            <h2 class="mb-4 text-xl font-bold text-gray-900 dark:text-white">Edit the product</h2>
                            <form method="POST" action="{{ route('products.update', $product) }}">
                                @csrf
                                @method('patch')
                                {{-- todo: aplicar componentes dos forms --}}
                                <div class="grid gap-4 sm:grid-cols-2 sm:gap-6">

                                    <div class="sm:col-span-2">
                                        <label for="name"
                                               class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Product
                                            Name</label>
                                        <input type="text" name="name" id="name" value="{{ old('name', $product->name) }}"
                                               class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                               placeholder="Type product name"
                                               >
                                        @error('name')
                                        <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">{{$message}}</span></p>
                                        @enderror
                                    </div>

                                    <div class="sm:col-span-2">
                                        <label for="description"
                                               class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Description</label>
                                        <textarea id="description" name="description" rows="8"
                                                  class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                  placeholder="Your description here"
                                        ></textarea>
                                        @error('description')
                                        <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">{{$message}}</span></p>
                                        @enderror
                                    </div>
                                </div>
                                <button type="submit"
                                        class="inline-flex items-center px-5 py-2.5 mt-4 sm:mt-6 text-sm font-medium text-center text-white bg-primary-700 rounded-lg focus:ring-4 focus:ring-primary-200 dark:focus:ring-primary-900 hover:bg-primary-800">
                                    Save
                                </button>
                            </form>
                        </div>
                    </section>
                    {{--                    end form--}}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>


