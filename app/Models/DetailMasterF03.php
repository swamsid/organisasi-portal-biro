<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class DetailMasterF03 extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [
        'header_id', 
        'value',
        'jawaban',
        'created_by',
        'updated_by'
    ];

    public function soal(): BelongsTo
    {
        return $this->belongsTo(MasterF03::class, 'header_id');
    }
}
