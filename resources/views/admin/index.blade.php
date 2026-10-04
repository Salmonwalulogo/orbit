@extends('layouts.app')

@section('title', 'Admin Dashboard')
@section('admin-page-label', 'Dashboard')

@section('content')
<div class="d-flex admin-dashboard">

    @include('admin.partials.sidebar')

    <!-- MAIN CONTENT -->
    <main class="flex-grow-1 bg-light admin-dashboard-main">

        @include('admin.partials.topbar')

        <!-- CONTENT -->
        <div class="container-fluid p-4">

            <div class="mb-4">
                <h2 class="fw-bold">Dashboard {{ config('app.name', 'SABU JAYA MART') }}</h2>
                <p class="text-muted">Kelola produk, pengguna, dan aktivitas toko dari satu tempat.</p>
            </div>

            <div class="card border-0 shadow-sm mb-4 admin-welcome-card">
                <div class="card-body p-4">
                    <div class="d-flex justify-content-between align-items-center flex-wrap gap-3">
                        <div class="admin-welcome-copy">
                            <h3 class="fw-bold mb-1">Halo, {{ auth()->user()->name }}</h3>
                            <p class="mb-0 text-white-50">Panel administrasi toko siap digunakan.</p>
                        </div>
                        <div class="d-flex gap-2">
                            <a href="{{ route('products.index') }}" class="btn btn-light text-primary fw-semibold">
                                <i class="bi bi-box-seam me-2"></i> Produk
                            </a>
                            <a href="{{ route('products.create') }}" class="btn btn-outline-light fw-semibold">
                                <i class="bi bi-plus-circle me-2"></i> Baru
                            </a>
                        </div>
                    </div>
                    <div class="admin-hero-cube" aria-hidden="true">
                        <span class="admin-hero-cube-rotator">
                            <span class="admin-cube-face admin-cube-front"><i class="bi bi-box-seam"></i></span>
                            <span class="admin-cube-face admin-cube-back"></span>
                            <span class="admin-cube-face admin-cube-right"></span>
                            <span class="admin-cube-face admin-cube-left"></span>
                            <span class="admin-cube-face admin-cube-top"></span>
                            <span class="admin-cube-face admin-cube-bottom"></span>
                        </span>
                    </div>
                </div>
            </div>

            <!-- STATISTICS -->
            <div class="row g-4 admin-statistics">
                <div class="col-md-3">
                    <div class="card border-0 shadow-sm h-100 admin-stat-card">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center">
                                <div>
                                    <p class="text-muted mb-1">Total Users</p>
                                    <h2 class="fw-bold">{{ $data['totalUsers'] }}</h2>
                                </div>
                                <div class="stat-icon text-primary rounded-circle bg-primary-subtle p-3">
                                    <i class="bi bi-people"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="card border-0 shadow-sm h-100 admin-stat-card">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center">
                                <div>
                                    <p class="text-muted mb-1">Produk</p>
                                    <h2 class="fw-bold">{{ $data['totalProducts'] }}</h2>
                                </div>
                                <div class="stat-icon text-success rounded-circle bg-success-subtle p-3">
                                    <i class="bi bi-box-seam"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="card border-0 shadow-sm h-100 admin-stat-card">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center">
                                <div>
                                    <p class="text-muted mb-1">Total Data</p>
                                    <h2 class="fw-bold">{{ $data['totalData'] }}</h2>
                                </div>
                                <div class="stat-icon text-info rounded-circle bg-info-subtle p-3">
                                    <i class="bi bi-database"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="card border-0 shadow-sm h-100 admin-stat-card">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center">
                                <div>
                                    <p class="text-muted mb-1">Aktivitas</p>
                                    <h2 class="fw-bold">{{ $data['aktivitas'] }}</h2>
                                </div>
                                <div class="stat-icon text-warning rounded-circle bg-warning-subtle p-3">
                                    <i class="bi bi-bar-chart"></i>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card border-0 shadow-sm mt-4 admin-sales-card admin-dashboard-sales">
                <div class="card-body d-flex justify-content-between align-items-center flex-wrap gap-3">
                    <div>
                        <p class="text-muted mb-1">Penjualan Hari Ini</p>
                        <h3 class="fw-bold mb-0">Rp {{ number_format($data['todaySales'], 0, ',', '.') }}</h3>
                    </div>
                    <i class="bi bi-graph-up-arrow fs-2 text-success"></i>
                </div>
            </div>

            <!-- QUICK ACTIONS -->
            <div class="mt-4">
                <h5 class="fw-bold mb-3">Aksi Cepat</h5>
                <div class="row g-3">
                    <div class="col-md-6 admin-quick-action">
                        <a href="{{ route('products.index') }}" class="btn btn-primary w-100 py-3 rounded-4 shadow-sm">
                            <i class="bi bi-box-seam me-2"></i> Kelola Produk
                        </a>
                    </div>
                    <div class="col-md-6 admin-quick-action">
                        <a href="{{ route('products.create') }}" class="btn btn-success w-100 py-3 rounded-4 shadow-sm">
                            <i class="bi bi-plus-circle me-2"></i> Tambah Produk Baru
                        </a>
                    </div>
                </div>
            </div>

        </div>

    </main>

</div>
@endsection