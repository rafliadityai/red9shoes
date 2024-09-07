<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            // Menjadikan id_transaksi sebagai primary key
            $table->string('id_transaksi', 6)->primary(); // Gunakan string dengan panjang 6 untuk format id_transaksi
            $table->date('tanggal_masuk');
            $table->string('nama_client');
            $table->string('no_handphone');
            $table->string('merk_sepatu');
            $table->string('jenis_sepatu');
            $table->string('service');
            $table->decimal('harga', 8, 2);
            $table->date('keluar_sepatu')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('orders');
    }
}
