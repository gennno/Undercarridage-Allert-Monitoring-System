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
        'hm_new',
        'hm_current',
        'status',
    ];

    // Relasi: Component milik 1 unit
    public function unit()
    {
        return $this->belongsTo(Unit::class);
    }

    // Relasi: Component punya banyak report
    public function reports()
    {
        return $this->hasMany(Report::class);
    }
}
