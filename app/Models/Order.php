<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = ['number','customer_id','dish_id','number_of_packages','total_cost','custom_name','custom_ingredients','custom_cost','destination','status'];

    public function customer()
    {
        return $this->belongsTo('App\User','customer_id');
    }

    public function dish()
    {
        return $this->belongsTo('App\Models\Dish');
    }
}
