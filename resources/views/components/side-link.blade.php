@props(['active' => false, 'href'])

@php
    $classes =
        $active ?? false
            ? 'flex items-center p-2 rounded-md border-gray-500 text-base font-normal leading-5 text-gray-800 focus:outline-none focus:border-gray-800 transition duration-150 ease-in-out dark:text-gray-100 dark:bg-gray-700'
            : 'flex items-center p-2 border-transparent text-base font-normal leading-5 text-gray-800 hover:text-gray-500 focus:outline-none focus:text-gray-600 focus:border-gray-300 transition duration-150 ease-in-out dark:text-gray-300 dark:hover:text-gray-400';
@endphp


{{-- flex items-center p-2 w-full text-base font-normal text-gray-900 rounded-lg transition duration-75 group
hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700 --}}

<a href="{{ $href }}" {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
