<div {{$attributes->merge(['class' => 'relative'])}}>
    <input
        type="text"
        placeholder="{{$placeholder}}"
        name="{{$name}}"
        value="{{$value}}"
        class="w-full rounded-md border-0 py-1.5 px-2.5 text-sm ring-1 ring-slate-300 placeholder:text-slate-400 focus:ring-2 pr-8"
    />
    @if($formId)
        <button
            type="button"
            class="absolute top-0 right-0 h-full w-8 flex items-center justify-center hover:text-slate-500 text-slate-400 cursor-pointer"
            onclick="document.getElementsByName('{{$name}}')[0].value = ''; document.getElementById('{{$formId}}').submit();">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                 class="size-4">
                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12"/>
            </svg>
        </button>
    @endif
</div>

