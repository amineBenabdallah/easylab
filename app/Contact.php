<?php

namespace App;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
	use SoftDeletes;

    protected $dates = ['deleted_at'];


    public function partenaire()
    {
    	return $this->belongsTo('App\Partenaire');
    }

}
