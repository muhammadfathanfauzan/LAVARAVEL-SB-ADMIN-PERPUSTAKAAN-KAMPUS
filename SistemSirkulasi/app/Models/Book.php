<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    // Menentukan nama tabel jika tidak sesuai default
    protected $table = 'books'; // Misalnya jika tabel Anda 'books'

    protected $fillable = [
        'judul',
        'pengarang',
        'penerbit',
        'tahun_terbit',
        'kategori',
        'rak',
        'status',
    ];
}

