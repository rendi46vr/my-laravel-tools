<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\jpItem;
use App\Models\tindakanpasien;
use function PHPSTORM_META\map;
use Illuminate\Support\Facades\Session;
use App\Tools\Tools;

class tindakanCon extends Controller
{
    public static $sess = "searchTindakan";
    protected static $core = "tindakanPasien";
    public static function tindakanPasien($nopen)
    {
        ${self::$core} = tindakanpasien::with('jpitem')->where(['nopen' => session::get('inputTindakan')])->get();
        return view('tindakan.tindakanpasien', compact(self::$core))->render();
    }

    public static function tindakan($ajax = false, $page = 1, $search = false)
    {
        ${self::$core} = jpItem::with('jenispemeriksaan')->where(function ($e) use ($search) {
            $sess = Session::get(self::$sess);
            if ($search) {
                $e->where('jp_items.kode', 'like', "%" . $sess['search'] . "%")
                    ->orwhere('kode', 'like', "%"  . $sess['search'] . "%")
                    ->orwhere('parameter', 'like', "%" . $sess['search'] . "%");
            }
        })->paginate(1, ['*'], null, $page);
        $pagination = Tools::ApiPagination(${self::$core}->lastPage(), $page, 'pagetindakan');
        $data = view('tindakan.table-tindakan', compact(self::$core, 'pagination'))->render();
        if ($ajax) {
            return response()->json([
                "status" => true,
                "have" => ".table-tindakan",
                "data" => $data
            ]);
        } else {
            return $data;
        }
    }
    public function addtpasien($id)
    {
        if (Session::has('inputTindakan')) {
            $cek = tindakanpasien::where(['nopen' => session::get('inputTindakan'), 'jpitem_id' => $id])->first();
            $jpitem =  jpItem::find($id);
            if ($cek) {
                return response()->json([
                    "status" => false,
                    "one" => '<i class="fa fa-info-circle" aria-hidden="true"></i> Sudah ada',
                ]);
            } else {

                tindakanpasien::create(
                    [
                        "nopen" => session::get('inputTindakan'),
                        "jpitem_id" => $id,
                        "harga" => $jpitem->biaya,
                        'persendokter' => $jpitem->perdok,
                        "komisidokter" => ($jpitem->perdok / 100) * $jpitem->biaya
                    ]
                );
                return response()->json([
                    "status" => true,
                    "one" => '<i class="fa fa-check-circle" aria-hidden="true"></i> Ditambahkan',
                    "data" => self::tindakanPasien(session('inputTindakan')),
                    "have" => ".tindakan-pasien"
                ]);
            }
        }
    }
    public function pagetindakan($page)
    {
        if (Session::has(self::$sess)) {
            return $this->tindakan(true, $page, true);
        } else {
            return $this->tindakan(true, $page);
        }
    }
    public function searchtindakan(Request $request)
    {
        Session::put(self::$sess, $request->all());
        return $this->tindakan(true, null, true);
    }
    public function delete($id)
    {
        tindakanpasien::destroy($id);
        return response()->json([
            "have" => ".diagnosa-pasien",
            "data" => self::tindakanPasien(session('inputTindakan')),
            "have" => ".tindakan-pasien"

        ]);
    }
}
