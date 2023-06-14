<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\supplier;
use Illuminate\Support\Facades\Session;
use App\Tools\Tools;

class supplierCon extends Controller
{
    public function index()
    {
        Session::has('obsupplierSearch') ? Session::forget('obsupplierSearch') : '';
        $suppliers = $this->suppliers();
        return view('suppliers.supplier', compact('suppliers'));
    }
    private function suppliers($message = null, $page = 1, $search = false)
    {

        if (!$search) {
            $suppliers = supplier::orderBy('id', 'desc')->paginate(20, ['*'], null, $page);
        } else {
            $search = Session::get('obsupplierSearch');
            $suppliers = supplier::where(function ($e) use ($search) {
                if ($search['search'] != null) {
                    $e->where('kode_supplier', 'like', '%' . $search['search'] . '%')
                        ->orwhere('nama_supplier', 'like', '%' . $search['search'] . '%');
                }
            })->orderBy('id', 'desc')->paginate(20, ['*'], null, $page);
        }
        $pagination = Tools::ApiPagination($suppliers->lastPage(), $page, 'pagesupplier');
        return view('suppliers.table-supplier', compact('suppliers', 'pagination', 'message'))->render();
    }

    public function AddSupplier(Request $request)
    {
        $validasiData = $request->validate([
            'kode_supplier' => 'required|unique:suppliers,kode_supplier',
            'nama_supplier' => 'required|max:60',
            'telepon' => 'required|max:15',
            'email' => 'required|email:dns',
            'alamat' => '',
        ]);

        supplier::create($validasiData);
        return $this->suppliers();
    }
    public function editSupplier($id)
    {
        $supplier = supplier::find($id);
        return view('suppliers.edit-supplier', compact('supplier'))->render();
        //
    }
    public function updateSupplier(Request $request)
    {
        $validasiData = $request->validate([
            'kode_supplier' => 'required|unique:suppliers,kode_supplier,' . $request->uniq,
            'nama_supplier' => 'required|max:60',
            'telepon' => 'required|max:15',
            'email' => 'required|email:dns',
            'alamat' => '',
        ]);
        supplier::where('id', $request->uniq)->update($validasiData);
        return $this->suppliers();
    }
    public function delSupplier($id)
    {
        try {
            supplier::destroy($id);
        } catch (\Throwable $th) {
            return $this->suppliers('Data tidak Valid');
        }
        return $this->suppliers();
    }
    public function pageSupplier($page)
    {
        if (Session::has('obsupplierSearch')) {
            return $this->suppliers(null, $page, true);
        } else {
            return $this->suppliers(null, $page);
        }
    }
    public function searchsupplier(Request $request)
    {
        Session::put("obsupplierSearch", $request->all());
        return $this->suppliers(null, null, true);
    }
}
