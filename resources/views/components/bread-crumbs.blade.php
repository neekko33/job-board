<nav {{$attributes}}>
    <ul class="flex space-x-3 text-slate-500">
        <li>
            <a href="/" class="hover:underline">Home</a>
        </li>
        @foreach($links as $key => $value)
            <li class="">&rangle;</li>
            <li>
                <a href="{{$value}}" class="hover:underline">{{$key}}</a>
            </li>
        @endforeach
    </ul>
</nav>
