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
                <a href="{{ route('jobs.index') }}">Home</a>
            </li>
        </ul>
        <ul class="flex space-x-4">
            @auth
                <li>
                    <a href="{{ route('my-job-applications.index') }}">
                        Applications
                    </a>
                </li>
                <li>
                    <a href="{{ route('my-jobs.index') }}">
                        My Jobs
                    </a>
                </li>
                <li>
                    {{ auth()->user()->name }}
                </li>
                <li>
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="hover:underline cursor-pointer">Logout</button>
                    </form>
                </li>
            @else
                @if (!request()->routeIs('login'))
                    <a href="{{ route('login') }}" class="hover:underline cursor-pointer">Sign in</a>
                @endif
            @endauth
        </ul>
    </nav>
    @if (session('success'))
        <div x-data="" x-ref="success"
            class="my-8 rounded-md border-l-4 border-green-300 bg-green-100 p-4 text-green-700 relative">
            <p class="font-bold">Success</p>
            <p>{{ session('success') }}</p>
            <button type="button"
                class="absolute top-0 right-0 h-8 w-8 flex items-center justify-center hover:text-green-500 text-green-700 cursor-pointer"
                @click="$refs['success'].remove()">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="size-4">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                </svg>
            </button>
        </div>
    @endif
    {{ $slot }}
</body>

</html>
