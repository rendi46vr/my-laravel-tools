<?php

namespace App\Data;

use Illuminate\Support\Facades\DB;

class Data
{

    private static function con($server = false)
    {
        if ($server) {
            return DB::connection('server');
        } else {
            return DB::connection('mysql');
        }
    }
    public static function poli()
    {
        return self::con(true)->table('tdivisi')->select('kod', 'nam')->orderBy('id', 'asc')->get();
    }
    public static function kelompok()
    {
        return self::con()->table('kelompok')->get();
    }
    public static function pasien()
    {
        return self::con(true)->table('tpelanggan');
    }
    public static function dokter()
    {
        return self::con()->table('dokters')->select('dokters.id', 'kode_dokter', 'nama', 'jenkel', 'alamat', 'email', 'telepon', 'koddiv', 'tdivisi.nam')
            ->leftJoin('maidatmas.tdivisi', 'tdivisi.kod', 'dokters.koddiv');
    }

    public static function inputTindakan()
    {
        return self::con()->table('pendaftarans as pen')
            ->select('pen.id', 'nopen', 'pasien_id',  'pel.nam as namapasien', 'pel.umur', 'pol.nam as poli', 'dok.nama as namadokter', 'pel.jenkel as sex', DB::raw('date_format(pen.created_at, "%d, %M %Y") as tgldaftar, date_format(pen.created_at, "%H : %m ") as waktudaftar'))
            ->leftJoin('maidatmas.tpelanggan as pel', 'pel.kodlan', 'pen.pasien_id')
            ->leftJoin('maidatmas.tdivisi as pol', 'pol.kod', 'pen.koddiv')
            ->leftJoin('dokters as dok', 'dok.id', 'pen.dokter_id');
    }
    public static function diagnosaPasien()
    {
        // return self::con()->
    }
}
