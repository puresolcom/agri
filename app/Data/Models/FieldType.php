<?php

namespace App\Data\Models;

use Awok\Foundation\Eloquent\Model;

class FieldType extends Model
{
    protected $table = 'field_type';

    protected $guarded = [];

    protected $hidden = [];

    public $timestamps = true;
}
