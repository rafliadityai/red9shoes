@extends('layouts.app')

@section('content')

<div class="container mt-4">
    <h1 class="mb-4">Daftar Order</h1>

    <!-- Tombol Tambah Order dan Download PDF/Excel -->
    <div class="d-flex justify-content-between mb-3">
        <div>
            <a href="{{ route('orders.create') }}" class="btn btn-primary">Tambah Order</a>
            <a href="{{ route('orders.pdf') }}" class="btn btn-secondary">Download PDF</a>
            <a href="{{ route('orders.excel') }}" class="btn btn-success">Download Excel</a>
        </div>
    </div>
    <div class="container mt-4">
        <h1 class="mb-4">Daftar Order</h1>
    
        <!-- Filter dan Search -->
        <div class="row mb-3">
            <div class="col-md-6">
                <form method="GET" action="{{ route('orders.index') }}">
                    <div class="input-group">
                        <input type="text" name="search" class="form-control" placeholder="Cari nama client atau merk sepatu" value="{{ request('search') }}">
                        <div class="input-group-append">
                            <button class="btn btn-outline-secondary" type="submit">Cari</button>
                            @if(request('search'))
                            <button type="button" class="btn btn-outline-danger" onclick="clearSearch()">X</button>
                            @endif
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-md-6">
                <form method="GET" action="{{ route('orders.index') }}">
                    <div class="input-group">
                        <select name="filter" class="form-control">
                            <option value="">-- Filter --</option>
                            <option value="harian" {{ request('filter') == 'harian' ? 'selected' : '' }}>Harian</option>
                            <option value="mingguan" {{ request('filter') == 'mingguan' ? 'selected' : '' }}>Mingguan</option>
                            <option value="bulanan" {{ request('filter') == 'bulanan' ? 'selected' : '' }}>Bulanan</option>
                            <option value="proses" {{ request('filter') == 'proses' ? 'selected' : '' }}>Dalam Proses</option>
                            <option value="selesai" {{ request('filter') == 'selesai' ? 'selected' : '' }}>Selesai</option>
                        </select>
                        <div class="input-group-append">
                            <button class="btn btn-outline-secondary" type="submit">Terapkan</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if ($orders->isEmpty())
        <p class="text-center">Belum ada order.</p>
    @else
        <div class="table-responsive">
            <table id="orderTable" class="table table-hover table-bordered custom-table-bg">
                <thead class="thead-dark">
                    <tr>
                        <th>ID Transaksi</th>
                        <th>Tgl Masuk</th>
                        <th>Nama Client</th>
                        <th>No HP</th>
                        <th>Merk Sepatu</th>
                        <th>Jenis Sepatu</th>
                        <th>Service</th>
                        <th>Harga</th>
                        <th>Tgl Keluar</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($orders as $order)
                        <tr>
                            <td>{{ $order->id_transaksi }}</td>
                            <td>{{ \Carbon\Carbon::parse($order->tanggal_masuk)->locale('id')->isoFormat('dddd, D-M-Y') }}</td>
                            <td>{{ $order->nama_client }}</td>
                            <td>{{ $order->no_handphone }}</td>
                            <td>{{ $order->merk_sepatu }}</td>
                            <td>{{ $order->jenis_sepatu }}</td>
                            <td>{{ $order->service }}</td>
                            <td>Rp{{ number_format($order->harga, 2, ',', '.') }}</td>
                            <td>
                                @if ($order->keluar_sepatu)
                                    {{ \Carbon\Carbon::parse($order->keluar_sepatu)->locale('id')->isoFormat('dddd, D-M-Y') }}
                                @else
                                    <span class="badge badge-warning">Proses</span>
                                @endif
                            </td>
                            <td class="d-flex flex-column justify-content-between align-items-center">
                                <div class="d-flex flex-row justify-content-center mb-2">
                                    <!-- Tombol untuk Mencetak Struk -->
                                    <button type="button" class="btn btn-info btn-icon" onclick="printInvoice('{{ $order->id }}')" title="Print Struk">
                                        Print
                                    </button>

                                    <!-- Tombol untuk Menandai Selesai (jika belum selesai) -->
                                    @if (!$order->keluar_sepatu)
                                    <form action="{{ route('orders.selesai', $order->id) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('PATCH')
                                        <button type="submit" class="btn btn-success btn-icon" title="Tandai Selesai">
                                            Selesai
                                        </button>
                                    </form>
                                @endif
                                
                                </div>
                                <div class="d-flex flex-row justify-content-center">
                                    <!-- Tombol Edit -->
                                    <a href="{{ route('orders.edit', $order->id) }}" class="btn btn-warning btn-icon mr-1" title="Edit">
                                        Edit
                                    </a>
                                  <!-- Tombol Hapus -->
                                  <form action="{{ route('orders.destroy', $order->id) }}" method="POST" id="deleteForm-{{ $order->id }}">
                                    @csrf
                                    @method('DELETE')
                                    <button type="button" class="btn btn-danger" onclick="showDeleteModal('{{ $order->id }}')">
                                        Hapus
                                    </button>
                                </form>
                            
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif
</div>

<!-- Modal Konfirmasi Selesai -->
<div class="modal fade" id="selesaiModal" tabindex="-1" role="dialog" aria-labelledby="selesaiModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="selesaiModalLabel">Konfirmasi Tandai Selesai</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Apakah Anda yakin ingin menandai order ini sebagai selesai?
            </div>
            <div class="modal-footer">
                <form id="selesaiForm" method="POST">
                    @csrf
                    @method('PATCH')
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Ya, Tandai Selesai</button>
                </form>               
            </div>
        </div>
    </div>
</div>

<!-- Modal Konfirmasi Hapus -->
<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteModalLabel">Konfirmasi Hapus Order</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Masukkan password untuk menghapus order ini:</p>
                <input type="password" id="deletePassword" class="form-control" placeholder="Password">
                <small class="text-danger" id="passwordError" style="display:none;">Password salah.</small>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                <button type="button" class="btn btn-danger" id="confirmDeleteButton">Hapus</button>
            </div>
        </div>
    </div>
</div>


<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
<link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">

<script>
  let selectedOrderId = null;

function showDeleteModal(orderId) {
    selectedOrderId = orderId;  // Simpan order ID yang dipilih
    $('#deletePassword').val('');  // Kosongkan input password setiap kali modal dibuka
    $('#passwordError').hide();  // Sembunyikan pesan error setiap kali modal dibuka
    $('#deleteModal').modal('show');  // Tampilkan modal
}

// Bind event listener untuk tombol konfirmasi hapus
$('#confirmDeleteButton').off('click').on('click', function() {
    const password = $('#deletePassword').val();

    if (password === 'aliya') {  // Verifikasi password yang benar
        // Submit form yang sesuai dengan ID yang tersimpan di selectedOrderId
        $(`#deleteForm-${selectedOrderId}`).submit();  // Gunakan jQuery untuk memilih form dengan ID dinamis
    } else {
        // Jika password salah
        $('#passwordError').text('Password salah.').show();
    }
});


 

      function clearSearch() {
        // Hapus nilai input pencarian
        const searchInput = document.querySelector('input[name="search"]');
        searchInput.value = '';
        // Kirim ulang form tanpa nilai pencarian
        searchInput.form.submit();
    }
    $(document).ready(function() {
        $('#orderTable').DataTable({
            "pagingType": "simple_numbers",
            "lengthMenu": [10, 25, 50, 100],
            "language": {
                "url": "//cdn.datatables.net/plug-ins/1.11.5/i18n/Indonesian.json"
            }
        });
    });

    function printInvoice(orderId) {
        window.open(`/orders/${orderId}/print`, '_blank');
    }

    $('#selesaiModal').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget);
        var orderId = button.data('id');
        var modal = $(this);
        // Set action form untuk order yang dipilih
        modal.find('#selesaiForm').attr('action', '/orders/' + orderId + '/selesai');
    });


</script>

<style>
    .custom-table-bg {
        background-color: #f9f9f9; /* Warna background yang berbeda */
    }

    .btn-icon {
        width: auto; /* Lebar otomatis */
        height: auto; /* Tinggi otomatis */
        padding: 5px 10px; /* Padding lebih kecil */
        font-size: 0.9rem; /* Ukuran font lebih kecil */
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .d-flex.flex-column.justify-content-between.align-items-center {
        gap: 10px; /* Jarak antar baris tombol */
    }

    .d-flex.flex-row.justify-content-center {
        gap: 10px; /* Jarak antar tombol dalam satu baris */
    }

    .dataTables_wrapper .dataTables_paginate .pagination {
        justify-content: center;
    }

    .dataTables_wrapper .dataTables_length select,
    .dataTables_wrapper .dataTables_filter input {
        width: auto; /* Lebar otomatis */
    }
</style>
@endsection
