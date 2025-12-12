<!DOCTYPE html>
<html>
<head>
    <title>Tambah Buku</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; max-width: 600px; }
        .form-group { margin-bottom: 15px; }
        label { display: block; margin-bottom: 5px; font-weight: bold; }
        input, select { width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 4px; }
        .btn { padding: 12px 20px; margin: 5px; text-decoration: none; border: none; border-radius: 4px; cursor: pointer; }
        .btn-primary { background-color: #007bff; color: white; }
        .btn-secondary { background-color: #6c757d; color: white; }
        .error { color: #dc3545; font-size: 14px; margin-top: 5px; }
        .alert { padding: 15px; margin: 10px 0; border-radius: 4px; }
        .alert-danger { background-color: #f8d7da; color: #721c24; border: 1px solid #f5c6cb; }
    </style>
</head>
<body>
    <h1>➕ Tambah Buku Baru</h1>
    
    <!-- Validation Errors -->
    @if($errors->any())
        <div class="alert alert-danger">
            <strong>❌ Terjadi kesalahan:</strong>
            <ul style="margin: 10px 0;">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    
    <form action="{{ route('buku.store') }}" method="POST">
        @csrf

        <!-- ISBN -->
        <div class="form-group">
            <label for="isbn">🔢 ISBN:</label>
            <input type="text" 
                    id="isbn" 
                    name="isbn" 
                    value="{{ old('isbn') }}" 
                    placeholder="Contoh: 978-602-03-0042-3"
                    required>
            @error('isbn')
                <div class="error">{{ $message }}</div>
            @enderror
        </div>
        
        <!-- Judul -->
        <div class="form-group">
            <label for="judul">📚 Judul Buku:</label>
            <input type="text" 
                    id="judul" 
                    name="judul" 
                    value="{{ old('judul') }}" 
                    placeholder="Contoh: Pemrograman Web"
                    required>
            @error('judul')
                <div class="error">{{ $message }}</div>
            @enderror
        </div>
        
        <!-- Pengarang -->
        <div class="form-group">
            <label for="pengarang">👨‍🏫 Pengarang:</label>
            <input type="text" 
                    id="pengarang" 
                    name="pengarang" 
                    value="{{ old('pengarang') }}" 
                    placeholder="Contoh: Budi Santoso"
                    required>
            @error('pengarang')
                <div class="error">{{ $message }}</div>
            @enderror
        </div>
        
        <!-- Penerbit -->
        <div class="form-group">
            <label for="penerbit">🏢 Penerbit:</label>
            <input type="text" 
                    id="penerbit" 
                    name="penerbit" 
                    value="{{ old('penerbit') }}" 
                    placeholder="Contoh: Elex Media"
                    required>
            @error('penerbit')
                <div class="error">{{ $message }}</div>
            @enderror
        </div>
        
        <!-- Tahun Terbit -->
        <div class="form-group">
            <label for="tahun_terbit">📅 Tahun Terbit:</label>
            <input type="number" 
                    id="tahun_terbit" 
                    name="tahun_terbit" 
                    value="{{ old('tahun_terbit') }}" 
                    placeholder="Contoh: 2025"
                    min="1000"
                    max="{{ date('Y') + 1 }}"
                    required>
            @error('tahun_terbit')
                <div class="error">{{ $message }}</div>
            @enderror
        </div>
        
        <!-- Tombol -->
        <div style="margin-top: 20px;">
            <button type="submit" class="btn btn-primary">
                💾 Simpan Buku
            </button>
            <a href="{{ route('buku.index') }}" class="btn btn-secondary">
                ↩️ Batal
            </a>
        </div>
    </form>
</body>
</html>
