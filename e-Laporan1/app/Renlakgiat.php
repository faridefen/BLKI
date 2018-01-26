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

    public function Pktp(){
        return $this->hasMany(pktp::class);
    }

    public function Laporan(){
        return $this->hasMany(Laporan::class);
    }

    public function Profile(){
        return $this->belongsTo('App\Profile','profile_id');
    }
}
