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
        <a href="/about">About</a>
        <a href="/blog">Blog</a>
        <a href="/users">Users</a>
        <a href="/posts">Post</a>
        <a href="/contact">Contact</a>
        <a href="/categories">Categories</a>
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