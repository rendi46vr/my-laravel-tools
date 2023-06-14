<div class="d-flex justify-content-center">
    @if(isset($message))
    <h5 class="text-danger">($message)</h5>
    @endif
</div>
<table id="testing" class="table table-hover table-striped table-bordered hidden-diagnosa">
    <thead>
        <tr>
            <th colspan="3"><input type="text" name="search" class="form-control search-height search-value mr-1" placeholder="Cari...."></th>

            <th><button class="mr-1 btn-icon btn btn-light vr-search" data-add="searchdiagnosas"><i class="fa fa-search" aria-hidden="true"></i></button></th>
        </tr>
        <tr>
            <th>#</th>
            <th>Kode</th>
            <th>Nama</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach($diagnosas as $d)
        <tr>
            <td>{{$loop->iteration}}</td>
            <td>{{$d->kode}}</td>
            <td>{{$d->diagnosa}}</td>
            <td>
                <!-- "addp" -->
                <button class="btn btn-success nextket d-inline" data-popup="true" data-kode="{{$d->id}}"><i class="fa fa-plus" aria-hidden="true"></i></button>
                <p class="m-0 d-inline d{{$d->id}}"></p>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
{!! $pagination !!}