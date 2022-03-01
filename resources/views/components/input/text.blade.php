@aware(['error'])
@props(['error' => null])

<input
    type="text"
    x-bind:id="$id('input')"
    {{ $attributes->class([
        'border-2 bg-white rounded-lg py-2 px-3 w-full focus:outline',
        'border-transparent' => !$error,
        'border-red-500' => $error
    ]) }}
/>
