<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LandingPageController extends Controller
{
    public function index()
    {
        // Contoh data buku
        $books = [
            (object) ['title' => 'The First 20 Hours', 'author' => 'Josh Kaufman', 'image' => 'book-1.jpg'],
            (object) ['title' => 'How To Accept Yourself In A World', 'author' => 'Haemin Sumin', 'image' => 'book-2.jpg'],
            // Tambahkan buku lainnya sesuai kebutuhan
        ];

        return view('landing', compact('books'));
    }
}
