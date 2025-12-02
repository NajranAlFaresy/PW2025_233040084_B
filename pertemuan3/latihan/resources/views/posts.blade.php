<x-layout>
    <x-slot:title>Posts</x-slot:title>

    <h1>Daftar Post</h1>

    @foreach ($posts as $post)
        <div style="margin-bottom:20px;">
            <h3>{{ $post->title }}</h3>
            <p>{{ $post->body }}</p>
            <small>
                Penulis: {{ $post->author->name }}
                Kategori: {{ $post->category->name }}
            </small>
        </div>
    @endforeach
</x-layout>