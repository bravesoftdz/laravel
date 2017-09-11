<?php

namespace Lara;

use Spatie\Permission\Models\Permission;

class Permissions extends Permission
{
    const CREATE_ADMIN         = 'create admin';
    const ADMIN_VIEW_USER_LIST = 'view user list';
}
