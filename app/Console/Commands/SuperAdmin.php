<?php
/**
 * Created by PhpStorm.
 * User: roma
 * Date: 14.09.17
 * Time: 10:28
 */

namespace Lara\Console\Commands;

use Lara\Permissions;
use Lara\Roles;

/**
 * Class SuperAdmin
 * @package Lara\Console\Commands
 */
class SuperAdmin extends Account
{

    public function setRole()
    {
        parent::setRole();
        $this->user->assignRole(Roles::SUPER_ADMIN);
    }

    public function setPermission()
    {
        parent::setPermission(); // TODO: Change the autogenerated stub
        $this->user->givePermissionTo(Permissions::CREATE_ADMIN);
    }

    public function __construct()
    {
        $this->name  = 'super-admin';
        $this->email = 'super-admin@admin.ua';
        parent::__construct();

        $this->setRole();
        $this->setPermission();
    }
}
