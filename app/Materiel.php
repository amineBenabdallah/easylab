<?php

namespace App;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class materiel extends Model
{
     use SoftDeletes;

     public function categorie() 
    {
        return $this->belongsTo('App\Categorie');
    }
    public function equipes() 
    {
        return $this->hasMany('App\EquipeMateriel');
    }
    public function users() 
    {
        return $this->hasMany('App\UserMateriel');
    }
}