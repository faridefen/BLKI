<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Laporan extends Model
{
    protected $table = 'laporans';
    protected $guarded = ['id'];

    public function User(){
        return $this->belongsTo('App\User','users_id');
    }
}
