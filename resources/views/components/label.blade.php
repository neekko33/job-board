<label for="{{ $for }}" {{ $attributes->merge(['class' => 'block font-medium text-sm text-gray-700 mb-1']) }}>
    {{ $slot }}
    @if ($required)
        <span>*</span>
    @endif
</label>
