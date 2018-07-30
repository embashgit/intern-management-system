<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class project extends Model
{
    protected $fillable = [
        'name', 'description','type','status', 'user_id',
    ];

    function user(){
    	return $this->belongsTo('App\User', 'user_id');

    }
}
