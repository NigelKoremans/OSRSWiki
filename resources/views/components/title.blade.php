<div class="border-b border-gray-300 pb-1.5 mb-2 text-4xl font-semibold flex justify-between">
    {{ $slot }}
    <div>
    @if (isset($options))
        {{ $options }}
    @endif
    </div>
</div>
