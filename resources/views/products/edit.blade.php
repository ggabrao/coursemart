<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Edit Page') }}
        </h2>
    </x-slot>

    <div class="py-12 max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white p-6 text-gray-900 dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
            <div class="py-8 px-4 mx-auto max-w-2xl lg:py-16">
                <h2 class="mb-4 text-xl font-bold text-gray-900 dark:text-white">Edit the product</h2>
                <form method="POST" action="{{ route('products.update', $product) }}">
                    @csrf
                    @method('patch')
                    <div class="grid gap-4 sm:grid-cols-2 sm:gap-6">
                        <x-form-field-edit inputName="name" inputType="text" :product="$product"/>
                        <x-form-field-edit inputName="description" inputType="text" :product="$product"/>
                        <x-form-field-edit inputName="stock" inputType="number" :product="$product"/>
                        <x-form-field-edit inputName="price" inputType="Text" :product="$product"/>
                    </div>
                    <button type="submit"
                            class="inline-flex items-center px-5 py-2.5 mt-4 sm:mt-6 text-sm font-medium text-center text-white bg-primary-700 rounded-lg focus:ring-4 focus:ring-primary-200 dark:focus:ring-primary-900 hover:bg-primary-800">
                        Save
                    </button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>


