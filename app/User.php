<?php

namespace Lara;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Lara\Scopes\ActiveScope;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
    */
    protected $fillable = [
        'name', 'email', 'fb_id','password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     *
     * @return void
     */
    protected static function boot()
    {
        parent::boot();
        static::addGlobalScope(new ActiveScope());
    }

    /**
     * @param string|array $roles
     * @return array
     */
    protected static function getUserFromRole($roles): array
    {
        $users = self::all();
        $userList = [];
        foreach ($users as $user){
            if ($user->hasRole($roles)){
                $userList[] = $user;
            }
        }

        return $userList;
    }

    static function getAdminUsers()
    {
        return self::getUserFromRole(Roles::ADMIN);
    }

    static function getSuperAdminUsers()
    {
        return self::getUserFromRole(Roles::SUPER_ADMIN);
    }

    static function getUsers()
    {
        $users = self::all();
        $userList = [];
        foreach ($users as $user){
            if (!$user->hasAnyRole(Role::all())){
                $userList[] = $user;
            }
        }
        return $userList;
    }
}
