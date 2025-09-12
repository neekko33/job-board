<div {{ $attributes }}>
    <select name="{{ $name }}"
        class="w-full rounded-md border-0 py-1.5 px-2.5 text-sm ring-1 placeholder:text-slate-400 focus:ring-2 ring-slate-300">
        @foreach ($optionsWithLabels as $label => $option)
            <option value="{{ $option }}" {{ $value === $option ? 'selected' : '' }}>{{ $label }}</option>
        @endforeach
    </select>
</div>
