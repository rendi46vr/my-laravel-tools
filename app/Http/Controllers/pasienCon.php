<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Data\Data;
use App\Tools\Tools;
use Illuminate\Support\Facades\Session;

class pasienCon extends Controller
{
    private $sess = 'pasienSearch';
    private $core = 'pasien';
    public function index()
    {
        // dd(session($this->sess));
        $poli = Data::poli();
        $kelompok = Data::kelompok();
        $pasien = $this->{$this->core . 's'}();
        return view($this->core . 's.' . $this->core, compact('poli', 'kelompok', 'pasien'));
    }
    private function pasiens($message = null, $page = 1, $search = false)
    {

        if (!$search) {
            ${$this->core} = Data::pasien()->orderBy('id', 'desc')->paginate(20, ['*'], null, $page);
        } else {
            $session = Session::get($this->sess);
            ${$this->core} = Data::pasien()->where(function ($e) use ($session) {
                if ($session['search'] != null) $e->where('nam', 'like', "%" . $session['search'] . "%")->orwhere('kodlan', 'like', "%" . $session['search'] . "%");
            })->where(function ($e) use ($session) {
                if ($session['grup'] != null) $e->where('grup', $session['grup']);
            })->orderBy('id', 'desc')->paginate(20, ['*'], null, $page);
            // if ($session['grup'] != null) ${$this->core}->where('grup', $session['grup']);
            // ${$this->core}->orderBy('id', 'desc')->paginate(20, ['*'], null, $page);
        }
        $pagination = Tools::ApiPagination(${$this->core}->lastPage(), $page, 'pagepasien');

        return view('pasiens.table-pasien', compact($this->core, 'pagination'))->render();
    }

    public function AddPasien(Request $request)
    {
        $validasiData = $request->validate([
            'kodlan' => 'required|unique:server.maidatmas.tpelanggan,kodlan',
            'nam' => 'required',
            'ktp' =>  'required',
            'jenkel' =>  'required',
            'temlah' =>  'required',
            'tgllah' =>  'required',
            'ema' => '',
            'nowa' => '',
            'umur' => '',
            'stakaw' => 'required',
            'ala' => '',
            'koddiv' =>  'required',
            'jenbay' =>  'required',
            'cat' => '',
            'stapas' =>  'required',
            'grup' =>  'required',
        ]);
        Data::pasien()->insert($validasiData);
        return $this->{$this->core . 's'}();
    }
    public function editPasien($id)
    {
        ${$this->core} = Data::pasien()->find($id);
        $poli = Data::poli();
        $kelompok = Data::kelompok();
        return view($this->core . 's.edit-' . $this->core, compact($this->core, 'poli', 'kelompok'))->render();
    }

    public function updatePasien(Request $request)
    {
        $validasiData = $request->validate([
            'kodlan' => 'required|unique:server.maidatmas.tpelanggan,kodlan,' . $request->uniq,
            'nam' => 'required',
            'ktp' =>  'required',
            'jenkel' =>  'required',
            'temlah' =>  'required',
            'tgllah' =>  'required',
            'ema' => '',
            'nowa' => '',
            'umur' => '',
            'stakaw' => 'required',
            'ala' => '',
            'koddiv' =>  'required',
            'jenbay' =>  'required',
            'cat' => '',
            'stapas' =>  'required',
            'grup' =>  'required',
        ]);
        Data::pasien()->where('id', $request->uniq)->update($validasiData);
        return $this->{$this->core . 's'}();
    }
    public function delPasien($id)
    {
        try {
            Data::pasien()->delete($id);
        } catch (\Throwable $th) {
            return $this->{$this->core . 's'}('Data tidak Valid');
        }
        return $this->{$this->core . 's'}("Data dihapus");
    }
    public function pagePasien($page)
    {
        if (Session::has($this->sess)) {
            return $this->{$this->core . 's'}(null, $page, true);
        } else {
            return $this->{$this->core . 's'}(null, $page);
        }
    }
    public function searchpasien(Request $request)
    {
        $request->except('_token');
        Session::put($this->sess, $request->all());
        return $this->{$this->core . 's'}(null, null, true);
    }


    public function showPasien($id)
    {

        ${$this->core} = Data::pasien()->select(['tpelanggan.nam as nama', 'tdivisi.nam as poli', 'tpelanggan.kodlan', 'ktp', 'jenkel', 'temlah', 'tgllah', 'umur', 'ema', 'nowa', 'stakaw', 'ala', 'jenbay', 'cat', 'stapas', 'grup', 'kelompok'],)
            ->leftjoin('tdivisi', 'tpelanggan.koddiv', 'tdivisi.kod')->where('tpelanggan.id', $id)
            ->leftJoin('klinik.kelompok', 'tpelanggan.grup', 'kelompok.id')
            ->first();
        return view($this->core . 's.show-' . $this->core, compact($this->core));
    }
}
