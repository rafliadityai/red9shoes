<div>
    <h4>ID Transaksi: {{ $order->id_transaksi }}</h4>
    <p><strong>Nama Client:</strong> {{ $order->nama_client }}</p>
    <p><strong>No Handphone:</strong> {{ $order->no_handphone }}</p>
    <p><strong>Tanggal Masuk:</strong> {{ \Carbon\Carbon::parse($order->tanggal_masuk)->locale('id')->isoFormat('dddd, D-M-Y') }}</p>
    <p><strong>Merk Sepatu:</strong> {{ $order->merk_sepatu }}</p>
    <p><strong>Jenis Sepatu:</strong> {{ $order->jenis_sepatu }}</p>
    <p><strong>Service:</strong> {{ $order->service }}</p>
    <p><strong>Harga:</strong> Rp{{ number_format($order->harga, 2, ',', '.') }}</p>
    @if ($order->keluar_sepatu)
        <p><strong>Tanggal Keluar:</strong> {{ \Carbon\Carbon::parse($order->keluar_sepatu)->locale('id')->isoFormat('dddd, D-M-Y') }}</p>
    @else
        <p><strong>Status:</strong> <span class="badge badge-warning">Proses</span></p>
    @endif
</div>
