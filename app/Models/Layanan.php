<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Layanan extends Model
{
    use HasFactory, HasUuids, SoftDeletes;
    protected $fillable = [
        'judul',
        'isi',
        'verif',
        'tipe_pelayanan',
        'created_by',
        'updated_by',
        'verifikator',
        'sub_menu_id',
        'slug',
        'file_icon'
    ];

    protected $casts = [
        'tags' => 'array',
    ];

    public function getRouteKeyName()
    {
        return 'slug';
    }


    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function verifs(): BelongsTo
    {
        return $this->belongsTo(User::class, 'verifikator', 'id');
    }

    public function submenu(): BelongsTo
    {
        return $this->belongsTo(SubMenu::class, 'submenu_id');
    }

    public function mediaInformasi()
    {
        return $this->hasOne(MediaInformasi::class, 'layanan_id');
    }

    public function contents()
    {
        return $this->hasMany(Content::class, 'layanan_id');
    }
}
