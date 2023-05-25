@extends('layouts.app')
@section('title')
Input Tindakan | {{$pendaftar->namapasien}}
@endsection
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
                                    <li class="breadcrumb-item">
                                        <a>Input Tindakan</a>
                                    </li>
                                    <li class="breadcrumb-item">
                                        <a>{{$pendaftar->namapasien}}</a>
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
                    <div class="d-flex">
                        <div class="justify-self-left align-items-center">
                            <p class="d-Inline show-sv m-0">Form tindakan</p>
                        </div>
                        <div class="justify-self-end align-items-center">
                            <p class="d-Inline show-sv m-0">
                            </p>
                        </div>
                    </div>
                </div>
                <div class="card-body table-responsive table-data pb-1 pt-1 lh-1">
                    <div class="row">
                        <div class="col-lg-4 col-md-4">

                            <table>
                                <tr>
                                    <td>No Pendaftar</td>
                                    <td>: {{$pendaftar->nopen}}</td>
                                </tr>
                                <tr>
                                    <td>No Pasien</td>
                                    <td>: {{$pendaftar->pasien_id}}</td>
                                </tr>
                                <tr>
                                    <td>Nama</td>
                                    <td>: {{$pendaftar->namapasien}}</td>
                                </tr>

                                <tr>
                                    <td>Jenis Kelamin / Umur</td>
                                    <td>: {{$pendaftar->sex}}, {{$pendaftar->umur}} Tahun</td>
                                </tr>
                            </table>
                        </div>
                        <div class="col-lg-6 col-md-6">
                            <table>
                                <tr>
                                    <td>Tanggal</td>
                                    <td>: {{$pendaftar->tgldaftar}}</td>
                                </tr>
                                <tr>
                                    <td>Jam</td>
                                    <td>: {{$pendaftar->waktudaftar}}</td>
                                </tr>
                                <tr>
                                    <td>Poli</td>
                                    <td>: {{$pendaftar->poli}}</td>
                                </tr>
                                <tr>
                                    <td>Pelanggan</td>
                                    <td>: Baru</td>
                                </tr>
                            </table>
                        </div>


                    </div>
                    <div class="card mt-1">
                        <div class="card-header-tab card-header">

                            <ul class="nav">
                                <li class="nav-item"><a data-toggle="tab" href="#catatan" class="nav-link pb-0 pt-0 active">Catatan</a></li>
                                <li class="nav-item"><a data-toggle="tab" href="#tab-eg5-1" class="nav-link pb-0 pt-0">Diagnosa</a></li>
                                <li class="nav-item"><a data-toggle="tab" href="#resep" class="nav-link pb-0 pt-0">Resep</a></li>
                                <li class="nav-item"><a data-toggle="tab" href="#tindakan" class="nav-link pb-0 pt-0 ">Tindakan</a></li>
                                <li class="nav-item"><a data-toggle="tab" href="#tinda-lanjut" class="nav-link pb-0 pt-0">Tindak Lanjut</a></li>
                                <li class="nav-item"><a data-toggle="tab" href="#riwayat" class="nav-link pb-0 pt-0">Riwayat Berobat</a></li>
                            </ul>
                        </div>
                        <div class="card-body">
                            <div class="tab-content">
                                <div class="tab-pane active" id="catatan" role="tabpanel">
                                    <form>
                                        <div class="row align-items-center form-group">
                                            <label for="exampleEmail22" class=" mb-0 col-4 col-lg-2 col-md-3 pe-0 f-75">Riwayat Alergi</label>
                                            <input name="email" id="exampleEmail22" placeholder="........." type="text" class="form-control col-6 col-lg-9 col-md-8">
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-4 col-lg-2">
                                                <label for="tinggibadan" class="label-control f-75">Tinggi Badan</label>
                                                <input type="text" class="form-control">
                                            </div>
                                            <div class="form-group col-4 col-lg-2">
                                                <label for="tinggibadan" class="label-control f-75">Berat Badan</label>
                                                <input type="text" class="form-control">
                                            </div>
                                            <div class="form-group col-4 col-lg-2">
                                                <label for="tinggibadan" class="label-control f-75">Tekanan Darah</label>
                                                <input type="text" class="form-control">
                                            </div>
                                            <div class="form-group col-5 col-lg-3">
                                                <label for="tinggibadan" class="label-control f-75">Golongan Darah</label>
                                                <select name="goldar" class="goldar">
                                                    <option hidden selected>Pilih golongan darah</option>
                                                    <option value="A">A</option>
                                                    <option value="B">B</option>
                                                    <option value="O">O</option>
                                                    <option value="AB">AB</option>
                                                </select>
                                            </div>
                                            <div class="form-group col-4 col-lg-2">
                                                <label for="tinggibadan" class="label-control f-75">Tinggi Badan</label>
                                                <input type="text" class="form-control">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <input type="text" name="catatan" id="ckeditor4">
                                        </div>

                                    </form>
                                </div>
                                <div class="tab-pane" id="tab-eg5-1" role="tabpanel">
                                    <div class="row">
                                        <div class="col-12  d-flex me-2 mb-2" style="justify-content: flex-end;">
                                            <button class="btn btn-info showform" data-target="#diagnosa"><i class="fa fa-plus" aria-hidden="true"></i> Diagnosa</button>
                                        </div>
                                        <div class="col-12 diagnosa-pasien">
                                            {!! $diagnosapasien !!}
                                        </div>
                                    </div>

                                </div>
                                <div class="tab-pane" id="resep" role="tabpanel">
                                    <div class="row">
                                        <div class="col-12  d-flex me-2 mb-2" style="justify-content: flex-end;">
                                            <button class="btn btn-info showform" data-target="#modalresep"><i class="fa fa-plus" aria-hidden="true"></i> Resep</button>
                                        </div>
                                        <div class="col-12 resep-pasien">

                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane" id="tindakan" role="tabpanel">
                                    <div class="row">
                                        <div class="col-12  d-flex me-2 mb-2" style="justify-content: flex-end;">
                                            <button class="btn btn-info showform" data-target="#modaltindakan"><i class="fa fa-plus" aria-hidden="true"></i> Tindakan</button>
                                        </div>
                                        <div class="col-12 Tindakan-pasien">

                                        </div>
                                    </div>
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
@section('bottom')
<div class="modal fade " id="diagnosa" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Pilih Diagnosa</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body table-diagnosas">
                <div class="diag">
                    {!! $diagnosa !!}
                </div>
                <div class="keterangan" style="display: none;">
                    <input type="hidden" class="pilih-diag">
                    <label class="label-control">Keterangan</label>
                    <textarea id="" class="ketval form-control" cols="30" rows="5"></textarea>
                    <div class="row mt-3">
                        <div class="col-6 d-flex justify-content-start">
                            <button class="btn btn-success  bacck justify-content-end">
                                <i class="fa fa-chevron-left" aria-hidden="true"></i> kembali </button>
                        </div>
                        <div class="col-6 d-flex justify-content-end">
                            <button class="btn btn-primary  adddp justify-content-end" data-add="itdiagnosa"> Simpan</button>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade " id="modalresep" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Pilih Obat </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body table-diagnosas">
                <div class="table-resep">

                </div>
                <div class="keterangan" style="display: none;">
                    <input type="hidden" class="pilih-diag">
                    <label class="label-control">Keterangan</label>
                    <textarea id="" class="ketval form-control" cols="30" rows="5"></textarea>
                    <div class="row mt-3">
                        <div class="col-6 d-flex justify-content-start">
                            <button class="btn btn-success  bacck justify-content-end">
                                <i class="fa fa-chevron-left" aria-hidden="true"></i> kembali </button>
                        </div>
                        <div class="col-6 d-flex justify-content-end">
                            <button class="btn btn-primary  adddp justify-content-end" data-add="itresep"> Simpan</button>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade " id="modaltindakan" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Tindakan </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body table-diagnosas">
                <div class="table-tindakan">
                    {!!!!}
                </div>
                <div class="keterangan" style="display: none;">
                    <input type="hidden" class="pilih-diag">
                    <label class="label-control">Keterangan</label>
                    <textarea id="" class="ketval form-control" cols="30" rows="5"></textarea>
                    <div class="row mt-3">
                        <div class="col-6 d-flex justify-content-start">
                            <button class="btn btn-success  bacck justify-content-end">
                                <i class="fa fa-chevron-left" aria-hidden="true"></i> kembali </button>
                        </div>
                        <div class="col-6 d-flex justify-content-end">
                            <button class="btn btn-primary  adddp justify-content-end" data-add="ittindakan"> Simpan</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="{{asset('/ckeditor/ckeditor.js')}}"></script>
<script type="text/javascript">
    var ck4 = document.getElementById("ckeditor4");
    CKEDITOR.replace(ck4, {
        language: 'en-gb'
    });
    CKEDITOR.config.allowedContent = true;

    function refreshData(res) {
        $(res.have).html(res.data);
    }

    function searchData() {
        var data = {
            _token: tkn(),
            search: $(".search-value").val(),
        }
        return data;
    }

    $(document).on('click', '.adddp', function() {
        doReq(this.dataset.add + '/' + $('.pilih-diag').val(), {
            _token: tkn(),
            ket: $('.ketval').val()
        }, (res) => {
            $('.d' + $('.pilih-diag').val()).html(res.one);
            if (res.status) {
                $(res.have).html(res.data);
            }
        })
        kethidden()
    })
    $(document).on('click', '.nextket', function() {
        c('asdok')
        ketshow()
        $('.pilih-diag').val(this.dataset.kode);
    })
    $(document).on('click', '.bacck', function() {
        kethidden()
    })

    function ketshow() {
        $('.diag').hide();
        $('.keterangan').show();
    }

    function kethidden() {
        $('.ketval').val('')
        $('.diag').show();
        $('.keterangan').hide();
    }
    $('.goldar').select2();
</script>
@endsection