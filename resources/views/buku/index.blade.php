<!DOCTYPE html>
<html>
<head>
    <title>Daftar Buku</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; }
        table { border-collapse: collapse; width: 100%; margin-top: 20px; }
        th, td { border: 1px solid #ddd; padding: 12px; text-align: left; }
        th { background-color: #4CAF50; color: white; text-align: center;}
        .btn { padding: 8px 12px; margin: 2px; text-decoration: none; border-radius: 4px; display: inline-block; }
        .btn-primary { background-color: #007bff; color: white; }
        .btn-success { background-color: #28a745; color: white; }
        .btn-warning { background-color: #ffc107; color: black; }
        .btn-danger { background-color: #dc3545; color: white; border: none; cursor: pointer; }
        .alert { padding: 15px; margin: 10px 0; border-radius: 4px; }
        .alert-success { background-color: #d4edda; color: #155724; border: 1px solid #c3e6cb; }
    </style>
</head>
<body>
    <h1>📚 Daftar Buku</h1>
    
    <!-- Success Message -->
    @if(session('success'))
        <div class="alert alert-success">
            ✅ {{ session('success') }}
        </div>
    @endif
    
    <!-- Tombol Tambah -->
    <a href="{{ route('buku.create') }}" class="btn btn-primary">
        ➕ Tambah Buku Baru
    </a>
    
    <!-- Tabel Data -->
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>ISBN</th>
                <th>Judul Buku</th>
                <th>Pengarang</th>
                <th>Penerbit</th>
                <th>Tahun Terbit</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($buku as $b)
            <tr>
                <td>{{ $b->id }}</td>
                <td>{{ $b->isbn }}</td>
                <td>{{ $b->judul }}</td>
                <td>{{ $b->pengarang }}</td>
                <td>{{ $b->penerbit }}</td>
                <td>{{ $b->tahun_terbit }}</td>
                <td>
                    <a href="{{ route('buku.show', $b->id) }}" class="btn btn-success">
                        👁️ Lihat
                    </a>
                    <a href="{{ route('buku.edit', $b->id) }}" class="btn btn-warning">
                        ✏️ Edit
                    </a>
                    
                    <form action="{{ route('buku.destroy', $b->id) }}" 
                            method="POST" style="display: inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" 
                                onclick="return confirm('Yakin ingin menghapus buku {{ $b->judul }}?')">
                            🗑️ Hapus
                        </button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="7" style="text-align: center; padding: 40px;">
                    📝 Belum ada data buku. 
                    <a href="{{ route('buku.create') }}">Tambah sekarang</a>
                </td>
            </tr>
            @endforelse
        </tbody>
    </table>

    <p style="margin-top: 20px; color: #666;">
        Total: {{ $buku->count() }} buku
    </p>
</body>
</html>
