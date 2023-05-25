<table class="table table-srtiped table-bordered" style="width: 100%;">
    <thead>
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
            <td><span class="d-inline deldata pointer text-danger" data-uniq="deldiagnosa/{{$d->id}}"><i class="fa fa-trash-o" aria-hidden="true"></i></span></td>
        </tr>
        @endforeach
    </tbody>
</table>