<table class="table table-srtiped table-bordered">
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
            <td>{{$d->jpitem->kode}}</td>
            <td>{{$d->jpitem->jenispemeriksaan->jenis}}</td>
            <td>{{$d->jpitem->parameter}}</td>
            <td>{{$d->harga}}</td>
            <td><span class="d-inline deldata pointer text-danger" data-uniq="deltindakan/{{$d->id}}"><i class="fa fa-trash-o" aria-hidden="true"></i></span>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>