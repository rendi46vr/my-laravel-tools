<?php

namespace App\Http\Controllers;

use App\Data\Data;
use App\Models\reseppasien;
use Illuminate\Http\Request;

class resepCon extends Controller
{
    public function addresep($id)
    {
        $obat = Data::obatAlkes()->find($id);
        // return $obat;
        reseppasien::create([
            "nopen" => session('inputTindakan'),
            "kode_obat" => $obat->kodbar,
            "qty" => 1,
            "hargajual" => $obat->harjua,
            "bayar" => $obat->harjua * 1
        ]);
        return response()->json([
            "status" => true,
            "one" => '<i class="fa fa-check-circle" aria-hidden="true"></i>',
            "data" => self::reseppasiens(session('inputTindakan')),
            "have" => ".resep-pasien"
        ]);
    }
    public function reseppasiens($nopen)
    {
        $reseps = Data::reseppasiens()->where('nopen', $nopen)->get();
        return view('resep.reseppasien', compact('reseps'))->render();
    }
    public function delete($id)
    {
        reseppasien::destroy($id);
        return response()->json([
            "have" => ".resep-pasien",
            "data" => $this->reseppasiens(session('inputTindakan')),
        ]);
    }
    public function editresep(Request $request)
    {
        try {
            $data = $request->data;
            $update = reseppasien::where(["nopen" => session('inputTindakan'), "kode_obat" => $data[0]])->first();
            $update->update([
                "qty" => $data[1],
                "ket" => $data[2],
                "bayar" => $update->hargajual * $data[1]
            ]);
            return true;
        } catch (\Throwable $th) {
            return false;
        }
    }

    public function saveip(Request $request)
    {
        return $request;
    }
}
