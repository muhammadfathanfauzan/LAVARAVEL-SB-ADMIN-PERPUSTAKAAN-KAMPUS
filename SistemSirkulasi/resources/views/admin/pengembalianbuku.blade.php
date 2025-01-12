<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Pengembalian Buku</title>
    <link href="{{ asset('assets/admin/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/admin/css/sb-admin-2.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/admin/vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
</head>
<body id="page-top">
    <div id="wrapper">
        <!-- Sidebar -->
        @include('admin.partial.sidebar')

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">
            <!-- Main Content -->
            <div id="content">
                
                <div class="container mt-4">
                    <h1 class="h3 mb-4 text-gray-800">Pengembalian Buku</h1>

                    <!-- Form Pencarian -->
                    <form method="GET" action="{{ route('pengembalian.index') }}" class="form-inline mb-3">
                        <input type="text" name="search" class="form-control mr-2" placeholder="Cari NIM/NIP atau Nama" value="{{ request('search') }}">
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-search"></i> Cari
                        </button>
                    </form>

                    <!-- Tabel Data -->
                    <div class="card shadow">
                        <div class="card-header">
                            <h6 class="m-0 font-weight-bold text-primary">Data Pengembalian Buku</h6>
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
                                            <th>Tanggal Pinjam</th>
                                            <th>Id Buku</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($peminjamans as $peminjaman)
                                            <tr>
                                                <td>{{ $peminjaman->{'NIM/NIP'} }}</td>
                                                <td>{{ $peminjaman->Nama }}</td>
                                                <td>{{ $peminjaman->Grup_Anggota }}</td>
                                                <td>{{ $peminjaman->Status }}</td>
                                                <td>{{ $peminjaman->Tanggal_Pinjam }}</td>
                                                <td>{{ $peminjaman->Tanggal_Kembali }}</td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="6" class="text-center">Data tidak ditemukan</td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Footer -->
            @include('admin.partial.footer')
        </div>
    </div>

    <script src="{{ asset('assets/admin/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/admin/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/admin/vendor/jquery-easing/jquery.easing.min.js') }}"></script>
    <script src="{{ asset('assets/admin/js/sb-admin-2.min.js') }}"></script>
    <script src="{{ asset('assets/admin/vendor/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/admin/vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>
    <script>
        $('#dataTable').DataTable();
    </script>
</body>
</html>
