@extends('backend.app')
@section('icerik')
    <div class="right_col" role="main">
        <div class="">
            <div class="page-title">
                <div class="title_left">
                    <h3>Blog</h3>
                </div>
            </div>
            <div class="clearfix"></div>
            <div class="">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="x_panel">
                        <div class="x_content">
                            <form method="post" id="form" data-parsley-validate class="form-horizontal form-label-left">
                                {{csrf_field()}}
                                <div class="form-group">
                                    <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">
                                        Resimler
                                    </label>
                                    <div class=" col-md-6 col-sm-12 col-xs-12">
                                        <input type="file" name="resimler[]" multiple class="form-control col-md-7 col-xs-12">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">
                                        Kategoriler
                                    </label>
                                    <div class=" col-md-6 col-sm-12 col-xs-12">
                                        <select class="form-control" name="kategori">
                                            <option value="0">Diğer Kategori</option>
                                            @foreach($kategoriler as $kategori)
                                                <option value="{{$kategori->id}}">{{$kategori->ad}}</option>
                                                @foreach($kategori->children as $alt_kategori)
                                                    <option
                                                        value="{{$alt_kategori->id}}">{{$kategori->ad}}
                                                        -->{{$alt_kategori->ad}}</option>
                                                    @foreach($alt_kategori->children as $alt_alt_kategori)
                                                        <option
                                                            value="{{$alt_alt_kategori->id}}">{{$kategori->ad}}
                                                            -->{{$alt_kategori->ad}}
                                                            -->{{$alt_alt_kategori->ad}}</option>
                                                    @endforeach
                                                @endforeach
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                {{Form::bsText('baslik','Başlık')}}
                                {{Form::bsText('kisaicerik','Kısa Açıklama')}}

                                {{Form::bsText('etiketler','Etiketler')}}
                                <div class="form-group">
                                    <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">
                                        İçerik
                                    </label>
                                    <div class=" col-md-6 col-sm-12 col-xs-12">
                                        <textarea name="icerik" id="" class=" form-control col-md-7 col-xs-12 ckeditor"  cols="30" rows="12" ></textarea>
                                    </div>
                                </div>
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
    <script src="/js/ckeditor/ckeditor.js"></script>
    <script src="/js/ckeditor/config.js"></script>


    <script>
        $(document).ready(function () {
            $('form').validate();//doldurulması zorunlu yazısı bunun sayesinde
            $('form').ajaxForm({
                beforeSubmit: function () {
                    let timerInterval
                    Swal.fire({
                            title: '<i class="fa fa-spinner fa-pulse fa-3x fa-fw"></i>\n' + '<span class="sr-only">Loading...</span>',
                            html: 'Yükleniyor...<br><br> Lütfen Bekleyiniz',
                        showConfirmButton: false,
                })
                },
                beforeSerialize: function(){
                    for(instance in CKEDITOR.instances) CKEDITOR.instances[instance].updateElement();
                },
                success: function (response) {
                    Swal.fire(
                        response.baslik,
                        response.icerik,
                        response.durum
                    )
                }
            });
        });
    </script>
@endsection
