<?php

namespace App;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;


class categorie extends Model
{
     use SoftDeletes;

     public function materiels() 
    {
        return $this->hasMany('App\Materiel');
    }
      
}