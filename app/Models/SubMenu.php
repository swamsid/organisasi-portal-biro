<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;

class SubMenu extends Model
{
    use HasFactory, HasUuids, SoftDeletes;

    protected $fillable = [
        "menu_id", "slug", "nama", "icon", "deskripsi"
    ];

    /**
     * Get the menu associated with the SubMenu
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function menu(): HasOne
    {
        return $this->hasOne(Menu::class, 'id', 'menu_id');
    }

    /**
     * Get all of the layanans for the SubMenu
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function layanans(): HasMany
    {
        return $this->hasMany(Layanan::class, 'sub_menu_id', 'id');
    }
}
