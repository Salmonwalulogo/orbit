@extends('layouts.app')

@section('title', 'Pengaturan')

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
                <span class="navbar-brand fw-bold">Pengaturan</span>
                <a href="{{ route('home') }}" class="btn btn-outline-danger">
                    <i class="bi bi-box-arrow-right"></i> Logout
                </a>
            </div>
        </nav>

        <!-- CONTENT -->
        <div class="container-fluid p-4">

            <div class="mb-4">
                <h2 class="fw-bold">Pengaturan Sistem</h2>
                <p class="text-muted">Konfigurasi dan pengaturan aplikasi</p>
            </div>

            <!-- SETTINGS FORM -->
            <div class="row g-4">
                <div class="col-md-8">
                    <div class="card border-0 shadow-sm">
                        <div class="card-body p-4">
                            <h5 class="fw-bold mb-4">General Settings</h5>
                            
                            <form>
                                <div class="mb-3">
                                    <label class="form-label">Site Name</label>
                                    <input type="text" class="form-control" value="Admin Panel">
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Site Email</label>
                                    <input type="email" class="form-control" value="admin@example.com">
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Timezone</label>
                                    <select class="form-select">
                                        <option>Asia/Jakarta</option>
                                        <option>Asia/Surabaya</option>
                                        <option>Asia/Jayapura</option>
                                    </select>
                                </div>

                                <button type="submit" class="btn btn-primary">
                                    <i class="bi bi-save me-2"></i>Simpan Perubahan
                                </button>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card border-0 shadow-sm">
                        <div class="card-body p-4">
                            <h5 class="fw-bold mb-4">Quick Actions</h5>
                            
                            <div class="d-grid gap-2">
                                <button class="btn btn-outline-primary">
                                    <i class="bi bi-database me-2"></i>Backup Database
                                </button>
                                <button class="btn btn-outline-warning">
                                    <i class="bi bi-arrow-clockwise me-2"></i>Clear Cache
                                </button>
                                <button class="btn btn-outline-danger">
                                    <i class="bi bi-shield me-2"></i>Reset Permissions
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </main>

</div>
@endsection