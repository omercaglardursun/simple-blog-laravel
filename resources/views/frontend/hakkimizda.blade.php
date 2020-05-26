@extends('frontend.app')
@section('icerik')

    <div role="main" class="main">

        <section class="page-header">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h1>Hakkımızda</h1>
                    </div>
                </div>
            </div>
        </section>

        <div class="container">

            <div class="row">
                <div class="col-md-12">
                </div>
            </div>

            <div class="row">
                <div class="col-md-10">
                    <p class="lead">
                        {{$hakkimizda->kisa_yazi}}
                    </p>
                </div>
                <div>
                    <a href="/iletisim" class="btn btn-lg btn-primary push-top">Bize Ulaşın</a>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <hr class="tall">
                </div>
            </div>

            <div class="row">
                <div class="col-md-8">
                    <h3 class="heading-primary"><strong>Biz</strong>Kimiz</h3>
                    {{$hakkimizda->icerik}}
                </div>
                <div class="col-md-4">
                    <div class="featured-box featured-box-primary">
                        <div class="box-content">
                            <h4 class="text-uppercase">Fotoğraflarımız</h4>
                            <ul class="thumbnail-gallery" data-plugin-lightbox data-plugin-options='{"delegate": "a", "type": "image", "gallery": {"enabled": true}}'>
                                <li>
                                    <a title="Benefits 1" href="img/benefits/benefits-1.jpg">
												<span class="thumbnail mb-none">
													<img src="img/benefits/benefits-1-thumb.jpg" alt="">
												</span>
                                    </a>
                                </li>
                                <li>
                                    <a title="Benefits 2" href="img/benefits/benefits-2.jpg">
												<span class="thumbnail mb-none">
													<img src="img/benefits/benefits-2-thumb.jpg" alt="">
												</span>
                                    </a>
                                </li>
                                <li>
                                    <a title="Benefits 3" href="img/benefits/benefits-3.jpg">
												<span class="thumbnail mb-none">
													<img src="img/benefits/benefits-3-thumb.jpg" alt="">
												</span>
                                    </a>
                                </li>
                                <li>
                                    <a title="Benefits 4" href="img/benefits/benefits-4.jpg">
												<span class="thumbnail mb-none">
													<img src="img/benefits/benefits-4-thumb.jpg" alt="">
												</span>
                                    </a>
                                </li>
                                <li>
                                    <a title="Benefits 5" href="img/benefits/benefits-5.jpg">
												<span class="thumbnail mb-none">
													<img src="img/benefits/benefits-5-thumb.jpg" alt="">
												</span>
                                    </a>
                                </li>
                                <li>
                                    <a title="Benefits 6" href="img/benefits/benefits-6.jpg">
												<span class="thumbnail mb-none">
													<img src="img/benefits/benefits-6-thumb.jpg" alt="">
												</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <hr class="tall">

            <div class="row">
                <div class="col-md-12">
                    <h4 class="heading-primary"><strong>Vizyonumuz</strong></h4>
                </div>
            </div>
            <div class="featured-box">
                <div class="box-content">
                    {{$hakkimizda->vizyon}}
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <h4 class="heading-primary"><strong>Misyonumuz</strong></h4>
                </div>
            </div>
            <div class="featured-box">
                <div class="box-content">
                    {{$hakkimizda->misyon}}
                </div>
            </div>

        </div>

    </div>
    @endsection
@section('js')
    @endsection
@section('css')
    @endsection
