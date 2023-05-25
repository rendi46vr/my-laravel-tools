<div class="row">
    @csrf
    <div class="col-lg-12">
        <input type="hidden" name="uniq" value="{{$dokter->id}}">
        <table class="table table-bordered table-responsive table-hover table-striped">
            <thead>
                <tr>
                    <td> Kode</td>
                    <td>
                        <div class="vr-form">
                            <input class="msgkode_dokter" name="kode_dokter" value="{{$dokter->kode_dokter}}" type="text">
                        </div>
                    </td>
                </tr>
                <tr>
                    <td> Nama</td>
                    <td>
                        <div class="vr-form">
                            <input class="msgnama" name="nama" type="text" size="45" value="{{$dokter->nama}}">
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>Jenis Kelamin</td>
                    <td>
                        <div class="vr-form">
                            <select class="msgjenkel" name="jenkel" id="">
                                <option selected hidden value="{{$dokter->jenkel}} ">{{$dokter->jenkel}}</option>
                                <option value="Laki-laki">Laki-laki</option>
                                <option value="Perempuan">Perempuan</option>
                            </select>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td> Email</td>
                    <td>
                        <div class="vr-form">
                            <input class="msgemail" name="email" type="email" value="{{$dokter->email}}">
                        </div>
                    </td>
                </tr>
                <tr>
                    <td> Telepon</td>
                    <td>
                        <div class="vr-form">
                            <input class="msgnowa" name="telepon" type="number" value="{{$dokter->telepon}}">
                        </div>
                    </td>
                </tr>
                <tr>
                    <td> alamat</td>
                    <td>
                        <div class="vr-form">
                            <textarea class="msgala" name="alamat" id="" cols="40" rows="2">{{$dokter->alamat}}</textarea>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>Poli</td>
                    <td>
                        <div class="vr-form">
                            <select class="msgkoddiv" name="koddiv" class="msgtype form-control">
                                @foreach($poli as $pol)
                                @if($dokter->koddiv == $pol->kod)
                                <option selected value="{{$pol->kod}}">{{$pol->nam}}</option>
                                @else
                                <option value="{{$pol->kod}}">{{$pol->nam}}</option>
                                @endif
                                @endforeach
                            </select>
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