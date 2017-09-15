<?php


namespace Lara\Console\Commands;

use Lara\Roles;
use Lara\User;
use Hash;

/**
 * Interface IAccount
 * @package Lara\Console\Commands
 */
interface IAccount
{
    public function setRole();
    public function setPermission();
}


/**
 * Class Account
 * @package Lara\Console\Commands
 */
abstract class Account implements IAccount
{
    protected $name;
    protected $email;
    protected $user;

    public function __construct()
    {
        $this->user = User::create([
            'name'     => $this->name,
            'email'    => $this->email,
            'password' => Hash::make('admin'),
        ]);
    }

    public function setRole()
    {
        $this->user->assignRole(Roles::ADMIN);
        //..
    }

    public function setPermission()
    {
        //..
    }

}