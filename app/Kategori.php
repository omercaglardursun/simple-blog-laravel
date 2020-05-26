<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    protected  $table='kategoriler';
    protected $fillable=['ad','ust_kategori','slug'];
    public function parent(){
        return $this->belongsTo('App\Kategori','ust_kategori');
    }
    public function children(){
        return $this->hasMany('App\Kategori','ust_kategori');
    }
    public function bloglar(){
        return $this->hasMany('App\Blog','kategori','id');//önce ilişkilendirdiğimiz model süten sonra bulunduğumuz modelim sütunu
    }
}
