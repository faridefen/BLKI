<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pktp extends Model
{
    //
    protected $table = 'pktps';
    protected $guarded = ['id'];

    public function renlakgiat(){
    	return $this->belongsTo('App\renlakgiat','renlakgiat_id');
    }
}

