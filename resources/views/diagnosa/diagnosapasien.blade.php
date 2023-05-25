<table class="table table-srtiped table-bordered" style="width: 100%;">
    <thead>
        <tr>
            <th>#</th>
            <th>Kode</th>
            <th>Diagnosa</th>
            <th>Keterangan</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        @foreach($diagnosa as $d)
        <tr>
            <td>{{$loop->iteration}}</td>
            <td>{{$d->diagnosa->kode}}</td>
            <td>{{$d->diagnosa->diagnosa}}</td>
            <td>{{$d->ket}}</td>
            <td><span class="d-inline deldata pointer text-danger" data-uniq="deldiagnosa/{{$d->id}}"><i class="fa fa-trash-o" aria-hidden="true"></i></span></td>
        </tr>
        @endforeach
    </tbody>
</table>