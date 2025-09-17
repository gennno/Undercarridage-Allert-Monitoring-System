<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Unit extends Model
{
    use HasFactory;

    protected $fillable = [
        'code_number',
        'category',
        'name',
        'photo',
        'status',
    ];

    // Relasi: Unit punya banyak component
    public function components()
    {
        return $this->hasMany(Component::class);
    }

    // Relasi: Unit punya banyak report
    public function reports()
    {
        return $this->hasMany(Report::class);
    }
}
