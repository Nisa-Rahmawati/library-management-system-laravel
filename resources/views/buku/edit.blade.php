<!DOCTYPE html>
<html>
<head>
    <title>Edit Buku: {{ $buku->judul }}</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; max-width: 600px; }
        .form-group { margin-bottom: 15px; }
        label { display: block; margin-bottom: 5px; font-weight: bold; }
        input, select, textarea { width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 4px; }
        .btn { padding: 12px 20px; margin: 5px; text-decoration: none; border: none; border-radius: 4px; cursor: pointer; }
        .btn-primary { background-color: #007bff; color: white; }
        .btn-secondary { background-color: #6c757d; color: white; }
        .btn-success { background-color: #28a745; color: white; }
        .error { color: #dc3545; font-size: 14px; margin-top: 5px; }
        .alert { padding: 15px; margin: 10px 0; border-radius: 4px; }
        .alert-danger { background-color: #f8d7da; color: #721c24; border: 1px solid #f5c6cb; }
        .info-box { background-color: #e3f2fd; padding: 15px; border-radius: 4px; border-left: 4px solid #2196f3; }
    </style>
</head>
<body>
    <h1>✏️ Edit Buku</h1>
    
    <!-- Info buku yang diedit -->
    <div class="info-box">
        <strong>📝 Sedang mengedit:</strong> {{ $buku->judul }} (ID: {{ $buku->id }})
    </div>
    
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
    
    <form action="{{ route('buku.update', $buku->id) }}" method="POST">
        @csrf
        @method('PUT')
        
        <!-- Tambahan kolom ISBN -->
        <div class="form-group">
            <label for="isbn">🔢 ISBN:</label>
            <input type="text" 
                    id="isbn" 
                    name="isbn" 
                    value="{{ old('isbn', $buku->isbn) }}" 
                    placeholder="Contoh: 978-602-8519-79-9"
                    required>
            @error('isbn')
                <div class="error">{{ $message }}</div>
            @enderror
        </div>
        
        <div class="form-group">
            <label for="judul">📚 Judul Buku:</label>
            <input type="text" 
                    id="judul" 
                    name="judul" 
                    value="{{ old('judul', $buku->judul) }}" 
                    placeholder="Contoh: Pemrograman Web"
                    required>
            @error('judul')
                <div class="error">{{ $message }}</div>
            @enderror
        </div>
        
        <div class="form-group">
            <label for="pengarang">👨‍🏫 Pengarang:</label>
            <input type="text" 
                    id="pengarang" 
                    name="pengarang" 
                    value="{{ old('pengarang', $buku->pengarang) }}" 
                    placeholder="Contoh: Budi Santoso"
                    required>
            @error('pengarang')
                <div class="error">{{ $message }}</div>
            @enderror
        </div>
        
        <div class="form-group">
            <label for="penerbit">🏢 Penerbit:</label>
            <input type="text" 
                    id="penerbit" 
                    name="penerbit" 
                    value="{{ old('penerbit', $buku->penerbit) }}" 
                    placeholder="Contoh: Elex Media"
                    required>
            @error('penerbit')
                <div class="error">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="tahun_terbit">📅 Tahun Terbit:</label>
            <input type="number" 
                    id="tahun_terbit" 
                    name="tahun_terbit" 
                    value="{{ old('tahun_terbit', $buku->tahun_terbit) }}" 
                    placeholder="Contoh: 2025"
                    required>
            @error('tahun_terbit')
                <div class="error">{{ $message }}</div>
            @enderror
        </div>
        
        <div style="margin-top: 20px;">
            <button type="submit" class="btn btn-primary">
                💾 Update Buku
            </button>
            
            <a href="{{ route('buku.show', $buku->id) }}" class="btn btn-success">
                👁️ Lihat Detail
            </a>
            
            <a href="{{ route('buku.index') }}" class="btn btn-secondary">
                ↩️ Batal
            </a>
        </div>
    </form>
    
    <!-- Informasi tambahan -->
    <div style="margin-top: 30px; padding: 15px; background-color: #f8f9fa; border-radius: 4px;">
        <h3>📋 Informasi Edit</h3>
        <p><strong>ID:</strong> {{ $buku->id }}</p>
        <p><strong>ISBN Asli:</strong> {{ $buku->isbn }}</p>
        <p><strong>Judul Asli:</strong> {{ $buku->judul }}</p>
        <p><strong>Pengarang Asli:</strong> {{ $buku->pengarang }}</p>
        <p><strong>Penerbit Asli:</strong> {{ $buku->penerbit }}</p>
        <p><strong>Tahun Terbit Asli:</strong> {{ $buku->tahun_terbit }}</p>
    </div>
</body>
</html>
