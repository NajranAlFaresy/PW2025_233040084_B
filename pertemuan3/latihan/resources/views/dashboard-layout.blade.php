<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    {{-- Tambahkan slot baru dengan nama $title --}}
    <title>{{ $title }}</title>
    @vite('resources/css/app.css')
    {{-- flowbite --}}
    <script src="https://cdn.jsdelivr.net/npm/flowbite@4.0.1/dist/flowbite.min.js"></script>
</head>
<body>
    <nav>
        <a href="/">Home</a>
        <a href="{{ route('about') }}">About</a>
        <a href="{{ route('blog') }}">Blog</a>
        <a href="{{ route('contact') }}">Contact</a>
        <a href="/users">Users</a>
        <a href="{{ route('posts') }}">Post</a>
        <a href="{{ route('categories') }}">Categories</a>
    </nav>
    <hr>
        {{ $slot }}
    </hr>
    <footer>
        <h3>
            @Najran Al-faresy | 2025
        </h3>
    </footer>
</body>
</html>