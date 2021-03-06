<?php

namespace App\Laratables;

class CustomersLaratables
{
    public static function laratablesQueryConditions($query)
    {
        return $query->whereNotIn('id', [1]);
    }
    
    public static function laratablesCustomAction($user)
    {
        return view('customers.index_action',['user'=>$user])->render();
    }

}
