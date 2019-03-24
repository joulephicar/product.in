<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [

        'name', 'description', 'stock', 'id_user'

    ];

    public function createdById(){
        return $this->belongsTo('App\User');
    }
}
