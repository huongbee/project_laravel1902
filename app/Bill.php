<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bill extends Model
{
    // bills
    protected $table = 'bills';
    // public $primaryKey = 'key';
    
    function products(){
        return $this->belongsToMany('App\Product','bill_detail','id_bill','id_product');
    }

    function billDetail(){
        return $this->hasMany('App\BillDetail','id_bill','id');
    }

    

}
