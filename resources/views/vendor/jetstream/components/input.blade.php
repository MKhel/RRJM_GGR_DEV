@props(['disabled' => false])

<input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'bg-white border-green-400 focus:border-green-600 focus:ring-1 focus:ring-green-200 focus:ring-opacity-50 rounded-md shadow-sm']) !!} required>
