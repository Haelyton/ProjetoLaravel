<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MemoryCard extends Model
{
    use HasFactory;

    protected $fillable = [
        'marca',
        'tipo',
        'capacidade',
        'preco'
    ];

    public function cameras()
    {
        return $this->belongsToMany(Camera::class);
    }
}
