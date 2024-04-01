@props(['color' => 'white'])

@php
    $directoryColor =
        [
            'white' => 'bg-white',
            'red' => 'bg-red-500',
            'green' => 'bg-green-500',
            'yellow' => 'bg-yellow-500',
        ][$color] ?? 'bg-white';
    $textColor =
        [
            'white' => 'text-gray-900',
            'red' => 'text-white',
            'green' => 'text-white',
            'yellow' => 'text-white',
        ][$color] ?? 'text-gray-900';
@endphp

<div class="py-2">
    <div class="{{ $directoryColor }} overflow-hidden shadow-sm sm:rounded-lg border border-gray-300">
        <div {{ $attributes->merge(['class' => 'p-4 '.$textColor]) }}>
            {{ $slot }}
        </div>
    </div>
</div>
