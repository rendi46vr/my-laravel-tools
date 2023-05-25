<div class="d-flex justify-content-center">
    @if(isset($message))
    <h5 class="text-danger">($message)</h5>
    @endif
</div>
<table id="testing" class="table table-hover table-striped table-bordered">
    <thead>
        <tr>
            <th>#</th>
            <th>Kode Supplier</th>
            <th>Nama Supplier</th>
            <th>Telepon</th>
            <th>Email</th>
            <th>Alamat</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach($suppliers as $supplier)
        <tr>
            <td>{{$loop->iteration}}</td>
            <td>{{$supplier->kode_supplier}}</td>
            <td>{{$supplier->nama_supplier}}</td>
            <td>{{$supplier->telepon}}</td>
            <td>{{$supplier->email}}</td>
            <td>{{$supplier->alamat}}</td>
            <td>
                <p class="showform text-primary" data-edit="true" data-uniq="editsupplier/{{$supplier->id}}" data-core=".edit-jenispemeriksaan" data-form='UpdateSupplier' data-target="#EditModal"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></p> | <span class="d-inline deldata pointer text-danger" data-uniq="delsupplier/{{$supplier->id}}"><i class="fa fa-trash-o" aria-hidden="true"></i></span>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

{!! $pagination !!}