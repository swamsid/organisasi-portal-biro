<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Opd extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [
        'kabkot_id',
        'user_id',
        'sub_menu_id',
        'logo',
        'nama',
        'alamat',
        'no_telp',
        'opd_id'
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function kabkot(): BelongsTo
    {
        return $this->belongsTo(Kabkot::class, 'kabkot_id');
    }

    public function kategori(): BelongsTo
    {
        return $this->belongsTo(Kategori::class, 'kategori_id');
    }

    public function submenu(): BelongsTo
    {
        return $this->belongsTo(SubMenu::class, 'sub_menu_id');
    }

    public function upt(): HasMany
    {
        return $this->hasMany(Opd::class, 'opd_id', 'id');
    }

    public function opd(): BelongsTo
    {
        return $this->belongsTo(Opd::class, 'opd_id');
    }

}
