<table class="table table-srtiped table-bordered" style="width: 100%;">
    <thead>
        <tr>
            <th>#</th>
            <th>Kode Obat</th>
            <th>Nama Obat</th>
            <th>qty</th>
            <th>Harga satuan</th>
            <th>Keterangan</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        @foreach($reseps as $rs)
        <tr>
            <td>{{$loop->iteration}}</td>
            <td class="kod">{{$rs->kode_obat}}</td>
            <td>{{$rs->namaobat}}</td>
            <td><input type="number" size="5" class="changeresep" min="1" max="100" name="qty" value="{{$rs->qty}}"></td>
            <td>{{$rs->hargajual}}</td>
            <td><input type="text" class="changeresep" name="ket" value="{{$rs->ket}}"></td>
            <td class="act"><span style="display:none;" class="d-inlin savedata pointer text-danger mr-1"> <i class="fa fa-check-circle f-1 text-success  ml-1" aria-hidden="true"> | </i></span><span class="d-inline deldata pointer text-danger" data-uniq="delresp/{{$rs->id}}"><i class="fa fa-trash-o" aria-hidden="true"></i></span></td>
        </tr>
        @endforeach
    </tbody>
</table>