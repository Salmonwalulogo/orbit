@extends('layouts.app')

@section('title', 'Pengguna')
@section('admin-page-label', 'Pengguna')

@section('content')
<div class="d-flex">

    @include('admin.partials.sidebar')

    <!-- MAIN CONTENT -->
    <main class="flex-grow-1 bg-light">

        @include('admin.partials.topbar')

        <!-- CONTENT -->
        <div class="container-fluid p-4">

            <div class="mb-4 d-flex justify-content-between align-items-center">
                <div>
                    <h2 class="fw-bold">Daftar Users</h2>
                    <p class="text-muted">Kelola pengguna sistem</p>
                </div>
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
                                @forelse($users as $user)
                                <tr>
                                    <td>{{ $user->id }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td><span class="badge bg-{{ $user->role === 'admin' ? 'danger' : ($user->role === 'cashier' ? 'primary' : 'info') }}">{{ ucfirst($user->role) }}</span></td>
                                    <td>
                                        <span class="text-muted small">Dikelola melalui database</span>
                                    </td>
                                </tr>
                                @empty
                                <tr><td colspan="5" class="text-center text-muted py-4">Belum ada pengguna.</td></tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>

    </main>

</div>
@endsection