<?php

namespace Lara;

use Illuminate\Database\Eloquent\Model;

class Files extends Model
{
    const UPLOAD_SLIDER = '/uploads/slider';
    const TYPE_SLIDER   = 'slider';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'path', 'type','size','destination',
    ];
}
