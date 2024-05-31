<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Kategori extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [
        'nama'
    ];

    public function postingan(): HasMany
    {
        return $this->hasMany(Layanan::class, 'kategori_id', 'id');
    }
}
