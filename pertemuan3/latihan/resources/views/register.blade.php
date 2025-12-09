<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-4">

            <h3 class="text-center mb-4">Register</h3>

            <form action="{{ route('register') }}" method="POST">
                @csrf

                {{-- Nama --}}
                <div class="mb-3">
                    <label>Nama</label>
                    <input type="text" name="name" class="form-control"
                        value="{{ old('name') }}" required>
                    @error('name')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                {{-- Username --}}
                <div class="mb-3">
                    <label>Username</label>
                    <input type="text" name="username" class="form-control"
                        value="{{ old('username') }}" required>
                    @error('username')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                {{-- Email --}}
                <div class="mb-3">
                    <label>Email</label>
                    <input type="email" name="email" class="form-control"
                        value="{{ old('email') }}" required>
                    @error('email')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                {{-- Password --}}
                <div class="mb-3">
                    <label>Password</label>
                    <input type="password" name="password" class="form-control" required>
                    @error('password')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                {{-- Konfirmasi Password --}}
                <div class="mb-3">
                    <label>Konfirmasi Password</label>
                    <input type="password" name="password_confirmation" class="form-control" required>
                </div>

                <button class="btn btn-success w-100" type="submit">Register</button>

                <p class="mt-3 text-center">
                    Sudah punya akun? <a href="{{ route('login') }}">Login</a>
                </p>
            </form>


        </div>
    </div>
</div>

</body>
</html>
