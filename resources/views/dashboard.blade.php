<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard | {{ config('app.name', 'SABU JAYA MART') }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
    <link href="{{ asset('css/dashboard.css') }}" rel="stylesheet">
</head>
<body>
    <nav class="navbar navbar-expand-lg dashboard-nav">
        <div class="container">
            <a class="navbar-brand fw-bold" href="{{ route('home') }}">
                <i class="bi bi-shop-window me-2"></i>{{ config('app.name', 'SABU JAYA MART') }}
            </a>
            <div class="d-flex align-items-center gap-3">
                <span class="user-greeting d-none d-sm-inline">Halo, {{ auth()->user()->name }}</span>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button class="btn btn-outline-danger btn-sm" type="submit"><i class="bi bi-box-arrow-right me-1"></i>Keluar</button>
                </form>
            </div>
        </div>
    </nav>

    <main class="container py-5">
        <section class="dashboard-hero mb-4">
            <div>
                <span class="eyebrow">AKUN PELANGGAN</span>
                <h1>Selamat datang, {{ auth()->user()->name }}!</h1>
                <p class="mb-0">Nikmati pengalaman berbelanja yang mudah dan nyaman bersama {{ config('app.name', 'SABU JAYA MART') }}.</p>
            </div>
            <i class="bi bi-bag-heart hero-icon"></i>
        </section>

        <section class="row g-4">
            <div class="col-md-6">
                <div class="dashboard-card h-100">
                    <div class="card-icon"><i class="bi bi-box-seam"></i></div>
                    <h2>Lihat Produk</h2>
                    <p>Jelajahi daftar produk dan temukan kebutuhan Anda.</p>
                    <a href="{{ route('home') }}#features" class="btn btn-primary">Lihat Layanan <i class="bi bi-arrow-right ms-1"></i></a>
                </div>
            </div>
            <div class="col-md-6">
                <div class="dashboard-card h-100">
                    <div class="card-icon green"><i class="bi bi-person-gear"></i></div>
                    <h2>Profil Saya</h2>
                    <p>Perbarui nama, email, atau keamanan akun Anda.</p>
                    <a href="{{ route('profile.edit') }}" class="btn btn-outline-primary">Kelola Profil <i class="bi bi-arrow-right ms-1"></i></a>
                </div>
            </div>
        </section>

        <section class="info-strip mt-4">
            <i class="bi bi-shield-check"></i>
            <div><strong>Belanja aman dan nyaman</strong><span>Data akun Anda dilindungi dan transaksi tercatat dengan baik.</span></div>
        </section>
    </main>
</body>
</html>
