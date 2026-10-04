<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Login | {{ config('app.name', 'SABU JAYA MART') }}</title>

    <!-- Bootstrap 5 -->
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css"
        rel="stylesheet">

    <!-- Bootstrap Icons -->
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css"
        rel="stylesheet">

    <link href="{{ asset('css/auth-motion.css') }}" rel="stylesheet">

    <!-- Google Font -->
    <link
        href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;500;600;700;800;900&display=swap"
        rel="stylesheet">


    <style>

        * {
            box-sizing: border-box;
        }

        html, body {
            margin: 0;
            min-height: 100%;
        }

        body {
            position: relative;
            min-height: 100vh;
            font-family: "Nunito", sans-serif;
            background: linear-gradient(135deg, #f97316 0%, #f97316 18%, #f97316 35%, #ec4899 62%, #7c3aed 100%);
            color: #f9fafb;
            overflow-x: hidden;
        }

        .login-video-bg {
            position: fixed;
            inset: 0;
            z-index: 0;
            overflow: hidden;
            background: rgba(255, 255, 255, 0.14);
        }

        .login-video-bg video {
            position: absolute;
            inset: 0;
            width: 100%;
            height: 100%;
            object-fit: cover;
            object-position: center;
            filter: saturate(0.85) contrast(1.02) brightness(0.7) blur(2px);
        }

        .login-video-bg::after {
            content: "";
            position: absolute;
            inset: 0;
            background:
                linear-gradient(90deg, rgba(249,115,22,0.75), rgba(234,88,12,0.68) 35%, rgba(236,72,153,0.28) 62%, rgba(255,255,255,0.18) 100%);
        }

        /* =====================================
           MAIN
        ===================================== */

        .login-wrapper {
            position: relative;
            z-index: 1;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 40px 20px;
        }


        /* =====================================
           CARD
        ===================================== */

        .login-card {
            width: 100%;
            max-width: 1080px;
            min-height: 620px;
            background: rgba(255, 255, 255, 0.08);
            border: 1px solid rgba(255, 255, 255, 0.18);
            border-radius: 24px;
            overflow: hidden;
            backdrop-filter: blur(6px);
            box-shadow: 0 25px 70px rgba(15, 23, 42, 0.25);
        }


        /* =====================================
           LEFT SIDE
        ===================================== */

        .login-left {
            min-height: 620px;
            height: 100%;
            padding: 65px;
            position: relative;
            overflow: hidden;
            color: white;
            display: flex;
            align-items: center;
            background:
                linear-gradient(
                    135deg,
                    rgba(249, 115, 22, 0.9) 0%,
                    rgba(236, 72, 153, 0.62) 55%,
                    rgba(124, 58, 237, 0.48) 100%
                );
        }


        /* BULATAN */

        .login-left::before {
            content: "";
            position: absolute;
            width: 420px;
            height: 420px;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.08);
            top: -200px;
            right: -150px;
        }


        .login-left::after {
            content: "";
            position: absolute;
            width: 350px;
            height: 350px;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.07);
            bottom: -180px;
            left: -150px;
        }


        .left-content {
            position: relative;
            z-index: 2;
            max-width: 450px;
        }


        /* =====================================
           LOGO
        ===================================== */

        .brand-icon {
            width: 76px;
            height: 76px;
            border-radius: 20px;
            background: rgba(255, 255, 255, 0.16);
            border: 1px solid rgba(255, 255, 255, 0.15);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 34px;
            margin-bottom: 30px;
            backdrop-filter: blur(10px);
            box-shadow: inset 0 1px rgba(255,255,255,0.2);
        }


        /* =====================================
           TITLE
        ===================================== */

        .login-left h1 {
            font-size: 43px;
            line-height: 1.15;
            font-weight: 900;
            margin-bottom: 22px;
            letter-spacing: -0.04em;
        }


        .login-left p {
            font-size: 16px;
            line-height: 1.8;
            color: rgba(255,255,255,0.88);
            margin-bottom: 35px;
        }


        /* =====================================
           FEATURES
        ===================================== */

        .feature-item {
            display: flex;
            align-items: center;
            margin-bottom: 18px;
            font-size: 15px;
            font-weight: 600;
        }


        .feature-icon {
            width: 42px;
            height: 42px;
            flex-shrink: 0;
            border-radius: 12px;
            background: rgba(255,255,255,0.14);
            display: flex;
            align-items: center;
            justify-content: center;
            margin-right: 14px;
        }


        /* =====================================
           RIGHT
        ===================================== */

        .login-right {
            min-height: 620px;
            padding: 65px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            background: rgba(255, 255, 255, 0.78);
            backdrop-filter: blur(16px);
        }


        .login-right h2 {
            font-size: 34px;
            font-weight: 900;
            color: #111827;
            margin-bottom: 8px;
        }


        .login-subtitle {
            color: #4b5563;
            font-size: 15px;
            margin-bottom: 35px;
        }


        /* =====================================
           ALERT
        ===================================== */

        .custom-alert {
            border: none;
            border-radius: 12px;
            font-size: 14px;
        }


        /* =====================================
           LABEL
        ===================================== */

        .form-label {
            font-size: 14px;
            font-weight: 700;
            color: #374151;
            margin-bottom: 8px;
        }


        /* =====================================
           INPUT
        ===================================== */

        .input-group {
            border-radius: 14px;
            transition: 0.25s;
            overflow: hidden;
            background: rgba(255,255,255,0.5);
        }


        .input-group-text {
            height: 52px;
            background: rgba(255,255,255,0.42);
            border: 1px solid rgba(148, 163, 184, 0.9);
            border-right: none;
            color: #8b5e34;
            padding-left: 16px;
        }


        .form-control {
            height: 52px;
            border: 1px solid rgba(148, 163, 184, 0.9);
            border-left: none;
            font-size: 14px;
            color: #374151;
            padding-left: 12px;
            background: rgba(255,255,255,0.45);
        }


        .form-control::placeholder {
            color: #64748b;
        }


        .form-control:focus {
            box-shadow: none;
            border-color: #f97316;
            background: rgba(255,255,255,0.9);
        }


        .input-group:focus-within {
            box-shadow: 0 0 0 4px rgba(249,115,22,0.12);
        }


        .input-group:focus-within .input-group-text {
            border-color: #f97316;
            color: #ea580c;
        }


        /* =====================================
           PASSWORD BUTTON
        ===================================== */

        .password-toggle {
            cursor: pointer;
            border-left: none;
            border-right: 1px solid rgba(148, 163, 184, 0.9);
            color: #9ca3af;
            transition: 0.2s;
        }


        .password-toggle:hover {
            color: #ea580c;
        }


        /* =====================================
           FORGOT
        ===================================== */

        .forgot-password {
            font-size: 13px;
            font-weight: 700;
            color: #c2410c;
            text-decoration: none;
        }


        .forgot-password:hover {
            text-decoration: underline;
        }


        /* =====================================
           REMEMBER
        ===================================== */

        .form-check-input {
            width: 17px;
            height: 17px;
            cursor: pointer;
        }


        .form-check-input:checked {
            background-color: #f97316;
            border-color: #f97316;
        }


        .form-check-label {
            font-size: 14px;
            color: #4b5563;
            cursor: pointer;
        }


        /* =====================================
           LOGIN BUTTON
        ===================================== */

        .login-btn {
            width: 100%;
            height: 54px;
            border: none;
            border-radius: 12px;
            color: white;
            font-size: 15px;
            font-weight: 800;
            background: linear-gradient(135deg, #f97316, #ef4444 45%, #7c3aed);
            box-shadow: 0 10px 25px rgba(234, 88, 12, 0.28);
            transition: all 0.3s ease;
        }


        .login-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 15px 30px rgba(234, 88, 12, 0.35);
        }


        .login-btn:active {
            transform: translateY(0);
        }


        /* =====================================
           BACK HOME
        ===================================== */

        .back-home {
            display: inline-block;
            margin-top: 25px;
            color: #475569;
            font-size: 13px;
            font-weight: 600;
            text-decoration: none;
        }


        .back-home:hover {
            color: #c2410c;
        }


        /* =====================================
           COPYRIGHT
        ===================================== */

        .copyright {
            text-align: center;
            margin-top: 30px;
            color: rgba(71, 85, 105, 0.8);
            font-size: 12px;
        }


        /* =====================================
           INVALID
        ===================================== */

        .is-invalid {
            border-color: #dc3545 !important;
        }


        /* =====================================
           RESPONSIVE
        ===================================== */

        @media (max-width: 991px) {
            .login-card {
                max-width: 720px;
            }

            .login-left {
                min-height: 480px;
                padding: 50px;
            }

            .login-right {
                min-height: auto;
                padding: 50px;
            }

            .login-left h1 {
                font-size: 36px;
            }
        }


        @media (max-width: 767px) {
            .login-wrapper {
                padding: 20px;
            }

            .login-card {
                border-radius: 18px;
            }

            .login-left {
                min-height: auto;
                padding: 45px 30px;
            }

            .login-right {
                padding: 40px 30px;
            }

            .login-left h1 {
                font-size: 31px;
            }

            .login-left p {
                font-size: 15px;
            }

            .login-right h2 {
                font-size: 29px;
            }
        }

    </style>

</head>


<body>

<div class="login-video-bg" aria-hidden="true">
    <video autoplay muted loop playsinline preload="auto">
        <source src="{{ asset('videos/login-background.mp4') }}" type="video/mp4">
    </video>
</div>

<div class="login-wrapper auth-login-motion">


    <div class="login-card">


        <div class="row g-0">


            <!-- ==================================
                 LEFT PANEL
            ================================== -->

            <div class="col-lg-6">


                <div class="login-left">


                    <div class="left-content">


                        <!-- ICON -->

                        <div class="brand-icon">

                            <i class="bi bi-grid-1x2-fill"></i>

                        </div>


                        <!-- TITLE -->

                        <h1>

                            Selamat Datang
                            Kembali!

                        </h1>


                        <p>

                            Masuk ke dalam sistem untuk
                            mengelola data dan mengakses
                            berbagai fitur dengan mudah,
                            cepat, dan aman.

                        </p>


                        <!-- FEATURE 1 -->

                        <div class="feature-item">

                            <div class="feature-icon">

                                <i class="bi bi-shield-check"></i>

                            </div>

                            <span>

                                Keamanan data terjamin

                            </span>

                        </div>


                        <!-- FEATURE 2 -->

                        <div class="feature-item">

                            <div class="feature-icon">

                                <i class="bi bi-speedometer2"></i>

                            </div>

                            <span>

                                Performa cepat dan responsif

                            </span>

                        </div>


                        <!-- FEATURE 3 -->

                        <div class="feature-item">

                            <div class="feature-icon">

                                <i class="bi bi-phone"></i>

                            </div>

                            <span>

                                Responsive di semua perangkat

                            </span>

                        </div>

                    </div>

                    @include('auth.partials.stack-cards')

                </div>


            </div>



            <!-- ==================================
                 RIGHT PANEL
            ================================== -->

            <div class="col-lg-6">


                <div class="login-right">


                    <h2>

                        Login ke Akun

                    </h2>


                    <p class="login-subtitle">

                        Silakan masukkan akun Anda
                        untuk melanjutkan.

                    </p>



                    <!-- ==================================
                         SESSION STATUS
                    ================================== -->

                    @if (session('status'))

                        <div class="alert alert-success custom-alert">

                            <i class="bi bi-check-circle me-2"></i>

                            {{ session('status') }}

                        </div>

                    @endif



                    <!-- ==================================
                         VALIDATION ERROR
                    ================================== -->

                    @if ($errors->any())

                        <div class="alert alert-danger custom-alert">

                            <i class="bi bi-exclamation-circle me-2"></i>

                            Email atau password yang Anda
                            masukkan tidak sesuai.

                        </div>

                    @endif



                    <!-- ==================================
                         FORM
                    ================================== -->

                    <form
                        method="POST"
                        action="{{ route('login') }}">

                        @csrf



                        <!-- EMAIL -->

                        <div class="mb-4">


                            <label
                                for="email"
                                class="form-label">

                                Email Address

                            </label>


                            <div class="input-group">


                                <span class="input-group-text">

                                    <i class="bi bi-envelope"></i>

                                </span>


                                <input
                                    id="email"
                                    type="email"
                                    name="email"
                                    value="{{ old('email') }}"
                                    class="form-control @error('email') is-invalid @enderror"
                                        placeholder="kasir@sabujayamart.test"
                                    required
                                    autofocus
                                    autocomplete="username">


                            </div>


                            @error('email')

                                <div class="text-danger small mt-2">

                                    {{ $message }}

                                </div>

                            @enderror


                        </div>



                        <!-- PASSWORD -->

                        <div class="mb-3">


                            <div class="d-flex justify-content-between align-items-center">


                                <label
                                    for="password"
                                    class="form-label">

                                    Password

                                </label>


                                @if (Route::has('password.request'))

                                    <a
                                        href="{{ route('password.request') }}"
                                        class="forgot-password">

                                        Lupa password?

                                    </a>

                                @endif


                            </div>



                            <div class="input-group">


                                <span class="input-group-text">

                                    <i class="bi bi-lock"></i>

                                </span>


                                <input
                                    id="password"
                                    type="password"
                                    name="password"
                                    class="form-control @error('password') is-invalid @enderror"
                                    placeholder="••••••••"
                                    required
                                    autocomplete="current-password">


                                <button
                                    type="button"
                                    class="input-group-text password-toggle"
                                    onclick="togglePassword()">

                                    <i
                                        class="bi bi-eye"
                                        id="eyeIcon">
                                    </i>

                                </button>


                            </div>


                            @error('password')

                                <div class="text-danger small mt-2">

                                    {{ $message }}

                                </div>

                            @enderror


                        </div>



                        <!-- REMEMBER -->

                        <div class="form-check mb-4">


                            <input
                                id="remember_me"
                                type="checkbox"
                                name="remember"
                                class="form-check-input">


                            <label
                                for="remember_me"
                                class="form-check-label ms-1">

                                Ingat saya

                            </label>


                        </div>



                        <!-- LOGIN BUTTON -->

                        <button
                            type="submit"
                            class="login-btn">

                            <i
                                class="bi bi-box-arrow-in-right me-2">
                            </i>

                            Login ke Sistem

                        </button>


                    </form>



                    <!-- BACK HOME -->

                    @if (Route::has('home'))

                        <div class="text-center">

                            <a
                                href="{{ route('home') }}"
                                class="back-home">

                                <i
                                    class="bi bi-arrow-left me-1">
                                </i>

                                Kembali ke halaman utama

                            </a>

                        </div>

                    @endif



                    <!-- COPYRIGHT -->

                    <div class="copyright">

                        © {{ date('Y') }}

                        Sistem Informasi.

                        All Rights Reserved.

                    </div>


                </div>


            </div>


        </div>


    </div>


</div>



<!-- ==================================
     PASSWORD SCRIPT
================================== -->

<script>

function togglePassword()
{

    const password =
        document.getElementById("password");

    const eyeIcon =
        document.getElementById("eyeIcon");


    if (password.type === "password")
    {

        password.type = "text";

        eyeIcon.classList.remove("bi-eye");

        eyeIcon.classList.add("bi-eye-slash");

    }

    else
    {

        password.type = "password";

        eyeIcon.classList.remove("bi-eye-slash");

        eyeIcon.classList.add("bi-eye");

    }

}

</script>

<script src="{{ asset('js/auth-motion.js') }}" defer></script>

</body>

</html>