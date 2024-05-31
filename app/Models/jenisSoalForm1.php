<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class jenisSoalForm1 extends Model
{
    use HasFactory;

    protected $fillable = [
        "name"
    ];

    /**
     * Get all of the jenisSubSoal for the jenisSoalForm1
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function jenisSubSoal(): HasMany
    {
        return $this->hasMany(jenisSubSoalForm1::class, 'jenis_soalf1_id', 'id');
    }
}
