<?php

namespace Lara;

use Spatie\Permission\Models\Role;

class Roles extends Role
{
    const USER        = '';
    const ADMIN       = 'admin';
    const SUPER_ADMIN = 'super-admin';
}
