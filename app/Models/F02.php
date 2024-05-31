<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class F02 extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [
        'master_form_id',
        'verifikator_id',
        'file',
        'jenis',
        'u_1',
        'u_2',
        'u_3',
        'u_4',
        'u_5',
        'u_6',
        'u_7',
        'u_8',
        'u_9',
        'u_10',
        'u_11',
        'u_12',
        'u_13',
        'u_14',
        'u_15',
        'u_16',
        'u_17',
        'u_18',
        'u_19',
        'u_20',
        'u_21',
        'u_22',
        'u_23',
        'u_24',
        'u_25',
        'u_26',
        'u_27',
        'u_28',
        'u_29',
        'u_30',
    ];

    public function form(): BelongsTo
    {
        return $this->belongsTo(MasterForm::class, 'master_form_id');
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'verifikator_id');
    }

    public function getAspek1AverageAttribute()
    {
        return ($this->u_1 + $this->u_2 + $this->u_3 + $this->u_4 + $this->u_5 + $this->u_6 + $this->u_7 + $this->u_8 + $this->u_9) / 9;
    }

    public function getAspek2AverageAttribute()
    {
        return ($this->u_10 + $this->u_11 + $this->u_12 + $this->u_13 + $this->u_14) / 5;
    }

    public function getAspek3AverageAttribute()
    {
        return ($this->u_15 + $this->u_16 + $this->u_17 + $this->u_18 + $this->u_19 + $this->u_20) / 6;
    }

    public function getAspek4AverageAttribute()
    {
        return ($this->u_21 + $this->u_22 + $this->u_23 + $this->u_24) / 4;
    }

    public function getAspek5AverageAttribute()
    {
        return ($this->u_25 + $this->u_26 + $this->u_27 + $this->u_28) / 4;
    }

    public function getAspek6AverageAttribute()
    {
        return ($this->u_29 + $this->u_30) / 2;
    }

    public function getAspek1AveragePercentageAttribute()
    {
        return ($this->aspek1Average/ 100) * 24;
    }

    public function getAspek2AveragePercentageAttribute()
    {
        return ($this->aspek2Average / 100) * 25;
    }

    public function getAspek3AveragePercentageAttribute()
    {
        return ($this->aspek3Average / 100) * 18;
    }
    public function getAspek4AveragePercentageAttribute()
    {
        return ($this->aspek4Average / 100) * 11;
    }
    public function getAspek5AveragePercentageAttribute()
    {
        return ($this->aspek5Average / 100) * 10;
    }
    public function getAspek6AveragePercentageAttribute()
    {
        return ($this->aspek6Average / 100) * 12;
    }
}
