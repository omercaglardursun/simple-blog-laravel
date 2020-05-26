@extends('backend.app')
@section('icerik')
    <div class="right_col" role="main">
        <div class="">
            <div class="page-title">
                <div class="title_left">
                    <form method="post" id="form" data-parsley-validate class="form-horizontal form-label-left">
                    {{csrf_field()}}
                    {{Form::bsText('baslik','Başlık')}}
                    {{Form::bsText('kisa_aciklama','Kısa Açıklama')}}
                        <div class="form-group">
                            <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                <button type="submit" class="btn btn-success">Kaydet</button>
                            </div>
                        </div>
                    </form>
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
