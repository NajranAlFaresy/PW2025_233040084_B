<x-layout>
    <x-slot:title>Users</x-slot:title>

    <h1>Daftar User</h1>

    <ul>
        @foreach ($users as $user)
            <li>
                {{ $user->name }} | {{ $user->email }} | {{ $user->password }}
            </li>
        @endforeach
    </ul>
</x-layout>