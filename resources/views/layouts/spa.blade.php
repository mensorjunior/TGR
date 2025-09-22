<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Meu Catálogo</title>
    @vite('resources/css/app.css')
    @livewireStyles
</head>
<body class="bg-gray-100 min-h-screen">

    {{-- Navbar --}}
    @include('partials.navbar')

    {{-- Conteúdo principal --}}
    <main class="p-6">
        @yield('content')
    </main>

    @livewireScripts
    @stack('scripts')
</body>
</html>
