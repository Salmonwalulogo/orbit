@extends('layouts.app')

@section('title', 'Admin Dashboard')

@section('content')
<div class="d-flex">

    <!-- SIDEBAR -->
    <aside class="bg-dark text-white p-3" style="width: 250px; min-height: 100vh;">
        <h4 class="fw-bold mb-4">
            <i class="bi bi-grid-1x2-fill"></i> Admin Panel
        </h4>

        <ul class="nav nav-pills flex-column gap-2">
            <li class="nav-item">
                <a href="{{ route('admin.dashboard') }}" 
                   class="nav-link {{ request()->routeIs('admin.dashboard') ? 'active' : 'text-white' }}">
                    <i class="bi bi-speedometer2 me-2"></i> Dashboard
                </a>
            </li>

            <li class="nav-item">
                <a href="{{ route('admin.users') }}" 
                   class="nav-link {{ request()->routeIs('admin.users') ? 'active' : 'text-white' }}">
                    <i class="bi bi-people me-2"></i> Users
                </a>
            </li>

            <li class="nav-item">
                <a href="{{ route('admin.data') }}" 
                   class="nav-link {{ request()->routeIs('admin.data') ? 'active' : 'text-white' }}">
                    <i class="bi bi-folder me-2"></i> Data
                </a>
            </li>

            <li class="nav-item">
                <a href="{{ route('admin.settings') }}" 
                   class="nav-link {{ request()->routeIs('admin.settings') ? 'active' : 'text-white' }}">
                    <i class="bi bi-gear me-2"></i> Pengaturan
                </a>
            </li>
        </ul>
    </aside>

    <!-- MAIN CONTENT -->
    <main class="flex-grow-1 bg-light">

        <!-- TOPBAR -->
        <nav class="navbar navbar-expand-lg bg-white shadow-sm px-4">
            <div class="container-fluid">
                <span class="navbar-brand fw-bold">{{ $data['title'] ?? 'Dashboard' }}</span>
                <a href="{{ route('home') }}" class="btn btn-outline-danger">
                    <i class="bi bi-box-arrow-right"></i> Logout
                </a>
            </div>
        </nav>

        <!-- CONTENT -->
        <div class="container-fluid p-4">

            <div class="mb-4">
                <h2 class="fw-bold">Selamat Datang, Admin</h2>
                <p class="text-muted">Ini adalah halaman dashboard administrator.</p>
            </div>

            <!-- STATISTICS -->
            <div class="row g-4">
                <div class="col-md-4">
                    <div class="card border-0 shadow-sm">
                        <div class="card-body">
                            <div class="d-flex justify-content-between">
                                <div>
                                    <p class="text-muted mb-1">Total Users</p>
                                    <h2 class="fw-bold">{{ $data['totalUsers'] }}</h2>
                                </div>
                                <div class="text-primary" style="font-size: 45px;">
                                    <i class="bi bi-people"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card border-0 shadow-sm">
                        <div class="card-body">
                            <div class="d-flex justify-content-between">
                                <div>
                                    <p class="text-muted mb-1">Total Data</p>
                                    <h2 class="fw-bold">{{ $data['totalData'] }}</h2>
                                </div>
                                <div class="text-success" style="font-size: 45px;">
                                    <i class="bi bi-database"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card border-0 shadow-sm">
                        <div class="card-body">
                            <div class="d-flex justify-content-between">
                                <div>
                                    <p class="text-muted mb-1">Aktivitas</p>
                                    <h2 class="fw-bold">{{ $data['aktivitas'] }}</h2>
                                </div>
                                <div class="text-warning" style="font-size: 45px;">
                                    <i class="bi bi-bar-chart"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- WELCOME CARD -->
            <div class="card border-0 shadow-sm mt-4">
                <div class="card-body p-4">
                    <h4 class="fw-bold">Dashboard Admin</h4>
                    <p class="text-muted">Sistem berhasil terhubung dengan halaman administrator Laravel.</p>
                    <div class="alert alert-success mb-0">
                        <i class="bi bi-check-circle-fill me-2"></i>
                        Halaman Admin berhasil dibuka.
                    </div>
                </div>
            </div>

        </div>

    </main>

</div>
@endsection