<?php

namespace Lara;

use Illuminate\Database\Eloquent\Model;

class Files extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'path', 'type','size',
    ];
}
