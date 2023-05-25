<div class="row">
    @csrf
    <div class="col-lg-12">
        <input name="uniq" type="hidden" value="{{$pasien->id}}">
        <table class="table table-bordered table-responsive table-hover table-striped">
            <thead>
                <tr>
                    <td> Kode</td>
                    <td>
                        <div class="vr-form">
                            <input class="msgkodlan" name="kodlan" type="text" value="{{$pasien->kodlan}}">
                        </div>
                    </td>
                </tr>
                <tr>
                    <td> Nama</td>
                    <td>
                        <div class="vr-form">
                            <input class="msgnam" name="nam" type="text" size="45" value="{{$pasien->nam}}">

                        </div>
                    </td>
                </tr>
                <tr>
                    <td> KTP</td>
                    <td>
                        <div class="vr-form">
                            <input class="msgktp" name="ktp" type="text" value="{{$pasien->ktp}}">

                        </div>
                    </td>
                </tr>
                <tr>
                    <td> Tempat Lahir</td>
                    <td>
                        <div class="vr-form">
                            <input class="msgtemlah" name="temlah" type="text" value="{{$pasien->temlah}}">
                        </div>
                    </td>
                </tr>
                <tr>
                    <td> Tanggal Lahir</td>
                    <td>
                        <div class="vr-form">
                            <input class="msgtgllah" name="tgllah" type="date" value="{{$pasien->tgllah}}">

                        </div>
                    </td>
                </tr>
                <tr>
                    <td> Umur</td>
                    <td>
                        <div class="vr-form">
                            <input class="msgumur" name="umur" type="number" value="{{$pasien->umur}}">
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>Jenis Kelamin</td>
                    <td>
                        <div class="vr-form">
                            <select class="msgjenkel" name="jenkel" id="">
                                <option value="{{$pasien->jenkel}}" selected hidden>{{$pasien->jenkel}}</option>
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
                            <input class="msgema" name="ema" type="email" value="{{$pasien->ema}}">
                        </div>
                    </td>
                </tr>
                <tr>
                    <td> Telepon</td>
                    <td>
                        <div class="vr-form">
                            <input class="msgnowa" name="nowa" type="number" value="{{$pasien->nowa}}">
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>Status Kawin</td>
                    <td>
                        <div class="vr-form">
                            <select class="msgstakaw" name="stakaw" id="">
                                <option value="{{$pasien->stakaw}}" selected hidden>{{$pasien->stakaw}}</option>
                                <option value="Kawin">Kawin</option>
                                <option value="Belum Kawin">Belum Kawin</option>
                            </select>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td> alamat</td>
                    <td>
                        <div class="vr-form">
                            <textarea class="msgala" name="ala" id="" cols="40" rows="2">{{$pasien->ala}}</textarea>
                        </div>
                    </td>
                </tr>

                <tr>
                    <td>Poli</td>
                    <td>
                        <div class="vr-form">
                            <select class="msgkoddiv" name="koddiv" class="msgtype form-control">

                                @foreach($poli as $pol)
                                @if($pasien->koddiv == $pol->kod)
                                <option selected value="{{$pol->kod}}">{{$pol->nam}}</option>
                                @else
                                <option value="{{$pol->kod}}">{{$pol->nam}}</option>
                                @endif
                                @endforeach
                            </select>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td> Jenis Bayar</td>
                    <td>
                        <div class="vr-form">
                            <select class="msgjenbay" name="jenbay" id="">
                                <option value="{{$pasien->jenbay}}" selected hidden>{{$pasien->jenbay}}</option>
                                <option value="Umum">Umum</option>
                                <option value="Transfer">Transfer</option>
                            </select>
                        </div>
                    </td>
                </tr>

                <tr>
                    <td> Status Pasien</td>
                    <td>
                        <div class="vr-form">
                            <select class="msgstapas" name="stapas" id="">
                                <option value="{{$pasien->stapas}}" selected hidden>{{$pasien->stapas}}</option>
                                <option value="Baru">Baru</option>
                                <option value="Pelanggan">Pelanggan</option>
                            </select>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td> Kelompok</td>
                    <td>
                        <div class="vr-form">
                            <select class="msggrup" name="grup" id="">
                                @foreach($kelompok as $kel)
                                @if($pasien->grup == $kel->id)
                                <option selected value="{{$kel->id}}">{{$kel->kelompok}}</option>
                                @else
                                <option value="{{$kel->id}}">{{$kel->kelompok}}</option>

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