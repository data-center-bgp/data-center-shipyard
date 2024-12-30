<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('report_stocks', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->foreignId('vessel_id')->constrained();
            $table->string('request_by');
            $table->string('project');
            $table->string('nomor_po_logistik');
            $table->string('deskripsi');
            $table->string('jenis_tipe');
            $table->integer('quantity');
            $table->string('uom');
            $table->dateTime('tanggal_request');
            $table->dateTime('actual_tiba');
            $table->integer('actual_quantity');
            $table->string('actual_uom');
            $table->string('nomor_po_berkah');
            $table->string('stock_status');
            $table->string('foto_barang_diterima');
            $table->integer('quantity_supply');
            $table->string('uom_supply');
            $table->string('nomor_po_supply');
            $table->string('status_stock_supply');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('report_stocks');
    }
};
