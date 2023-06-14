<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Data\Data;
use App\Tools\Tools;
use Illuminate\Support\Facades\Session;

class obatCon extends Controller
{

    private $core = "obat", $sess = "searchObat";
    public function index()
    {
        session()->forget($this->sess);
        $obats = $this->obats();
        return view('obats.obat', compact($this->core . 's'));
    }
    public function obats($page = 1, $search = false, $full = true)
    {
        $obats = Data::obatAlkes();
        !$full ? $obats = $obats->select('id', 'kodbar', 'nam', 'sat', 'jen') :
            $obats = $obats->select('id', 'kodbar', 'nam', 'sat', 'jen');
        $obats =  $obats->where('gru', 'obat')->where(function ($e) use ($search) {
            if ($search) {
                $e->where('kodbar', 'like', '%' . session($this->sess)['search'] . '%')
                    ->orwhere('nam', 'like', '%' . session($this->sess)['search'] . '%');
            }
        })->paginate(20, ['*'], null, $page);
        $pagination = Tools::ApiPagination($obats->lastPage(), $page, 'pageobat');
        $data = view('obats.table-obat', compact($this->core . 's', 'pagination', 'full'))->render();

        if ($full) {
            return $data;
        }
        return response()->json([
            "status" => true,
            "one" => '<i class="fa fa-check-circle" aria-hidden="true"></i> ',
            "data" => $data,
            "have" => ".table-resep"

        ]);
    }
    public function pageobat($page)
    {
        if (Session::has($this->sess)) {
            if (array_key_exists('full', session($this->sess))) {
                return $this->{$this->core . 's'}($page, true, false);
            }
            return $this->{$this->core . 's'}($page, true);
        } else {
            return $this->{$this->core . 's'}($page);
        }
    }
    public function searchobat(Request $request)
    {
        $request->except('_token');
        Session::put($this->sess, $request->all());
        array_key_exists('full', session($this->sess)) ? $data = $this->{$this->core . 's'}(null, true, false) :
            $data = $this->{$this->core . 's'}(null, true);
        return $data;
    }
}
