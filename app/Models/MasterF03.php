<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class MasterF03 extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [
        'unit_id',
        'indikator',
        'jenis',
        'created_by',
        'updated_by',
        'kategori_id'
    ];

    public function jawaban(): HasMany
    {
        return $this->hasMany(DetailMasterF03::class, 'header_id', 'id');
    }

    public function kategori(): BelongsTo
    {
        return $this->belongsTo(KategoriIndikator::class, 'kategori_id');
    }
}
