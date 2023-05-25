<div class="row">
    @csrf
    <div class="col-lg-12">
        <table class="table table-bordered table-responsive table-hover table-striped">
            <thead>
                <tr>
                    <input name="uniq" type="hidden" value="{{$jp->id}}">
                    <td> Kode</td>
                    <td>
                        <div class="vr-form">
                            <input class="msgkode" name="kode" type="text" value="{{$jp->kode}}">
                            <div class="help-block text-danger with-errors"></div>

                        </div>
                    </td>
                </tr>
                <tr>
                    <td>Jenis</td>
                    <td>
                        <div class="vr-form">
                            <input class="msgjenis" name="jenis" type="text" size="50" value="{{$jp->jenis}}">
                            <div class="help-block text-danger with-errors"></div>

                        </div>
                    </td>
                </tr>
                <tr>
                    <td>Poli</td>
                    <td>
                        <div class="vr-form">
                            <select name="koddiv" class="msgkoddiv form-control">
                                <option hidden selected value="{{$jp->koddiv}}">{{$jp->koddiv}}</option>
                                @foreach($poli as $pol)
                                <option value="{{$pol->kod}}">{{$pol->nam}}</option>
                                @endforeach
                            </select>
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