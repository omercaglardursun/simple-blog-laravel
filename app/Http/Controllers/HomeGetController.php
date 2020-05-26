<?php

namespace App\Http\Controllers;

use App\Anabaslik;
use App\Ayarlar;
use App\Blog;
use App\ForumKonu;
use App\Hakkimizda;
use App\Kategori;
use App\User;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use function GuzzleHttp\Promise\all;

class HomeGetController extends HomeController
{
    public function get_giris_yap()
    {
        return view('frontend.giris-yap');
    }
    public function get_index()
    {
        return view('frontend.index');
    }
    public function get_cikis_yap()
    {
        Auth::logout();
        return redirect('/');
    }
    public function get_index_yönlerdir()
    {
        return redirect('/');
    }
    public function get_iletisim()
    {

        return view('frontend.iletisim');

    }
    public function get_hakkimizda()
    {

        $hakkimizda = Hakkimizda::where('id', 1)->select('hakkimizda.*')->first();
        return view('frontend.hakkimizda')->with('hakkimizda', $hakkimizda);
    }
    public function get_blog()
    {
        $hakkimizda = Hakkimizda::where('id', 1)->select('hakkimizda.*')->first();
        $kategoriler = Kategori::where('ust_kategori', '0')->get();
        $bloglar = Blog::orderBy('id', 'desc')->get();
        return view('frontend.blog')->with('bloglar', $bloglar)->with('kategoriler', $kategoriler)->with('hakkimizda', $hakkimizda);
    }
    public function get_blog_icerik($slug)
    {
        $hakkimizda = Hakkimizda::where('id', 1)->select('hakkimizda.*')->first();
        $kategori = explode('/', $slug);
        $kategoriler = Kategori::where('ust_kategori', '0')->get();
        $blog = Blog::where('slug', $kategori[count($kategori) - 1])->first();
        if (isset($blog)){

            return view('frontend.blog-detay')->with('blog', $blog)->with('kategoriler', $kategoriler)->with('blog-kategori', $kategori)->with('hakkimizda', $hakkimizda);
        }else{//bu alt kısım soldaki katogorilere tıkladığımızda karsımıza gelen ona ait blogların yazıları getiriyor.
            $s=$kategori[count($kategori) - 1];//son degeri aldırıyor.
            $b=Kategori::where('slug',$s)->get();
            $bloglar =$b[0]->bloglar;
            return view('frontend.blog')->with('bloglar', $bloglar)->with('kategoriler', $kategoriler)->with('hakkimizda', $hakkimizda);

        }

    }
    public function get_blog_yazar($yazar)
    {
        $y = explode('-',$yazar); //parçalama
        $kategoriler = Kategori::where('ust_kategori', '0')->get();
        $bloglar = Blog::where('yazar', $y[count($y)-1])->orderBy('id', 'desc')->get(); //yazara ait id ye ait olanları getirdik bu sayede
        return view('frontend.blog')->with('bloglar', $bloglar)->with('kategoriler', $kategoriler);
    }
    public function get_forum(){
        $anabasliklar=Anabaslik::all();
        return view('frontend.forum')->with('anabasliklar',$anabasliklar);
    }
    public function get_forum_liste($slug){
        $anabasliklar = Anabaslik::all();
        $anabaslik=Anabaslik::where('slug',$slug)->first();
        return view('frontend.forum-liste')->with('anabaslik',$anabaslik)->with('anabasliklar',$anabasliklar);
    }
    public function get_forum_ekle(){
        $anabasliklar = Anabaslik::all();
        return view('frontend.konu-ekle')->with('anabasliklar',$anabasliklar);
    }
    public function get_forum_detay($ana_konu,$slug){
        $anabasliklar = Anabaslik::all();
        $forum = ForumKonu::where('slug',$slug)->first();
        return view('frontend.forum-detay')->with('forum', $forum)->with('anabasliklar',$anabasliklar);
    }

}
