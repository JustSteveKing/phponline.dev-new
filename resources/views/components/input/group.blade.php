@props([
    'label' => 'Input Label',
    'error' => null
])

<div
    x-data
    x-id="['input']"
    {{ $attributes }}
>
    {{ $slot }}
</div>

@isset($error)
    <div class="text-sm text-red-600 !mt-1">
        {{ $error }}
    </div>
@endisset
