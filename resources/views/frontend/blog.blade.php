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
                        <h1>Bloglar</h1>
                    </div>
                </div>
            </div>
        </section>

        <div class="container">

            <div class="row">
                <div class="col-md-9">
                    <div class="blog-posts">
                        @foreach($bloglar as $blog)
                            <article class="post post-large">
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

                                    <h2><a href="/blog/@if(isset($blog->parent))@php($ustkategori = $blog->parent)@if(isset($ustkategori->parent))@php($ustustkategori=$ustkategori->parent)@if(isset($ustustkategori->parent)){{$ustustkategori->parent->slug}}/@endif{{$ustkategori->parent->slug}}/@endif{{$blog->parent->slug}}@endif/{{$blog->slug}}">{{$blog->baslik}}</a></h2>
                                    <p>{{$blog->kisaicerik}}</p>

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
                                        <a href="/blog/@if(isset($blog->parent))@php($ustkategori = $blog->parent)@if(isset($ustkategori->parent))@php($ustustkategori=$ustkategori->parent)@if(isset($ustustkategori->parent)){{$ustustkategori->parent->slug}}/@endif{{$ustkategori->parent->slug}}/@endif{{$blog->parent->slug}}@endif/{{$blog->slug}}" class="btn btn-xs btn-primary pull-right">Daha Fazla...</a>
                                    </div>
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
                @include('frontend.blog-side-bar')
            </div>
        </div>
    </div>
@endsection
@section('css')
@endsection
@section('js')
    <script src="/frontend/js/theme.js"></script>
    <script src="/frontend/js/custom.js"></script>
    <script src="/frontend/js/theme.init.js"></script>
@endsection

