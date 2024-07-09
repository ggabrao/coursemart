<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Cart') }}
        </h2>
    </x-slot>
    
    <section class="bg-white py-8 antialiased dark:bg-gray-900 md:py-16">
        <div class="mx-auto max-w-screen-xl px-4 2xl:px-0">
            <h2 class="text-xl font-semibold text-gray-900 dark:text-white sm:text-2xl">Order summary</h2>

            <div class="mt-8 space-y-6 md:space-y-8">
                <div
                    class="divide-y divide-gray-200 rounded-lg border border-gray-200 bg-white shadow-sm dark:divide-gray-700 dark:border-gray-700 dark:bg-gray-800">

                    {{--                    CartItem--}}
                    <div class="flex flex-wrap items-center space-y-4 p-6 sm:gap-6 sm:space-y-0 md:justify-between">
                        <div
                            class="w-full items-center space-y-4 sm:flex sm:space-x-6 sm:space-y-0 md:max-w-md lg:max-w-lg">
                            <a href="#" class="block aspect-square w-20 shrink-0">
                                <img class="h-full w-full dark:hidden"
                                     src="https://flowbite.s3.amazonaws.com/blocks/e-commerce/imac-front.svg"
                                     alt="imac image"/>
                                <img class="hidden h-full w-full dark:block"
                                     src="https://flowbite.s3.amazonaws.com/blocks/e-commerce/imac-front-dark.svg"
                                     alt="imac image"/>
                            </a>

                            <div class="w-full md:max-w-sm lg:max-w-md">
                                <a href="#" class="font-medium text-gray-900 hover:underline dark:text-white"> PC
                                    system All in One APPLE iMac (2023) mqrq3ro/a, Apple M3, 24" Retina 4.5K, 8GB,
                                    SSD 256GB, 10-core GPU, macOS Sonoma, Blue, Keyboard layout INT </a>
                            </div>
                        </div>

                        <div class="w-8 shrink-0">
                            <p class="text-base font-normal text-gray-900 dark:text-white">x1</p>
                        </div>

                        <div class="md:w-24 md:text-right">
                            <p class="text-base font-bold text-gray-900 dark:text-white">$1,499</p>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>

    {{--    <div class="py-12">--}}
    {{--        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">--}}
    {{--            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">--}}
    {{--                <div class="p-6 text-gray-900 dark:text-gray-100">--}}
    {{--                    {{ __("Your cart is empty.") }}--}}
    {{--                </div>--}}
    {{--            </div>--}}
    {{--        </div>--}}
    {{--    </div>--}}
</x-app-layout>
