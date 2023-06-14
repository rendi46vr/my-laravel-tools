<table class="table table-srtiped table-bordered" style="width: 100%;">
    <thead>
        <tr>
            <th colspan="5"><input type="text" name="search" class="form-control search-height search-tindakan mr-1" placeholder="Cari...."></th>

            <th><button class="mr-1 btn-icon btn btn-light vr-search" data-val=".search-tindakan" data-add="searchtindakan"><i class="fa fa-search" aria-hidden="true"></i></button></th>
        </tr>
        <tr>
            <th>#</th>
            <th>Kode</th>
            <th>jenis Tindakan</th>
            <th>Tindakan</th>
            <th>Biaya</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        @foreach($tindakanPasien as $d)
        <tr>
            <td>{{$loop->iteration}}</td>
            <td>{{$d->kode}}</td>
            <td>{{$d->jenispemeriksaan->jenis}}</td>
            <td>{{$d->parameter}}</td>
            <td>{{$d->biaya}}</td>
            <td><button class="btn btn-success nextket d-inline" data-add="atpasien" data-popup="false" data-kode="{{$d->id}}"><i class="fa fa-plus" aria-hidden="true"></i></button>
                <span class="m-0 d-inline}"></span>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

{!! $pagination !!}