<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PageUrl extends Model
{
    protected $table = 'page_url';
    
    function product(){
        return $this->hasOne('App\Product','id_url','id');
        //id: local key
    }
}
