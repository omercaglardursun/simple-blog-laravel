@extends('frontend.app')
@section('icerik')

    <div role="main" class="main">

        <section class="page-header">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <ul class="breadcrumb">
                            <li><a href="#">Home</a></li>
                            <li class="active">Blog</li>
                        </ul>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <h1>Large Image</h1>
                    </div>
                </div>
            </div>
        </section>
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <div class="container">

            <div class="row">
                <div class="col-md-9">
                    <div class="blog-posts">
                        @foreach($anabasliklar as $anabaslik)
                            <article class="post post-large" style="background: gainsboro">
                            <div class="post-content">
                                <h2><a href="/forum/{{$anabaslik->slug}}">{{$anabaslik->baslik}}</a></h2>
                                <p>{{$anabaslik->kisa_aciklama}}</p>

                        <hr class="hr">
                                @foreach($anabaslik->forumkonu->take('4') as $konu)
                                    @if(($konu->göster==1) or (Auth::check() and Auth::user()->yetki>0))

                                    <article class="post post-large">
                                        <div class="post-date">
                                            <span class="day">{{$konu->created_at->formatLocalized('%d')}}</span>
                                            <span class="month">{{$konu->created_at->formatLocalized('%b')}}</span>
                                        </div>
                                        <div class="post-content">
                                            <h2><a href="/forum/{{$anabaslik->slug}}/{{$konu->slug}}">{{$konu->baslik}}</a></h2>
                                            <div class="post-meta">
                                                <span><i class="fa fa-user"></i> By <a href="#">{{$konu->user->name}}</a> </span>
                                                <span><i class="fa fa-tag"></i>
                                            @php($e=$konu->etiketler)
                                                    @php($etiketler=explode(',',$e))
                                                    @foreach($etiketler as $etiket)
                                                        <a href="/blog/etiket/{{str_slug($etiket)}}">{{$etiket}}</a>
                                                    @endforeach
                                        </span>
                                                <span><i class="fa fa-comments"></i> <a href="#">12 Comments</a></span>
                                                @if(Auth::check())
                                                    @if(Auth::user()->yetki>0)
                                                        <span><i class="fa fa-comments"></i> <a href="#"
                                                                                                onclick="konusil('sil','{{$konu->id}}')">Konuyu Sil</a></span>
                                                        @if($konu->göster==1)
                                                            <span><i class="fa fa-comments"></i> <a href="#"
                                                                                                    onclick="konusil('gizle','{{$konu->id}}')">Konuyu Gizle</a></span>
                                                        @else
                                                            <span><i class="fa fa-comments"></i> <a href="#" onclick="konusil('göster','{{$konu->id}}')">Konuyu Göster</a></span>
                                                        @endif
                                                    @endif
                                                @endif
                                            </div>
                                        </div>
                                    </article>
                                    @endif
                                @endforeach
                            </div>
                        </article>
                        @endforeach
                        <ul class="pagination pagination-lg pull-right">
                            <li><a href="#">«</a></li>
                            <li class="active"><a href="#">1</a></li>
                            <li><a href="#">2</a></li>
                            <li><a href="#">3</a></li>
                            <li><a href="#">»</a></li>
                        </ul>
                    </div>
                </div>

@include('frontend.forum-side-bar')
            </div>

        </div>

    </div>



    @endsection
@section('js')
    <script src="/js/jquery.form.min.js"></script>
    <script src="/js/sweetalert2.all.min.js"></script>
    <script>
        function konusil(durum, id) {
            Swal.fire({
                title: 'Yapmak İstediğinize Emin Misiniz.',
                text: "Geri dönüşü olmuyacak",
                icon: 'warning',
                showCancelButton: true,
                cancelButtonText: 'İptal',
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Evet'
            }).then((result) => {
                if (result.value) {
                    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
                    $.ajax
                    ({
                        type: "Post",
                        url: '/forum/konu-sil',
                        data: {
                            'id': id,
                            'durum': durum,
                            '_token': CSRF_TOKEN
                        },
                        beforeSubmit: function () {
                            Swal.fire({
                                title: '<i class="fa fa-spinner fa-pulse fa-3x fa-fw"></i>\n' + '<span class="sr-only">Loading...</span>',
                                html: 'Yükleniyor...<br><br> Lütfen Bekleyiniz',
                                showConfirmButton: false,
                            })
                        },
                        success: function (response) {
                            Swal.fire(
                                response.baslik,
                                response.icerik,
                                response.durum
                            );

                        }
                    })
                }
            })

        }
    </script>
    @endsection
@section('css')
    <script src="/css/sweetalert2.min.css"></script>
@endsection
