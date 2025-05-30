@php
    use Illuminate\Support\Facades\Auth;
    use Livewire\Title;

    $isLogged = Auth::check();
    $hideLayout = request()->routeIs('login') || request()->routeIs('register');
@endphp

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    <title>{{ $title ?? config('app.name') }}</title>

    {{-- Tailwind dan Flowbite --}}
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <link href="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.js"></script>

    {{-- Font --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    @livewireStyles
</head>
<body class="font-sans">
    <main>
        @if ($isLogged && !$hideLayout)
            <x-navigation-logged />
        @elseif (!$hideLayout)
            <x-navigation />
        @endif

        {{ $slot }}

        @if (!$hideLayout)
            <x-footer />
        @endif
    </main>

    @livewireScripts
</body>
</html>
