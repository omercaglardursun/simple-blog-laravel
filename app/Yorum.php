<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Yorum extends Model
{
    protected $table='yorumlar';
    protected  $fillable= ['isim','mail','icerik','blog','ust_yorum','kullanici_id'];
    public function user(){
        return $this->hasOne('App\User','id','kullanici_id');
    }
    public function children(){
        return $this->hasMany('App\Yorum','ust_yorum');
    }
}
