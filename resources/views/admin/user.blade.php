@extends('layouts.app')

@section('title', 'Manage Users')

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
                <span class="navbar-brand fw-bold">Manage Users</span>
                <a href="{{ route('home') }}" class="btn btn-outline-danger">
                    <i class="bi bi-box-arrow-right"></i> Logout
                </a>
            </div>
        </nav>

        <!-- CONTENT -->
        <div class="container-fluid p-4">

            <div class="mb-4 d-flex justify-content-between align-items-center">
                <div>
                    <h2 class="fw-bold">Daftar Users</h2>
                    <p class="text-muted">Kelola pengguna sistem</p>
                </div>
                <button class="btn btn-primary">
                    <i class="bi bi-plus-circle me-2"></i>Tambah User
                </button>
            </div>

            <!-- USERS TABLE -->
            <div class="card border-0 shadow-sm">
                <div class="card-body p-4">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Role</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($users as $user)
                                <tr>
                                    <td>{{ $user['id'] }}</td>
                                    <td>{{ $user['name'] }}</td>
                                    <td>{{ $user['email'] }}</td>
                                    <td><span class="badge bg-{{ $user['role'] == 'Admin' ? 'danger' : 'info' }}">{{ $user['role'] }}</span></td>
                                    <td>
                                        <button class="btn btn-sm btn-warning">
                                            <i class="bi bi-pencil"></i>
                                        </button>
                                        <button class="btn btn-sm btn-danger">
                                            <i class="bi bi-trash"></i>
                                        </button>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>

    </main>

</div>
@endsection