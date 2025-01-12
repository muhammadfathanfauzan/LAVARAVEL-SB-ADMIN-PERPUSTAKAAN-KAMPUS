<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Peminjaman;

class PeminjamanController extends Controller
{
    public function index()
    {
        $peminjamans = Peminjaman::all();
        return view('admin.peminjamanbuku', compact('peminjamans'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nim_nip' => 'required|string|max:50',
            'nama' => 'required|string|max:100',
            'grup_anggota' => 'required|string|max:50',
            'status' => 'required|string|max:50',
            'tanggal_pinjam' => 'required|date',
            'tanggal_kembali' => 'required|date',
        ]);

        Peminjaman::create($request->all());
        return redirect()->route('peminjaman.index')->with('success', 'Data berhasil ditambahkan.');
    }

    public function destroy($id)
    {
        $peminjaman = Peminjaman::findOrFail($id);
        $peminjaman->delete();
        return redirect()->route('peminjaman.index')->with('success', 'Data berhasil dihapus.');
    }
}
