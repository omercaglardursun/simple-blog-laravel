<?php

namespace App\Http\Controllers;

use App\Anabaslik;
use App\Ayarlar;
use App\Blog;
use App\Hakkimizda;
use App\Kategori;
use Carbon\Carbon;
use http\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\Facades\Image;

class AdminPostController extends AdminController
{
    public function post_ayarlar(Request $request)
    {
        //Ayarlar::create($request->all());
        if (isset($request->logo)) {
            $validator = Validator::make($request->all(), [
                'logo' => 'mimes:jpg,jpeg,png,gif',
            ]);
            if ($validator->fails()) {
                return response(['durum' => 'error', 'baslik' => 'Hatalı', 'icerik' => 'Yüklediğiniz Dosya Uzantısı jpg,jpeg,png,gif bunlardan biri olmalıdır.']);
            }
            $logo = $request->file('logo');
            //$logo = Input::file('logo');
            $logo_uzanti = $request->file('logo')->getClientOriginalExtension();
            //$logo_uzanti = Input::file('logo')->getClientOriginalExtension();
            $logo_isim = 'logo.' . $logo_uzanti;
            Storage::disk('uploads')->makeDirectory('img');
            Image::make($logo->getRealPath())->resize(222, 108)->save('uploads/img/' . $logo_isim);
        }

        try {
            unset($request['_token']);
            if (isset($request->logo)) {
                unset($request['eski_logo']);
                Ayarlar::where('id', 1)->update($request->all());
                Ayarlar::where('id', 1)->update(['logo' => $logo_isim]);

            } else {
                $eski_logo = $request->eski_logo;
                unset($request['eski_logo']);
                Ayarlar::where('id', 1)->update($request->all());
                Ayarlar::where('id', 1)->update(['logo' => $eski_logo]);
            }
            return response(['durum' => 'success', 'baslik' => 'Bşarılı', 'icerik' => 'Kayıt Başarılı yapıldı']);
        } catch (\Exception $e) {
            return response(['durum' => 'error', 'baslik' => 'Hatalı', 'icerik' => 'Kayıt yapılamadı.']);
        }
    }
    public function post_hakkimizda(Request $request)
    {
        try {
            unset($request['_token']);
            Hakkimizda::where('id', 1)->update($request->all());
            return response(['durum' => 'success', 'baslik' => 'Bşarılı', 'icerik' => 'Kayıt Başarılı yapıldı']);

        } catch (\Exception $e) {
            return response(['durum' => 'error', 'baslik' => 'Hatalı', 'icerik' => 'Kayıt yapılamadı.']);
        }
    }
    public function post_blog_ekle(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'resimler.*' => 'required|mimes:jpg,jpeg,png,gif',
            //'resimler[]' => ['required','mimes:jpg,jpeg,png,gif'],
            'baslik' => 'required|max:250',
            'etiketler' => 'required|max:250',
            'icerik' => 'required',
            'kisaicerik' => 'required|max:300',
            'kategori' => 'required'
        ]);
        if ($validator->fails()) {
            //return $validator->messages();
            return response(['durum' => 'error', 'baslik' => 'Hatalı', 'icerik' => 'Doldurulması zorunlu alanları doldurunuz.', 'hata' => $validator]);
        }
        $tarih = str_slug(Carbon::now());
        $slug = str_slug($request->baslik) . '-' . $tarih;
        $resimler = $request->file('resimler');
        if (!empty($resimler)) {
            $i = 0;
            foreach ($resimler as $resim) {
                $resim_uzanti = $resim->getClientOriginalExtension();
                $resim_isim = $i . '.' . $resim_uzanti;
                Storage::disk('uploads')->makeDirectory('img/blog/' . $slug);
                Storage::disk('uploads')->put('img/blog/' . $slug . '/' . $resim_isim, file_get_contents($resim));
                $i++;
            }
        }
        try {
            $request->merge(['slug' => $slug]);
            Blog::create($request->all());
            return response(['durum' => 'success', 'baslik' => 'Bşarılı', 'icerik' => 'Kayıt Başarılı yapıldı']);
        } catch (\Exception $e) {
            return response(['durum' => 'error', 'baslik' => 'Hatalı', 'icerik' => 'Kayıt yapılamadı.', 'hata' => $e]);
        }
    }
    public function post_blog_sil(Request $request)
    {

        try {
            Blog::where('slug', $request->slug)->delete();
            Storage::disk('uploads')->deleteDirectory('img/blog/' . $request->slug);
            return response(['durum' => 'success', 'baslik' => 'Bşarılı', 'icerik' => 'Silme İşlemi Başarılı']);
        } catch (\Exception $e) {
            return response(['durum' => 'error', 'baslik' => 'Hatalı', 'icerik' => 'Silme İşlemi Hatalı', 'hata' => $e]);
        }

    }
    public function post_blog_duzenle($slug, Request $request)
    {
        $validator = Validator::make($request->all(), [
            'baslik' => 'required|max:250',
            'etiketler' => 'required|max:250',
            'icerik' => 'required',
            'kisaicerik' => 'required|max:300'
        ]);

        if (isset($request->resim)) {
            try {
                Storage::disk('uploads')->delete($request->resim);
                return response(['durum' => 'success', 'baslik' => 'Bşarılı', 'icerik' => 'Resim Başarılı Silindi']);
            } catch (\Exception $e) {
                return response(['durum' => 'error', 'baslik' => 'Hatalı', 'icerik' => 'Resim Silinemedi', 'hata' => $e]);
            }
        } else {
            $resimler = $request->file('resimler');
            if (!empty($resimler)) {
                $i = $request->sayi;
                $i++;
                foreach ($resimler as $resim) {
                    $resim_uzanti = $resim->getClientOriginalExtension();
                    $resim_isim = $i . '.' . $resim_uzanti;
                    Storage::disk('uploads')->makeDirectory('img/blog/' . $slug);
                    Storage::disk('uploads')->put('img/blog/' . $slug . '/' . $resim_isim, file_get_contents($resim));
                    $i++;
                }
            }
            try {
                if ($validator->fails()) {
                    //return $validator->messages();
                    return response(['durum' => 'error', 'baslik' => 'Hatalı', 'icerik' => 'Doldurulması zorunlu alanları doldurunuz.', 'hata' => $validator]);
                }
                Blog::where('slug', $slug)->update(['baslik' => $request->baslik, 'etiketler' => $request->etiketler, 'icerik' => $request->icerik, 'kisaicerik' => $request->kisaicerik]);
                return response(['durum' => 'success', 'baslik' => 'Bşarılı', 'icerik' => 'Kayıt Başarıyla Güncellendi']);
            } catch (\Exception $e) {
                return response(['durum' => 'error', 'baslik' => 'Hatalı', 'icerik' => 'Kayıt yapılamadı.', 'hata' => $e]);
            }
        }
    }
    public function post_kategori_ekle(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'ad' => 'required',
        ]);
        if ($validator->fails()) {
            //return $validator->messages();
            return response(['durum' => 'error', 'baslik' => 'Hatalı', 'icerik' => 'Kategori Adını Giriniz...', 'hata' => $validator]);
        }
        try {
            $slug = str_slug($request->ad);
            $request->merge(['slug' => $slug]);
            unset($request['_token']);
            Kategori::create($request->all());
            return response(['durum' => 'success', 'baslik' => 'Bşarılı', 'icerik' => 'Kayıt Başarılı yapıldı']);
        } catch (\Exception $e) {
            return response(['durum' => 'error', 'baslik' => 'Hatalı', 'icerik' => 'Kayıt yapılamadı.']);
        }
    }
    public function post_kategori_sil(Request $request)
    {
        try {
            unset($request['_token']);
            Kategori::where('id', $request->id)->delete();
            return response(['durum' => 'success', 'baslik' => 'Bşarılı', 'icerik' => 'Silme Başarılı yapıldı']);
        } catch (\Exception $e) {
            return response(['durum' => 'error', 'baslik' => 'Hatalı', 'icerik' => 'Kayıt yapılamadı.']);
        }
    }
    public function post_anabaslik_ekle(Request $request){
        $validator = Validator::make($request->all(), [
            'baslik' => 'required|max:50',
            'kisa_aciklama' => 'required|max:250',
        ]);
        if ($validator->fails()) {
            //return $validator->messages();
            return response(['durum' => 'error', 'baslik' => 'Hatalı', 'icerik' => 'Doldurulması zorunlu alanları doldurunuz.', 'hata' => $validator]);
        }
        $slug = str_slug($request->baslik);
        try {
            $request->merge(['slug' => $slug]);
            Anabaslik::create($request->all());
            return response(['durum' => 'success', 'baslik' => 'Bşarılı', 'icerik' => 'Kayıt Başarılı yapıldı']);
        } catch (\Exception $e) {
            return response(['durum' => 'error', 'baslik' => 'Hatalı', 'icerik' => 'Kayıt yapılamadı.', 'hata' => $e]);
        }

    }
}
