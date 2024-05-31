<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class F03 extends Model
{
    use HasFactory, HasUuids, SoftDeletes;
    protected $fillable = [
        'master_form_id',
        'no_hp',
        'nama',
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
    ];

    public function form(): BelongsTo
    {
        return $this->belongsTo(MasterForm::class, 'master_form_id');
    }

    public function getAspek1AverageAttribute()
    {
        return ($this->u_1 + $this->u_2 + $this->u_3 + $this->u_4) / 4;
    }

    public function getAspek2AverageAttribute()
    {
        return ($this->u_5) / 1;
    }

    public function getAspek3AverageAttribute()
    {
        return ($this->u_6 + $this->u_7 + $this->u_8 + $this->u_9) / 4;
    }

    public function getAspek4AverageAttribute()
    {
        return ($this->u_10) / 1;
    }

    public function getAspek5AverageAttribute()
    {
        return ($this->u_11) / 1;
    }

    public function getIndexAverageAttribute()
    {
        return ($this->aspek1Average + $this->aspek2Average + $this->aspek3Average + $this->aspek4Average + $this->aspek5Average ) / 5;
    }

    //luring 
    public function getAspek1AverageLuringAttribute()
    {
        return ($this->u_1 + $this->u_2 + $this->u_3 + $this->u_4) / 4;
    }

    public function getAspek2AverageLuringAttribute()
    {
        return ($this->u_5 + $this->u_6 + $this->u_7) / 3;
    }

    public function getAspek3AverageLuringAttribute()
    {
        return ($this->u_8 + $this->u_9 + $this->u_10 + $this->u_11) / 4;
    }

    public function getAspek4AverageLuringAttribute()
    {
        return ($this->u_12 + $this->u_13) / 2;
    }

    public function getAspek5AverageLuringAttribute()
    {
        return ($this->u_14) / 1;
    }

    public function getIndexAverageLuringAttribute()
    {
        return ($this->aspek1AverageLuring + $this->aspek2AverageLuring + $this->aspek3AverageLuring + $this->aspek4AverageLuring + $this->aspek5AverageLuring ) / 5;
    }
}
