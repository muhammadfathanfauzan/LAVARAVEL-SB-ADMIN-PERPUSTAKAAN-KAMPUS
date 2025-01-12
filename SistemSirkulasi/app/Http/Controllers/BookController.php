<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    // Menampilkan halaman utama dengan daftar buku
    public function index()
    {
        $books = Book::all();  // Mengambil semua data buku
        return view('admin.databuku', compact('books'));  // Mengirimkan data buku ke view
    }

    // Menampilkan form untuk menambah buku
    public function create()
    {
        return view('admin.createbook');  // Tampilkan form tambah buku
    }

    // Menyimpan data buku baru
    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'pengarang' => 'required|string|max:255',
            'penerbit' => 'required|string|max:255',
            'tahun_terbit' => 'required|integer',
            'kategori' => 'required|string|max:255',
            'rak' => 'required|string|max:255',
            'status' => 'required|string|max:255',
        ]);

        // Menyimpan data buku
        Book::create($request->all());

        return redirect()->route('books.index')->with('success', 'Buku berhasil ditambahkan!');
    }

    // Menampilkan form untuk mengedit buku
    public function edit(Book $book)
    {
        return view('admin.editbook', compact('book'));  // Tampilkan form edit buku
    }

    // Mengupdate data buku
    public function update(Request $request, Book $book)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'pengarang' => 'required|string|max:255',
            'penerbit' => 'required|string|max:255',
            'tahun_terbit' => 'required|integer',
            'kategori' => 'required|string|max:255',
            'rak' => 'required|string|max:255',
            'status' => 'required|string|max:255',
        ]);

        // Mengupdate data buku
        $book->update($request->all());

        return redirect()->route('books.index')->with('success', 'Buku berhasil diupdate!');
    }

    // Menghapus data buku
    public function destroy(Book $book)
    {
        $book->delete();

        return redirect()->route('books.index')->with('success', 'Buku berhasil dihapus!');
    }
}
