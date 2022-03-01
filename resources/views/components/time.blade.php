@props(['date' => now()])

<time datetime="{{ $date->toDateString() }}">
    {{ $date->format('D jS \o\f F, Y  @ G:i') }}
</time>
