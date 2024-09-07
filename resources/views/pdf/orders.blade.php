<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Order</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Kustom CSS -->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/print.css') }}">
</head>
<body>
    <div class="container">
        <h1 class="text-center my-4">Daftar Order</h1>

        @if ($orders->isEmpty())
            <p class="no-data">Belum ada order.</p>
        @else
            <table class="table table-bordered table-hover table-sm">
                <thead class="thead-dark">
                    <tr>
                        <th>ID Transaksi</th>
                        <th>Tanggal Masuk</th>
                        <th>Nama Client</th>
                        <th>No Handphone</th>
                        <th>Merk Sepatu</th>
                        <th>Jenis Sepatu</th>
                        <th>Service</th>
                        <th>Harga</th>
                        <th>Tanggal Keluar</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($orders as $order)
                        <tr>
                            <td>{{ $order->id_transaksi }}</td>
                            <td>{{ \Carbon\Carbon::parse($order->tanggal_masuk)->locale('id')->isoFormat('D MMMM Y') }}</td>
                            <td>{{ $order->nama_client }}</td>
                            <td>{{ $order->no_handphone }}</td>
                            <td>{{ $order->merk_sepatu }}</td>
                            <td>{{ $order->jenis_sepatu }}</td>
                            <td>{{ $order->service }}</td>
                            <td>Rp{{ number_format($order->harga, 2, ',', '.') }}</td>
                            <td>
                                @if ($order->keluar_sepatu)
                                    {{ \Carbon\Carbon::parse($order->keluar_sepatu)->locale('id')->isoFormat('D MMMM Y') }}
                                @else
                                    <span class="badge badge-warning">Proses</span>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>
</body>
</html>
