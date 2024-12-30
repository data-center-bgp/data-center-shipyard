<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ReportStock extends Model
{
    protected $fillable = [
        'user_id',
        'vessel_id',
        'request_by',
        'project',
        'nomor_po_logistik',
        'deskripsi',
        'jenis_tipe',
        'quantity',
        'uom',
        'tanggal_request',
        'actual_tiba',
        'actual_quantity',
        'actual_uom',
        'nomor_po_berkah',
        'stock_status',
        'foto_barang_diterima',
        'quantity_supply',
        'uom_supply',
        'nomor_po_supply',
        'status_stock_supply',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function vessel()
    {
        return $this->belongsTo(Vessel::class);
    }
}
