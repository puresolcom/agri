<?php

namespace App\Data\Models;

use Awok\Foundation\Eloquent\Model;

class Role extends Model
{
    public $timestamps = false;

    protected $table = 'role';

    protected $guarded = [];

    protected $hidden = [];
}
