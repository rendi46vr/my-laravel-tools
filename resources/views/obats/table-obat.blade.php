<table id="testing" class="table table-hover table-striped table-bordered">
    <thead>
        @if(!$full)
        <tr>
            <th colspan="4"><input type="text" name="search" class="form-control search-height respe-val mr-1" placeholder="Cari...."></th>
            <th colspan="2"><button class="mr-1 btn-icon btn btn-light vr-search" data-val=".respe-val" data-add="searchobat"><i class="fa fa-search" aria-hidden="true"></i></button></th>
        </tr>
        @endif
        <tr>
            <th>#</th>
            <th>Kode</th>
            <th>Nama Obat</th>
            <th>Satuan</th>
            <th>Katgori</th>
            @if($full)
            <th>Stok</th>
            @endif
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach($obats as $obat)
        <tr>
            <td>{{$loop->iteration}}</td>
            <td>{{$obat->kodbar}}</td>
            <td>{{$obat->nam}}</td>
            <td>{{$obat->sat}}</td>
            <td>{{$obat->jen}}</td>
            @if($full)
            <td></td>
            @endif
            <td>
                @if($full)
                <a class="text-warning show-triger pointer"><i class="fa fa-list-alt" aria-hidden="true"></i></a> | <p class="showform text-primary" data-edit="true" xdata-core=".edit-data" data-form='UpdatePasien' data-target="#EditModal"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></p> | <span class="d-inline deldata pointer text-danger"><i class="fa fa-trash-o" aria-hidden="true"></i></span>
                @else
                <button class="btn btn-success nextket d-inline" data-add="addrpasien" data-popup="false" data-kode="{{$obat->id}}"><i class="fa fa-plus" aria-hidden="true"></i></button>
                <span class="m-0 d-inline}"></span>
                @endif
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
{!! $pagination !!}