<?php

namespace Lara\Console\Commands;

use Illuminate\Console\Command;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Lara\Permissions;
use Lara\Roles;
use DB;

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
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        DB::table('roles')->delete();
        DB::table('permissions')->delete();
        DB::table('users')->delete();

        Role::create(['name' => Roles::ADMIN]);
        Role::create(['name' => Roles::SUPER_ADMIN]);
        Permission::create(['name' => Permissions::CREATE_ADMIN]);

        $this->info('Create Admin');
        new Admin();
        $this->info('Create Super Admin');
        new SuperAdmin();
        $this->info('Done');
    }
}
