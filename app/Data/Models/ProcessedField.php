<?php

namespace App\Data\Models;

use Awok\Foundation\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class ProcessedField extends Model
{
    protected $table = 'field_processed';

    protected $guarded = [];

    protected $hidden = [];

    protected $casts = [
        'processed_area' => 'integer'
    ];

    public $timestamps = false;

    protected static function boot()
    {
        parent::boot();

        static::addGlobalScope('approved', function (Builder $builder) {
            $builder->where('approved', '=', true);
        });
    }

    public function field()
    {
        return $this->hasOne(Field::class, 'id', 'field_id');
    }

    public function tractor()
    {
        return $this->hasOne(Tractor::class, 'id', 'tractor_id');
    }

    public function createdBy()
    {
        return $this->hasOne(User::class, 'id', 'created_by');
    }

    public function approvedBy()
    {
        return $this->hasOne(User::class, 'id', 'approved_by');
    }
}
