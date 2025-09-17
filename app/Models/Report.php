<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    use HasFactory;

    protected $fillable = [
        'unit_id',
        'component_id',
        'user_id',
        'jenis',
        'part_number',
        'photo',
        'datetime',
        'pic',
        'hm',
        'keterangan',
    ];

    // Relasi: Report milik 1 unit
    public function unit()
    {
        return $this->belongsTo(Unit::class);
    }

    // Relasi: Report milik 1 component
    public function component()
    {
        return $this->belongsTo(Component::class);
    }

    // Relasi: Report milik 1 user
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
