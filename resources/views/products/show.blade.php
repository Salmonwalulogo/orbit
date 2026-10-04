<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Produk | {{ config('app.name', 'SABU JAYA MART') }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    
    <style>
        * { box-sizing: border-box; }
        body {
            font-family: 'Inter', sans-serif;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            padding: 30px 20px;
        }
        .glass-card {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(20px);
            border-radius: 24px;
            border: 1px solid rgba(255, 255, 255, 0.3);
            box-shadow: 0 25px 50px rgba(0, 0, 0, 0.15);
        }
        .page-header {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 30px;
            border-radius: 24px;
            margin-bottom: 30px;
        }
        .page-header h1 {
            font-weight: 800;
            margin: 0;
            font-size: 2rem;
        }
        .page-header .breadcrumb {
            background: transparent;
            margin: 10px 0 0 0;
            padding: 0;
        }
        .page-header .breadcrumb-item a {
            color: rgba(255,255,255,0.8);
            text-decoration: none;
        }
        .product-image-large {
            width: 100%;
            height: 400px;
            object-fit: cover;
            border-radius: 20px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.2);
        }
        .no-image-large {
            width: 100%;
            height: 400px;
            background: linear-gradient(135deg, #e0e7ff, #c7d2fe);
            border-radius: 20px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #6366f1;
            font-size: 5rem;
        }
        .info-label {
            font-weight: 600;
            color: #6b7280;
            font-size: 0.9rem;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }
        .info-value {
            font-size: 1.1rem;
            color: #1f2937;
            font-weight: 500;
            margin-top: 5px;
        }
        .badge-active {
            background: #dcfce7;
            color: #166534;
            padding: 8px 16px;
            border-radius: 20px;
            font-weight: 600;
        }
        .badge-inactive {
            background: #fee2e2;
            color: #991b1b;
            padding: 8px 16px;
            border-radius: 20px;
            font-weight: 600;
        }
        .btn-modern {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            border: none;
            color: white;
            padding: 12px 28px;
            border-radius: 12px;
            font-weight: 600;
            transition: all 0.3s;
            box-shadow: 0 4px 15px rgba(102, 126, 234, 0.4);
        }
        .btn-modern:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(102, 126, 234, 0.6);
            color: white;
        }
        .btn-secondary-modern {
            background: #f3f4f6;
            border: none;
            color: #4b5563;
            padding: 12px 28px;
            border-radius: 12px;
            font-weight: 600;
            transition: all 0.3s;
        }
        .btn-secondary-modern:hover {
            background: #e5e7eb;
            color: #1f2937;
        }
        .stat-box {
            background: linear-gradient(135deg, #f0f9ff, #e0f2fe);
            border-radius: 16px;
            padding: 20px;
            text-align: center;
        }
        .stat-box i {
            font-size: 2rem;
            color: #0284c7;
            margin-bottom: 10px;
        }
        .stat-value {
            font-size: 1.8rem;
            font-weight: 800;
            color: #0c4a6e;
        }
        .stat-label {
            color: #64748b;
            font-size: 0.9rem;
        }
    </style>
</head>
<body>

<div class="container" style="max-width: 1200px;">
    
    <!-- Header -->
    <div class="page-header">
        <div class="d-flex justify-content-between align-items-center flex-wrap gap-3">
            <div>
                <h1><i class="bi bi-eye me-2"></i>Detail Produk</h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('products.index') }}">Products</a></li>
                        <li class="breadcrumb-item active">Detail</li>
                    </ol>
                </nav>
            </div>
            <div class="d-flex gap-2">
                <a href="{{ route('products.edit', $product->id) }}" class="btn btn-modern">
                    <i class="bi bi-pencil me-2"></i>Edit
                </a>
                <a href="{{ route('products.index') }}" class="btn btn-secondary-modern">
                    <i class="bi bi-arrow-left me-2"></i>Kembali
                </a>
            </div>
        </div>
    </div>

    <div class="row g-4">
        <!-- Gambar Produk -->
        <div class="col-lg-5">
            <div class="glass-card p-4">
                @if($product->image)
                    <img src="{{ asset('storage/' . $product->image) }}" 
                         alt="{{ $product->name }}" 
                         class="product-image-large">
                @else
                    <div class="no-image-large">
                        <i class="bi bi-image"></i>
                    </div>
                @endif
            </div>
        </div>

        <!-- Informasi Produk -->
        <div class="col-lg-7">
            <div class="glass-card p-4 p-md-5">
                <h2 class="fw-bold mb-4">{{ $product->name }}</h2>
                
                <div class="row g-4 mb-4">
                    <div class="col-md-6">
                        <div class="info-label">Kategori</div>
                        <div class="info-value">
                            <span class="badge bg-light text-dark border">{{ ucfirst($product->category) }}</span>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="info-label">Status</div>
                        <div class="info-value">
                            @if($product->is_active)
                                <span class="badge-active">Aktif</span>
                            @else
                                <span class="badge-inactive">Nonaktif</span>
                            @endif
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="info-label">Harga</div>
                        <div class="info-value fw-bold text-primary fs-3">
                            Rp {{ number_format($product->price, 0, ',', '.') }}
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="info-label">Stok Tersedia</div>
                        <div class="info-value {{ $product->stock < 10 ? 'text-danger fw-bold fs-3' : 'fs-3' }}">
                            {{ $product->stock }} unit
                        </div>
                    </div>
                </div>

                <div class="mb-4">
                    <div class="info-label mb-2">Deskripsi</div>
                    <div class="info-value" style="line-height: 1.8;">
                        {{ $product->description ?? 'Tidak ada deskripsi' }}
                    </div>
                </div>

                <div class="row g-3">
                    <div class="col-md-4">
                        <div class="stat-box">
                            <i class="bi bi-box-seam"></i>
                            <div class="stat-value">{{ $product->id }}</div>
                            <div class="stat-label">ID Produk</div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="stat-box">
                            <i class="bi bi-calendar"></i>
                            <div class="stat-value">
                                {{ $product->created_at ? $product->created_at->format('d/m/Y') : '-' }}
                            </div>
                            <div class="stat-label">Dibuat</div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="stat-box">
                            <i class="bi bi-clock-history"></i>
                            <div class="stat-value">
                                {{ $product->updated_at ? $product->updated_at->format('d/m/Y') : '-' }}
                            </div>
                            <div class="stat-label">Terakhir</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Tombol Hapus -->
    <div class="mt-4 text-center">
        <form action="{{ route('products.destroy', $product->id) }}" 
              method="POST" 
              class="d-inline"
              onsubmit="return confirm('Yakin ingin menghapus produk ini? Tindakan ini tidak dapat dibatalkan.');">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger btn-lg px-5">
                <i class="bi bi-trash me-2"></i>Hapus Produk
            </button>
        </form>
    </div>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>