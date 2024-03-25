<p x-data="{ show: true }"
    x-show="show"
    x-transition
    x-init="setTimeout(() => show = false, 2000)"
    {{ $attributes->merge(['class' => 'text-sm text-gray-800 bg-green-400 border border-green-400 rounded-md p-2']) }}>
    {{ $slot }}
</p>