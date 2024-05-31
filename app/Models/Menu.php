<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Menu extends Model
{
    use HasFactory, HasUuids, SoftDeletes;

    protected $fillable = [
        'slug',
        'nama',
        'url',
    ];

    /**
     * Get all of the submenu for the Menu
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function submenu(): HasMany
    {
        return $this->hasMany(SubMenu::class);
    }
}
