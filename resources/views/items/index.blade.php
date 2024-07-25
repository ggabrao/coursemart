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
                <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                        <thead
                            class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-16 py-3">
                                Product
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Qty
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Price
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Subtotal
                            </th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse($items as $item)
                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                <td class="px-16 py-4 font-semibold text-gray-900 dark:text-white">
                                    {{$item->name}}
                                </td>
                                <td class="px-6 py-4 font-semibold text-gray-900 dark:text-white">
                                    {{$item->total_quantity}}
                                </td>
                                <td class="px-6 py-4 font-semibold text-gray-900 dark:text-white">
                                    $ {{number_format($item->price, 2)}}
                                </td>
                                <td class="px-6 py-4 font-semibold text-gray-900 dark:text-white">
                                    ${{ number_format($item->subtotal, 2)}}
                                </td>
                                @empty
                                    <td class="px-6 py-4 font-semibold text-gray-900 dark:text-white">
                                        Your cart is empty
                                    </td>
                            </tr>
                        @endforelse
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                            <td class="px-16 py-4 font-semibold text-gray-900 dark:text-white">
                            </td>
                            <td class="px-6 py-4 font-semibold text-gray-900 dark:text-white">
                            </td>
                            <td class="px-6 py-4 font-semibold text-gray-900 dark:text-white">
                            </td>
                            @unless($items)
                                <td class="px-1 py-4 font-bold text-red-600 dark:text-white">
                                    Total: ${{number_format($total,2)}}
                                </td>
                            @endunless
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
</x-app-layout>
