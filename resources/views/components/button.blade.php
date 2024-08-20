
@props(['type' => 'primary'])
@php
    $classes = 'btn ';

    if ($type === 'primary') {
        $classes .= 'btn-primary';
    } elseif ($type === 'info') {
        $classes .= 'btn-info';
    } elseif ($type === 'danger') {
        $classes .= 'btn-danger';
    } else {
        $classes .= 'btn-primary'; 
    }
@endphp

<button {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</button>

