<div {{ $attributes }}>
    @if ($type !== 'textarea')
        <div class="relative">
            <input x-ref="input-{{ $name }}" type="{{ $type }}" placeholder="{{ $placeholder }}"
                name="{{ $name }}" value="{{ old($name, $value) }}" @class([
                    'w-full rounded-md border-0 py-1.5 px-2.5 text-sm ring-1 placeholder:text-slate-400 focus:ring-2 ring-slate-300',
                    'pr-8' => $formRef,
                    '!ring-red-500' => $errors->has($name),
                ]) />
            @if ($formRef)
                <button type="button"
                    class="absolute top-0 right-0 h-full w-8 flex items-center justify-center hover:text-slate-500 text-slate-400 cursor-pointer"
                    @click="$refs['input-{{ $name }}'].value = '';$refs['{{ $formRef }}'].submit()">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="size-4">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                    </svg>
                </button>
            @endif
        </div>
    @else
        <textarea {{ $attributes->merge(['rows' => 5]) }} placeholder="{{ $placeholder }}" name="{{ $name }}" id="{{ $name }}"
            @class([
                'w-full rounded-md border-0 py-1.5 px-2.5 text-sm ring-1 placeholder:text-slate-400 focus:ring-2 ring-slate-300',
                'pr-8' => $formRef,
                '!ring-red-500' => $errors->has($name),
            ])>{{ old($name, $value) }}</textarea>
    @endif

    <div>
        @error($name)
            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
        @enderror
    </div>
</div>
