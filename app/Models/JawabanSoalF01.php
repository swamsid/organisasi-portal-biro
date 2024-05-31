<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JawabanSoalF01 extends Model
{
    use HasFactory;

    protected $fillable = [
        "user_id",
        "form_id",
        "jawaban_json"
    ];
}
