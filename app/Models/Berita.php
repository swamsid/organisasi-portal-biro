<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Berita extends Model
{
    use HasFactory, HasUuids, SoftDeletes;
    protected $fillable = [
        'judul',
        'gambar',
        'isi',
        'tags',
        'verif',
        'created_by',
        'updated_by',
        'verifikator',
        'slug'
    ];

    protected $casts = [
        'tags' => 'array',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function verifs(): BelongsTo
    {
        return $this->belongsTo(User::class, 'verifikator', 'id');
    }
}
