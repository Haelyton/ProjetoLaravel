<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Camera extends Model
{
    use HasFactory;

   protected $fillable = ['marca','modelo','resolucao','preco'];

public function memoryCards()
{
    return $this->belongsToMany(MemoryCard::class);
}
}
