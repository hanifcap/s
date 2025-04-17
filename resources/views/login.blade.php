<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(to right, #d1c4e9, #b39ddb);
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .card {
            width: 100%;
            max-width: 360px;
            padding: 2rem;
            border-radius: 1rem;
            border: none;
            background: #ffffff;
            box-shadow: 0 8px 16px rgba(0,0,0,0.1);
        }

        .form-control {
            margin-bottom: 1rem;
            border-radius: 0.4rem;
        }

        .btn {
            width: 100%;
            border-radius: 0.4rem;
        }

        .text-danger {
            font-size: 0.85rem;
        }

        .alert {
            font-size: 0.9rem;
            padding: 0.5rem 1rem;
        }

        h4 {
            text-align: center;
            margin-bottom: 1.5rem;
            font-weight: 600;
            color: #333;
        }
    </style>
</head>
<body>

<div class="card">
    <h4>Login</h4>

    @if ($errors->any() && !$errors->has('email') && !$errors->has('password'))
        <div class="alert alert-danger">Login gagal. Periksa kembali kredensial Anda.</div>
    @endif

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <input type="email" name="email" value="{{ old('email') }}" required class="form-control" placeholder="Email">
        @error('email')
            <div class="text-danger">{{ $message }}</div>
        @enderror

        <input type="password" name="password" required class="form-control" placeholder="Password">
        @error('password')
            <div class="text-danger">{{ $message }}</div>
        @enderror

        <button type="submit" class="btn btn-primary">Login</button>
    </form>
</div>

</body>
</html>
