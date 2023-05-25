<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\jenispemeriksaan;
use App\Tools\Tools;
use Illuminate\Support\Facades\Session;
use App\Data\Data;

class jenispemeriksaanCon extends Controller
{
    public function index()
    {
        // dd(Session::get('JpItemSearch'));
        $jenispemeriksaan = $this->jenispemeriksaans();
        $poli = Data::poli();
        return view("jenispemeriksaan.index", compact('jenispemeriksaan', 'poli'));
    }
    private function jenispemeriksaans($message = null, $page = 1, $data = false)
    {
        if (!$data) {
            $jenispemeriksaan = jenispemeriksaan::select("kode", 'id', 'jenis', 'koddiv')->withCount('items')->orderBy('id', 'desc')->paginate(10, ['*'], 'pagejps', $page);
        } else {
            if (Session::has('JpItemSearch')) {
                $session = Session::get('JpItemSearch');
                $jenispemeriksaan = jenispemeriksaan::select("kode", 'id', 'jenis', 'koddiv')->withCount('items')->where(function ($e) use ($session) {
                    if ($session['search'] != null) {
                        $e->where('kode', 'like', "%" . $session['search'] . "%")
                            ->orwhere('jenis', 'like', "%" . $session['search'] . "%");
                    }
                })->where('koddiv', 'like', '%' . $session['poli'] . '%')->orderBy('id', 'desc')->paginate(10, ['*'], 'pagejps', $page);
            }
        }
        $pagination = Tools::ApiPagination($jenispemeriksaan->lastPage(), $page, 'pagejps');
        $poli = Data::poli();

        return view('jenispemeriksaan.table-jenispemeriksaan', compact('jenispemeriksaan', 'poli', 'pagination'))->with("message", $message)->render();
    }

    public function AddJp(Request $request)
    {
        $data = $request->validate([
            'kode' => 'required|unique:jenispemeriksaans',
            'jenis' => 'required|max:60',
            'koddiv' => 'required:max:60',
        ]);
        jenispemeriksaan::create($data);
        return $this->jenispemeriksaans();
    }
    public function UpdateJp(Request $request)
    {
        $data = $request->validate([
            'kode' => 'required|unique:jenispemeriksaans,kode,' . $request->uniq,
            'jenis' => 'required|max:60',
            'koddiv' => 'required:max:60',
        ]);
        jenispemeriksaan::find($request->uniq)->update($data);
        return $this->jenispemeriksaans();
    }
    public function editJp($id)
    {
        try {
            $jp = jenispemeriksaan::find($id);
            $poli = Data::poli();

            return view("jenispemeriksaan.edit-jenispemeriksaan", compact("jp", 'poli'))->render();
        } catch (\Throwable $th) {
            //throw $th;
        }
    }
    public function delete($id)
    {
        try {
            $user = jenispemeriksaan::destroy($id);
            return $this->jenispemeriksaans();
        } catch (\Throwable $th) {
            return $this->jenispemeriksaans("Jenis Pemeriksaan Tidak Ditemukan!");
        }
    }
    //pagination with search
    public function pageJps($page, Request $request)
    {

        if ($request->search) {
            return $this->jenispemeriksaans(null, $page, true);
        } else {
            return $this->jenispemeriksaans(null, $page);
        }
    }
    public function searchJps($search, Request $request)
    {
        Session::put("JpItemSearch", $request->all());
        return $this->jenispemeriksaans(null, 1, true);
    }
}
