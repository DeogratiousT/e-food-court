<?php

namespace App\Laratables;

class UsersLaratables
{
    public static function laratablesQueryConditions($query)
    {
        return $query->with([ 'roles' ]);
    }

    public static function laratablesCustomRole($user)
    {
        return $user->roles->pluck('slug');
    }

    public static function laratablesCustomState($user)
    {
        return view('users.index_status',['user'=>$user])->render();
    }

    public static function laratablesAdditionalColumns()
    {
        return ['blocked'];
    }
    
    public static function laratablesCustomAction($user)
    {
        return view('users.index_action',['user'=>$user])->render();
    }

}
