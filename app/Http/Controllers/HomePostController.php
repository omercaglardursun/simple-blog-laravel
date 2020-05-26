<?php

namespace App\Http\Controllers;

use App\ForumKonu;
use App\ForumYorum;
use App\KonuEkle;
use App\Yorum;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class HomePostController extends HomeController
{
    public function post_blog_yorum(Request $request, $slug)
    {
        if (Auth::check()) {
            $validator = Validator::make($request->all(), [
                'icerik' => 'required'
            ]);
        } else {
            $validator = Validator::make($request->all(), [
                'isim' => 'required',
                'mail' => 'required|email',
                'icerik' => 'required'
            ]);
        }
        if ($validator->fails()) {
            //return $validator->messages();
            return response(['durum' => 'error', 'baslik' => 'Hatalı', 'icerik' => 'Form Hatalı', 'hatası' => $e]);
        }
        $kategori = explode('/', $slug);
        $request->merge(['blog' => $kategori[count($kategori) - 1]]);
        if (Auth::check()) {
            $request->merge(['kullanici_id' => Auth::user()->id]);
        }
        Yorum::create($request->all());
        return response(['durum' => 'success', 'baslik' => 'Bşarılı', 'icerik' => 'Kayıt Başarılı yapıldı']);
    }

    public function post_forum_ekle(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'ana_baslik' => 'required',
            'baslik' => 'required|max:50',
            'icerik' => 'required',
        ]);
        if ($validator->fails()) {
            //return $validator->messages();
            return response(['durum' => 'error', 'baslik' => 'Hatalı', 'icerik' => 'Doldurulması zorunlu alanları doldurunuz.', 'hata' => $validator]);
        };
        try {
            $user = Auth::User()->id;
            $tarih = str_slug(Carbon::now());
            $slug = str_slug($request->baslik) . '-' . $tarih;
            $request->merge(['yazar' => $user]);
            $request->merge(['slug' => $slug]);
            ForumKonu::create($request->all());
            return response(['durum' => 'success', 'baslik' => 'Bşarılı', 'icerik' => 'Kayıt Başarılı Yapıldı']);
        } catch (\Exception $e) {
            return response(['durum' => 'error', 'baslik' => 'Hatalı', 'icerik' => 'Eklenemedi', 'hata' => $e]);
        }
    }

    public function post_forum_detay(Request $request, $ana_konu, $slug)
    {
        if (Auth::check()) {
            $validator = Validator::make($request->all(), [
                'icerik' => 'required'
            ]);
        } else {
            return redirect('/giris-yap');
        }
        if ($validator->fails()) {
            //return $validator->messages();
            return response(['durum' => 'error', 'baslik' => 'Hatalı', 'icerik' => 'Form Hatalı', 'hatası' => $e]);
        }
        $request->merge(['kullanici_id' => Auth::user()->id, 'forum' => $slug]);
        ForumYorum::create($request->all());
        return response(['durum' => 'success', 'baslik' => 'Bşarılı', 'icerik' => 'Kayıt Başarılı yapıldı']);
    }

    public function post_konu_sil(Request $request)
    {
        if (Auth::check() and Auth::user()->yetki > 0) { //güvenlik önlemi
            $durum = $request->durum;
            if ($durum == 'sil') {
                try {
                    unset($request['_token']);
                    ForumKonu::where('id', $request->id)->delete();
                    return response(['durum' => 'success', 'baslik' => 'Bşarılı', 'icerik' => 'Silme Başarılı yapıldı']);
                } catch (\Exception $e) {
                    return response(['durum' => 'error', 'baslik' => 'Hatalı', 'icerik' => 'Kayıt yapılamadı.']);
                }
            } elseif ($durum == 'gizle') {
                try {
                    unset($request['_token']);
                    ForumKonu::where('id', $request->id)->update(['göster' => '0']);
                    return response(['durum' => 'success', 'baslik' => 'Bşarılı', 'icerik' => 'Konu Gizleme yapıldı']);
                } catch (\Exception $e) {
                    return response(['durum' => 'error', 'baslik' => 'Hatalı', 'icerik' => 'Kayıt yapılamadı.']);
                }
            } elseif ($durum == 'göster') {
                try {
                    unset($request['_token']);
                    ForumKonu::where('id', $request->id)->update(['göster' => '1']);
                    return response(['durum' => 'success', 'baslik' => 'Bşarılı', 'icerik' => 'Konu Gösterme yapıldı']);
                } catch (\Exception $e) {
                    return response(['durum' => 'error', 'baslik' => 'Hatalı', 'icerik' => 'Kayıt yapılamadı.']);
                }
            }
        } else {
            return redirect('/giris-yap');
        }
    }

    public function post_locale(Request $request){
        Session::put(['locale'=>$request->locale]);
        App::setLocale(Session::get('locale'));
        unset($request['_token']);
    }
}
