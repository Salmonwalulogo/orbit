<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Login - Orbit</title>

    <link href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/main.css') }}" rel="stylesheet">

    <style>
        body {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            background: #f5f7fa;
        }

        .login-card {
            width: 100%;
            max-width: 420px;
            background: #fff;
            padding: 35px;
            border-radius: 18px;
            box-shadow: 0 10px 35px rgba(0, 0, 0, 0.08);
        }

        .login-logo {
            text-align: center;
            margin-bottom: 25px;
        }

        .login-logo h2 {
            font-weight: 700;
            margin-bottom: 5px;
        }

        .login-logo p {
            color: #777;
            margin: 0;
        }

        .form-control {
            height: 48px;
            border-radius: 10px;
        }

        .btn-login {
            width: 100%;
            height: 48px;
            border-radius: 10px;
            font-weight: 600;
        }
    </style>
</head>

<body>

    <div class="login-card">

        <div class="login-logo">
            <h2>Orbit</h2>
            <p>Silakan login ke akun Anda</p>
        </div>

        @if(session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('login.prosess') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label class="form-label">Email</label>
                <input
                    type="email"
                    name="email"
                    class="form-control"
                    placeholder="Masukkan email"
                    required
                >
            </div>

            <div class="mb-3">
                <label class="form-label">Password</label>
                <input
                    type="password"
                    name="password"
                    class="form-control"
                    placeholder="Masukkan password"
                    required
                >
            </div>

            <button type="submit" class="btn btn-primary btn-login">
                Login
            </button>
        </form>

        <div class="text-center mt-4">
            <a href="{{ url('/') }}" class="text-decoration-none">
                ← Kembali ke Orbit
            </a>
        </div>

    </div>

    <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

</body>

</html>