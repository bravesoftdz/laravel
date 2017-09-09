<?php

namespace Lara\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Lara\Permission;
use Lara\User;
use Spatie\Permission\Models\Role;

class Start extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:start';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    private function _createRole()
    {
        Role::create(['name' => \Lara\Roles::USER]);
        Role::create(['name' => \Lara\Roles::ADMIN]);
        Role::create(['name' => \Lara\Roles::SUPER_ADMIN]);
    }

    private function _createAdminPermission()
    {
        Permission::create(['name' => Permission::ADMIN_VIEW_USER_LIST]);
    }

    private function _createSuperAdminPermission()
    {
        Permission::create(['name' => Permission::CREATE_ADMIN]);
    }

    /**
     * @param $user
     */
    private function _assignSuperAdminRole($user)
    {
        $user->assignRole(\Lara\Roles::SUPER_ADMIN);
        $user->assignRole(\Lara\Roles::ADMIN);
    }

    /**
     * @param $user
     */
    private function _assignSuperAdminPermission($user)
    {
       $user->givePermissionTo(Permission::CREATE_ADMIN);
    }

        /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $this->_createRole();
        $this->_createSuperAdminPermission();
        $this->_createAdminPermission();

        $id = User::create(['name' => 'admin', 'email' => 'admin@admin.ua', 'password' =>  Hash::make('admin')])->id;
        Auth::loginUsingId($id);

        $user = Auth::user();
        $this->_assignSuperAdminRole($user);
        $this->_assignSuperAdminPermission($user);
    }
}
