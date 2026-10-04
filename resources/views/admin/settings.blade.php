@extends('layouts.app')

@section('title', 'Pengaturan')
@section('admin-page-label', 'Pengaturan')

@section('content')
<div class="d-flex">

    @include('admin.partials.sidebar')

    <!-- MAIN CONTENT -->
    <main class="flex-grow-1 bg-light">

        @include('admin.partials.topbar')

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
                            <h5 class="fw-bold mb-4">Informasi Aplikasi</h5>

                            <div class="mb-3">
                                <label class="form-label">Nama Toko</label>
                                <input type="text" class="form-control" value="{{ config('app.name') }}" readonly>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Email Admin</label>
                                <input type="email" class="form-control" value="{{ auth()->user()->email }}" readonly>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Zona Waktu</label>
                                <input type="text" class="form-control" value="{{ config('app.timezone') }}" readonly>
                            </div>

                            <p class="text-muted small mb-0">
                                Informasi aplikasi mengikuti konfigurasi environment project. Perubahan pengaturan dilakukan melalui file konfigurasi yang sesuai.
                            </p>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card border-0 shadow-sm">
                        <div class="card-body p-4">
                            <h5 class="fw-bold mb-4">Status Sistem</h5>
                            <div class="d-flex align-items-center gap-2 text-success mb-3">
                                <i class="bi bi-check-circle-fill"></i>
                                <span>Aplikasi aktif</span>
                            </div>
                            <div class="d-flex align-items-center gap-2 text-success mb-3">
                                <i class="bi bi-database-check"></i>
                                <span>Koneksi database tersedia</span>
                            </div>
                            <p class="text-muted small mb-0">Backup dan pengelolaan cache dijalankan melalui perintah server agar aman dan tercatat.</p>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </main>

</div>
@endsection