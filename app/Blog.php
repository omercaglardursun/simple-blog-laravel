<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    protected $table='bloglar';
    protected $fillable=['baslik','icerik','slug','etiketler','yazar','resim','kisaicerik','kategori'];
    public function parent(){
        return $this->belongsTo('App\Kategori','kategori','id');//Blog tablosundaki kategori sütununu kategori tablosundaki id ile eşleştirdim, en başta da da yolunu yazdım zaten Blogun içindeyiz bize kategorinin yeri lazım o yüzden onun yerinide söylüyoruz
    }
    public function yorumlar(){
        return $this->hasMany('App\Yorum','blog','slug');
    }
    public function user()
    {
        return $this->hasOne('App\User','id','yazar');//blogun yazar sütunu ile userın id sini çektik
    }
}
