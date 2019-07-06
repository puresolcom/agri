<?php

namespace App\Data\Models;

use Awok\Foundation\Eloquent\Model;

class Transient extends Model
{
    public $timestamps = true;

    protected $table = 'transient';

    protected $guarded = [];

    protected $hidden = [];
}