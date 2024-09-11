<div id='DivIdToPrint'>
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
</div>
