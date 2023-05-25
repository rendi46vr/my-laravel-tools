<div class="row">
    @csrf
    <div class="col-lg-12">
        <input type="hidden" name="uniq" value="{{$supplier->id}}">
        <table class="table table-bordered table-responsive table-hover table-striped">
            <thead>
                <tr>
                    <td> Kode Supplier</td>
                    <td>
                        <div class="vr-form">
                            <input class="msgkode_supplier" name="kode_supplier" type="text" value="{{$supplier->kode_supplier}}">
                            <div class="help-block text-danger with-errors"></div>

                        </div>
                    </td>
                </tr>
                <tr>
                    <td>Nama PT</td>
                    <td>
                        <div class="vr-form">
                            <input class="msgnama_supplier" name="nama_supplier" type="text" size="50" value="{{$supplier->nama_supplier}}">
                            <div class="help-block text-danger with-errors"></div>

                        </div>
                    </td>
                </tr>
                <tr>
                    <td>Telepon</td>
                    <td>
                        <div class="vr-form">
                            <input class="msgtelepon" name="telepon" type="text" value="{{$supplier->telepon}}">
                            <div class="help-block text-danger with-errors"></div>


                        </div>
                    </td>
                </tr>
                <tr>
                    <td>Email</td>
                    <td>
                        <div class="vr-form">
                            <input class="msgemail" name="email" type="email" size="50" value="{{$supplier->email}}">
                            <div class="help-block text-danger with-errors"></div>

                        </div>
                    </td>
                </tr>
                <tr>
                    <td>Alamat</td>
                    <td>
                        <div class="vr-form">
                            <textarea class="msgalamat" name="alamat" cols="50" rows="2">{{$supplier->alamat}}</textarea>
                            <div class="help-block text-danger with-errors"></div>

                        </div>
                    </td>
                </tr>

            </thead>
        </table>
    </div>
    <div class="col-lg-12">
        <button class="btn btn-primary" type="submit" name="submit">Simpan</button> <button type="reset" class="btn btn-success">BATAL</button>
    </div>
</div>