<!-- resources/views/admin/databuku.blade.php -->

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Data Buku Perpustakaan FTII UHAMKA</title>
    <!-- Font dan stylesheet untuk template -->
    <link href="{{ asset('assets/admin/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link href="{{ asset('assets/admin/css/sb-admin-2.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/admin/vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
</head>

<body id="page-top">
    <div id="wrapper">
        @include('admin.partial.sidebar')

        <!-- Konten Utama -->
        <div id="content">
            <div class="container-fluid">
                <h1 class="h3 mb-2 text-gray-800">Daftar Buku Perpustakaan</h1>

                @if(session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif

                <div class="mb-3">
                    <button class="btn btn-primary" data-toggle="modal" data-target="#modalTambahData">
                        <i class="fas fa-plus"></i> Tambah Data Buku
                    </button>
                </div>

                <!-- Tabel Data Buku -->
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Data Buku</h6>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>Id Buku</th>
                                        <th>Judul Buku</th>
                                        <th>Pengarang</th>
                                        <th>Penerbit</th>
                                        <th>Tahun Terbit</th>
                                        <th>Kategori</th>
                                        <th>Rak</th>
                                        <th>Status</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($books as $book)
                                    <tr>
                                        <td>{{ $book->id }}</td>
                                        <td>{{ $book->judul }}</td>
                                        <td>{{ $book->pengarang }}</td>
                                        <td>{{ $book->penerbit }}</td>
                                        <td>{{ $book->tahun_terbit }}</td>
                                        <td>{{ $book->kategori }}</td>
                                        <td>{{ $book->rak }}</td>
                                        <td>{{ $book->status }}</td>
                                        <td>
                                            <button class="btn btn-warning btn-sm" data-toggle="modal" data-target="#modalEditData{{ $book->id }}">
                                                <i class="fas fa-edit"></i> Edit
                                            </button>
                                            <form action="{{ route('books.destroy', $book->id) }}" method="POST" class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-danger btn-sm" onclick="return confirm('Hapus data ini?')">
                                                    <i class="fas fa-trash"></i> Hapus
                                                </button>
                                            </form>
                                        </td>
                                    </tr>

                                    <!-- Modal Edit -->
                                    <div class="modal fade" id="modalEditData{{ $book->id }}" tabindex="-1" role="dialog" aria-labelledby="modalEditDataLabel{{ $book->id }}" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="modalEditDataLabel{{ $book->id }}">Edit Data Buku</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <form action="{{ route('books.update', $book->id) }}" method="POST">
                                                    @csrf
                                                    @method('PUT')
                                                    <div class="modal-body">
                                                        <div class="form-group">
                                                            <label for="judul">Judul Buku</label>
                                                            <input type="text" class="form-control" id="judul" name="judul" value="{{ $book->judul }}" required>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="pengarang">Pengarang</label>
                                                            <input type="text" class="form-control" id="pengarang" name="pengarang" value="{{ $book->pengarang }}" required>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="penerbit">Penerbit</label>
                                                            <input type="text" class="form-control" id="penerbit" name="penerbit" value="{{ $book->penerbit }}" required>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="tahun_terbit">Tahun Terbit</label>
                                                            <input type="number" class="form-control" id="tahun_terbit" name="tahun_terbit" value="{{ $book->tahun_terbit }}" required>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="kategori">Kategori</label>
                                                            <input type="text" class="form-control" id="kategori" name="kategori" value="{{ $book->kategori }}" required>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="rak">Rak</label>
                                                            <input type="text" class="form-control" id="rak" name="rak" value="{{ $book->rak }}" required>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="status">Status</label>
                                                            <select class="form-control" id="status" name="status">
                                                                <option value="Tersedia" {{ $book->status == 'Tersedia' ? 'selected' : '' }}>Tersedia</option>
                                                                <option value="Dipinjam" {{ $book->status == 'Dipinjam' ? 'selected' : '' }}>Dipinjam</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                                        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        @include('admin.partial.footer')
    </div>

    <!-- Modal Tambah Data -->
    <div class="modal fade" id="modalTambahData" tabindex="-1" role="dialog" aria-labelledby="modalTambahDataLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalTambahDataLabel">Tambah Data Buku</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('books.store') }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="judul">Judul Buku</label>
                            <input type="text" class="form-control" id="judul" name="judul" required>
                        </div>
                        <div class="form-group">
                            <label for="pengarang">Pengarang</label>
                            <input type="text" class="form-control" id="pengarang" name="pengarang" required>
                        </div>
                        <div class="form-group">
                            <label for="penerbit">Penerbit</label>
                            <input type="text" class="form-control" id="penerbit" name="penerbit" required>
                        </div>
                        <div class="form-group">
                            <label for="tahun_terbit">Tahun Terbit</label>
                            <input type="number" class="form-control" id="tahun_terbit" name="tahun_terbit" required>
                        </div>
                        <div class="form-group">
                            <label for="kategori">Kategori</label>
                            <input type="text" class="form-control" id="kategori" name="kategori" required>
                        </div>
                        <div class="form-group">
                            <label for="rak">Rak</label>
                            <input type="text" class="form-control" id="rak" name="rak" required>
                        </div>
                        <div class="form-group">
                            <label for="status">Status</label>
                            <select class="form-control" id="status" name="status">
                                <option value="Tersedia">Tersedia</option>
                                <option value="Dipinjam">Dipinjam</option>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-primary">Tambah Buku</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="{{ asset('assets/admin/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/admin/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/admin/vendor/jquery-easing/jquery.easing.min.js') }}"></script>
    <script src="{{ asset('assets/admin/js/sb-admin-2.min.js') }}"></script>
    <script src="{{ asset('assets/admin/vendor/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/admin/vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('#dataTable').DataTable();
        });
    </script>
</body>
</html>
