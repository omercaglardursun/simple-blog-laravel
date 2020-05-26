@extends('frontend.app')
@section('icerik')
    <div class="body">


        <div role="main" class="main">

            <section class="page-header">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <ul class="breadcrumb">
                                <li><a href="/forum">Forum</a></li>
                                <li class="active">YeniKonu Ekleme</li>
                            </ul>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <h1>Yeni Konu Ekle</h1>
                        </div>
                    </div>
                </div>
            </section>


            <div class="container">

                <div class="row">
                    <div class="col-md-12">
                        <form action="" method="post" id="form">
                            {{csrf_field()}}
                            <div class="row">
                                <div class="form-group">
                                    <div class="col-md-12">
                                        <label>Ana Konu Seç *</label>

                                        <select class="form-control" name="ana_baslik">
                                            <option value="">Ana Başlık Seçiniz</option>
                                            @foreach($anabasliklar as $anabaslik)
                                                <option value="{{$anabaslik->id}}">{{$anabaslik->baslik}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group">
                                    <div class="col-md-12">
                                        <label>Başlik *</label>
                                        <input type="text" value="" maxlength="100" class="form-control" name="baslik" id="subject" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group">
                                    <div class="col-md-12">
                                        <label>Konu *</label>
                                        <textarea maxlength="5000" rows="10" class="form-control" name="icerik" id="message" required></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <input type="submit" value="Konu Ekle" class="btn btn-primary btn-lg mb-xlg"
                                           data-loading-text="Loading...">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('css')
    <script src="/css/sweetalert2.min.css"></script>

@endsection
@section('js')
    <script src="/js/jquery.form.min.js"></script>
    <script src="/js/jquery.validate.min.js"></script>
    <script src="/js/messages_tr.min.js"></script>
    <script src="/js/sweetalert2.all.min.js"></script>
    <script>
        $(document).ready(function () {
            $('form').validate();//doldurulması zorunlu yazısı bunun sayesinde
            $('form').ajaxForm({
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
                    if(response.durum=='success'){
                        document.getElementById('form').reset();
                    }
                }
            });
        });
    </script>
@endsection
