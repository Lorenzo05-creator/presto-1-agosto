<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <title>{{ $title ?? 'Presto' }}</title>
    @vite(['resources/css/app.css','resources/js/app.js'])
</head>
<body>

<x-navbar />

<main class="min-vh-100 py-4">
    {{ $slot }}
</main>

<x-footer />

</body>
</html>
