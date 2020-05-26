@extends('frontend.app')
@section('icerik')

<div class="body">


    <div role="main" class="main">

        <section class="page-header">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <ul class="breadcrumb">
                            <li><a href="/">Anasayfa</a></li>
                            <li class="active">Bize Ulaşın</li>
                        </ul>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <h1>Bize Ulaşın</h1>
                    </div>
                </div>
            </div>
        </section>


        <div class="container">

            <div class="row">
                <div class="col-md-6">

                    <div class="alert alert-success hidden" id="contactSuccess">
                        <strong>Success!</strong> Your message has been sent to us.
                    </div>

                    <div class="alert alert-danger hidden" id="contactError">
                        <strong>Error!</strong> There was an error sending your message.
                    </div>

                    <h2 class="mb-sm mt-sm"><strong>Bize</strong>Ulaşın</h2>
                    <form id="contactForm" action="php/contact-form.php" method="POST">
                        <div class="row">
                            <div class="form-group">
                                <div class="col-md-6">
                                    <label>İsminiz *</label>
                                    <input type="text" value="" data-msg-required="Please enter your name." maxlength="100" class="form-control" name="name" id="name" required>
                                </div>
                                <div class="col-md-6">
                                    <label>E mail Adresiniz *</label>
                                    <input type="email" value="" data-msg-required="Please enter your email address." data-msg-email="Please enter a valid email address." maxlength="100" class="form-control" name="email" id="email" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group">
                                <div class="col-md-12">
                                    <label>Konu *</label>
                                    <input type="text" value="" data-msg-required="Please enter the subject." maxlength="100" class="form-control" name="subject" id="subject" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group">
                                <div class="col-md-12">
                                    <label>Mesajınız *</label>
                                    <textarea maxlength="5000" data-msg-required="Please enter your message." rows="10" class="form-control" name="message" id="message" required></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <input type="submit" value="Mesajını Gönder" class="btn btn-primary btn-lg mb-xlg" data-loading-text="Loading...">
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-md-6">


                    <h4 class="heading-primary">Bize <strong>Ulaşmak için</strong></h4>
                    <ul class="list list-icons list-icons-style-3 mt-xlg">
                        <li><i class="fa fa-map-marker"></i> <strong>Adres:</strong>{{$ayarlar[0]->adres}}</li>
                        <li><i class="fa fa-phone"></i> <strong>Telefon:</strong>{{$ayarlar[0]->tel}}</li>
                        <li><i class="fa fa-phone"></i> <strong>Fax:</strong>{{$ayarlar[0]->faks}}</li>
                        <li><i class="fa fa-envelope"></i> <strong>Email:</strong> <a href="mailto:mail@example.com">{{$ayarlar[0]->mail}}</a></li>
                    </ul>

                    <hr>

                    <h4 class="heading-primary">Sosyal <strong>Medya</strong></h4>
                    <ul class="header-social-icons social-icons hidden-xs">
                        <li class="social-icons-facebook"><a href="{{$ayarlar[0]->facebook}}" target="_blank" title="Facebook"><i class="fa fa-facebook"></i></a></li>
                        <li class="social-icons-twitter"><a href="{{$ayarlar[0]->twitter}}" target="_blank" title="Twitter"><i class="fa fa-twitter"></i></a></li>
                        <li class="social-icons-instagram"><a href="{{$ayarlar[0]->instagram}}" target="_blank" title="Linkedin"><i class="fa fa-instagram"></i></a></li>
                        <li class="social-icons-youtube"><a href="{{$ayarlar[0]->youtube}}" target="_blank" title="Linkedin"><i class="fa fa-youtube"></i></a></li>

                    </ul>

                </div>

            </div>

        </div>

    </div>


    @endsection
@section('css')

    @endsection
@section('js')

    @endsection
