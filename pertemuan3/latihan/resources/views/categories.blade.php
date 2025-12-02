<x-layout :title="'All Categories'">

    <h2>Daftar Semua Kategori</h2>

    <ul>
        @foreach ($categories as $category)
            <li>
                <a href="/categories/{{ $category->slug }}">
                    {{ $category->name }}
                </a>
            </li>
        @endforeach
    </ul>

</x-layout>
