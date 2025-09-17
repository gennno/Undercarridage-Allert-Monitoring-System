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
        'jenis',              // measurement | replacement
        'photo',
        'datetime',
        'pic',
        'hm',                 // HM saat pengukuran
        'measurement_value',  // hasil pengukuran fisik (mm)
        'percent_worn',       // opsional (bisa auto-calc)
        'lifetime_estimate',  // opsional (bisa auto-calc)
        'keterangan',
    ];

    public function unit()
    {
        return $this->belongsTo(Unit::class);
    }

    public function component()
    {
        return $this->belongsTo(Component::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // === Accessor otomatis hitung %Worn ===
    public function getPercentWornAttribute($value)
    {
        if ($value !== null) return $value;

        $component = $this->component;
        if (!$component || !$this->measurement_value) return null;

        $standar = $component->nilai_standar;
        $limit   = $component->nilai_limit;

        return round((($this->measurement_value - $standar) / ($standar - $limit)) * 100, 2);
    }

    // === Accessor otomatis hitung Lifetime Estimate ===
    public function getLifetimeEstimateAttribute($value)
    {
        if ($value !== null) return $value;

        $component = $this->component;
        if (!$component || !$this->measurement_value || !$this->hm) return null;

        $standar = $component->nilai_standar;
        $limit   = $component->nilai_limit;
        $totalWear = $standar - $limit; // mm

        $elapsedHm   = $this->hm - $component->hm_new;
        $wearMeasured = $standar - $this->measurement_value;

        if ($elapsedHm <= 0 || $wearMeasured <= 0) return null;

        $wearRate = $wearMeasured / $elapsedHm; // mm per jam
        return round($totalWear / $wearRate, 0); // Lifetime dalam jam
    }
}

