@extends('layouts.app')
@section('top')
<?php

use App\Tools\Tools;
?>
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
                                        <a>Kasir</a>
                                    </li>
                                    <li class="breadcrumb-item">
                                        <a>Tagihan</a>
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
                            <p class="d-Inline show-sv m-0">Tagihan</p>
                        </div>
                    </div>

                </div>
                <div class="card-body">
                    <div class="m-1 row">
                        <div class="col-lg-4 p-0">
                            <table class="table table-bordered">
                                <tr class="<?= $tagihan->status < 2 ? 'bg-danger' : 'bg-success'  ?>">
                                    <th colspan="2" style="color: aliceblue;">Pasien</th>
                                </tr>
                                <tr>
                                    <td>No Pendaftar</td>
                                    <td>{{$tagihan->nopen}}</td>
                                </tr>
                                <tr>
                                    <td>No Pasien</td>
                                    <td>{{$tagihan->pasien_id}}</td>
                                </tr>
                                <tr>
                                    <td>Nama</td>
                                    <td>{{$tagihan->namapasien}}</td>
                                </tr>

                                <tr>
                                    <td>Jenis Kelamin / Umur</td>
                                    <td>{{$tagihan->sex}}, {{$tagihan->umur}} Tahun</td>
                                </tr>
                                <tr>
                                    <td>Tanggal</td>
                                    <td>{{$tagihan->tgldaftar}}</td>
                                </tr>
                                <tr>
                                    <td>Jam</td>
                                    <td>{{$tagihan->waktudaftar}}</td>
                                </tr>
                                <tr>
                                    <td>Poli</td>
                                    <td>{{$tagihan->poli}}</td>
                                </tr>
                                <tr>
                                    <td>Pelanggan</td>
                                    <td>Baru</td>
                                </tr>
                                <tr>
                                    <td>Status</td>
                                    <td class="@if($tagihan->status <2) text-danger @else text-success @endif">: {{$tagihan->sta}}</td>
                                </tr>
                            </table>

                        </div>
                        <div class="col-lg-8">
                            <table class="table table-bordered">
                                <tr>
                                    <th colspan="3">Tagihan</th>
                                </tr>

                                @if($obat->count() > 0)
                                <tr>
                                    <td rowspan="{{$obat->count() +1}}">Obat</td>
                                </tr>

                                @foreach($obat as $o)
                                <tr>
                                    <td>{{$o->namaobat}} ({{$o->ket}})</td>
                                    <td style="text-align: end;">{{Tools::fRupiah($o->hargajual)}}</td>
                                </tr>
                                @endforeach
                                @endif
                                @if($tindakanpasien->count() > 0)
                                <tr>
                                    <td rowspan="{{$tindakanpasien->count() +1}}">Tindakan</td>
                                </tr>
                                @foreach($tindakanpasien as $tp)
                                <tr>
                                    <td>{{$tp->jpitem->parameter}} </td>
                                    <td style="text-align: end;">{{Tools::fRupiah($tp->harga)}}</td>
                                </tr>
                                @endforeach
                                @endif
                                <tr>
                                    <th>Total</th>
                                    <th colspan="2" style="text-align: right !important;">{{Tools::fRupiah($total)}}</th>
                                </tr>
                                <tr>
                                    <th colspan="3">Pembayaran</th>
                                </tr>
                                <tr>
                                    <td>
                                        <button class="btn btn-success">Cash</button>
                                    </td>
                                    <td colspan="2" rowspan="3" class="metode-pembayaran">
                                        <form id="pembayaran">
                                            <div class="vr-form">
                                                <label for="" class="label-control">Nominal</label>
                                                <input type="number" name="nominal" class="msgnominal form-control col-6" placeholder="Rp. 000">
                                                <button class="btn btn-success mt-2" type="submit">Bayar</button>
                                            </div>
                                        </form>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <button class="btn btn-success">Bank Transfer</button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <button class="btn btn-success">Via Qris</button>
                                    </td>
                                </tr>

                            </table>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection
@section('bottom')
<script type=" text/javascript">
    function refreshData(res) {
        $('.table-data').html(res);
    }
</script>
@endsection