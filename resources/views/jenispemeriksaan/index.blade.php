@extends('layouts.app')

@section('content')
<div class="app-main__outer">
    <div class="app-main__inner">
        <div class="app-page-title app-page-title-simple">
            <div class="page-title-wrapper">
                <div class="page-title-heading">
                    <div>
                        <div class="page-title-subheading opacity-10">
                            <nav class="" aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item">
                                        <a>
                                            <i aria-hidden="true" class="fa fa-home"></i>
                                        </a>
                                    </li>
                                    <li class="breadcrumb-item">
                                        <a>Jenis Pemeriksaan</a>
                                    </li>
                                    <li class="active breadcrumb-item" aria-current="page">

                                    </li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="tabs-animation">
            <div class="card mb-3">
                <div class="card-header-tab card-header">
                    <div class="col-12 col-lg-5 col-md-7 p-0">
                        <div class="d-flex justify-content-left align-items-center">
                            <button class=" mr-1 btn-icon btn btn-primary showform" data-form='AddJp' data-target="#myModal"><i class="fa fa-plus" aria-hidden="true"></i> Periksa</button>
                            <button class=" mr-1 btn-icon btn btn-primary currentform"><i class="fa fa-plus" aria-hidden="true"></i> form aktive</button>
                            <p class="d-Inline show-sv m-0"></p>
                        </div>
                    </div>
                    <div class="col-12 col-md-5 col-lg-7 align-self-center">
                        <div class="d-flex justify-content-end">
                            <select name="poli" class="search-height mr-1 poli-val" id="poli">
                                <option disabled hidden selected>Pilih Poli .....</option>
                                <option value="">Pilih Semua</option>
                                @foreach($poli as $pol)
                                <option value="{{$pol->kod}}">{{$pol->nam}}</option>
                                @endforeach
                            </select>
                            <input type="text" class="d-inline search-height search-value mr-1" placeholder="Type to search">
                            <button class=" mr-1 btn-icon btn btn-light vr-search" data-add="searchjps"><i class="fa fa-search" aria-hidden="true"></i></button>
                            <button class=" mr-1 btn-icon btn btn-danger">Pdf</button>
                            <button class=" mr-1 btn-icon btn btn-success " wire:click.prevent="create()">Excel</button>
                        </div>
                    </div>
                </div>
                <div class="card-body table-responsive table-jenispemeriksaan">
                    {!!$jenispemeriksaan!!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('bottom')

<div class="modal fade  " id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog " role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Input Pemeriksaan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="AddJp" action="test" method="post">
                    <div class="row">
                        @csrf
                        <div class="col-lg-12">
                            <table class="table table-bordered table-responsive table-hover table-striped">
                                <thead>
                                    <tr>
                                        <td> Kode</td>
                                        <td>
                                            <div class="vr-form">
                                                <input class="msgkode" name="kode" type="text">
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Jenis</td>
                                        <td>
                                            <div class="vr-form">
                                                <input class="msgjenis" name="jenis" type="text" size="50">
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Poli</td>
                                        <td>
                                            <div class="vr-form">
                                                <select name="koddiv" class="msgkoddiv form-control">
                                                    <option disabled hidden selected>Pilih Poli</option>
                                                    @foreach($poli as $pol)
                                                    <option value="{{$pol->kod}}">{{$pol->nam}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </td>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                        <div class="col-lg-12">
                            <button class="btn btn-primary" type="submit" name="submit">Simpan</button> <button type="reset" class="btn btn-success">BATAL</button>
                        </div>
                    </div>

                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary keluar" data-dismiss="modal">Keluar</button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade  " id="EditModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog " role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="UpdateJp" method="post" class="edit-jenispemeriksaan">
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary keluar" data-dismiss="modal">Keluar</button>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    function refreshData(res) {
        $('.table-jenispemeriksaan').html(res);
        console.log(res);
    }

    function searchData() {
        var data = {
            _token: tkn(),
            search: $(".search-value").val(),
            poli: $('.poli-val').val(),
        }
        return data;
    }
</script>
@endsection