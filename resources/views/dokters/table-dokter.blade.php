<div class="d-flex justify-content-center">
    @if(isset($message))
    <h5 class="text-danger">($message)</h5>
    @endif
</div>
<table id="testing" class="table table-hover table-striped table-bordered">
    <thead>
        <tr>
            <th>#</th>
            <th>Kode Dokter</th>
            <th>Nama</th>
            <th>Jenis Kelamin</th>
            <th>Alamat</th>
            <th>Email</th>
            <th>Telepon</th>
            <th>Poli</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach($dokter as $jp)
        <tr>
            <td>{{$loop->iteration}}</td>
            <td>{{$jp->kode_dokter}}</td>
            <td>{{$jp->nama}}</td>
            <td>{{$jp->jenkel}}</td>
            <td>{{$jp->alamat}}</td>
            <td>{{$jp->email}}</td>
            <td>{{$jp->telepon}}</td>
            <td>{{$jp->nam}}</td>
            <td>
                <p class="showform text-primary" data-edit="true" data-uniq="editdokter/{{$jp->id}}" data-core=".edit-data" data-target="#EditModal"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></p> | <span class="d-inline deldata pointer text-danger" data-uniq="deldokter/{{$jp->id}}"><i class="fa fa-trash-o" aria-hidden="true"></i></span>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
{!! $pagination !!}