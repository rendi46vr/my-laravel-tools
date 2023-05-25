<div class="d-flex justify-content-center">
    @if(isset($message))
    <h5 class="text-danger">($message)</h5>
    @endif
</div>
<table id="testing" class="table table-hover table-striped table-bordered">
    <thead>
        <tr>
            <th>#</th>
            <th>Kode</th>
            <th>Nama</th>
            <th>Alamat</th>
            <th>Jenis Kelamin</th>
            <th>Bayar</th>
            <th>status</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach($pasien as $pas)
        <tr>
            <td><input type="radio" form="pasienDaftar" class="pendaftaran" data-kodlan='{{$pas->kodlan}}' data-nama='{{$pas->nam}}' value="{{$pas->kodlan}}" name="daftar"></td>
            <td>{{$pas->kodlan}}</td>
            <td>{{$pas->nam}}</td>
            <td>{{$pas->ala}}</td>
            <td>{{$pas->jenkel}}</td>
            <td>{{$pas->jenbay}}</td>
            <td>{{$pas->stapas}}</td>
            <td>
                <a data-add='showPasien/{{$pas->id}}' data-toggle="modal" data-target="#showModal" class="text-warning show-triger pointer"><i class="fa fa-list-alt" aria-hidden="true"></i></a> | <p class="showform text-primary" data-edit="true" data-uniq="editpasien/{{$pas->id}}" data-core=".edit-data" data-form='UpdatePasien' data-target="#EditModal"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></p> | <span class="d-inline deldata pointer text-danger" data-uniq="delpasien/{{$pas->id}}"><i class="fa fa-trash-o" aria-hidden="true"></i></span>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
{!! $pagination !!}