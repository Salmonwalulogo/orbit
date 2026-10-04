<aside class="admin-sidebar bg-dark text-white p-3">
    <h4 class="fw-bold mb-4">
        <i class="bi bi-grid-1x2-fill"></i> {{ config('app.name', 'SABU JAYA MART') }}
    </h4>

    <ul class="nav nav-pills flex-column gap-2">
        <li class="nav-item">
            <a href="{{ route('admin.dashboard') }}" class="nav-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                <i class="bi bi-speedometer2 me-2"></i> Dashboard
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('admin.users') }}" class="nav-link {{ request()->routeIs('admin.users') ? 'active' : '' }}">
                <i class="bi bi-people me-2"></i> Pengguna
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('admin.data') }}" class="nav-link {{ request()->routeIs('admin.data') ? 'active' : '' }}">
                <i class="bi bi-folder me-2"></i> Data Produk
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('products.index') }}" class="nav-link {{ request()->routeIs('products.*') ? 'active' : '' }}">
                <i class="bi bi-box-seam me-2"></i> Kelola Produk
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('admin.settings') }}" class="nav-link {{ request()->routeIs('admin.settings') ? 'active' : '' }}">
                <i class="bi bi-gear me-2"></i> Pengaturan
            </a>
        </li>
    </ul>
</aside>
