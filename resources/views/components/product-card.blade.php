@props(['product'])

<div
    class="w-full h-[500px] max-w-sm bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">

    <div class="flex justify-between px-4 pt-4">
        @if($product->user_id === Auth::id())
            <div
                class="p-1.5 font-normal text-sm text-[#464555] rounded-md bg-[#ABA9BC]">
                <span>{{ __('Owner') }}</span>
            </div>
        @else()
            <div class="p-1.5 font-normal text-sm text-gray-500 text-center">
                <span>Seller Id: {{$product->user_id}}</span></div>
        @endif
        @can('edit', $product)
            <button id="{{$product -> id}}-dropdownButton"
                    data-dropdown-toggle="{{$product -> id}}-dropdown"
                    class="inline-block text-gray-500 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-700 focus:ring-4 focus:outline-none focus:ring-gray-200 dark:focus:ring-gray-700 rounded-lg text-sm p-1.5"
                    type="button">
                <span class="sr-only">Open dropdown</span>
                <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                     fill="currentColor" viewBox="0 0 16 3">
                    <path
                        d="M2 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3Zm6.041 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM14 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3Z"/>
                </svg>
            </button>
            <!-- Dropdown menu -->
            <div id="{{$product -> id}}-dropdown"
                 class="z-10 hidden text-base list-none bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700">
                <ul class="py-2" aria-labelledby="{{$product -> id}}-dropdownButton">
                    <li>
                        <a href="{{route('products.edit', $product)}}"
                           class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Edit</a>
                    </li>
                    <li>
                        <form method="POST"
                              action="{{ route('products.destroy', $product) }}">
                            @csrf
                            @method('delete')
                            <a href="{{route('products.destroy', $product)}}"
                               onclick="event.preventDefault(); this.closest('form').submit();"
                               class="block px-4 py-2 text-sm text-red-600 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Delete</a>
                        </form>
                    </li>
                </ul>
            </div>
        @endcan
    </div>
    <div class="flex flex-col items-center pb-10 mt-4">
        <h5 class="mb-1 text-3xl font-extrabold text-gray-900 dark:text-white">{{$product->name}}</h5>
        <span
            class="text-sm text-gray-500 dark:text-gray-400">{{$product->description}}</span>
        <span
            class="text-4xl font-normal tracking-tight mt-10">$ {{number_format($product->price, 2)}}</span>
        @if($product->quantity > 0)
            <span
                class="text-xl font-bold tracking-tight text-[#FF495F] mt-3 ">Qty: {{$product->quantity}} un.</span>
        @endif
        <div class="flex flex-col mt-4 md:mt-10 justify-center text-center">
            <form method="POST" action="{{ route('items.store') }}"
                  class="max-w-xs mx-auto">
                @csrf
                {{--todo: avaliar melhorar essa lógica--}}
                <input type="hidden" name="product_id" value="{{ $product->id }}"/>

                @cannot('edit', $product)
                    @unless($product->quantity===0)
                        <label for="{{$product -> id}}-counter-input"
                               class="block mb-1 text-sm font-medium text-gray-900 dark:text-white">Select
                            a
                            quantity:</label>
                        <div class="relative flex items-center justify-center">
                            <button type="button" id="{{$product -> id}}-decrement-button"
                                    data-input-counter-decrement="{{$product -> id}}-counter-input"
                                    class="flex-shrink-0 bg-gray-100 dark:bg-gray-700 dark:hover:bg-gray-600 dark:border-gray-600 hover:bg-gray-200 inline-flex items-center border border-gray-300 rounded-md h-5 w-5 focus:ring-gray-100 dark:focus:ring-gray-700 focus:ring-2 focus:outline-none justify-center">
                                <svg class="w-2.5 h-2.5 text-gray-900 dark:text-white"
                                     aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                     fill="none" viewBox="0 0 18 2">
                                    <path stroke="currentColor" stroke-linecap="round"
                                          stroke-linejoin="round" stroke-width="2"
                                          d="M1 1h16"/>
                                </svg>
                            </button>
                            <input type="text" name="quantity" value="1"
                                   id="{{$product -> id}}-counter-input"
                                   data-input-counter
                                   class="flex-shrink-0 text-gray-900 dark:text-white border-0 bg-transparent text-sm font-normal focus:outline-none focus:ring-0 max-w-[2.5rem] text-center"
                                   required/>
                            <button type="button" id="{{$product -> id}}-increment-button"
                                    data-input-counter-increment="{{$product -> id}}-counter-input"
                                    class="flex-shrink-0 bg-gray-100 dark:bg-gray-700 dark:hover:bg-gray-600 dark:border-gray-600 hover:bg-gray-200 inline-flex items-center justify-center border border-gray-300 rounded-md h-5 w-5 focus:ring-gray-100 dark:focus:ring-gray-700 focus:ring-2 focus:outline-none">
                                <svg class="w-2.5 h-2.5 text-gray-900 dark:text-white"
                                     aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                     fill="none" viewBox="0 0 18 18">
                                    <path stroke="currentColor" stroke-linecap="round"
                                          stroke-linejoin="round" stroke-width="2"
                                          d="M9 1v16M1 9h16"/>
                                </svg>
                            </button>
                        </div>
                        <button type="submit"
                                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800 mt-3">
                            Add to cart
                        </button>
                        @error('quantity')
                        <p class="max-w-xs mx-auto">
                            <span class="mt-2 text-sm text-red-600 dark:text-red-500">{{$message}}</span>
                        </p>
                        @enderror
                    @else
                        <div
                            class="bg-[#EEE8A9] w-full rounded-md">
                                        <span
                                            class="block text-2xl font-bold tracking-tight text-[#FF495F] p-3 uppercase text-center mt-20">Sold out</span>
                        </div>
                    @endcannot
                @endunless
            </form>
        </div>
    </div>
</div>
