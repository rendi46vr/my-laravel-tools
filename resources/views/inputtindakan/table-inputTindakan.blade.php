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
            <th>Jenis Kelamin</th>
            <th>Usia</th>
            <th>Dokter</th>
            <th>Poli</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach($inputTindakan as $pas)
        <tr>
            <td>{{$loop->iteration}}</td>
            <td>{{$pas->nopen}}</td>
            <td>{{$pas->namapasien}}</td>
            <td>{{$pas->sex}}</td>
            <td>{{$pas->umur}}</td>
            <td>{{$pas->namadokter}}</td>
            <td>{{$pas->poli}}</td>
            <td>
                <a href="{{url('inputTindakan/'.$pas->id)}}" class="text-primary"><i class="fa fa-pencil" aria-hidden="true"></i></a> | <span class="d-inline deldata pointer text-danger" data-uniq="deltindakan/{{$pas->id}}"><i class="fa fa-trash-o" aria-hidden="true"></i></span>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>