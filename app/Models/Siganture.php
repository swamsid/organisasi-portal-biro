<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Siganture extends Model
{
    use HasFactory, SoftDeletes;
     protected $fillable = [
        'tanda_tangan',
        'user_id',
        'created_by',
        'updated_by' 
     ];

     public function user(): BelongsTo
     {
         return $this->belongsTo(User::class, 'user_id');
     }
}
