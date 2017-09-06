<?php

namespace Lara\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Lara\User;
use Spatie\Permission\Contracts\Role;

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

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        Role::create(['name' => 'user']);
        Role::create(['name' => 'admin']);
        Role::create(['name' => 'super-admin']);

        $id = User::create(['name' => 'admin', 'email' => 'admin@admin.ua', 'password' =>  Hash::make('admin')])->id;
        Auth::loginUsingId($id);
        $user = Auth::user();
        $user->assignRole('super-admin');
        $user->assignRole('admin');
    }
}
