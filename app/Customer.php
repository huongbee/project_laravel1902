<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $table = 'customers';
    public $timestamps = false;

    // protected $fillable = [
    //     'name','gender','email','address','phone'
    // ];

    function bills(){
        return $this->hasMany('App\Bill','id_customer','id');
    }
    
}
