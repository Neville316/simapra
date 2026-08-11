@props(['title', 'value', 'color' => 'blue', 'icon'])

@php
    $colorClasses = [
        'blue' => 'border-blue-500 bg-blue-50 text-blue-500',
        'green' => 'border-green-500 bg-green-50 text-green-500',
        'purple' => 'border-purple-500 bg-purple-50 text-purple-500',
        'yellow' => 'border-yellow-500 bg-yellow-50 text-yellow-500',
        'red' => 'border-red-500 bg-red-50 text-red-500',
        'indigo' => 'border-indigo-500 bg-indigo-50 text-indigo-500',
        'pink' => 'border-pink-500 bg-pink-50 text-pink-500',
        'orange' => 'border-orange-500 bg-orange-50 text-orange-500',
    ];
    
    $selectedColor = $colorClasses[$color] ?? $colorClasses['blue'];
    
    // Parse color for icon background
    $bgColor = match($color) {
        'blue' => 'bg-blue-100',
        'green' => 'bg-green-100',
        'purple' => 'bg-purple-100',
        'yellow' => 'bg-yellow-100',
        'red' => 'bg-red-100',
        'indigo' => 'bg-indigo-100',
        'pink' => 'bg-pink-100',
        'orange' => 'bg-orange-100',
        default => 'bg-blue-100',
    };
    
    $textColor = match($color) {
        'blue' => 'text-blue-600',
        'green' => 'text-green-600',
        'purple' => 'text-purple-600',
        'yellow' => 'text-yellow-600',
        'red' => 'text-red-600',
        'indigo' => 'text-indigo-600',
        'pink' => 'text-pink-600',
        'orange' => 'text-orange-600',
        default => 'text-blue-600',
    };
@endphp

<div class="stat-card group">
    <div class="flex items-start justify-between">
        <div class="flex-1 min-w-0">
            <p class="text-xs font-semibold text-gray-400 uppercase tracking-wider">{{ $title }}</p>
            <p class="text-2xl font-bold text-gray-800 mt-1.5">{{ $value }}</p>
        </div>
        <div class="p-2.5 rounded-xl {{ $bgColor }} {{ $textColor }} group-hover:scale-110 transition-transform duration-200">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                {!! $icon !!}
            </svg>
        </div>
    </div>
    <!-- Progress/trend indicator (optional) -->
    <div class="mt-3 h-0.5 w-full bg-gray-100 rounded-full overflow-hidden">
        <div class="h-full {{ str_replace('text', 'bg', $textColor) }} rounded-full" style="width: 65%"></div>
    </div>
</div>