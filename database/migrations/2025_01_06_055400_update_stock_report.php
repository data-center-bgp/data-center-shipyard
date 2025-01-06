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
        Schema::table('report_stocks', function (Blueprint $table) {
            $table->dateTime('actual_tiba')->nullable()->change();
            $table->integer('actual_quantity')->nullable()->change();
            $table->string('actual_uom')->nullable()->change();
            $table->string('nomor_po_berkah')->nullable()->change();
            $table->string('stock_status')->nullable()->change();
            $table->string('foto_barang_diterima')->nullable()->change();
            $table->integer('quantity_supply')->nullable()->change();
            $table->string('uom_supply')->nullable()->change();
            $table->string('nomor_po_supply')->nullable()->change();
            $table->string('status_stock_supply')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('report_stocks', function (Blueprint $table) {
            $table->dateTime('actual_tiba')->nullable(false)->change();
            $table->integer('actual_quantity')->nullable(false)->change();
            $table->string('actual_uom')->nullable(false)->change();
            $table->string('nomor_po_berkah')->nullable(false)->change();
            $table->string('stock_status')->nullable(false)->change();
            $table->string('foto_barang_diterima')->nullable(false)->change();
            $table->integer('quantity_supply')->nullable(false)->change();
            $table->string('uom_supply')->nullable(false)->change();
            $table->string('nomor_po_supply')->nullable(false)->change();
            $table->string('status_stock_supply')->nullable(false)->change();
        });
    }
};
