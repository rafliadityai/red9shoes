{{-- <div id='DivIdToPrint'>
    <!-- Start Invoice Print -->

    <!-- Link to external CSS file -->
    <link rel="stylesheet" type="text/css" href="css/invoice.css">

    <table class="invoice-table">
        <tr>
            <td colspan="2" align="center"><b>RED 9 SHOES LAUNDRY</b></td>
        </tr>
        <tr>
            <td colspan="2" align="center"> Jl. Jalaprang No.93, Sukaluyu, Kec. Cibeunying Kaler, Kota Bandung</td>
        </tr>
        <tr>
            <td colspan="2" align="center"><b>Contact:</b>087779275999</td>
        </tr>
        <tr>
            <td><b>Nama Client:</b> {{ $order->nama_client }}</td>
            <td align="right"><b>ID Transaksi:</b> {{ $order->id_transaksi }}</td>
        </tr>
        <tr>
            <td><b>No Handphone:</b> {{ $order->no_handphone }}</td>
            <td align="right"><b>Tanggal Masuk:</b> {{ \Carbon\Carbon::parse($order->tanggal_masuk)->locale('id')->isoFormat('dddd, D-M-Y') }}</td>
        </tr>
        <tr>
            <td colspan="2" align="center"><b>INVOICE</b></td>
        </tr>
        <tr class="heading">
            <td>Service</td>
            <td align="right">Harga (Rp)</td>
        </tr>
        <tr class="itemrows">
            <td>
                <b>{{ $order->service }}</b>
                <br>
                <i>{{ $order->jenis_sepatu }} - {{ $order->merk_sepatu }}</i>
            </td>
            <td align="right">Rp{{ number_format($order->harga, 2, ',', '.') }}</td>
        </tr>
        <tr class="total">
            <td></td>
            <td align="right"><b>Grand Total: Rp{{ number_format($order->harga, 2, ',', '.') }}</b></td>
        </tr>
        @if ($order->keluar_sepatu)
        <tr>
            <td><b>Tanggal Keluar:</b></td>
            <td align="right">{{ \Carbon\Carbon::parse($order->keluar_sepatu)->locale('id')->isoFormat('dddd, D-M-Y') }}</td>
        </tr>
        @else
        <tr>
            <td><b>Status:</b></td>
            <td align="right"><span class="badge badge-warning">Proses</span></td>
        </tr>
        @endif
        <tr>
            <td colspan="2" align="center">Terima Kasih! Sampai Jumpa Kembali</td>
        </tr>
    </table>
    <!-- End Invoice Print -->
</div> --}}
<!DOCTYPE html>
<html>
<head>
    <style>
        @page {
            size: 80mm auto; /* Set kertas 80mm lebar */
            margin: 0; /* Hapus margin untuk menghemat ruang */
        }
        body {
            font-family: monospace; /* Menggunakan font monospace untuk tampil seperti mesin tik */
            font-size: 18px; /* Ukuran font yang lebih besar */
            margin: 0;
            padding: 0;
        }
        table {
            width: 100%; /* Lebar tabel menyesuaikan dengan lebar kertas */
            border-collapse: collapse; /* Menghilangkan jarak antar border */
            margin: 0;
            padding: 0;
        }
        td {
            padding: 2px; /* Padding kecil untuk menghindari pemotongan */
            border: 1px solid black; /* Border untuk garis-garis pembatas */
            vertical-align: top; /* Menjaga agar teks di atas sel tidak terpotong */
        }
        td[colspan="2"] {
            border: none; /* Menghapus border pada sel yang menggabungkan dua kolom */
        }
        .border-bottom {
            border-bottom: 1px solid black; /* Garis bawah pada beberapa bagian */
        }
        .border-top {
            border-top: 1px solid black; /* Garis atas pada beberapa bagian */
        }
        .border-dashed {
            border-bottom: 1px dashed black; /* Garis putus-putus pada item */
        }
    </style>
</head>
<body>
    <div id='DivIdToPrint'>
        <table>
            <tr>
                <td colspan="2" align="center" class="border-bottom">
                    <b>RED 9 SHOES LAUNDRY</b>
                </td>
            </tr>
            <tr>
                <td colspan="2" align="center" class="border-bottom">
                    Jl. Jalaprang No.93
                </td>
            </tr>
            <tr>
                <td colspan="2" align="center" class="border-bottom">
                    <b>087779275999</b>
                </td>
            </tr>
            <tr>
                <td><b>Nama:</b> {{ $order->nama_client }}</td>
                <td align="right"><b>ID:</b> {{ $order->id_transaksi }}</td>
            </tr>
            <tr>
                <td><b>HP:</b> {{ $order->no_handphone }}</td>
                <td align="right"><b>Masuk:</b> {{ \Carbon\Carbon::parse($order->tanggal_masuk)->locale('id')->isoFormat('D-M-Y') }}</td>
            </tr>
            @if ($order->keluar_sepatu)
            <tr>
                <td><b>Keluar:</b></td>
                <td align="right">{{ \Carbon\Carbon::parse($order->keluar_sepatu)->locale('id')->isoFormat('D-M-Y') }}</td>
            </tr>
            @else
            <tr>
                <td><b>Status:</b></td>
                <td align="right">Proses</td>
            </tr>
            @endif
            <tr>
                <td colspan="2" align="center" class="border-top border-bottom">
                    <b>INVOICE</b>
                </td>
            </tr>
            <tr>
                <td><b>Service</b></td>
                <td align="right"><b>Harga (Rp)</b></td>
            </tr>
            <tr>
                <td class="border-dashed">
                    {{ $order->service }}<br>
                    {{ $order->jenis_sepatu }} - {{ $order->merk_sepatu }}
                </td>
                <td align="right" class="border-dashed">
                    Rp{{ number_format($order->harga, 2, ',', '.') }}
                </td>
            </tr>
            <tr>
                <td><b>Total:</b></td>
                <td align="right"><b>Rp{{ number_format($order->harga, 2, ',', '.') }}</b></td>
            </tr>
            <tr>
                <td colspan="2" align="center" class="border-top">
                    Terima Kasih!
                </td>
            </tr>
        </table>
    </div>
</body>
</html>


{{-- <div id='DivIdToPrint'>
    <table width="30%" style="font-size:12px; border-collapse: collapse;">
        <!-- Garis pembatas bagian header -->
        <tr>
            <td colspan="2" align="center" style="border-bottom: 1px solid black;">
                <b>RED 9 SHOES LAUNDRY</b>
            </td>
        </tr>
        <tr>
            <td colspan="2" align="center" style="border-bottom: 1px solid black;">
                Jl. Jalaprang No.93
            </td>
        </tr>
        <tr>
            <td colspan="2" align="center" style="border-bottom: 1px solid black;">
                <b>087779275999</b>
            </td>
        </tr>

        <!-- Informasi Klien -->
        <tr>
            <td><b>Nama:</b> {{ $order->nama_client }}</td>
            <td align="right"><b>ID:</b> {{ $order->id_transaksi }}</td>
        </tr>
        <tr>
            <td><b>HP:</b> {{ $order->no_handphone }}</td>
            <td align="right"><b>Masuk:</b> {{ \Carbon\Carbon::parse($order->tanggal_masuk)->locale('id')->isoFormat('D-M-Y') }}</td>
        </tr>

        <!-- Judul Invoice -->
        <tr>
            <td colspan="2" align="center" style="border-top: 1px solid black; border-bottom: 1px solid black;">
                <b>INVOICE</b>
            </td>
        </tr>

        <!-- Daftar Layanan dan Harga -->
        <tr>
            <td><b>Service</b></td>
            <td align="right"><b>Harga (Rp)</b></td>
        </tr>
        <tr>
            <td style="border-bottom: 1px dashed black;">
                {{ $order->service }}<br>
                {{ $order->jenis_sepatu }} - {{ $order->merk_sepatu }}
            </td>
            <td align="right" style="border-bottom: 1px dashed black;">
                Rp{{ number_format($order->harga, 2, ',', '.') }}
            </td>
        </tr>

        <!-- Total Harga -->
        <tr>
            <td><b>Total:</b></td>
            <td align="right"><b>Rp{{ number_format($order->harga, 2, ',', '.') }}</b></td>
        </tr>

        <!-- Informasi Keluar atau Status -->
        @if ($order->keluar_sepatu)
        <tr>
            <td><b>Keluar:</b></td>
            <td align="right">{{ \Carbon\Carbon::parse($order->keluar_sepatu)->locale('id')->isoFormat('D-M-Y') }}</td>
        </tr>
        @else
        <tr>
            <td><b>Status:</b></td>
            <td align="right">Proses</td>
        </tr>
        @endif

        <!-- Footer -->
        <tr>
            <td colspan="2" align="center" style="border-top: 1px solid black;">
                Terima Kasih!
            </td>
        </tr>
    </table>
</div> --}}

{{-- <div id='DivIdToPrint'>
    <table width="30%" style="font-size:12px; border-collapse: collapse;">
        <!-- Garis pembatas bagian header -->
        <tr>
            <td colspan="2" align="center" style="border-bottom: 1px solid black;">
                <b>RED 9 SHOES LAUNDRY</b>
            </td>
        </tr>
        <tr>
            <td colspan="2" align="center" style="border-bottom: 1px solid black;">
                Jl. Jalaprang No.93
            </td>
        </tr>
        <tr>
            <td colspan="2" align="center" style="border-bottom: 1px solid black;">
                <b>087779275999</b>
            </td>
        </tr>

        <!-- Informasi Klien -->
        <tr>
            <td><b>Nama:</b> {{ $order->nama_client }}</td>
            <td align="right"><b>ID:</b> {{ $order->id_transaksi }}</td>
        </tr>
        <tr>
            <td><b>HP:</b> {{ $order->no_handphone }}</td>
            <td align="right"><b>Masuk:</b> {{ \Carbon\Carbon::parse($order->tanggal_masuk)->locale('id')->isoFormat('D-M-Y') }}</td>
        </tr>

        <!-- Judul Invoice -->
        <tr>
            <td colspan="2" align="center" style="border-top: 1px solid black; border-bottom: 1px solid black;">
                <b>INVOICE</b>
            </td>
        </tr>

        <!-- Daftar Layanan dan Harga -->
        <tr>
            <td><b>Service</b></td>
            <td align="right"><b>Harga (Rp)</b></td>
        </tr>
        <tr>
            <td style="border-bottom: 1px dashed black;">
                {{ $order->service }}<br>
                {{ $order->jenis_sepatu }} - {{ $order->merk_sepatu }}
            </td>
            <td align="right" style="border-bottom: 1px dashed black;">
                Rp{{ number_format($order->harga, 2, ',', '.') }}
            </td>
        </tr>

        <!-- Total Harga -->
        <tr>
            <td><b>Total:</b></td>
            <td align="right"><b>Rp{{ number_format($order->harga, 2, ',', '.') }}</b></td>
        </tr>

        <!-- Informasi Keluar atau Status -->
        @if ($order->keluar_sepatu)
        <tr>
            <td><b>Keluar:</b></td>
            <td align="right">{{ \Carbon\Carbon::parse($order->keluar_sepatu)->locale('id')->isoFormat('D-M-Y') }}</td>
        </tr>
        @else
        <tr>
            <td><b>Status:</b></td>
            <td align="right">Proses</td>
        </tr>
        @endif

        <!-- Footer -->
        <tr>
            <td colspan="2" align="center" style="border-top: 1px solid black;">
                Terima Kasih!
            </td>
        </tr>
    </table>
</div>

<!-- JavaScript to Auto Print -->
<script type="text/javascript">
    window.onload = function() {
        window.print(); // This triggers the print dialog automatically when the page is loaded
    }
</script> --}}

