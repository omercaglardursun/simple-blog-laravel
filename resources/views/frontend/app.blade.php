<!DOCTYPE html>
<html>
<head>

    <!-- Basic -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>ÖMER ÇAĞLAR DURSUN</title>

    <meta name="keywords" content="HTML5 Template"/>
    <meta name="description" content="Porto - Responsive HTML5 Template">
    <meta name="author" content="okler.net">

    <!-- Favicon -->
    <link rel="shortcut icon" href="/frontend/img/favicon.ico" type="image/x-icon"/>
    <link rel="apple-touch-icon" href="/frontend/img/apple-touch-icon.png">

    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">

    <!-- Web Fonts  -->
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800%7CShadows+Into+Light"
          rel="stylesheet" type="text/css">

    <!-- Vendor CSS -->
    <link rel="stylesheet" href="/frontend/vendor/bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="/frontend/vendor/font-awesome/css/font-awesome.css">
    <link rel="stylesheet" href="/frontend/vendor/simple-line-icons/css/simple-line-icons.css">
    <link rel="stylesheet" href="/frontend/vendor/owl.carousel/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="/frontend/vendor/owl.carousel/assets/owl.theme.default.min.css">
    <link rel="stylesheet" href="/frontend/vendor/magnific-popup/magnific-popup.css">

    <!-- Theme CSS -->
    <link rel="stylesheet" href="/frontend/css/theme.css">
    <link rel="stylesheet" href="/frontend/css/theme-elements.css">
    <link rel="stylesheet" href="/frontend/css/theme-blog.css">
    <link rel="stylesheet" href="/frontend/css/theme-shop.css">
    <link rel="stylesheet" href="/frontend/css/theme-animate.css">

    <!-- Current Page CSS -->
    <link rel="stylesheet" href="/frontend/vendor/rs-plugin/css/settings.css" media="screen">
    <link rel="stylesheet" href="/frontend/vendor/rs-plugin/css/layers.css" media="screen">
    <link rel="stylesheet" href="/frontend/vendor/rs-plugin/css/navigation.css" media="screen">

    <link rel="stylesheet" href="/frontend/vendor/circle-flip-slideshow/css/component.css" media="screen">

    <!-- Skin CSS -->
    <link rel="stylesheet" href="/frontend/css/skins/default.css">

    <!-- Theme Custom CSS -->
    <link rel="stylesheet" href="/frontend/css/custom.css">

    <!-- Head Libs -->
    <script src="/frontend/vendor/modernizr/modernizr.js"></script>

    <!--[if IE]>
    <link rel="stylesheet" href="/frontend/css/ie.css">
    <![endif]-->
    @yield('css');
    <!--[if lte IE 8]>
    <script src="/frontend/vendor/respond/respond.js"></script>
    <script src="/frontend/vendor/excanvas/excanvas.js"></script>
    <![endif]-->

</head>
<body>

<div class="body">
    <header id="header"
            data-plugin-options='{"stickyEnabled": true, "stickyEnableOnBoxed": true, "stickyEnableOnMobile": true, "stickyStartAt": 57, "stickySetTop": "-57px", "stickyChangeLogo": true}'>
        <div class="header-body">
            <div class="header-container container">
                <div class="header-row">
                    <div class="header-column">
                        <div class="header-logo">
                            <a href="/">
                                <img alt="Porto" width="111" height="54" data-sticky-width="82" data-sticky-height="40"
                                     data-sticky-top="33" src="/uploads/img/{{$ayarlar[0]->logo}}">
                            </a>
                        </div>
                    </div>

                    <div class="header-column">
                        <div class="header-row">
                            <div class="header-search hidden-xs">
                                <form id="searchForm" action="page-search-results.html" method="get">
                                    <div class="input-group">
                                        <input type="text" class="form-control" name="q" id="q" placeholder="Search..."
                                        >
                                        <span class="input-group-btn">
													<button class="btn btn-default" type="submit"><i
                                                            class="fa fa-search"></i></button>
												</span>
                                    </div>
                                </form>
                            </div>

                            <nav class="header-nav-top">
                                <ul class="nav nav-pills">
                                    <li class="hidden-xs">
                                        @if(Auth::check())
                                            <a href="/">
                                            <i class="fa fa-angle-right"></i>
                                            {{ Auth::user()->name }} Hoşgeldin
                                            </a>
                                        @endif
                                    </li>
                                    <li class="hidden-xs dropdown dropdown-mega">
                                        @if(Auth::check())
                                            @if(Auth::user()->yetki>0)
                                                <a href="/admin">
                                                    <i class="dropdown-toggle"></i>
                                                    Admin Sayfası
                                                </a>
                                            @endif
                                        @endif
                                    </li>

                                    <li>
                                        <select name="locale" id="locale" onchange="locale()">

                                            @foreach($locale as $l)

                                                <option @if(App::isLocale($l->isim)) selected
                                                        @endif value="{{$l->isim}}">{{$l->isim}}
                                                </option>
                                            @endforeach
                                        </select>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                        <div class="header-row">
                            <div class="header-nav">
                                <button class="btn header-btn-collapse-nav" data-toggle="collapse"
                                        data-target=".header-nav-main">
                                    <i class="fa fa-bars"></i>
                                </button>
                                <ul class="header-social-icons social-icons hidden-xs">
                                    <ul class="social-icons">
                                        <li class="social-icons-facebook"><a href="http://www.facebook.com/{{$ayarlar[0]->facebook}}" target="_blank"
                                                                             title="Facebook"><i class="fa fa-facebook"></i></a></li>
                                        <li class="social-icons-twitter"><a href="http://www.twitter.com/{{$ayarlar[0]->twitter}}" target="_blank"
                                                                            title="Twitter"><i class="fa fa-twitter"></i></a></li>
                                        <li class="social-icons-instagram"><a href="http://www.linkedin.com/{{$ayarlar[0]->instagram}}" target="_blank"
                                                                              title="İnstagram"><i class="fa fa-instagram"></i></a></li>
                                    </ul>
                                </ul>
                                <div
                                    class="header-nav-main header-nav-main-effect-1 header-nav-main-sub-effect-1 collapse">
                                    <nav>
                                        <ul class="nav nav-pills" id="mainNav">
                                            <li>
                                                <a class="dropdown-toggle" href="/">
                                                    Anasayfa
                                                </a>
                                            </li>
                                            <li class="dropdown dropdown-mega">
                                                <a class="dropdown-toggle" href="/blog">
                                                    Bloglar
                                                </a>
                                            </li>
                                            <li class="dropdown dropdown-mega">
                                                <a class="dropdown-toggle" href="/hakkimizda">
                                                    Hakkımızda
                                                </a>
                                            </li>
                                            <li class="dropdown dropdown-mega">
                                                <a class="dropdown-toggle" href="/iletisim">
                                                    Bize Ulaşın
                                                </a>
                                            </li>
                                            <li class="dropdown dropdown-mega">
                                                @if(!Auth::check())
                                                    <a class="dropdown-toggle" href="/giris-yap">
                                                        Giriş Yap
                                                    </a>
                                                @endif
                                            </li>
                                            <li class="dropdown dropdown-mega">
                                                @if(Auth::check())
                                                    <a class="dropdown-toggle" href="/cikis-yap">
                                                        Çıkış Yap
                                                    </a>
                                                @endif

                                            </li>
                                        </ul>
                                    </nav>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    @yield('icerik');
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <footer id="footer">
        <div class="container">
            <div class="row">
                <div class="footer-ribbon">
                    <span>Bilgiler</span>
                </div>
                <div class="col-md-3">
                    <h4>Son twitlerimiz</h4>
                    <div id="tweet" class="twitter" data-plugin-tweets>
                        <?php $ana_twitter="https://twitter.com/NeyDioN1";?>
                        <div class="article-wrap">
                            <a class="twitter-timeline" href="<?php echo $ana_twitter; ?>" data-widget-id="338001751854686210">Tweets of Hakan ÖZKÖSE</a>
                            <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                        <h4>Takip için</h4>
                        <ul class="social-icons">
                            <li class="social-icons-facebook"><a href="http://www.facebook.com/{{$ayarlar[0]->facebook}}" target="_blank"
                                                                 title="Facebook"><i class="fa fa-facebook"></i></a></li>
                            <li class="social-icons-twitter"><a href="http://www.twitter.com/{{$ayarlar[0]->twitter}}" target="_blank"
                                                                title="Twitter"><i class="fa fa-twitter"></i></a></li>
                            <li class="social-icons-instagram"><a href="http://www.linkedin.com/{{$ayarlar[0]->instagram}}" target="_blank"
                                                                  title="İnstagram"><i class="fa fa-instagram"></i></a></li>
                        </ul>
                    </div>
                <div class="col-md-2">
                    <div class="contact-details">
                        <h4>İletişim</h4>
                        <ul class="contact">
                            <li><p><i class="fa fa-map-marker"></i> <strong>Address:</strong>{{$ayarlar[0]->adres}}</p></li>
                            <li><p><i class="fa fa-phone"></i> <strong>Telefon:</strong>{{$ayarlar[0]->tel}}</p></li>
                            <li><p><i class="fa fa-envelope"></i> <strong>Email:</strong> <a
                                        href="mailto:mail@example.com">{{$ayarlar[0]->mail}}</a></p></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-2">
                <div class="col-md-2">
                    <h4>Flickerımız</h4>

                    <?php
                    $apiKey = "56fdcf54f8655a7fd26002743ba1b124";//Çift tırnak içine apikey
                    $userId = "188638420@N06";//Buradaki çift tıranağa ise userid yazılacak
                    $feedUrl = "https://api.flickr.com/services/rest/?method=flickr.people.getPublicPhotos&api_key={$apiKey}&user_id={$userId}&format=json&nojsoncallback=1";

                    $feed = file_get_contents($feedUrl);
                    $feed = json_decode($feed);

                    $photoStream = $feed->photos->photo;

                    foreach ($photoStream as $photo) {
                        $photoUrl = "https://farm{$photo->farm}.static.flickr.com/{$photo->server}/{$photo->id}_{$photo->secret}.jpg";
                        echo "<img  src='{$photoUrl}' alt='{$photo->title}' style='height: 2%'>";
                    }
                    ?>
                </div>
            </div>
        </div>

    </footer>
</div>

<!-- Vendor -->
<!--[if lt IE 9]>
<script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
<![endif]-->
<!--[if gte IE 9]><!-->
<script src="/frontend/vendor/jquery/jquery.js"></script>
<!--<![endif]-->
<script src="/frontend/vendor/jquery.appear/jquery.appear.js"></script>
<script src="/frontend/vendor/jquery.easing/jquery.easing.js"></script>
<script src="/frontend/vendor/jquery-cookie/jquery-cookie.js"></script>
<script src="/frontend/vendor/bootstrap/js/bootstrap.js"></script>
<script src="/frontend/vendor/common/common.js"></script>
<script src="/frontend/vendor/jquery.validation/jquery.validation.js"></script>
<script src="/frontend/vendor/jquery.stellar/jquery.stellar.js"></script>
<script src="/frontend/vendor/jquery.easy-pie-chart/jquery.easy-pie-chart.js"></script>
<script src="/frontend/vendor/jquery.gmap/jquery.gmap.js"></script>
<script src="/frontend/vendor/jquery.lazyload/jquery.lazyload.js"></script>
<script src="/frontend/vendor/isotope/jquery.isotope.js"></script>
<script src="/frontend/vendor/owl.carousel/owl.carousel.js"></script>
<script src="/frontend/vendor/magnific-popup/jquery.magnific-popup.js"></script>
<script src="/frontend/vendor/vide/vide.js"></script>

<!-- Theme Base, Components and Settings -->
<script src="js/theme.js"></script>

<!-- Specific Page Vendor and Views -->
<script src="/frontend/vendor/rs-plugin/js/jquery.themepunch.tools.min.js"></script>
<script src="/frontend/vendor/rs-plugin/js/jquery.themepunch.revolution.min.js"></script>
<script src="/frontend/vendor/rs-plugin/js/extensions/revolution.extension.actions.min.js"></script>
<script src="/frontend/vendor/rs-plugin/js/extensions/revolution.extension.carousel.min.js"></script>
<script src="/frontend/vendor/rs-plugin/js/extensions/revolution.extension.kenburn.min.js"></script>
<script src="/frontend/vendor/rs-plugin/js/extensions/revolution.extension.layeranimation.min.js"></script>
<script src="/frontend/vendor/rs-plugin/js/extensions/revolution.extension.migration.min.js"></script>
<script src="/frontend/vendor/rs-plugin/js/extensions/revolution.extension.navigation.min.js"></script>
<script src="/frontend/vendor/rs-plugin/js/extensions/revolution.extension.parallax.min.js"></script>
<script src="/frontend/vendor/rs-plugin/js/extensions/revolution.extension.slideanims.min.js"></script>
<script src="/frontend/vendor/rs-plugin/js/extensions/revolution.extension.video.min.js"></script>

<script src="/frontend/vendor/circle-flip-slideshow/js/jquery.flipshow.js"></script>
<script src="/frontend/js/views/view.home.js"></script>

<!-- Theme Custom -->
<script src="/frontend/js/custom.js"></script>

<!-- Theme Initialization Files -->
<script src="/frontend/js/theme.init.js"></script>
<script>
    function locale() {

        var l = document.getElementById('locale').value;
        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
        $.ajax
        ({
            type: "Post",
            url: '/locale',
            data: {
                'locale': l,
                '_token': CSRF_TOKEN
            },
            success :function(){
                location.reload();
            }
        })
    }
</script>

@yield('js');

<!-- Google Analytics: Change UA-XXXXX-X to be your site's ID. Go to http://www.google.com/analytics/ for more information.
<script type="text/javascript">

    var _gaq = _gaq || [];
    _gaq.push(['_setAccount', 'UA-12345678-1']);
    _gaq.push(['_trackPageview']);

    (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
    })();

</script>
 -->

</body>
</html>
