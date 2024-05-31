<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class jenisSubSoalForm1 extends Model
{
    use HasFactory;
    protected $fillable = [
        "name",
        "jenis_soalf1_id"
    ];

    /**
     * Get the jenisSoalForm1 that owns the jenisSubSoalForm1
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function jenisSoalForm1(): BelongsTo
    {
        return $this->belongsTo(jenisSoalForm1::class, 'jenis_soalf1_id', 'id');
    }

    /**
     * Get all of the soal for the jenisSubSoalForm1
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function soal(): HasMany
    {
        return $this->hasMany(soalForm1::class, 'sub_jenis_soalf1_id', 'id');
    }
}
