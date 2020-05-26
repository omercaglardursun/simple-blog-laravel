@extends('frontend.app')
@section('icerik')
    <div role="main" class="main">

        <section class="page-header">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <ul class="breadcrumb">
                            <li><a href="/">Anasayfa</a></li>
                            <li class="active">Blog</li>
                        </ul>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <h1>Detay</h1>
                    </div>
                </div>
            </div>
        </section>

        <div class="container">

            <div class="row">
                <div class="col-md-9">
                    <div class="blog-posts single-post">

                        <article class="post post-large blog-single-post">
                            <div class="post-image">
                                <div class="owl-carousel owl-theme" data-plugin-options='{"items":1}'>
                                    @foreach($resimler=Storage::disk('uploads')->files('img/blog/'.$blog->slug) as $resim)

                                        <div>
                                            <div class="img-thumbnail">
                                                <img class="img-responsive"
                                                     src="/uploads/{{$resim}}"
                                                     alt="">
                                            </div>
                                        </div>

                                    @endforeach

                                </div>
                            </div>

                            <div class="post-date">
                                <span class="day">{{$blog->created_at->formatLocalized('%d')}}</span>
                                <span class="month">{{$blog->created_at->formatLocalized('%b')}}</span>
                            </div>

                            <div class="post-content">

                                <h2><a href="blog-post.html">{{$blog->baslik}}</a></h2>
<!-- <div class="post-meta">
                                    <span><i class="fa fa-user"></i> By <a href="#">John Doe</a> </span>
                                    <span><i class="fa fa-tag"></i> <a href="#">Duis</a>, <a href="#">News</a> </span>
                                    <span><i class="fa fa-comments"></i> <a href="#">12 Comments</a></span>
                                </div> -->
                                <div class="post-meta">
                                    <span><i class="fa fa-user"></i> By <a href="/blog/yazar/{{$blog->user->slug}}-{{$blog->user->id}}">{{$blog->user->name}}</a> </span>
                                    <span><i class="fa fa-tag"></i>
                                            @if(isset($blog->parent))
                                            @php($ustkategori = $blog->parent)
                                            @if(isset($ustkategori->parent))
                                                @php($ustustkategori=$ustkategori->parent)
                                                @if(isset($ustustkategori->parent))
                                                    <a href="/blog/{{$ustustkategori->parent->slug}}">{{$ustustkategori->parent->slug}},</a>
                                                @endif<a href="/blog/{{$ustkategori->parent->slug}}">{{$ustkategori->parent->slug}},</a>
                                            @endif<a href="/blog/@if(isset($blog->parent))@php($ustkategori = $blog->parent)@if(isset($ustkategori->parent))@php($ustustkategori=$ustkategori->parent)@if(isset($ustustkategori->parent)){{$ustustkategori->parent->slug}}/@endif{{$ustkategori->parent->slug}}/@endif{{$blog->parent->slug}}@endif">{{$blog->parent->slug}}</a>
                                        @endif
                                        </span>
                                    <span><i class="fa fa-comments"></i>{{$blog->yorumlar->count()}} Yorum</span>
                                </div>


                                <blockquote>{{$blog->kisaicerik}}</blockquote>
                                {{$blog->icerik}}
                                <div class="post-block post-share">
                                    <h3 class="heading-primary"><i class="fa fa-share"></i>Paylaş</h3>
                                    <!-- AddThis Button BEGIN -->
                                    <div class="addthis_toolbox addthis_default_style ">
                                        <a class="addthis_button_facebook_like" fb:like:layout="button_count"></a>
                                        <a class="addthis_button_tweet"></a>
                                        <a class="addthis_button_pinterest_pinit"></a>
                                        <a class="addthis_counter addthis_pill_style"></a>
                                    </div>
                                    <script type="text/javascript"
                                            src="//s7.addthis.com/js/300/addthis_widget.js#pubid=xa-50faf75173aadc53"></script>
                                    <!-- AddThis Button END -->

                                </div>

                                <div class="post-block post-comments clearfix">
                                    <h3 class="heading-primary"><i class="fa fa-comments"></i>Yorumlar</h3>

                                    <ul class="comments">
                                        <li id="yorumlar">
                                            @foreach($blog->yorumlar->where('ust_yorum','0') as $yorum)
                                                <div class="comment">
                                                    <div class="img-thumbnail">
                                                        <img class="avatar" alt="" src="img/avatar-2.jpg">
                                                    </div>
                                                    <div class="comment-block">
                                                        <div class="comment-arrow"></div>
                                                        <span class="comment-by">
																<strong>
                                                                    @if($yorum->kullanici_id>0)
                                                                        {{$yorum->user->name}}
                                                                    @else
                                                                        {{$yorum->isim}}
                                                                    @endif
                                                                </strong>
																<span class="pull-right">
																	<span> <a onclick='altyorum({{$yorum->id}})'><i
                                                                                class="fa fa-reply"></i> Alt Yorum Ekle</a></span>
																</span>
															</span>
                                                        <p>{{$yorum->icerik}}</p>
                                                        @php($zaman=$yorum->created_at)   <!-- //zamanı türkçeleştiriyoruz tr ile zamanı ise diff.. ile --->
                                                        @php($zaman->setLocale('tr'))
                                                        <span class="date pull-right">{{$zaman->diffForHumans()}}</span>
                                                    </div>
                                                </div>
                                                <ul class="comments reply">
                                                    @foreach($yorum->children as $altyorum)
                                                        <li>
                                                            <div class="comment">
                                                                <div class="img-thumbnail">
                                                                    <img class="avatar" alt="" src="img/avatar-3.jpg">
                                                                </div>
                                                                <div class="comment-block">
                                                                    <div class="comment-arrow"></div>
                                                                    <span class="comment-by">
																		<strong>
                                                                            @if($altyorum->kullanici_id>0)
                                                                                {{$altyorum->user->name}}
                                                                            @else
                                                                                {{$altyorum->isim}}
                                                                            @endif
                                                                        </strong>
																	</span>
                                                                    <p>{{$altyorum->icerik}}.</p>
                                                                    <span
                                                                        class="date pull-right">{{$altyorum->created_at->diffForHumans()}}</span>
                                                                </div>
                                                            </div>
                                                        </li>
                                                    @endforeach
                                                </ul>
                                            @endforeach
                                        </li>

                                    </ul>
                                </div>
                                <div class="post-block post-leave-comment">
                                    <h3 class="heading-primary">Yorum Ekle</h3>

                                    <form action="" method="post" id="form">
                                        {{csrf_field()}}
                                        <div id="altyorum"></div>
                                        @if(!\Illuminate\Support\Facades\Auth::check())
                                            <div class="row">
                                                <div class="form-group">
                                                    <div class="col-md-6">
                                                        <label>İsminiz *</label>
                                                        <input type="text" value="" maxlength="100" class="form-control"
                                                               name="isim" id="name">
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label>Mail Adresiniz *</label>
                                                        <input type="email" value="" maxlength="100"
                                                               class="form-control"
                                                               name="mail" id="email">
                                                    </div>
                                                </div>
                                        @endif
                                        <div class="row">
                                            <div class="form-group">
                                                <div class="col-md-12">
                                                    <label>Mesajınız *</label>
                                                    <textarea maxlength="5000" rows="10" class="form-control"
                                                              name="icerik" id="comment"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <input type="submit" value="Yolla" class="btn btn-primary btn-lg"
                                                       data-loading-text="Loading...">
                                            </div>
                                        </div>
                                    </form>
                                </div>

                            </div>
                        </article>

                    </div>
                </div>

                @include('frontend.blog-side-bar')
            </div>

        </div>

    </div>
@endsection
@section('css')
    <script src="/css/sweetalert2.min.css"></script>

@endsection
@section('js')
    <script src="/frontend/js/theme.js"></script>
    <script src="/frontend/js/custom.js"></script>
    <script src="/frontend/js/theme.init.js"></script>
    <script src="/js/jquery.form.min.js"></script>
    <script src="/js/jquery.validate.min.js"></script>
    <script src="/js/messages_tr.min.js"></script>
    <script src="/js/sweetalert2.all.min.js"></script>
    <script>
        function altyorum(id) {
            var hidden = '<input type="hidden" value="' + id + '" name="ust_yorum">';
            document.getElementById('altyorum').innerHTML = hidden;
        }

        $(document).ready(function () {
            $('form').validate();
            $('form').ajaxForm({
                success: function (response) {
                    Swal.fire(
                        response.baslik,
                        response.icerik,
                        response.durum
                    );
                    if (response.durum == 'success') {
                        var isim = document.getElementById('name').value;
                        var icerik = document.getElementById('comment').value;
                        var mesaj = '<div class="comment">' + '<div class="img-thumbnail">' +
                            '<img class="avatar" alt="" src="img/avatar-2.jpg">' +
                            '</div>' +
                            '<div class="comment-block">' +
                            '<div class="comment-arrow">' +
                            '</div>' +
                            '<span class="comment-by">' +
                            '<strong>' + isim + '</strong>' +
                            '<span class="pull-right">' +
                            '<span>' +
                            '<a href="#"><i class="fa fa-reply"></i>Reply</a>' +
                            '</span>' +
                            '</span>' +
                            '</span>' +
                            '<p>' + icerik + '</p>' +
                            '<span class="date pull-right">Şimdi</span>' +
                            '</div>' +
                            '</div>';
                        document.getElementById('yorumlar').innerHTML = mesaj;
                    }
                }
            });
        });
    </script>
@endsection
