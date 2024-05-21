@props(['disabled' => false])

<textarea {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge([
    'class' => 'border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm overflow-hidden resize-none',
    'placeholder' => $attributes->get('placeholder', ''),
    'rows' => '1',
    'style' => 'height: auto;'
    ]) !!} oninput="this.style.height = ''; this.style.height = this.scrollHeight + 'px'">{{ $slot }}</textarea>