<!DOCTYPE html>
<html>
<head>
    <title>Detail Buku: {{ $buku->judul }}</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; max-width: 800px; }
        .card { border: 1px solid #ddd; border-radius: 8px; padding: 20px; margin: 20px 0; }
        .card-header { border-bottom: 1px solid #ddd; padding-bottom: 10px; margin-bottom: 15px; }
        .card-title { font-size: 24px; margin: 0; color: #333; }
        .info-row { display: flex; margin: 10px 0; }
        .info-label { font-weight: bold; width: 150px; color: #666; }
        .info-value { flex: 1; }
        .btn { padding: 10px 15px; margin: 5px; text-decoration: none; border-radius: 4px; display: inline-block; }
        .btn-primary { background-color: #007bff; color: white; }
        .btn-warning { background-color: #ffc107; color: black; }
        .btn-secondary { background-color: #6c757d; color: white; }
        .btn-danger { background-color: #dc3545; color: white; border: none; cursor: pointer; }
        .badge { padding: 5px 10px; border-radius: 12px; font-size: 12px; font-weight: bold; }
        .badge-success { background-color: #28a745; color: white; }
    </style>
</head>
<body>
    <div class="card">
        <div class="card-header">
            <h1 class="card-title">📚 {{ $buku->judul }}</h1>
        </div>
        
        <div class="info-row">
            <div class="info-label">🆔 ID Buku:</div>
            <div class="info-value">{{ $buku->id }}</div>
        </div>
        
        <!-- Tambahan: ISBN -->
        <div class="info-row">
            <div class="info-label">🔢 ISBN:</div>
            <div class="info-value">{{ $buku->isbn }}</div>
        </div>
        
        <div class="info-row">
            <div class="info-label">📅 Tahun Terbit:</div>
            <div class="info-value">
                <span class="badge badge-success">{{ $buku->tahun_terbit }}</span>
            </div>
        </div>
        
        <div class="info-row">
            <div class="info-label">📖 Judul Buku:</div>
            <div class="info-value">{{ $buku->judul }}</div>
        </div>
        
        <div class="info-row">
            <div class="info-label">👨‍🏫 Pengarang:</div>
            <div class="info-value">{{ $buku->pengarang }}</div>
        </div>
        
        <div class="info-row">
            <div class="info-label">🏢 Penerbit:</div>
            <div class="info-value">{{ $buku->penerbit }}</div>
        </div>
        
        <!-- Kategori Buku -->
        <div class="info-row">
            <div class="info-label">📈 Kategori:</div>
            <div class="info-value">
                @if($buku->tahun_terbit >= 2023)
                    <span style="color: #28a745;">⭐ Buku Baru</span>
                @elseif($buku->tahun_terbit >= 2015)
                    <span style="color: #ffc107;">⭐⭐ Buku Standar</span>
                @else
                    <span style="color: #dc3545;">⭐⭐⭐ Buku Lama</span>
                @endif
            </div>
        </div>
    </div>
    
    <!-- Action Buttons -->
    <div style="margin-top: 20px;">
        <a href="{{ route('buku.edit', $buku->id) }}" class="btn btn-warning">
            ✏️ Edit Buku
        </a>
        
        <a href="{{ route('buku.index') }}" class="btn btn-secondary">
            ↩️ Kembali ke Daftar
        </a>
        
        <form action="{{ route('buku.destroy', $buku->id) }}" 
                method="POST" style="display: inline;">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger" 
                    onclick="return confirm('Yakin ingin menghapus buku {{ $buku->judul }}?')">
                🗑️ Hapus Buku
            </button>
        </form>
    </div>
    
    <!-- Info tambahan -->
    <div style="margin-top: 30px; padding: 15px; background-color: #f8f9fa; border-radius: 4px;">
        <h3>ℹ️ Informasi Tambahan</h3>
        <p><strong>URL:</strong> {{ request()->url() }}</p>
        <p><strong>Route Name:</strong> {{ Route::currentRouteName() }}</p>
        <p><strong>Method:</strong> {{ request()->method() }}</p>
    </div>
</body>
</html>
