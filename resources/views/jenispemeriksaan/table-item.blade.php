<div class="d-flex justify-content-center">
    @if($message != null)
    <h5 class="text-danger">($message)</h5>
    @endif
</div>
<table id="testing" data-item="{{$jpitems->total()}}" class="table table-hover table-striped table-bordered">
    <thead>
        <tr>
            <th>#</th>
            <th>Kode</th>
            <th>Parameter</th>
            <th>Biaya</th>
            <th>Dokter</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach($jpitems as $item)
        <tr>
            <td>{{$loop->iteration}}</td>
            <td>{{$item->kode}}</td>
            <td>{{$item->parameter}}</td>
            <td>{{$item->biaya}}</td>
            <td>{{$item->perdok}}</td>
            <td>
                <p class="showform text-primary" data-edit="true" data-uniq="editjpitem/{{$item->id}}" data-core=".edit-data" data-form='UpdateJpItem' data-target="#EditModal"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></p> | <span class="d-inline deldata pointer text-danger" data-uniq="deljpitem/{{$item->id}}"><i class="fa fa-trash-o" aria-hidden="true"></i></span>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
{!! $pagination !!}