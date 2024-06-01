@props(['color' => ''])

@php
    $barColors = [
        'gray' => 'bg-[#e4e4e7]',
        'red' => 'bg-red-500',
        'green' => 'bg-green-500',
    ];
    $barColor = $barColors[$color] ?? 'bg-[#e4e4e7]';
@endphp

<div></div>
<div {{ $attributes->merge(['class' => "overflow-hidden border-t border-b $barColor border-gray-900 p-3 grid-col-subgrid col-span-7"]) }}>
    <div class="grid grid-flow-col">
        {{ $slot }}
    </div>
</div>
<div></div>
