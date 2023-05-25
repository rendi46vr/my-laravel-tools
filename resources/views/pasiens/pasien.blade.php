@extends('layouts.app')
@section('top')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
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
                                        <a>Pasien</a>
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
                            <button class=" mr-1 btn-icon btn btn-primary showform" data-target="#myModal"><i class="fa fa-plus" aria-hidden="true"></i> Pasien Baru</button>
                            <button class=" mr-1 btn-icon btn btn-success daftar showform" data-target="#pendaftaran"><i class="fa fa-plus" aria-hidden="true"></i> Pendaftaran</button>
                            <p class="d-Inline show-sv m-0"></p>
                        </div>
                    </div>
                    <div class="col-12 col-md-5 col-lg-7 align-self-center">
                        <div class="d-flex justify-content-end">
                            <select name="poli" class="search-height mr-1 grup-val" id="poli">
                                <option disabled hidden selected>Pilih Kelompok .....</option>
                                <option value="">Pilih Semua</option>
                                @foreach($kelompok as $kel)
                                <option value="{{$kel->id}}">{{$kel->kelompok}}</option>
                                @endforeach
                            </select>
                            <input type="text" class="d-inline search-height search-value mr-1" placeholder="Type to search">
                            <button class="mr-1 btn-icon btn btn-light vr-search" data-add="searchpasien"><i class="fa fa-search" aria-hidden="true"></i></button>
                            <button class="mr-1 btn-icon btn btn-danger">Pdf</button>
                            <button class="mr-1 btn-icon btn btn-success" wire:click.prevent="create()">Excel</button>
                        </div>
                    </div>
                </div>
                <div class="card-body table-responsive table-data">
                    {!! $pasien !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('bottom')
<script type="text/javascript">
    $(document).on('show.bs.modal', '#pendaftaran', function() {
        let daftar = $("input[name='daftar']:checked")
        if (daftar) $()
        $('.kodlan').html(daftar.data('kodlan'));
        $('.nama').text(daftar.data('nama'));

    })
</script>
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
                <form id="AddPasien" action="test" method="post">
                    <div class="row">
                        @csrf
                        <div class="col-lg-12">
                            <table class="table table-bordered table-responsive table-hover table-striped">
                                <thead>
                                    <tr>
                                        <td> Kode</td>
                                        <td>
                                            <div class="vr-form">
                                                <input class="msgkodlan" name="kodlan" type="text">
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td> Nama</td>
                                        <td>
                                            <div class="vr-form">
                                                <input class="msgnam" name="nam" type="text" size="45">
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td> KTP</td>
                                        <td>
                                            <div class="vr-form">
                                                <input class="msgktp" name="ktp" type="text">
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td> Tempat Lahir</td>
                                        <td>
                                            <div class="vr-form">
                                                <input class="msgtemlah" name="temlah" type="text">
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td> Tanggal Lahir</td>
                                        <td>
                                            <div class="vr-form">
                                                <input class="msgtgllah" name="tgllah" type="date">
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td> Umur</td>
                                        <td>
                                            <div class="vr-form">
                                                <input class="msgumur" name="umur" type="number">
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Jenis Kelamin</td>
                                        <td>
                                            <div class="vr-form">
                                                <select class="msgjenkel" name="jenkel" id="">
                                                    <option value="Laki-laki">Laki-laki</option>
                                                    <option value="Perempuan">Perempuan</option>
                                                </select>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td> Email</td>
                                        <td>
                                            <div class="vr-form">
                                                <input class="msgema" name="ema" type="email">
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td> Telepon</td>
                                        <td>
                                            <div class="vr-form">
                                                <input class="msgnowa" name="nowa" type="number">
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Status Kawin</td>
                                        <td>
                                            <div class="vr-form">
                                                <select class="msgstakaw" name="stakaw" id="">
                                                    <option value="Kawin">Kawin</option>
                                                    <option value="Belum Kawin">Belum Kawin</option>
                                                </select>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td> alamat</td>
                                        <td>
                                            <div class="vr-form">
                                                <textarea class="msgala" name="ala" id="" cols="40" rows="2"></textarea>
                                            </div>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>Poli</td>
                                        <td>
                                            <div class="vr-form">
                                                <select class="msgkoddiv" name="koddiv" class="msgtype form-control">
                                                    <option disabled hidden selected>Pilih Poli</option>
                                                    @foreach($poli as $pol)
                                                    <option value="{{$pol->kod}}">{{$pol->nam}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td> Jenis Bayar</td>
                                        <td>
                                            <div class="vr-form">
                                                <select class="msgjenbay" name="jenbay" id="">
                                                    <option value="Umum">Umum</option>
                                                    <option value="Transfer">Transfer</option>
                                                </select>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td> Status Pasien</td>
                                        <td>
                                            <div class="vr-form">
                                                <select class="msgstapas" name="stapas" id="">
                                                    <option value="Baru">Baru</option>
                                                    <option value="Pelanggan">Pelanggan</option>
                                                </select>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td> Kelompok</td>
                                        <td>
                                            <div class="vr-form">
                                                <select class="msggrup" name="grup" id="">
                                                    @foreach($kelompok as $kel)
                                                    <option value="{{$kel->id}}">{{$kel->kelompok}}</option>
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
<div class="modal fade  " id="pendaftaran" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog " role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Pendaftaran Pasien</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="pasienDaftar" class="another">
                    <div class="row">
                        <div class="col-lg-12">
                            @csrf
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <td class="mr-2"> Kode Pasien</td>
                                        <td class="kodlan">
                                            <p class="m-0 text-warning">Pilih Pasien terlebih Dahulu!</p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="mr-2"> Nama</td>
                                        <td class="nama"> </td>
                                    </tr>
                                    <tr>
                                        <td>Poli</td>
                                        <td>
                                            <div class="vr-form">
                                                <select class="msgpoli " name="poli" style="width: 65%">
                                                    <option disabled hidden selected>Pilih Poli</option>
                                                    @foreach($poli as $pol)
                                                    <option value="{{$pol->kod}}">{{$pol->nam}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                    </tr>
                                    <tr>
                                        <td>Dokter</td>
                                        <td>
                                            <div class="vr-form">
                                                <select class="msgdokter_id" name="dokter_id" style="width: 100%">
                                                    <option disabled hidden selected>Pilih Dokter ...</option>

                                                </select>
                                            </div>
                                        </td>
                                    </tr>
                                    <!-- <tr>
                                        <td>Jenis layanan</td>
                                        <td>
                                            <div class="vr-form">
                                                <select class="msglayanan" name="layanan">
                                                    <option disabled hidden selected>Pilih Poli</option>
                                                    <option value="BPJS">BPJS</option>
                                                    <option value="Asuransi">Asuransi</option>
                                                    <option value="Umum">Umum</option>
                                                </select>
                                            </div>
                                        </td>
                                    </tr> -->
                                </thead>
                            </table>
                        </div>

                        <div class="col-lg-12 d-flex justify-content-end">
                            <button class="btn btn-primary" data-type="success" type="submit" name="submit">Simpan</button> <button type="reset" class="btn btn-success">BATAL</button>

                        </div>
                    </div>
                </form>
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
                <form id="UpdatePasien" method="post" class="edit-data">
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary keluar" data-dismiss="modal">Keluar</button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade  " id="showModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog " role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body show-data">

            </div>

        </div>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function() {
        $('.select2').select2();
        $('.select2-1').select2();
        $('#pasienDaftar .msgpoli').change(function() {
            doReq('dokter/' + this.value, null, (res) => {
                $('.msgdokter_id').html(res)
            })
        })
    });

    function refreshData(res) {
        $('.table-data').html(res);
        console.log(res);
    }

    function searchData() {
        var data = {
            _token: tkn(),
            search: $(".search-value").val(),
        }
        return data;
    }

    function another(res) {
        if (res) {
            var ask = window.confirm("Pasien Berhasil didaftarkan. Apakah ingin ke halaman input Tindakan?");
            if (ask) {
                window.location.href = baseUri('inputTindakan')
            }
        } else {
            alert('Pendaftaran pasien gagal');
        }
        c("res" + res)
    }
</script>
@endsection