@extends('layouts.app')
@section('title')
{{$jp->kode}} | {{$jp->jenis}}

@endsection
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
                                    <li class=" breadcrumb-item" aria-current="page">
                                        {{$jp->jenis}}
                                    </li>
                                    <li class="active breadcrumb-item" aria-current="page">
                                        Item
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
                            <button class=" mr-1 btn-icon btn btn-primary showform" data-form='AddJpItem' data-target="#myModal"><i class="fa fa-plus" aria-hidden="true"></i> Data Item</button>
                            <button class=" mr-1 btn-icon btn btn-primary currentform"><i class="fa fa-plus" aria-hidden="true"></i> form aktive</button>
                            <p class="d-Inline show-sv m-0"></p>
                            <p class="d-Inline data-total m-0" style="display: none;">{{$jp->items_count}}</p>
                        </div>
                    </div>
                </div>
                <div class="card-body table-responsive table-data">
                    {!!$items!!}
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
                <h5 class="modal-title" id="exampleModalLabel"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="AddJpItem" action="test" method="post">
                    <div class="table-responsive">
                        <input name="jenispemeriksaan_id" type="hidden" value="{{$jp->id}}">
                        <div class="table-responsive">
                            <div class="row">
                                @csrf
                                <div class="col-lg-12">
                                    <table class="table table-bordered table-hover table-striped">
                                        <thead>
                                            <tr>
                                                <td> Kode</td>
                                                <td>
                                                    <div class="vr-form">
                                                        <input class="msgkode" name="kode" type="text" readonly value="{{$jp->kode.'.'.($jp->items_count+1)}}">
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Parametr</td>
                                                <td>
                                                    <div class="vr-form">
                                                        <input class="msgparameter" name="parameter" type="text" size="40">
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Biaya</td>
                                                <td>
                                                    <div class="vr-form">
                                                        <input class="msgbiaya" name="biaya" type="text" size="40" value="0">
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td> PersenDokter</td>
                                                <td>
                                                    <div class="vr-from">
                                                        <input type="number" name="perdok" value="0" max="100">
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
                <form id="UpdateJpItem" method="post" class="edit-data">
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
        const ini = $('.table-data');
        ini.html(res);
        console.log(res);
        const total = +ini.find('table').data('item');
        $('.msgkode').val("{{$jp->kode}}." + (total + 1))
    }

    function searchData() {
        if ($(".search-value") != null) {
            return {
                _token: tkn(),
                search: $(".search-value").val()
            }
        } else {
            return null
        }

    }
</script>
@endsection