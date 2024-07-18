<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Products') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if (session('success'))
                <x-notification-success/>
            @elseif(session('error'))
                <x-notification-error/>
            @endif
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="grid grid-cols-2 gap-4 md:grid-cols-3 ">
                        @forelse($products as $product)
                            <x-product-card :product="$product"/>
                        @empty
                            There are no products yet
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
