<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class soalForm1 extends Model
{
    use HasFactory;

    protected $fillable = [
        'sub_jenis_soalf1_id',
        'jenis',
        'keterangan',
        'soal',
        'type_soal',
        'has_child',
        'parent_json_soal',
        'child_json_soal'
    ];

    /**
     * Get the subJenisForm1 that owns the soalForm1
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function subJenisForm1(): BelongsTo
    {
        return $this->belongsTo(jenisSubSoalForm1::class, 'sub_jenis_soalf1_id', 'id');
    }
}
