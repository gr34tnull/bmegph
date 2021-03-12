@props(['active'])

@php
$classes = ($active ?? false)
            ? 'uppercase inline-flex items-center px-1 pt-1 border-b-2 border-yellow-300 text-md font-extrabold leading-5 text-white focus:outline-none focus:border-yellow-700 transition duration-150 ease-in-out'
            : 'uppercase inline-flex items-center px-1 pt-1 border-b-2 border-transparent text-md font-extrabold leading-5 text-white hover:text-yellow-300 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300 transition duration-150 ease-in-out';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
