<?php

namespace App;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class EquipeMateriel extends Model
{
    use SoftDeletes;

    protected $dates = ['deleted_at'];

    public function equipes()
    {
        return $this->belongsTo('App\User');
    }
    public function materiels()
    {
        return $this->belongsTo('App\Materiel');
    }
}