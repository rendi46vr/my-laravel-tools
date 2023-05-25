<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\jenispemeriksaan;
use App\Models\jpItem;
use App\Tools\Tools;
use Illuminate\Support\Facades\Session;

class jpItemCon extends Controller
{
    public function index($kode)
    {
        try {
            $jp = jenispemeriksaan::withCount('items')->where('kode', $kode)->first();
            Session::put("JpItem", $jp->id);
            $items = $this->JpItems();
            return view('jenispemeriksaan.item', compact('jp', 'items'));
        } catch (\Throwable $th) {
            return redirect('jenispemeriksaan');
        }
    }

    private function JpItems($message = null, $page = 1, $search = null)
    {
        if (!is_array($search)) {
            if ($search == null) {
                $jpitems = jpItem::where('jenispemeriksaan_id', session('JpItem'))->orderBy('id', 'desc')->paginate(10, ['*'], null, $page);
            } else {
                $jpitems = jpItem::where('username', 'like', "%$search%")->where('jenispemeriksaan_id', session('JpItem'))->orderBy('id', 'desc')->paginate(10, ['*'], null, $page);
            }
        }
        $pagination = Tools::ApiPagination($jpitems->lastPage(), $page, 'pageJpItems');
        return view('jenispemeriksaan.table-item', compact('jpitems', 'pagination', 'message'));
    }

    //pagination
    public function pageJpItems($page, Request $request)
    {
        if ($request->search) {
            return $this->JpItems(null, $page, $request->search);
        } else {
            return $this->JpItems(null, $page);
        }
    }
    public function searchj($search = null)
    {
        return $this->JpItems(null, null, $search);
    }

    public function AddJpITem(Request $request)
    {
        $validasiData = $request->validate([
            'kode' => 'required|unique:jp_items',
            'parameter' => 'required|max:60',
            'biaya' => 'required:max:60',
            'perdok' => 'required',
            'jenispemeriksaan_id' => 'required'
        ]);
        jpItem::create($validasiData);
        return $this->JpItems();
    }
    public function updateJpITem(Request $request)
    {
        $validasiData = $request->validate([
            'kode' => 'required|unique:jp_items,kode,' . $request->uniq,
            'parameter' => 'required|max:60',
            'biaya' => 'required:max:60',
            'perdok' => 'required',
        ]);
        jpItem::where('id', $request->uniq)->update($validasiData);
        return $this->JpItems();
    }
    public function editJpitem($id)
    {
        try {
            $item = jpItem::find($id);
            return view("jenispemeriksaan.edit-item", compact('item'))->render();
        } catch (\Throwable $th) {
            //throw $th;
        }
    }
    public function delete($id)
    {
        try {
            $jpItem = jpItem::destroy($id);
            return $this->jpItems();
        } catch (\Throwable $th) {
            return $this->jpItems("Data invalid!");
        }
    }
}
