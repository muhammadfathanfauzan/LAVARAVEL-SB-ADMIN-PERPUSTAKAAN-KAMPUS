<?php

namespace App\Http\Controllers;

use App\Models\Peminjaman;
use Illuminate\Http\Request;

class PengembalianController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->get('search');

        // Query untuk mengambil data peminjaman berdasarkan pencarian
        $peminjamans = Peminjaman::when($search, function ($query, $search) {
            // Gunakan whereRaw untuk kolom yang memiliki karakter khusus
            return $query->whereRaw("`NIM/NIP` LIKE ?", ["%{$search}%"])
                         ->orWhereRaw("`Nama` LIKE ?", ["%{$search}%"]);
        })->get();

        return view('admin.pengembalianbuku', compact('peminjamans'));
    }
}
