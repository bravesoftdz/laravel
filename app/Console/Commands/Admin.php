<?php

namespace Lara\Console\Commands;

/**
 * Class Admin
 * @package Lara\Console\Commands
 */
class Admin extends Account
{

    public function __construct()
    {
        $this->name  = 'admin';
        $this->email = 'admin@admin.ua';
        parent::__construct();

        $this->setRole();
        $this->setPermission();
    }
}