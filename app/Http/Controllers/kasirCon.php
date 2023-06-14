<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\pendaftaran;
use App\Data\Data;
use App\Models\obat;
use App\Models\tindakanpasien;
use Illuminate\Support\Facades\Session;

class kasirCon extends Controller
{
    public function index()
    {
        $kasirs = Data::inputTindakan()->where('status', 1)->paginate(30);

        return view('kasir.kasir', compact('kasirs'));
    }
    public function datakasirs()
    {
        $kasirs = Data::inputTindakan()->where('status', 1)->paginate(30);
    }

    public function tagihan($tagihan)
    {
        try {
            Session::put('tagihan', $tagihan);
            $tagihan = Data::inputTindakan()->where(['pen.status' => 1, "pen.id" => $tagihan])->first();


            $obat = Data::reseppasiens()->where('rs.nopen', $tagihan->nopen)->get();
            $tindakanpasien = tindakanpasien::with(['jpitem' => function ($e) {
                $e->select('id', 'parameter');
            }])->where('nopen', $tagihan->nopen)->get();
            $total = $obat->sum('hargajual')  + $tindakanpasien->sum('harga');
            return view('kasir.tagihan', compact('tagihan', 'obat', 'tindakanpasien', 'total'));
        } catch (\Throwable $th) {
            return redirect('kasir');
        }
    }
}
