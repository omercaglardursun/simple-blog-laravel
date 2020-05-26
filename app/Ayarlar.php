<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ayarlar extends Model
{
    protected $table = 'ayarlar';
    protected $fillable = ['logo', 'url', 'title', 'description', 'keywords', 'author', 'tel', 'gsm', 'faks', 'mail', 'adres', 'il', 'ilçe', 'recapctha','maps','analystic','facebook','twitter','instagram','youtube','google','smtp_user','smtp_password','smtp_host','smtp_port'];
}
