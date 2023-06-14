<table id="testing" class="table table-hover table-striped table-bordered">
    <thead>
        <tr>
            <th>#</th>
            <th>Kode</th>
            <th>Nama Alkes</th>
            <th>Satuan</th>
            <th>Katgori</th>
            <th>Stok</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach($alkes as $al)
        <tr>
            <td>{{$loop->iteration}}</td>
            <td>{{$al->kodbar}}</td>
            <td>{{$al->nam}}</td>
            <td>{{$al->sat}}</td>
            <td>{{$al->jen}}</td>
            <td></td>
            <td>
                <a class="text-warning show-triger pointer"><i class="fa fa-list-alt" aria-hidden="true"></i></a> | <p class="showform text-primary" data-edit="true" xdata-core=".edit-data" data-form='UpdatePasien' data-target="#EditModal"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></p> | <span class="d-inline deldata pointer text-danger"><i class="fa fa-trash-o" aria-hidden="true"></i></span>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
{!! $pagination !!}