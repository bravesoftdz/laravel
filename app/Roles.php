<?php

namespace Lara;

use Illuminate\Database\Eloquent\Model;

class Roles extends Model
{
    protected $table = 'roles';

    const USER        = 'user';
    const ADMIN       = 'admin';
    const SUPER_ADMIN = 'super-admin';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'guard_name'
    ];
}
