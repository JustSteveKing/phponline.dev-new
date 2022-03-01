@props(['name', 'value' => false])

<div
    x-data="{ value: @js($value) }"
    {{ $attributes }}
>
    <input type="hidden" name="{{ $name }}" x-bind:value="{{ $value }}" />
    <button
        type="button"
        role="switch"
        x-on:click="value = !value"
        x-bind:class="value && 'bg-purple-500 border-purple-500'"
        class="relative w-14 py-1 px-0 inline-flex border-2 bg-white rounded-full"
    >
        <span
            x-bind:class="value ? 'translate-x-6' : 'bg-purple-500'"
            aria-hidden="true"
            class="w-6 h-6 bg-white translate-x-1 rounded-full "
        ></span>
    </button>
</div>
