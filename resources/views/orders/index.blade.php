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
        <div>
            <select id="filter" class="form-control">
                <option value="">Filter Berdasarkan</option>
                <option value="daily" {{ request('filter') == 'daily' ? 'selected' : '' }}>Harian</option>
                <option value="weekly" {{ request('filter') == 'weekly' ? 'selected' : '' }}>Mingguan</option>
                <option value="monthly" {{ request('filter') == 'monthly' ? 'selected' : '' }}>Bulanan</option>
            </select>
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
                                        <button type="button" class="btn btn-success btn-icon" data-toggle="modal" data-target="#selesaiModal" data-id="{{ $order->id }}" title="Tandai Selesai">
                                            Selesai
                                        </button>
                                    @endif
                                </div>
                                <div class="d-flex flex-row justify-content-center">
                                    <!-- Tombol Edit -->
                                    <a href="{{ route('orders.edit', $order->id) }}" class="btn btn-warning btn-icon mr-1" title="Edit">
                                        Edit
                                    </a>
                                    <!-- Tombol Hapus -->
                                    <form action="{{ route('orders.destroy', $order->id) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-icon" onclick="return confirm('Apakah Anda yakin?')" title="Hapus">
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
                <form action="{{ route('orders.selesai', $order->id) }}" method="POST">
                    @csrf
                    @method('PATCH')
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Ya, Tandai Selesai</button>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
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
        modal.find('form').attr('action', '/orders/' + orderId + '/selesai');
    });

    $('#filter').on('change', function() {
        var filter = $(this).val();
        window.location.href = '{{ route('orders.index') }}?filter=' + filter + '&search=' + encodeURIComponent('{{ request('search') }}') + '&sort=' + '{{ request('sort') }}' + '&order=' + '{{ request('order') }}';
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
