@props(['inputName', 'inputType'])

@php
    $oldValue = "$inputName";
@endphp

<div class="sm:col-span-2">
    <label for="{{$inputName}}"
           class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Product {{$inputName}}:</label>
    <input type="{{$inputType}}" name="{{$inputName}}" id="{{$inputName}}" value="{{ old($oldValue) }}"
           class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
           placeholder="Enter the {{$inputName}}">
    @error($inputName)
    <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span
            class="font-medium">{{$message}}</span></p>
    @enderror
</div>
