<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Hakkimizda extends Model
{
    protected $table = 'hakkimizda';
    protected $fillable = ['vizyon','misyon','kisa_yazi','icerik'];
}
