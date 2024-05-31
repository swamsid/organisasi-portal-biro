<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class KategoriIndikator extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [
        'nama',
        'tipe',
        'created_by',
        'updated_by',
    ];

    public function soal(): HasMany
    {
        return $this->hasMany(MasterF02::class, 'kategori_id', 'id');
    }
    
}
