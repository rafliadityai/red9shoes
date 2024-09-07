<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateOrdersTable extends Migration
{
    public function up()
    {
        Schema::table('orders', function (Blueprint $table) {
            // Drop primary key if exists (this step is optional and only needed if primary key is not set)
            if (Schema::hasColumn('orders', 'id')) {
                $table->dropPrimary('id');
                $table->dropColumn('id');
            }

            // Set 'id_transaksi' as primary key
            if (!Schema::hasColumn('orders', 'id_transaksi')) {
                $table->string('id_transaksi', 6)->primary();
            }
        });
    }

    public function down()
    {
        Schema::table('orders', function (Blueprint $table) {
            // Revert changes if needed
            $table->bigIncrements('id'); // Add back the auto-incrementing 'id' column
            $table->dropPrimary('id_transaksi'); // Remove primary key constraint from 'id_transaksi'
            $table->dropColumn('id_transaksi'); // Drop 'id_transaksi' column
        });
    }
}
