<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'Laravel') }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body
    class="mx-auto py-10 max-w-2xl bg-slate-200 text-slate-700 bg-gradient-to-r from-indigo-100 from-10% via-sky-100 via-30% to-emerald-100 to-90% ">
<nav class="mb-8 flex justify-between text-lg font-medium">
    <ul>
        <li>
            <a href="{{route('jobs.index')}}">Home</a>
        </li>
    </ul>
    <ul class="flex space-x-2">
        @auth
            <li>
                {{auth()->user()->name}}
            </li>
            <li>
                <form action="{{route('logout')}}" method="POST">
                    @csrf
                    <button type="submit" class="hover:underline cursor-pointer">Logout</button>
                </form>
            </li>
        @else
            @if(!request()->routeIs('login'))
                <a href="{{route('login')}}" class="hover:underline cursor-pointer">Sign in</a>
            @endif
        @endauth
    </ul>
</nav>
{{ $slot }}
</body>
</html>
