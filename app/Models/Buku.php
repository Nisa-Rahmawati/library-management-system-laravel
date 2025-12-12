<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Buku extends Model
{
    // Nama tabel
    protected $table = 'buku';
    
    // Primary key
    protected $primaryKey = 'id';
    
    // Nonaktifkan timestamps (created_at & updated_at)
    public $timestamps = false;
    
    // Kolom yang boleh diisi secara mass assignment
    protected $fillable = [
        'isbn',
        'judul',
        'pengarang',
        'penerbit',
        'tahun_terbit'
    ];
}
