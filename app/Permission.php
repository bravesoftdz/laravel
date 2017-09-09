<?php

namespace Lara;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    const CREATE_ADMIN         = 'create admin';
    const ADMIN_VIEW_USER_LIST = 'view user list';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'guard_name'
    ];
}
