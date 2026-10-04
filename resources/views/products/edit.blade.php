<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Produk | {{ config('app.name', 'SABU JAYA MART') }}</title>
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
        .form-label {
            font-weight: 600;
            color: #374151;
            margin-bottom: 8px;
        }
        .form-control, .form-select {
            border: 2px solid #e5e7eb;
            border-radius: 12px;
            padding: 12px 16px;
            font-size: 0.95rem;
            transition: all 0.3s;
        }
        .form-control:focus, .form-select:focus {
            border-color: #667eea;
            box-shadow: 0 0 0 4px rgba(102, 126, 234, 0.1);
        }
        .form-control.is-invalid {
            border-color: #dc2626;
        }
        .invalid-feedback {
            color: #dc2626;
            font-size: 0.85rem;
            margin-top: 6px;
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
        .image-preview {
            width: 100%;
            max-width: 300px;
            height: 200px;
            border-radius: 16px;
            border: 3px dashed #e5e7eb;
            display: flex;
            align-items: center;
            justify-content: center;
            overflow: hidden;
            margin-top: 10px;
            transition: all 0.3s;
        }
        .image-preview:hover {
            border-color: #667eea;
        }
        .image-preview img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
        .current-image {
            margin-bottom: 15px;
        }
        .current-image img {
            width: 100%;
            max-width: 300px;
            height: 200px;
            object-fit: cover;
            border-radius: 16px;
            border: 3px solid #e5e7eb;
        }
        .form-check-input:checked {
            background-color: #667eea;
            border-color: #667eea;
        }
    </style>
</head>
<body>

<div class="container" style="max-width: 900px;">
    
    <!-- Header -->
    <div class="page-header">
        <h1><i class="bi bi-pencil-square me-2"></i>Edit Produk</h1>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="{{ route('products.index') }}">Products</a></li>
                <li class="breadcrumb-item active">Edit: {{ $product->name }}</li>
            </ol>
        </nav>
    </div>

    <!-- Form -->
    <div class="glass-card p-4 p-md-5">
        <form action="{{ route('products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            
            <div class="row g-4">
                <!-- Nama Produk -->
                <div class="col-md-6">
                    <label for="name" class="form-label">Nama Produk <span class="text-danger">*</span></label>
                    <input type="text" 
                           class="form-control @error('name') is-invalid @enderror" 
                           id="name" 
                           name="name" 
                           value="{{ old('name', $product->name) }}" 
                           placeholder="Masukkan nama produk"
                           required>
                    @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-6">
                    <label for="product_code" class="form-label">Kode Produk</label>
                    <input type="text" class="form-control @error('product_code') is-invalid @enderror"
                           id="product_code" name="product_code" value="{{ old('product_code', $product->product_code) }}"
                           placeholder="Contoh: BRG001">
                    @error('product_code')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>

                <div class="col-md-6">
                    <label for="barcode" class="form-label">Barcode</label>
                    <input type="text" class="form-control @error('barcode') is-invalid @enderror"
                           id="barcode" name="barcode" value="{{ old('barcode', $product->barcode) }}"
                           placeholder="Scan atau masukkan barcode">
                    @error('barcode')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>

                <!-- Kategori -->
                <div class="col-md-6">
                    <label for="category" class="form-label">Kategori <span class="text-danger">*</span></label>
                    <input type="text" 
                           class="form-control @error('category') is-invalid @enderror" 
                           id="category" 
                           name="category" 
                           value="{{ old('category', $product->category) }}" 
                           placeholder="Contoh: Makanan, Minuman"
                           required>
                    @error('category')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Deskripsi -->
                <div class="col-12">
                    <label for="description" class="form-label">Deskripsi</label>
                    <textarea class="form-control @error('description') is-invalid @enderror" 
                              id="description" 
                              name="description" 
                              rows="4" 
                              placeholder="Deskripsi produk (opsional)">{{ old('description', $product->description) }}</textarea>
                    @error('description')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Harga -->
                <div class="col-md-6">
                    <label for="price" class="form-label">Harga (Rp) <span class="text-danger">*</span></label>
                    <input type="number" 
                           class="form-control @error('price') is-invalid @enderror" 
                           id="price" 
                           name="price" 
                           value="{{ old('price', $product->price) }}" 
                           placeholder="0"
                           min="0"
                           step="0.01"
                           required>
                    @error('price')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Stok -->
                <div class="col-md-6">
                    <label for="stock" class="form-label">Stok <span class="text-danger">*</span></label>
                    <input type="number" 
                           class="form-control @error('stock') is-invalid @enderror" 
                           id="stock" 
                           name="stock" 
                           value="{{ old('stock', $product->stock) }}" 
                           placeholder="0"
                           min="0"
                           required>
                    @error('stock')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Gambar -->
                <div class="col-md-6">
                    <label for="image" class="form-label">Gambar Produk</label>
                    
                    @if($product->image)
                        <div class="current-image">
                            <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}">
                            <small class="text-muted d-block mt-2">Gambar saat ini</small>
                        </div>
                    @endif
                    
                    <input type="file" 
                           class="form-control @error('image') is-invalid @enderror" 
                           id="image" 
                           name="image" 
                           accept="image/*"
                           onchange="previewImage(this)">
                    @error('image')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                    <div class="image-preview" id="imagePreview">
                        <i class="bi bi-image"></i>
                    </div>
                    <small class="text-muted">Kosongkan jika tidak ingin mengubah gambar</small>
                </div>

                <!-- Status -->
                <div class="col-md-6 d-flex align-items-end">
                    <div class="form-check form-switch">
                        <input class="form-check-input" 
                               type="checkbox" 
                               id="is_active" 
                               name="is_active" 
                               value="1" 
                               {{ old('is_active', $product->is_active) ? 'checked' : '' }}>
                        <label class="form-check-label fw-bold" for="is_active">
                            Produk Aktif
                        </label>
                        <div class="form-text">Produk akan tampil di katalog jika aktif</div>
                    </div>
                </div>
            </div>

            <!-- Buttons -->
            <div class="d-flex gap-3 justify-content-end mt-5 pt-4 border-top">
                <a href="{{ route('products.index') }}" class="btn btn-secondary-modern">
                    <i class="bi bi-x-lg me-2"></i>Batal
                </a>
                <button type="submit" class="btn btn-modern">
                    <i class="bi bi-check-lg me-2"></i>Update Produk
                </button>
            </div>
        </form>
    </div>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script>
function previewImage(input) {
    const preview = document.getElementById('imagePreview');
    if (input.files && input.files[0]) {
        const reader = new FileReader();
        reader.onload = function(e) {
            preview.innerHTML = `<img src="${e.target.result}" alt="Preview">`;
        }
        reader.readAsDataURL(input.files[0]);
    }
}
</script>
</body>
</html>