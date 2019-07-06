<?php

namespace App\Data\Models;

use Awok\Foundation\Eloquent\Model;

class Field extends Model
{

    protected $table = 'field';

    protected $guarded = [];

    protected $hidden = [];

    public $timestamps = true;

    public function cropType()
    {
        return $this->hasOne(FieldType::class, 'id', 'crop_type_id');
    }

    public function createdBy()
    {
        return $this->hasOne(User::class, 'id', 'created_by');
    }

    public function processed()
    {
        return $this->hasMany(ProcessedField::class, 'field_id', 'id');
    }
}
