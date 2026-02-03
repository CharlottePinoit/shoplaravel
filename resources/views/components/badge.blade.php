@props([
'color' => 'blue'
])

@php

$colors = [
'blue' => 'background-color:#3b82f6; color:white; border:2px solid #1e40af;',
'green' => 'background-color:#10b981; color:white; border:2px solid #047857;',
'red' => 'background-color:#ef4444; color:white; border:2px solid #991b1b;',
];

$style = $colors[$color] ?? $colors['blue'];
@endphp

<span {{ $attributes->merge([
    'style' => $style . '; padding:4px 8px; font-weight:bold; font-family:monospace; font-size:0.9em; border-radius:4px; text-shadow:1px 1px 0 #000; display:inline-block;'
]) }}>
    {{ $slot }}
</span>