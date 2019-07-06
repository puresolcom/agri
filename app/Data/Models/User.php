<?php

namespace App\Data\Models;

use Awok\Foundation\Eloquent\Model;

class User extends Model
{
    protected $table = 'user';

    protected $guarded = [];

    protected $hidden = ['password', 'created_at', 'updated_at'];

    public function setRolesAttribute($value)
    {
        $this->roles()->sync($value);
    }

    public function roles()
    {
        return $this->belongsToMany(Role::class, 'user_role', 'user_id', 'role_id')->withTimestamps();
    }
}
