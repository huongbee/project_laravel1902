<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $talbe = 'categories';

    function products(){
        return $this->hasMany('App\Product','id_type','id');
        //id : local key
    }

    function billDetail(){
        return $this->hasManyThrough(
            'App\BillDetail', //namespace  cua tabel ma no se lien ket
            'App\Product', // namespace cua table trung gian
            'id_type', //
            'id_product',
            'id', //PK cua categories
            'id' // PK cua product
        );
    }

    function pageurl(){
        return $this->belongsTo('App\PageUrl','id_url','id');
    }
}
