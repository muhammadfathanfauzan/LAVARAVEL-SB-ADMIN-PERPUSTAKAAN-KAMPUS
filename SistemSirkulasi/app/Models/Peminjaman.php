<?php

// app/Models/Peminjaman.php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Peminjaman extends Model
{
    use HasFactory;

    protected $fillable = [
        'nim_nip', 'nama', 'grup_anggota', 'status', 'tanggal_pinjam', 'tanggal_kembali'
    ];

    // Melindungi kolom dari mass-assignment
    protected $guarded = ['id']; 

    // Contoh mutator untuk menyaring inputan status
    public function setStatusAttribute($value)
    {
        $this->attributes['status'] = ucfirst($value); // Memastikan status selalu dimulai dengan huruf kapital
    }

    // Contoh accessor untuk mengubah nilai kolom ketika diambil
    public function getNamaAttribute($value)
    {
        return ucfirst($value); // Mengubah nama menjadi huruf kapital pertama saat diambil
    }

    protected $table = 'peminjamans';  // Pastikan sesuai dengan nama tabel di database
}
