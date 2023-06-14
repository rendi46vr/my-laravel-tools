@extends('layouts.app')
@section('top')
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
                            <p class="d-Inline show-sv m-0">Tabel Input TIndakan</p>
                        </div>
                    </div>

                </div>
                <div class="card-body table-responsive table-data">
                    <table id="testing" class="table table-hover table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Kode</th>
                                <th>Nama</th>
                                <th>Dokter</th>
                                <th>Poli</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($kasirs as $pas)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$pas->nopen}}</td>
                                <td>{{$pas->namapasien}}</td>
                                <td>{{$pas->namadokter}}</td>
                                <td>{{$pas->poli}}</td>
                                <td>
                                    {{$pas->sta}}
                                </td>
                                <td>
                                    <a href="{{url('kasir/'.$pas->id)}}" class="text-primary"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('bottom')
<script type="text/javascript">
    function refreshData(res) {
        $('.table-data').html(res);
    }
</script>
@endsection