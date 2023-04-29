<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\jenispemeriksaan;

class jenispemeriksaanCon extends Controller
{
    public function index()
    {
        $jenispemeriksaan = $this->jenispemeriksaans();
        return view("jenispemeriksaan.index", compact('jenispemeriksaan'));
    }
    private function jenispemeriksaans($message = null, $page = 1, $data = null)
    {
        if ($data == null) {
            $jenispemeriksaan = jenispemeriksaan::select("kode", 'id', 'jenis', 'type')->paginate(10, ['*'], 'pagejps', $page);
        } else {
            $jenispemeriksaan = jenispemeriksaan::select("kode", 'id', 'jenis', 'type')->where(function ($e) use ($data) {
                $e->where('kode', 'like', "%$data%")
                    ->orwhere('jenis', 'like', "%$data%");
            })->paginate(10, ['*'], 'pagejps', $page);
        }

        return view('jenispemeriksaan.table-jenispemeriksaan', compact('jenispemeriksaan'))->with("message", $message)->render();
    }

    public function AddJp(Request $request)
    {
        $data = $request->validate([
            'kode' => 'required|unique:jenispemeriksaans',
            'jenis' => 'required|max:60',
            'type' => 'required:max:60',
        ]);
        jenispemeriksaan::create($data);
        return $this->jenispemeriksaans();
    }
    public function UpdateJp(Request $request)
    {
        $data = $request->validate([
            'kode' => 'required|unique:jenispemeriksaans,kode,' . $request->uniq,
            'jenis' => 'required|max:60',
            'type' => 'required:max:60',
        ]);
        jenispemeriksaan::find($request->uniq)->update($data);
        return $this->jenispemeriksaans();
    }
    public function editJp($id)
    {
        try {
            $jp = jenispemeriksaan::find($id);
            return view("jenispemeriksaan.edit-jenispemeriksaan", compact("jp"))->render();
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
            return $this->jenispemeriksaans(null, $page, $request->search);
        } else {
            return $this->jenispemeriksaans(null, $page);
        }
    }
    public function searchJps($search = null)
    {
        return $this->jenispemeriksaans(null, null, $search);
    }
}
