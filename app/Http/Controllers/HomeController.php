<?php

namespace App\Http\Controllers;

use App\Ayarlar;
use App\Locale;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;


class HomeController extends Controller
{
    public function __construct() //bu sayede her sayfada ayarlar içindeki herşeyi kullanmamıza yarıyor
    {
        $locale = Locale::all();
        $ayarlar=Ayarlar::all();
        View::share(['ayarlar'=>$ayarlar,'locale'=>$locale]);//share komutu diğer controllerlardan ulaşmamaıza yarıyor./ sonrasında wiewlara gidiğ çağırıyorum app.blade den yapıyoruz.
    }
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }
}
