<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Anabaslik extends Model
{
    protected $table = 'ana_basliklar';
    protected $fillable=['baslik','kisa_aciklama','slug'];

    public function forumkonu()
    {
        return $this->hasMany('App\ForumKonu','ana_baslik','id')->orderBy('id','desc');
    }

}
