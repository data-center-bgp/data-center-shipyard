<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Traits\HasRoles;

class Vessel extends Model
{
    use HasFactory, HasRoles;

    protected $fillable = [
        'name',
        'company',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
