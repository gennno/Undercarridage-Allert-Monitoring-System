<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Component extends Model
{
    use HasFactory;

    protected $fillable = [
        'unit_id',
        'part_number',
        'part_name',
        'nilai_standar',   // contoh: 180 mm
        'nilai_limit',     // contoh: 158 mm
        'hm_new',          // HM saat komponen dipasang
        'hm_current',      // HM terakhir
        'status',          // aktif, diganti, rusak
    ];

    public function unit()
    {
        return $this->belongsTo(Unit::class);
    }

    public function reports()
    {
        return $this->hasMany(Report::class);
    }
}

