@extends('frontend.app')
@section('icerik')
    <div role="main" class="main">

        <section class="page-header">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <ul class="breadcrumb">
                            <li><a href="#">Home</a></li>
                            <li class="active">Pages</li>
                        </ul>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <h1>Login</h1>
                    </div>
                </div>
            </div>
        </section>

        <div class="container">

            <div class="row">
                <div class="col-md-12">

                    <div class="featured-boxes">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="featured-box featured-box-primary align-left mt-xlg">
                                    <div class="box-content">
                                        <h4 class="heading-primary text-uppercase mb-md">{{trans('giris-yap.üyeyim')}}</h4>
                                        <form action="{{ route('login') }}" role="form" id="frmSignIn" method="post">
                                            {{csrf_field()}}
                                            <div class="row">
                                                <div class="form-group">
                                                    <div class="col-md-12">
                                                        <label>{{trans('giris-yap.mail')}}</label>
                                                        <input type="mail" name="email" value="" class="form-control input-lg">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="form-group">
                                                    <div class="col-md-12">
                                                        <a class="pull-right" href="#">(Lost Password?)</a>
                                                        <label>{{trans('giris-yap.sifre')}}</label>
                                                        <input type="password" name="password" value="" class="form-control input-lg">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
															<span class="remember-box checkbox">
																<label for="rememberme">
                                                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>  {{trans('giris-yap.hatırla')}}
                                                                </label>
                                                            </span>
                                                </div>
                                                <div class="col-md-6">
                                                    <input type="submit" value="Giriş"
                                                           class="btn btn-primary pull-right mb-xl"
                                                           data-loading-text="Loading...">
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="featured-box featured-box-primary align-left mt-xlg">
                                    <div class="box-content">
                                        <h4 class="heading-primary text-uppercase mb-md">{{trans('giris-yap.üyeol')}}</h4>
                                        <form action="{{ route('register') }}" id="frmSignUp" method="post">
                                           {{csrf_field()}}
                                            <div class="row">
                                                <div class="form-group">
                                                    <div class="col-md-12">
                                                        <label>{{trans('giris-yap.isim')}}</label>
                                                        <input required type="text" value="" name="name" class="form-control input-lg">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="form-group">
                                                    <div class="col-md-12">
                                                        <label>{{trans('giris-yap.mail')}}</label>
                                                        <input required type="email" name="email" value="" class="form-control input-lg">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="form-group">
                                                    <div class="col-md-6">
                                                        <label>{{trans('giris-yap.sifre')}}</label>
                                                        <input required type="password" name="password" value="" class="form-control input-lg">
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label>{{trans('giris-yap.sifretekrar')}}</label>
                                                        <input required type="password" value="" name="password_confirmation" class="form-control input-lg">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <input type="submit" value="Gönder"
                                                           class="btn btn-primary pull-right mb-xl"
                                                           data-loading-text="Loading...">
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

        </div>

    </div>
@endsection
@section('js')
@endsection
@section('css')
@endsection
