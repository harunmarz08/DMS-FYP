@props(['color' => 'white'])

@php
    $buttonColor = [
        'black' => 'bg-gray-800 text-white',
        'white' => 'bg-white text-gray-800',
        'red' => 'bg-red-500 text-white',
        'green' => 'bg-green-500 text-white',
        'yellow' => 'bg-yellow-500 text-gray-800',
    ][$color] ?? 'bg-white text-gray-800';
@endphp

<button {{ $attributes->merge(['type' => 'button', 'class' => 'inline-flex items-center px-4 py-2 border border-gray-300 rounded-md font-semibold text-xs uppercase tracking-widest shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 disabled:opacity-25 transition ease-in-out duration-150 ' . $buttonColor]) }}>
    {{ $slot }}
</button>
