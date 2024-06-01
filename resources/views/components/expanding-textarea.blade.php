@props(['disabled' => false, 'value' =>'', 'numCols' => 100 ])

@php
    // Calculate the number of rows based on the length of the text
    $numChars = strlen($value);
    $numCols = intval($numCols); // Set the number of characters per row
    $numRows = ceil($numChars / $numCols); // Calculate the number of rows needed
    $rows = max($numRows, 1); // Ensure at least one row
@endphp

<textarea {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge([
    'class' => 'border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm overflow-hidden resize-none',
    'placeholder' => $attributes->get('placeholder', ''),
    'rows' => $rows,
    'style' => 'height: auto;'
    ]) !!} oninput="this.style.height = ''; this.style.height = this.scrollHeight + 'px'">{{ $value }}</textarea>