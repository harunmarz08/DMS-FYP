@props(['options', 'name', 'id', 'class' => ''])

<select name="{{ $name }}" id="{{ $id }}" class="rounded border-gray-300 focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 {{ $class }}">
    @foreach ($options as $value => $label)
        <option value="{{ $value }}">{{ $label }}</option>
    @endforeach
</select>