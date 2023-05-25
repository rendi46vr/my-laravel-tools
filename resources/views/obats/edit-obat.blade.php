<div class="row">
    @csrf
    <div class="col-lg-12">
        <table class="table table-bordered table-hover table-striped">
            <thead>
                <tr>
                    <input name="uniq" type="hidden" value="{{$item->id}}" readonly>
                    <td> Kode</td>
                    <td>
                        <div class="vr-form">
                            <input class="msgkode" name="kode" type="text" readonly value="{{$item->kode}}">
                            <div class="help-block text-danger with-errors"></div>

                        </div>
                    </td>
                </tr>
                <tr>
                    <td>Parametr</td>
                    <td>
                        <div class="vr-form">
                            <input class="msgparameter" name="parameter" type="text" size="40" value="{{$item->parameter}}">
                            <div class="help-block text-danger with-errors"></div>

                        </div>
                    </td>
                </tr>
                <tr>
                    <td>Biaya</td>
                    <td>
                        <div class="vr-form">
                            <input class="msgbiaya" name="biaya" type="text" size="40" value="{{$item->biaya}}">
                            <div class="help-block text-danger with-errors"></div>

                        </div>
                    </td>
                </tr>
                <tr>
                    <td> PersenDokter</td>
                    <td>
                        <div class="vr-from">
                            <input type="number" class="msgperdok" name="perdok" value="{{$item->perdok}}" min="0" max="100">
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