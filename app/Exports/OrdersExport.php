<?php

namespace App\Exports;

use App\Models\Order;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class OrdersExport implements FromCollection, WithHeadings, WithMapping
{
    public function collection()
    {
        return Order::all(); // Mengambil semua data order
    }

    public function headings(): array
    {
        return [
            'ID Transaksi',
            'Tanggal Masuk',
            'Nama Client',
            'No Handphone',
            'Merk Sepatu',
            'Jenis Sepatu',
            'Service',
            'Harga',
            'Tanggal Keluar'
        ];
    }

    public function map($order): array
    {
        return [
            $order->id_transaksi,
            $order->tanggal_masuk,
            $order->nama_client,
            $order->no_handphone,
            $order->merk_sepatu,
            $order->jenis_sepatu,
            $order->service,
            $order->harga,
            $order->keluar_sepatu ? $order->keluar_sepatu : 'Proses', // Periksa jika tanggal keluar ada, jika tidak tampilkan "Proses"
        ];
    }
}
