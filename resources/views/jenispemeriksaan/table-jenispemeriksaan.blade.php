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
            <th>Jenis</th>
            <th>type</th>
            <th>item</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach($jenispemeriksaan as $jp)
        <tr>
            <td>{{$loop->iteration}}</td>
            <td>{{$jp->kode}}</td>
            <td>{{$jp->jenis}}</td>
            <td>@foreach($poli as $pol) @if($jp->koddiv == $pol->kod) {{$pol->nam}} @endif @endforeach</td>
            <td>{{$jp->items_count}}</td>
            <td>
                <a href="jenispemeriksaan/item/{{$jp->kode}}" class="text-warning"><i class="fa fa-list-alt" aria-hidden="true"></i></a> | <p class="showform text-primary" data-edit="true" data-uniq="editJp/{{$jp->id}}" data-core=".edit-jenispemeriksaan" data-form='UpdateJp' data-target="#EditModal"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></p> | <span class="d-inline deldata pointer text-danger" data-uniq="delJp/{{$jp->id}}"><i class="fa fa-trash-o" aria-hidden="true"></i></span>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
{!! $pagination !!}