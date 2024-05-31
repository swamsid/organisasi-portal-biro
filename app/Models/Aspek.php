<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Aspek extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [
        'nama'  
    ];

    public function details(): HasMany
    {
        return $this->hasMany(AspekDetail::class, 'aspek_id', 'id');
    }
}
