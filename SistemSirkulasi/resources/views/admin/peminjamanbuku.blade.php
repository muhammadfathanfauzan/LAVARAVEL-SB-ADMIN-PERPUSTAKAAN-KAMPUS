<!-- resources/views/admin/peminjamanbuku.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Peminjaman Buku</title>
    <!-- Custom fonts for this template -->
    <link href="{{ asset('assets/admin/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="{{ asset('assets/admin/css/sb-admin-2.min.css') }}" rel="stylesheet">
    <!-- Custom styles for this page -->
    <link href="{{ asset('assets/admin/vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
</head>

<body id="page-top">
    <div id="wrapper">
        @include('admin.partial.sidebar')

        <!-- Main Content -->
        <div id="content">
            <div class="container-fluid">
                <h1 class="h3 mb-2 text-gray-800">Daftar Peminjam Buku</h1>

                @if(session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif

                <div class="mb-3">
                    <button class="btn btn-primary" data-toggle="modal" data-target="#modalTambahData">
                        <i class="fas fa-plus"></i> Tambah Data
                    </button>
                </div>

                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Data Peminjaman</h6>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>NIM/NIP</th>
                                        <th>Nama</th>
                                        <th>Grup Anggota</th>
                                        <th>Status</th>
                                        <th>Id Buku</th>
                                        <th>Tanggal Kembali</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($peminjamans as $peminjaman)
                                        <tr>
                                            <td>{{ $peminjaman->nim_nip }}</td>
                                            <td>{{ $peminjaman->nama }}</td>
                                            <td>{{ $peminjaman->grup_anggota }}</td>
                                            <td>{{ $peminjaman->status }}</td>
                                            <td>{{ $peminjaman->tanggal_pinjam }}</td>
                                            <td>{{ $peminjaman->tanggal_kembali }}</td>
                                            <td>
                                                <form action="{{ route('peminjaman.destroy', $peminjaman->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus data ini?')">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></button>
                                                </form>
                                            </td>
                                        </tr>
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
            <form action="{{ route('peminjaman.store') }}" method="POST">
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalTambahDataLabel">Tambah Data Peminjaman</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="nim_nip">NIM/NIP</label>
                            <input type="text" name="nim_nip" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="nama">Nama</label>
                            <input type="text" name="nama" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="grup_anggota">Grup Anggota</label>
                            <input type="text" name="grup_anggota" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="status">Status</label>
                            <input type="text" name="status" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="tanggal_pinjam">Tanggal Pinjam</label>
                            <input type="date" name="tanggal_pinjam" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="tanggal_kembali">Tanggal Kembali</label>
                            <input type="date" name="tanggal_kembali" class="form-control" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <!-- Scripts -->
    <script src="{{ asset('assets/admin/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/admin/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/admin/vendor/jquery-easing/jquery.easing.min.js') }}"></script>
    <script src="{{ asset('assets/admin/js/sb-admin-2.min.js') }}"></script>
    <script src="{{ asset('assets/admin/vendor/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/admin/vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>
    <script>
        // Initialize DataTable
        $('#dataTable').DataTable();
    </script>
</body>
</html>
