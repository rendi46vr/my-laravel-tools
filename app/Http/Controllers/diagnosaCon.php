<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\diagnosa;
use App\Models\diagnosapasien;
use Illuminate\Support\Facades\Session;
use App\Tools\Tools;

class diagnosaCon extends Controller
{
    public $sess = "searchDiagnosas";
    public $core = "diagnosa";
    public function diagnosas($status = false, $page = 1,  $search = false)
    {
        $diagnosas = diagnosa::where(function ($e) use ($search) {
            $sess = Session::get($this->sess);
            if ($search) {
                $e->where('kode', 'like', "%" . $sess['search'] . "%")
                    ->orwhere('diagnosa', 'like', "%" . $sess['search'] . "%");
            }
        })->paginate(20, ['*'], null, $page);
        $pagination = Tools::ApiPagination($diagnosas->lastPage(), $page, 'pagediagnosas');
        $data = view('diagnosa.table-diagnosa', compact('diagnosas', 'pagination'))->render();
        if ($status) {
            return response()->json([
                "have" => ".diag",
                "data" => $data,
            ]);
        } else {
            return $data;
        }
    }
    public function pagediagnosa($page)
    {
        if (Session::has($this->sess)) {
            return $this->{$this->core . 's'}(true, $page, true);
        } else {
            return $this->{$this->core . 's'}(true, $page);
        }
    }
    public function searchdiagnosa(Request $request)
    {
        Session::put($this->sess, $request->all());
        return $this->{$this->core . 's'}(true, null, true);
    }
    public function adddiagnosapasien($id, Request $request)
    {
        if (Session::has('inputTindakan')) {
            $cek = diagnosapasien::where(['nopen' => session::get('inputTindakan'), 'diagnosa_id' => $id])->first();
            if ($cek) {
                return response()->json([
                    "status" => false,
                    "one" => '<i class="fa fa-info-circle" aria-hidden="true"></i> Sudah ada',
                ]);
            } else {
                diagnosapasien::create(
                    [
                        "nopen" => session::get('inputTindakan'),
                        "ket" => $request->ket,
                        "diagnosa_id" => $id
                    ]
                );
                // return '<i class="fa fa-check-circle" aria-hidden="true"></i> Ditambahkan';
                return response()->json([
                    "status" => true,
                    "one" => '<i class="fa fa-check-circle" aria-hidden="true"></i> Ditambahkan',
                    "data" => $this->diagnosaPasien(session('inputTindakan')),
                    "have" => ".diagnosa-pasien"
                ]);
            }
        }
    }
    public static function diagnosaPasien($nopen)
    {
        $diagnosa = diagnosapasien::with(['diagnosa' => function ($e) {
            $e->select('id', 'kode', 'diagnosa');
        }])->where('nopen', $nopen)->get();

        return view('diagnosa.diagnosapasien', compact('diagnosa'))->render();
    }
    public function delete($id)
    {
        diagnosapasien::destroy($id);
        return response()->json([
            "have" => ".diagnosa-pasien",
            "data" => $this->diagnosaPasien(session('inputTindakan')),
        ]);
    }
}
