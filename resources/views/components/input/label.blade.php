@props(['icon' => null])

<label
    x-bind:for="$id('input')"
    {{ $attributes->class(
        'flex items-center space-x-1 block text-gray-600 mb-1 relative z-10'
    ) }}
>
    @if ($icon)
        <x-dynamic-component :component="'icon.' . $icon" />
    @endif
    <span>{{ $slot }}</span>
</label>
