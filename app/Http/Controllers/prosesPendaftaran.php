<?php

namespace App\Http\Controllers;

use App\Data\Data;
use Illuminate\Http\Request;
use App\Models\pendaftaran;
use App\Http\Controllers\diagnosaCon;
use Illuminate\Support\Facades\Session;
use App\Models\diagnosapasien;
use App\Http\Controllers\resepCon;
use App\Http\Controllers\tindakanCon;

class prosesPendaftaran extends Controller
{
    public function pasienDaftar(Request $request)
    {
        function input($nopen, $request)
        {
            try {
                pendaftaran::create([
                    "nopen" => $nopen,
                    "pasien_id" => $request->daftar,
                    "koddiv" => $request->poli,
                    "dokter_id" => $request->dokter_id,
                ]);
                return true;
            } catch (\Throwable $th) {
                return  false;
            }
        }
        $nopenfirst = date('Ymd') . '-' . "00";

        for ($i = 1; $i < 10; $i++) {
            $nopen = (++$nopenfirst);
            $hnonpen = $nopen . '-' . $request->daftar;
            if (input($hnonpen, $request)) {
                return true;
                break;
            } else {
                return false;
            }
        }
    }
    public function index()
    {
        // dd(Data::obatAlkes()->paginate(10));
        $inputTindakan = $this->inputTindakan();
        return view('inputtindakan.inputTindakan', compact('inputTindakan'));
    }
    private function inputTindakan($message = null)
    {
        $inputTindakan = Data::inputTindakan()->paginate(30);

        return view('inputtindakan.table-inputTindakan', compact('inputTindakan', 'message'));
    }


    public function delete($id)
    {
        pendaftaran::destroy($id);
        return $this->inputTindakan();
    }
    public function prosesview($id, diagnosaCon $d, tindakanCon $t, obatCon $ob, resepCon $rs)
    {
        try {
            $pendaftar = Data::inputTindakan()->where('pen.id', $id)->first();
        } catch (\Throwable $th) {
            return redirect('inputTindakan');
        }
        Session::put("inputTindakan", $pendaftar->nopen);
        $diagnosa = $d->diagnosas(false);
        $tindakanPasien = $t->tindakanPasien($pendaftar->nopen);
        $tableTindakan = $t->tindakan();
        $reseps = $rs->reseppasiens($pendaftar->nopen);
        $tableObat = $ob->obats(1, false, false)->getData()->data;
        $diagnosapasien = diagnosaCon::diagnosaPasien($pendaftar->nopen);
        return view('inputtindakan.tindakan', compact('pendaftar', 'diagnosa', 'diagnosapasien', 'tindakanPasien', 'tableTindakan', 'tableObat', 'reseps'));
    }

    public function inputCatatan(Request $request)
    {
        $validasi = $request->validate([
            'alergi' => 'max:255',
            'tinggibadan' => 'max:10',
            'beratbadan' => 'max:7',
            'tekanandarah' => 'max:50',
            'catatan' => ''
        ]);
        $catatan = pendaftaran::where('nopen', session('inputTindakan'))->update($validasi);
    }


    public function prosespendaftaran()
    {
        $catatan = pendaftaran::where('nopen', session('inputTindakan'))->first();
        if (session()->has('inputTindakan')) {
            $catatan->update(['status' => 1]);
            return redirect('so');
        } else {
            return redirect('inputTindakan/' . $catatan->id);
        }
    }
}
