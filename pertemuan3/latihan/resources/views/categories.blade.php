<x-layout>
    <x-slot:title>Categories</x-slot:title>

    <h1>Daftar Kategori</h1>

    <ul>
        @foreach ($categories as $category)
            <li>{{ $category->name }}</li>
        @endforeach
    </ul>
</x-layout>