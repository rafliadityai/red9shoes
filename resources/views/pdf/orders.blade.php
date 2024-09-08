<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Order</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Helvetica', Arial, sans-serif;
            background-color: #f8f9fa;
            color: #333;
            margin: 0;
            padding: 0;
        }

        h1 {
            font-size: 24px;
            font-weight: bold;
            color: #343a40;
            text-align: center;
            margin: 10px 0;
            border-bottom: 1px solid #343a40;
            padding-bottom: 5px;
        }

        .table {
            margin: 10px auto;
            background-color: #fff;
            border: 1px solid #343a40; /* Border luar tabel */
            border-collapse: collapse;
            width: 100%;
        }

        .thead-dark {
            background-color: #343a40;
            color: #fff;
        }

        th, td {
            text-align: center;
            vertical-align: middle;
            padding: 8px;
            border: 1px solid #343a40; /* Border dalam setiap sel */
            font-size: 12px; /* Ukuran font lebih kecil */
        }

        th {
            background-color: #495057;
            color: white;
            font-weight: bold;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        tr:hover {
            background-color: #e2e6ea;
        }

        .no-data {
            text-align: center;
            color: #6c757d;
            font-size: 14px;
            margin-top: 20px;
            font-weight: bold;
        }

        .rekap {
            margin-top: 20px;
            font-size: 14px;
            border-top: 2px solid #343a40;
            padding-top: 10px;
        }

        .rekap p {
            margin: 0;
            padding: 5px 0;
        }

        .rekap .total {
            font-weight: bold;
        }

        /* Print specific styles */
        @media print {
            body {
                font-size: 12px;
                margin: 0;
                padding: 0;
            }

            table {
                width: 100%;
                margin: 0;
                font-size: 10px; /* Ukuran font saat cetak */
                border-collapse: collapse;
            }

            th, td {
                border: 1px solid #333;
                padding: 6px; /* Padding lebih kecil */
            }

            th {
                background-color: #000;
                color: white;
            }

            .no-data {
                font-size: 12px;
            }

            .rekap {
                margin-top: 10px;
                font-size: 10px;
                border-top: 1px solid #333;
                padding-top: 5px;
            }

            @page {
                size: A4;
                margin: 10mm; /* Margin kertas lebih kecil */
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Daftar Order</h1>

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

            <div class="rekap">
                <p>Total Order: {{ $orders->count() }}</p>
                <p>Total Harga: Rp{{ number_format($orders->sum('harga'), 2, ',', '.') }}</p>
                <!-- Tambah informasi lain jika diperlukan -->
            </div>
        @endif
    </div>
</body>
</html>
