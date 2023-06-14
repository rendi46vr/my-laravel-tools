<?php

namespace App\Data;

use Illuminate\Support\Facades\DB;

class Data
{

    private static function con($string)
    {

        return DB::connection($string);
    }
    public static function poli()
    {
        return self::con('server')->table('tdivisi')->select('kod', 'nam')->orderBy('id', 'asc')->get();
    }
    public static function kelompok()
    {
        return self::con('mysql')->table('kelompok')->get();
    }
    public static function pasien()
    {
        return self::con('server')->table('tpelanggan');
    }
    public static function dokter()
    {
        return self::con('mysql')->table('dokters')->select('dokters.id', 'kode_dokter', 'nama', 'jenkel', 'alamat', 'email', 'telepon', 'koddiv', 'tdivisi.nam')
            ->leftJoin('maidatmas.tdivisi', 'tdivisi.kod', 'dokters.koddiv');
    }

    public static function inputTindakan()
    {
        return self::con('mysql')->table('pendaftarans as pen')
            ->select('pen.id', 'nopen', 'pasien_id',  'pel.nam as namapasien', 'pel.umur', 'pol.nam as poli', 'dok.nama as namadokter', 'pel.jenkel as sex', 'status', DB::raw('date_format(pen.created_at, "%d, %M %Y") as tgldaftar, date_format(pen.created_at, "%H : %m ") as waktudaftar , if(status<2,"Belum Bayar","Sudah Bayar") as sta'),)
            ->leftJoin('maidatmas.tpelanggan as pel', 'pel.kodlan', 'pen.pasien_id')
            ->leftJoin('maidatmas.tdivisi as pol', 'pol.kod', 'pen.koddiv')
            ->leftJoin('dokters as dok', 'dok.id', 'pen.dokter_id');
    }
    public static function diagnosaPasien()
    {
        // return self::con('mysql')->
    }
    public static function obatAlkes()
    {
        return self::con('maise')->table('tbarang');
    }

    public static function reseppasiens()
    {
        return self::con('mysql')->table('reseppasiens as rs')
            ->select('rs.id', 'rs.kode_obat', 'tb.nam as namaobat', 'rs.qty', 'rs.hargajual', 'rs.ket')
            ->join('maiseklinik.tbarang as tb', 'tb.kodbar', 'rs.kode_obat');
    }
}
