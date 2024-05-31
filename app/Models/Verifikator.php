<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Verifikator extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'kabkot_id',
        'user_id',
        'created_by',
        'updated_by'
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function kabkot(): BelongsTo
    {
        return $this->belongsTo(Kabkot::class, 'kabkot_id');
    }
}
