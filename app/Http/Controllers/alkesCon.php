<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Data\Data;
use App\Tools\Tools;
use Illuminate\Support\Facades\Session;

class alkesCon extends Controller
{

    private $core = "alkes", $sess = "searchAlkes";
    public function index()
    {
        $alkes = $this->alkes();
        return view('alkes.alkes', compact($this->core));
    }
    public function alkes($page = 1, $search = false)
    {
        $alkes = Data::obatAlkes()->where('gru', 'alkes')->where(function ($e) use ($search) {
            if ($search) {
                $e->where('kodbar', 'like', '%' . session($this->sess)['search'] . '%')
                    ->orwhere('nam', 'like', '%' . session($this->sess)['search'] . '%');
            }
        })->paginate(20, ['*'], null, $page);
        $pagination = Tools::ApiPagination($alkes->lastPage(), $page, 'pagealkes');
        return view('alkes.table-alkes', compact($this->core, 'pagination'))->render();
    }
    public function pagealkes($page)
    {
        if (Session::has($this->sess)) {
            return $this->{$this->core}($page, true);
        } else {
            return $this->{$this->core}($page);
        }
    }
    public function searchalkes(Request $request)
    {
        $request->except('_token');
        Session::put($this->sess, $request->all());
        return $this->{$this->core}(null, true);
    }
}
