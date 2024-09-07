<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $primaryKey = 'id'; // Primary key tetap menggunakan 'id'
    public $incrementing = true; // Incrementing key untuk 'id'
    protected $keyType = 'int'; // Tipe kunci integer

    protected $fillable = [
        'tanggal_masuk',
        'nama_client',
        'no_handphone',
        'merk_sepatu',
        'jenis_sepatu',
        'service',
        'harga',
        'keluar_sepatu',
        'id_transaksi',
    ];

    public static function boot()
    {
        parent::boot();
        static::creating(function ($order) {
            // Generate id_transaksi otomatis
            $latestOrder = self::latest('id_transaksi')->first();
            $nextId = $latestOrder ? intval(substr($latestOrder->id_transaksi, -6)) + 1 : 1;
            $order->id_transaksi = str_pad($nextId, 6, '0', STR_PAD_LEFT);
        });
    }
}
