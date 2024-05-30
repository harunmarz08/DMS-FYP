@props(['color' => 'black'])

@php
    $buttonColors = [
        'black' => 'bg-gray-800 text-white hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900',
        'white' => 'bg-white text-gray-800 hover:bg-gray-100 focus:bg-gray-100 active:bg-gray-200',
        'red' => 'bg-red-500 text-white hover:bg-red-400 focus:bg-red-400 active:bg-red-600',
        'green' => 'bg-green-500 text-white hover:bg-green-400 focus:bg-green-400 active:bg-green-600',
        'yellow' => 'bg-yellow-500 text-gray-800 hover:bg-yellow-400 focus:bg-yellow-400 active:bg-yellow-600',
    ];

    $buttonColor = $buttonColors[$color] ?? 'bg-white text-gray-800 hover:bg-gray-100 focus:bg-gray-100 active:bg-gray-200';
@endphp

<button {{ $attributes->merge(['type' => 'submit', 'class' => "inline-flex items-center px-4 py-2 border border-1 rounded-md font-semibold text-xs uppercase tracking-widest focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150 $buttonColor"]) }}>
    {{ $slot }}
</button>
