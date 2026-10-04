<nav class="navbar navbar-expand-lg bg-white shadow-sm px-4">
    <div class="container-fluid">
        <span class="navbar-brand fw-bold">
            {{ config('app.name', 'SABU JAYA MART') }}
            <small class="fw-normal">/ @yield('admin-page-label', 'Admin')</small>
        </span>
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="btn btn-outline-danger">
                <i class="bi bi-box-arrow-right"></i> Logout
            </button>
        </form>
    </div>
</nav>
