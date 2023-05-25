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
                                        <a>Obat & Alkes</a>
                                    </li>
                                    <li class="active breadcrumb-item" aria-current="page">
                                        Obat
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
                            <button class=" mr-1 btn-icon btn btn-primary showform" data-form='AddSupplier' data-target="#myModal"><i class="fa fa-plus" aria-hidden="true"></i> Obat</button>
                            <button class=" mr-1 btn-icon btn btn-primary currentform"><i class="fa fa-plus" aria-hidden="true"></i> form aktive</button>
                            <p class="d-Inline show-sv m-0"></p>
                        </div>
                    </div>
                    <div class="col-12 col-md-5 col-lg-7 align-self-center">
                        <div class="d-flex justify-content-end">
                            <input type="text" class="d-inline search-height search-value mr-1" placeholder="Type to search">
                            <button class=" mr-1 btn-icon btn btn-light vr-search" data-add="searchsupplier"><i class="fa fa-search" aria-hidden="true"></i></button>
                            <button class=" mr-1 btn-icon btn btn-danger">Pdf</button>
                            <button class=" mr-1 btn-icon btn btn-success " wire:click.prevent="create()">Excel</button>
                        </div>
                    </div>
                </div>
                <div class="card-body table-responsive table-jenispemeriksaan">
                    {!! "" !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('bottom')

<div class="modal fade  " id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Input Obat</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="AddSupplier" action="test" method="post">
                    <div class="row">
                        @csrf
                        <div class="col-lg-12">
                            <table class="table table-bordered table-responsive table-hover table-striped">
                                <thead>
                                    <tr>
                                        <td> Kode Obat</td>
                                        <td>
                                            <div class="vr-form">
                                                <input class="msgkode_supplier" name="kode_supplier" type="text">
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Nama Obat</td>
                                        <td>
                                            <div class="vr-form">
                                                <input class="msgnama_supplier" name="nama_supplier" type="text" size="50">
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Satuan</td>
                                        <td>
                                            <div class="vr-form">
                                                <select name="satuan" class="msgtype form-control">
                                                    <option disabled hidden selected>Pilih Satuan</option>
                                                    <option value="PCS">PCS</option>
                                                    <option value="TABLET">TABLET</option>
                                                </select>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Kategori</td>
                                        <td>
                                            <div class="vr-form">
                                                <select name="kategoriobat_id" class="msgtype form-control">
                                                    <option disabled hidden selected>Pilih Kategori</option>
                                                    <option value="Poli Umum">Poli Umum</option>
                                                </select>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Tempat</td>
                                        <td>
                                            <div class="vr-form">
                                                <select name="tempat" class="msgtype form-control">
                                                    <option disabled hidden selected>Pilih Tempat</option>
                                                    <option value="Poli Umum">Poli Umum</option>
                                                </select>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Jenis Obat</td>
                                        <td>
                                            <div class="vr-form">
                                                <select name="jenisobat_id" class="msgtype form-control">
                                                    <option disabled hidden selected>Pilih Jenis</option>
                                                    <option value="Jenis">Poli Umum</option>
                                                </select>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Stock</td>
                                        <td>
                                            <div class="vr-form">
                                                <input class="msgstock" name="stock" type="text" size="50">
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Tanggal Expired</td>
                                        <td>
                                            <div class="vr-form">
                                                <input class="msgtgl_expired" name="tgl_expired" type="date">
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Kegunaan</td>
                                        <td>
                                            <div class="vr-form">
                                                <textarea name="kegunaan" id="" cols="30" rows="2"></textarea>
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
                <h5 class="modal-title" id="exampleModalLabel">Edit Obat</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="UpdateSupplier" method="post" class="edit-jenispemeriksaan">
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
        }
        return data;
    }
</script>
@endsection