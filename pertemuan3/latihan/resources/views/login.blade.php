<x-layout>
    <x-slot:title>
        Login
    </x-slot:title>

            <form action="{{ route('login') }}" method="POST">
                @csrf

                {{-- Email --}}
                <div>
                    <label>Email</label>
                    <input type="email" name="email"
                           value="{{ old('email') }}" required autofocus>
                    @error('email')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                {{-- Password --}}
                <div>
                    <label>Password</label>
                    <input type="password" name="password" class="form-control" required>
                    @error('password')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <button class="btn btn-primary w-100" type="submit">Login</button>

                <p>
                    Belum punya akun? <a href="{{ route('register') }}">Register</a>
                </p>
            </form>

    <h1>Ini Halaman Login</h1>
</x-layout>
