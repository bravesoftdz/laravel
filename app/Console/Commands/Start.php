<?php

namespace Lara\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Lara\Permissions;
use Lara\Roles;
use Lara\User;


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
        Role::create(['name' => Roles::USER]);
        Role::create(['name' => Roles::ADMIN]);
        Role::create(['name' => Roles::SUPER_ADMIN]);
    }

    private function _createAdminPermission()
    {
        Permission::create(['name' => Permissions::ADMIN_VIEW_USER_LIST]);
    }

    private function _createSuperAdminPermission()
    {
        Permission::create(['name' => Permissions::CREATE_ADMIN]);
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
        $user->assignRole(Roles::SUPER_ADMIN);
        $user->assignRole(Roles::ADMIN);

        $user->givePermissionTo(Permissions::CREATE_ADMIN);
        $user->givePermissionTo(Permissions::ADMIN_VIEW_USER_LIST);
    }
}
