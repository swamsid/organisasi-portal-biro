<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LogBerita extends Model
{
    use HasFactory;
    protected $fillable = [
        'ip_address',
        'user_agent',
        'judul',
        'id_layanan',
    ];
}
