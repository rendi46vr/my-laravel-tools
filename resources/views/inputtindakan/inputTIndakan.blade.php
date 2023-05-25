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
                                    <li class="breadcrumb-item">
                                        <a>Input Tindakan</a>
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
                    {!! $inputTindakan !!}
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