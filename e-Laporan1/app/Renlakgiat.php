<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Renlakgiat extends Model
{
    protected $table = 'renlakgiats';
    protected $guarded = ['id'];
    public function User(){
        return $this->belongsTo('App\User','users_id');
    }
}
