<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\dokter;
use Illuminate\Support\Facades\Session;
use App\Data\Data;
use App\Tools\Tools;

class dokterCon extends Controller
{
    private $sess = 'dokterSearch';
    private $core = 'dokter';
    public function index()
    {
        // dd(session($this->sess));
        $poli = Data::poli();
        ${$this->core} = $this->{$this->core . 's'}();
        return view($this->core . 's.' . $this->core, compact('poli', $this->core));
    }
    private function dokters($message = null, $page = 1, $search = false)
    {
        if (!$search) {
            // ${$this->core} = dokter::orderBy('id', 'desc')->paginate(20, ['*'], null, $page);
            ${$this->core} = Data::dokter()->orderBy('id', 'desc')->paginate(20, ['*'], null, $page);
        } else {
            $session = Session::get($this->sess);
            ${$this->core} = Data::dokter()->where(function ($e) use ($session) {
                if ($session['search'] != null) $e->where('nama', 'like', "%" . $session['search'] . "%")->orwhere('kode_dokter', 'like', "%" . $session['search'] . "%");
            })->where(function ($e) use ($session) {
                if ($session['koddiv'] != null) $e->where('koddiv', $session['koddiv']);
            })->orderBy('id', 'desc')->paginate(20, ['*'], null, $page);
        }
        $pagination = Tools::ApiPagination(${$this->core}->lastPage(), $page, 'page' . $this->core);
        return view($this->core . 's.table-' . $this->core, compact($this->core, 'pagination'))->render();
    }

    public function AddDokter(Request $request)
    {
        $validasiData = $request->validate([
            'kode_dokter' => 'required|unique:dokters,kode_dokter',
            'nama' => 'required|max:60',
            'jenkel' => 'required:max:60',
            'telepon' => 'max:15',
            'alamat' => '',
            'email' => 'email:dns|unique:dokters,email',
            'koddiv' => 'required',
        ]);
        dokter::create($validasiData);
        return $this->{$this->core . 's'}();
    }
    public function editdokter($id)
    {
        ${$this->core} = dokter::find($id);
        $poli = Data::poli();
        return view($this->core . 's.edit-' . $this->core, compact($this->core, 'poli'))->render();
    }

    public function updateDokter(Request $request)
    {
        $validasiData = $request->validate([
            'nama' => 'required|max:60',
            'jenkel' => 'required:max:60',
            'telepon' => 'max:15',
            'alamat' => '',
            'email' => 'email:dns|unique:dokters,email,' . $request->uniq,
            'koddiv' => 'required',
        ]);
        dokter::find($request->uniq)->update($validasiData);
        return $this->{$this->core . 's'}();
    }
    public function deldokter($id)
    {
        try {
            dokter::destroy($id);
        } catch (\Throwable $th) {
            return $this->{$this->core . 's'}('Data tidak Valid');
        }
        return $this->{$this->core . 's'}("Data dihapus");
    }
    public function pagedokter($page)
    {
        if (Session::has($this->sess)) {
            return $this->{$this->core . 's'}(null, $page, true);
        } else {
            return $this->{$this->core . 's'}(null, $page);
        }
    }
    public function searchdokter(Request $request)
    {
        $request->except('_token');
        Session::put($this->sess, $request->all());
        return $this->{$this->core . 's'}(null, null, true);
    }
    public function getDokter($poli)
    {
        $datas = dokter::where('koddiv', $poli)->get();
        $return = '<option selected hidden disabled>Pilih Dokter ....</option>';
        foreach ($datas as $data) {
            $return .= "<option value='$data->id'>$data->nama</option>";
        }
        return $return;
    }


    public function showdokter($id)
    {

        ${$this->core} = dokter::select(['tpelanggan.nam as nama', 'tdivisi.nam as poli', 'tpelanggan.kodlan', 'ktp', 'jenkel', 'temlah', 'tgllah', 'umur', 'ema', 'nowa', 'stakaw', 'ala', 'jenbay', 'cat', 'stapas', 'grup', 'kelompok'],)
            ->leftjoin('tdivisi', 'tpelanggan.koddiv', 'tdivisi.kod')->where('tpelanggan.id', $id)
            ->leftJoin('klinik.kelompok', 'tpelanggan.grup', 'kelompok.id')
            ->first();
        return view($this->core . 's.show-' . $this->core, compact($this->core));
    }
}
