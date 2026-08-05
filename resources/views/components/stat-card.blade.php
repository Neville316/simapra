@props(['title', 'value', 'color' => 'blue', 'icon'])

@php
    $colorClasses = [
        'blue' => 'border-blue-500 bg-blue-50 text-blue-500',
        'green' => 'border-green-500 bg-green-50 text-green-500',
        'purple' => 'border-purple-500 bg-purple-50 text-purple-500',
        'yellow' => 'border-yellow-500 bg-yellow-50 text-yellow-500',
        'red' => 'border-red-500 bg-red-50 text-red-500',
    ];
    
    $selectedColor = $colorClasses[$color] ?? $colorClasses['blue'];
@endphp

<div class="bg-white rounded-lg shadow-sm p-6 flex items-center justify-between border-l-4 {{ $selectedColor }}">
    <div>
        <p class="text-sm font-semibold text-gray-500 uppercase tracking-wider">{{ $title }}</p>
        <p class="text-3xl font-bold text-gray-800 mt-2">{{ $value }}</p>
    </div>
    <div class="p-3 rounded-full {{ $selectedColor }}">
        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            {!! $icon !!}
        </svg>
    </div>
</div>