@extends('backend.app')
@section('icerik')
    <div class="right_col" role="main">
        <div class="">
            <div class="page-title">
                <table class="table" id="table" width="100%">
                    <thead>
                    <tr>
                        <th class="col-md-2 col-xs-2">#</th>
                        <th class="col-md-8 col-xs-8">Ad</th>
                        <th class="col-md-2 col-xs-2">Sil</th>
                    </tr>
                    </thead>
                    <tbody>
                    <meta name="csrf-token" content="{{ csrf_token() }}">
                    @foreach($kategoriler as $kategori)
                        <tr>
                            <th scope="row">{{$kategori->id}}</th>
                            <td>{{$kategori->ad}}</td>
                            <td>
                                <button onclick="sil(this,'{{$kategori->id}}')" class="btn btn-danger">Sil</button>
                            </td>
                        </tr>
                        @foreach($kategori->children as $alt_kategori)
                            <tr>
                                <th scope="row">{{$alt_kategori->id}}"</th>
                                <td>{{$kategori->ad}}-->{{$alt_kategori->ad}}</td>
                                <td>
                                    <button onclick="sil(this,'{{$alt_kategori->id}}')" class="btn btn-danger">Sil
                                    </button>
                                </td>
                            </tr>
                            @foreach($alt_kategori->children as $alt_alt_kategori)
                                <tr>
                                    <th scope="row">{{$alt_alt_kategori->id}}</th>
                                    <td>{{$kategori->ad}}
                                        -->{{$alt_kategori->ad}}
                                        -->{{$alt_alt_kategori->ad}}
                                    </td>
                                    <td>
                                        <button onclick="sil(this,'{{$alt_alt_kategori->id}}')" class="btn btn-danger">
                                            Sil
                                        </button>
                                    </td>
                                </tr>
                            @endforeach
                        @endforeach
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
@section('css')
    <script src="/css/sweetalert2.min.css"></script>
@endsection
@section('js')
    <script src="/js/jquery.form.min.js"></script>
    <script src="/js/sweetalert2.all.min.js"></script>
    <script>
        function sil(r, id) {
            var sira = r.parentNode.parentNode.rowIndex;
            Swal.fire({
                title: 'Silmek İstediğinize Emin Misiniz.',
                text: "Sildiğiniz geri dönüşü olmuyacak",
                icon: 'warning',
                showCancelButton: true,
                cancelButtonText: 'İptal',
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Evet,Sil'
            }).then((result) => {
                if (result.value) {
                    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
                    $.ajax
                    ({
                        type: "Post",
                        url: '',
                        data: {
                            'id': id,
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
                            if(response.durum == 'success'){
                                document.getElementById("table").deleteRow(sira);
                                Swal.fire(
                                    response.baslik,
                                    response.icerik,
                                    response.durum
                                )
                            }
                        },
                    })
                }
            })

        }
    </script>
@endsection
