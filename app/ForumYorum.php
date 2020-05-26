<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ForumYorum extends Model
{
    protected $table='forum_yorumlar';
    protected  $fillable= ['forum','icerik','ust_yorum','kullanici_id'];
    public function User(){
        return $this->hasOne('App\User','id','kullanici_id');
    }
    public  function ForumKonu(){
        return $this->hasOne('App\ForumKonu','id','forum');
    }
    public function children(){
        return $this->hasMany('App\ForumYorum','ust_yorum');
    }

}
