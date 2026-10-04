<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Produk | {{ config('app.name', 'SABU JAYA MART') }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    
    <style>
        * { 
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }
        
        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 50%, #f093fb 100%);
            min-height: 100vh;
            padding: 40px 20px;
            position: relative;
            overflow-x: hidden;
        }

        /* Animated Background Shapes */
        .bg-shapes {
            position: fixed;
            width: 100%;
            height: 100%;
            top: 0;
            left: 0;
            pointer-events: none;
            z-index: 0;
            overflow: hidden;
        }

        .shape {
            position: absolute;
            filter: blur(80px);
            opacity: 0.3;
            animation: float 20s infinite ease-in-out;
        }

        .shape-1 {
            width: 400px;
            height: 400px;
            background: #ff6b6b;
            top: -100px;
            left: -100px;
            border-radius: 50%;
        }

        .shape-2 {
            width: 500px;
            height: 500px;
            background: #4ecdc4;
            bottom: -200px;
            right: -200px;
            border-radius: 50%;
            animation-delay: -5s;
        }

        .shape-3 {
            width: 300px;
            height: 300px;
            background: #ffe66d;
            top: 50%;
            left: 50%;
            border-radius: 50%;
            animation-delay: -10s;
        }

        @keyframes float {
            0%, 100% { transform: translate(0, 0) scale(1); }
            33% { transform: translate(50px, -50px) scale(1.1); }
            66% { transform: translate(-30px, 30px) scale(0.9); }
        }

        .main-container {
            position: relative;
            z-index: 1;
            max-width: 1400px;
            margin: 0 auto;
        }

        /* Header Card */
        .header-card {
            background: rgba(255, 255, 255, 0.15);
            backdrop-filter: blur(20px);
            border-radius: 24px;
            padding: 35px 40px;
            margin-bottom: 25px;
            border: 1px solid rgba(255, 255, 255, 0.2);
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.1);
            animation: slideDown 0.6s ease-out;
        }

        @keyframes slideDown {
            from {
                opacity: 0;
                transform: translateY(-30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .header-title {
            font-size: 2.2rem;
            font-weight: 800;
            color: white;
            margin-bottom: 8px;
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .header-title i {
            font-size: 2.5rem;
        }

        .breadcrumb-modern {
            display: flex;
            gap: 10px;
            align-items: center;
            color: rgba(255, 255, 255, 0.8);
            font-weight: 500;
            font-size: 0.95rem;
        }

        .breadcrumb-modern a {
            color: rgba(255, 255, 255, 0.9);
            text-decoration: none;
            font-weight: 600;
            transition: all 0.3s;
        }

        .breadcrumb-modern a:hover {
            color: white;
        }

        .btn-group-modern {
            display: flex;
            gap: 12px;
            flex-wrap: wrap;
        }

        .btn-modern-primary {
            background: rgba(255, 255, 255, 0.95);
            border: none;
            color: #667eea;
            padding: 12px 24px;
            border-radius: 14px;
            font-weight: 700;
            font-size: 0.95rem;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
            display: inline-flex;
            align-items: center;
            gap: 8px;
        }

        .btn-modern-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.2);
            color: #764ba2;
        }

        .btn-modern-secondary {
            background: rgba(255, 255, 255, 0.2);
            border: 1px solid rgba(255, 255, 255, 0.3);
            color: white;
            padding: 12px 24px;
            border-radius: 14px;
            font-weight: 700;
            font-size: 0.95rem;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            display: inline-flex;
            align-items: center;
            gap: 8px;
            backdrop-filter: blur(10px);
        }

        .btn-modern-secondary:hover {
            background: rgba(255, 255, 255, 0.3);
            transform: translateY(-2px);
            color: white;
        }

        /* Alert */
        .alert-modern {
            background: rgba(255, 255, 255, 0.95);
            border: none;
            border-radius: 16px;
            padding: 18px 24px;
            margin-bottom: 25px;
            display: flex;
            align-items: center;
            gap: 15px;
            font-weight: 600;
            color: #065f46;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
            animation: slideIn 0.5s ease-out;
        }

        @keyframes slideIn {
            from {
                opacity: 0;
                transform: translateX(-30px);
            }
            to {
                opacity: 1;
                transform: translateX(0);
            }
        }

        .alert-modern i {
            font-size: 1.3rem;
            color: #10b981;
        }

        /* Content Card */
        .content-card {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(20px);
            border-radius: 24px;
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.1);
            border: 1px solid rgba(255, 255, 255, 0.3);
            overflow: hidden;
            animation: fadeInUp 0.8s ease-out;
        }

        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .content-header {
            padding: 25px 30px;
            border-bottom: 2px solid #f3f4f6;
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            gap: 20px;
        }

        .content-title {
            font-size: 1.2rem;
            font-weight: 800;
            color: #1f2937;
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .content-title i {
            color: #667eea;
            font-size: 1.4rem;
        }

        .search-box {
            position: relative;
            width: 100%;
            max-width: 320px;
        }

        .search-box input {
            width: 100%;
            padding: 12px 18px 12px 45px;
            border: 2px solid #e5e7eb;
            border-radius: 12px;
            font-size: 0.9rem;
            font-weight: 500;
            transition: all 0.3s;
            background: #f9fafb;
        }

        .search-box input:focus {
            outline: none;
            border-color: #667eea;
            background: white;
            box-shadow: 0 0 0 4px rgba(102, 126, 234, 0.1);
        }

        .search-box i {
            position: absolute;
            left: 18px;
            top: 50%;
            transform: translateY(-50%);
            color: #9ca3af;
            font-size: 1rem;
        }

        /* Modern Table */
        .table-container {
            overflow-x: auto;
        }

        .modern-table {
            width: 100%;
            border-collapse: separate;
            border-spacing: 0;
            margin: 0;
        }

        .modern-table thead {
            background: linear-gradient(135deg, #f9fafb 0%, #f3f4f6 100%);
        }

        .modern-table thead th {
            padding: 18px 20px;
            font-weight: 700;
            font-size: 0.75rem;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            color: #6b7280;
            border: none;
            white-space: nowrap;
        }

        .modern-table tbody tr {
            transition: all 0.3s;
            border-bottom: 1px solid #f3f4f6;
        }

        .modern-table tbody tr:hover {
            background: linear-gradient(135deg, #f0f9ff 0%, #e0f2fe 100%);
            transform: scale(1.01);
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
        }

        .modern-table tbody td {
            padding: 18px 20px;
            vertical-align: middle;
            border: none;
            font-size: 0.9rem;
        }

        /* Product Info */
        .product-name {
            font-weight: 700;
            color: #1f2937;
            font-size: 0.95rem;
            margin-bottom: 4px;
        }

        .product-desc {
            color: #9ca3af;
            font-size: 0.8rem;
            font-weight: 500;
        }

        /* Product Image */
        .product-image {
            width: 55px;
            height: 55px;
            border-radius: 12px;
            object-fit: cover;
            border: 3px solid white;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            transition: all 0.3s;
        }

        .product-image:hover {
            transform: scale(1.15) rotate(3deg);
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.15);
        }

        .product-placeholder {
            width: 55px;
            height: 55px;
            border-radius: 12px;
            background: linear-gradient(135deg, #e0e7ff 0%, #c7d2fe 100%);
            display: flex;
            align-items: center;
            justify-content: center;
            color: #6366f1;
            font-size: 1.5rem;
            border: 3px solid white;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        }

        /* Badges */
        .badge-modern {
            padding: 6px 14px;
            border-radius: 20px;
            font-weight: 700;
            font-size: 0.8rem;
            display: inline-flex;
            align-items: center;
            gap: 6px;
        }

        .badge-category {
            background: linear-gradient(135deg, #fef3c7 0%, #fde68a 100%);
            color: #92400e;
        }

        .badge-active {
            background: linear-gradient(135deg, #d1fae5 0%, #a7f3d0 100%);
            color: #065f46;
        }

        .badge-inactive {
            background: linear-gradient(135deg, #fee2e2 0%, #fecaca 100%);
            color: #991b1b;
        }

        .price-tag {
            font-size: 1rem;
            font-weight: 800;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .stock-indicator {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            font-weight: 700;
        }

        .stock-dot {
            width: 10px;
            height: 10px;
            border-radius: 50%;
            animation: pulse 2s infinite;
        }

        .stock-dot.high { background: #10b981; }
        .stock-dot.low { background: #f59e0b; }
        .stock-dot.critical { background: #ef4444; }

        @keyframes pulse {
            0%, 100% { opacity: 1; transform: scale(1); }
            50% { opacity: 0.7; transform: scale(0.95); }
        }

        /* Action Buttons */
        .action-buttons {
            display: flex;
            gap: 8px;
        }

        .btn-action {
            width: 38px;
            height: 38px;
            border-radius: 10px;
            border: none;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            font-size: 0.95rem;
            text-decoration: none;
        }

        .btn-view {
            background: linear-gradient(135deg, #dbeafe 0%, #bfdbfe 100%);
            color: #2563eb;
        }

        .btn-view:hover {
            background: linear-gradient(135deg, #2563eb 0%, #3b82f6 100%);
            color: white;
            transform: translateY(-3px) rotate(5deg);
            box-shadow: 0 8px 20px rgba(37, 99, 235, 0.3);
        }

        .btn-edit {
            background: linear-gradient(135deg, #fef3c7 0%, #fde68a 100%);
            color: #d97706;
        }

        .btn-edit:hover {
            background: linear-gradient(135deg, #f59e0b 0%, #fbbf24 100%);
            color: white;
            transform: translateY(-3px) rotate(-5deg);
            box-shadow: 0 8px 20px rgba(245, 158, 11, 0.3);
        }

        .btn-delete {
            background: linear-gradient(135deg, #fee2e2 0%, #fecaca 100%);
            color: #dc2626;
        }

        .btn-delete:hover {
            background: linear-gradient(135deg, #dc2626 0%, #ef4444 100%);
            color: white;
            transform: translateY(-3px) scale(1.1);
            box-shadow: 0 8px 20px rgba(220, 38, 38, 0.3);
        }

        /* Empty State */
        .empty-state {
            text-align: center;
            padding: 80px 20px;
        }

        .empty-icon {
            width: 120px;
            height: 120px;
            margin: 0 auto 30px;
            background: linear-gradient(135deg, #e0e7ff 0%, #c7d2fe 100%);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 3.5rem;
            color: #6366f1;
            animation: bounce 2s infinite;
        }

        @keyframes bounce {
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(-10px); }
        }

        .empty-title {
            font-size: 1.5rem;
            font-weight: 700;
            color: #1f2937;
            margin-bottom: 10px;
        }

        .empty-text {
            color: #6b7280;
            margin-bottom: 30px;
            font-weight: 500;
        }

        /* Pagination */
        .pagination-modern {
            padding: 25px 30px;
            border-top: 2px solid #f3f4f6;
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            gap: 20px;
        }

        .pagination-info {
            color: #6b7280;
            font-weight: 600;
            font-size: 0.9rem;
        }

        .pagination {
            margin: 0;
            gap: 8px;
        }

        .page-item .page-link {
            border: none;
            background: #f3f4f6;
            color: #6b7280;
            padding: 10px 16px;
            border-radius: 10px;
            font-weight: 700;
            transition: all 0.3s;
        }

        .page-item.active .page-link {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            box-shadow: 0 4px 15px rgba(102, 126, 234, 0.4);
        }

        .page-item .page-link:hover {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            transform: translateY(-2px);
        }

        /* Responsive */
        @media (max-width: 768px) {
            body {
                padding: 20px 10px;
            }
            
            .header-card {
                padding: 25px;
            }
            
            .header-title {
                font-size: 1.6rem;
            }
            
            .content-header {
                padding: 20px;
                flex-direction: column;
                align-items: stretch;
            }
            
            .search-box {
                max-width: 100%;
            }
            
            .btn-group-modern {
                flex-direction: column;
            }
            
            .btn-modern-primary,
            .btn-modern-secondary {
                width: 100%;
                justify-content: center;
            }
        }
    </style>
</head>
<body>

    <!-- Background Shapes -->
    <div class="bg-shapes">
        <div class="shape shape-1"></div>
        <div class="shape shape-2"></div>
        <div class="shape shape-3"></div>
    </div>

    <div class="main-container">
        
        <!-- Header Card -->
        <div class="header-card">
            <div class="d-flex justify-content-between align-items-center flex-wrap gap-3">
                <div>
                    <h1 class="header-title">
                        <i class="bi bi-box-seam-fill"></i>
                        Data Produk
                    </h1>
                    <div class="breadcrumb-modern">
                        <a href="{{ route('admin.dashboard') }}"><i class="bi bi-house-door me-1"></i>Dashboard</a>
                        <span>/</span>
                        <span>Products</span>
                    </div>
                </div>
                <div class="btn-group-modern">
                    <a href="{{ route('admin.dashboard') }}" class="btn btn-modern-secondary">
                        <i class="bi bi-arrow-left"></i>
                        <span>Kembali ke Dashboard</span>
                    </a>
                    <a href="{{ route('products.create') }}" class="btn btn-modern-primary">
                        <i class="bi bi-plus-lg"></i>
                        <span>Tambah Produk</span>
                    </a>
                </div>
            </div>
        </div>

        <!-- Alert Success -->
        @if(session('success'))
            <div class="alert-modern">
                <i class="bi bi-check-circle-fill"></i>
                <span>{{ session('success') }}</span>
                <button type="button" class="btn-close ms-auto" data-bs-dismiss="alert" style="background: none; border: none; font-size: 1.2rem;"></button>
            </div>
        @endif

        <!-- Main Content Card -->
        <div class="content-card">
            <div class="content-header">
                <h3 class="content-title">
                    <i class="bi bi-grid-3x3-gap-fill"></i>
                    Daftar Produk
                </h3>
                <div class="search-box">
                    <i class="bi bi-search"></i>
                    <input type="text" id="searchInput" placeholder="Cari produk...">
                </div>
            </div>

            <div class="table-container">
                <table class="modern-table" id="productsTable">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nama Produk</th>
                            <th>Kategori</th>
                            <th>Harga</th>
                            <th>Stok</th>
                            <th>Gambar</th>
                            <th>Status</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($products as $product)
                        <tr>
                            <td><strong>#{{ $product->id }}</strong></td>
                            <td>
                                <div class="product-name">{{ $product->name }}</div>
                                <div class="product-desc">{{ Str::limit($product->description, 40) }}</div>
                            </td>
                            <td>
                                <span class="badge-modern badge-category">
                                    <i class="bi bi-tag"></i>
                                    {{ ucfirst($product->category) }}
                                </span>
                            </td>
                            <td>
                                <div class="price-tag">Rp {{ number_format($product->price, 0, ',', '.') }}</div>
                            </td>
                            <td>
                                <div class="stock-indicator">
                                    <span class="stock-dot {{ $product->stock < 10 ? ($product->stock < 5 ? 'critical' : 'low') : 'high' }}"></span>
                                    <span>{{ $product->stock }}</span>
                                </div>
                            </td>
                            <td>
                                @if($product->image)
                                    <img src="{{ asset('storage/' . $product->image) }}" 
                                         alt="{{ $product->name }}" 
                                         class="product-image">
                                @else
                                    <div class="product-placeholder">
                                        <i class="bi bi-image"></i>
                                    </div>
                                @endif
                            </td>
                            <td>
                                @if($product->is_active)
                                    <span class="badge-modern badge-active">
                                        <i class="bi bi-check-circle-fill"></i>
                                        Aktif
                                    </span>
                                @else
                                    <span class="badge-modern badge-inactive">
                                        <i class="bi bi-x-circle-fill"></i>
                                        Nonaktif
                                    </span>
                                @endif
                            </td>
                            <td>
                                <div class="action-buttons justify-content-center">
                                    <a href="{{ route('products.show', $product->id) }}" 
                                       class="btn-action btn-view" 
                                       title="Detail">
                                        <i class="bi bi-eye"></i>
                                    </a>
                                    <a href="{{ route('products.edit', $product->id) }}" 
                                       class="btn-action btn-edit" 
                                       title="Edit">
                                        <i class="bi bi-pencil"></i>
                                    </a>
                                    <form action="{{ route('products.destroy', $product->id) }}" 
                                          method="POST" 
                                          style="display: inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" 
                                                class="btn-action btn-delete" 
                                                title="Hapus"
                                                onclick="return confirm('Yakin ingin menghapus produk ini?');">
                                            <i class="bi bi-trash"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="8">
                                <div class="empty-state">
                                    <div class="empty-icon">
                                        <i class="bi bi-inbox"></i>
                                    </div>
                                    <h3 class="empty-title">Belum Ada Produk</h3>
                                    <p class="empty-text">Mulai kelola produk Anda dengan menambahkan produk pertama</p>
                                    <a href="{{ route('products.create') }}" class="btn btn-modern-primary">
                                        <i class="bi bi-plus-lg"></i>
                                        Tambah Produk Pertama
                                    </a>
                                </div>
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            @if($products->hasPages())
            <div class="pagination-modern">
                <div class="pagination-info">
                    Menampilkan {{ $products->firstItem() }} - {{ $products->lastItem() }} dari {{ $products->total() }} produk
                </div>
                {{ $products->links('pagination::bootstrap-5') }}
            </div>
            @endif
        </div>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Search functionality
        document.getElementById('searchInput').addEventListener('input', function(e) {
            const searchTerm = e.target.value.toLowerCase();
            const table = document.getElementById('productsTable');
            const rows = table.querySelectorAll('tbody tr');
            
            rows.forEach(row => {
                const text = row.textContent.toLowerCase();
                row.style.display = text.includes(searchTerm) ? '' : 'none';
            });
        });

        // Add animation on scroll
        const observerOptions = {
            threshold: 0.1,
            rootMargin: '0px 0px -50px 0px'
        };

        const observer = new IntersectionObserver(function(entries) {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.style.opacity = '1';
                    entry.target.style.transform = 'translateY(0)';
                }
            });
        }, observerOptions);

        document.querySelectorAll('.content-card').forEach(el => {
            observer.observe(el);
        });
    </script>
</body>
</html>