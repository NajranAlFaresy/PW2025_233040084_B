<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $title }}</title>
</head>
<body>
    <nav>
        <a href="/">Home</a>
        <a href="{{ route('about') }}">About</a>
        <a href="{{ route('blog') }}">Blog</a>
        <a href="{{ route('contact') }}">Contact</a>
        <a href="/users">Users</a>
        <a href="{{ route('posts.index') }}">Post</a>
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