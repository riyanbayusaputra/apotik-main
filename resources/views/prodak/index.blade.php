@extends('layouts.admin')

@section('content')
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h3 class="card-title">Daftar Produk</h3>
                    <a href="/prodak/create" class="btn btn-primary btn-sm">
                        <i class="fas fa-plus"></i> Tambah Produk
                    </a>
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table id="prodakTable" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Nama Obat</th>
                                    <th>Kategori</th>
                                    <th>Harga</th>
                                    <th>Gambar</th>
                                    <th>Deskripsi</th>
                                    <th>gejala</th>
                                    <th>usia</th>
                                    <th>Manfaat</th>
                                    <th>Dosis</th>
                                    <th>Aturan Pakai</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($prodaks as $index => $prodak)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $prodak->nama }}</td>
                                    <td>{{ $prodak->kategori }}</td>
                                    <td>Rp {{ number_format($prodak->harga, 0, ',', '.') }}</td>
                                    <td>
                                        @if ($prodak->logo)
                                            <img src="{{ asset('storage/' . $prodak->logo) }}" alt="Logo" width="100">
                                        @else
                                            <span class="text-muted">Tidak ada gambar</span>
                                        @endif
                                    </td>
                                    <td>{{ $prodak->deskripsi }}</td>
                                    <td>{{ $prodak->gejala }}</td>
                                    <td>{{ $prodak->usia }}</td>
                                    <td>{{ $prodak->manfaat }}</td>
                                    <td>{{ $prodak->dosis }}</td>
                                    <td>{{ $prodak->aturan_pakai }}</td>
                                    <td>
                                        <a href="{{ route('prodak.show', $prodak->id) }}" class="btn btn-info btn-sm">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                        <a href="{{ route('prodak.edit', $prodak->id) }}" class="btn btn-warning btn-sm">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <form action="{{ route('prodak.destroy', $prodak->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus produk ini?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div> <!-- /.table-responsive -->
                </div> <!-- /.card-body -->
            </div> <!-- /.card -->
        </div> <!-- /.container-fluid -->
    </div> <!-- /.content-header -->
</div> <!-- /.content-wrapper -->
@endsection

@push('scripts')
<script>
    $(document).ready(function() {
        $('#prodakTable').DataTable({
            responsive: true,
            autoWidth: false,
            language: {
                search: "Cari:",
                lengthMenu: "Tampilkan _MENU_ entri",
                info: "Menampilkan _START_ sampai _END_ dari _TOTAL_ entri",
                paginate: {
                    first: "Awal",
                    last: "Akhir",
                    next: "Selanjutnya",
                    previous: "Sebelumnya"
                }
            }
        });
    });
</script>
@endpush
