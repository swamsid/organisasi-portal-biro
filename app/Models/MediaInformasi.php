<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MediaInformasi extends Model
{
    use HasFactory, HasUuids, SoftDeletes;

    protected $guarded = [];

    public function layanan()
    {
        return $this->belongsTo(Layanan::class, 'layanan_id');
    }

    public function operasional()
    {
        return $this->hasMany(Operasional::class, 'media_id');
    }

    public function detailMedia()
    {
        return $this->hasMany(MediaInformasiDetail::class, 'media_id');
    }
}
