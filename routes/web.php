<?php

use App\Http\Controllers\alkesCon;
use App\Http\Controllers\diagnosaCon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsersCon;
use App\Http\Controllers\jenispemeriksaanCon;
use App\Http\Controllers\jpItemCon;
use App\Http\Controllers\supplierCon;
use App\Http\Controllers\obatCon;
use App\Http\Controllers\pasienCon;
use App\Http\Controllers\prosesPendaftaran;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\tindakanCon;
use App\Http\Controllers\dokterCon;
use App\Http\Controllers\kasirCon;
use App\Http\Controllers\pembayaranCon;
use App\Http\Controllers\resepCon;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    // $obj = new stdClass();

    $obj = (object)[];
    $obj->tes = "hello from funtion in object";
    $obj->{"pg"} = function ($stdObject, $tes) {
        return $tes;
    };
    $newTotal = floor(3799.9999999999999);
    $totalPage = $newTotal;

    dd($totalPage);
    // return view('welcome');
});

//users
Route::get('/users', [UsersCon::class, 'index']);
Route::post('/AddUser', [UsersCon::class, 'AddUser']);
Route::post('/getUser/{id}', [UsersCon::class, 'getUser']);
Route::post('/EditUser', [UsersCon::class, 'editUser']);
Route::post('/delUser/{id}', [UsersCon::class, 'delete']);
Route::post('pageusers/{id}', [UsersCon::class, 'pageUsers']);
Route::post('searchusers/{search?}', [UsersCon::class, 'searchusers']);
// Route::get('pegeusers/{id}', [UsersCon::class, 'pageUsers']);

Route::get('test', function (Request $request) {
    $connection = DB::connection('server');
    $pelanggan = $connection->table('tpelanggan');
    // $newtable = $connection->table('newtable');
    // // $newtable->insert(['nama' => 'jamal']);
    // $newtable->where('id', 1)->update(['nama' => 'aldjfsl']);

    // $data = $pelanggan->paginate(10);
    //join

    // $newtable1 = $connection->table('newtable');

    // return $newtable1->Join('newtable1', 'newtable_id', '=', 'newtable.id')->orderBy('newtable1.aktif', 'desc')->where('newtable.id', 1)
    //     // ->select('aktif', 'newtable.nama')
    //     ->paginate(1);




    // return $data->links();
});



//Data Pem
Route::get("jenispemeriksaan", [jenispemeriksaanCon::class, "index"]);
Route::post('AddJp', [jenispemeriksaanCon::class, 'AddJp']);
Route::post('editJp/{id}', [jenispemeriksaanCon::class, 'editJp']);
Route::post('UpdateJp', [jenispemeriksaanCon::class, 'UpdateJp']);
Route::post('delJp/{id}', [jenispemeriksaanCon::class, 'delete']);
Route::post('pagejps/{id}', [jenispemeriksaanCon::class, 'pageJps']);
Route::post('searchjps/{search?}', [jenispemeriksaanCon::class, 'searchJps']);

//Jenis pemeriksaan Item
Route::get("jenispemeriksaan/item/{id}", [jpItemCon::class, 'index']);
Route::post("AddJpItem", [jpItemCon::class, 'AddJpItem']);
Route::post("pageJpItems/{id}", [jpItemCon::class, 'pageJPItems']);
Route::post("editjpitem/{id}", [jpItemCon::class, 'editJpItem']);
Route::post("UpdateJpItem", [jpItemCon::class, 'updateJPItem']);
Route::post("deljpitem/{id}", [jpItemCon::class, 'delete']);


//Obat & Alkes
//Supllier
Route::get("obsupplier", [supplierCon::class, 'index']);
Route::post("AddSupplier", [supplierCon::class, 'AddSupplier']);
Route::post("editsupplier/{id}", [supplierCon::class, 'editSupplier']);
Route::post("UpdateSupplier", [supplierCon::class, 'updateSupplier']);
Route::post("delsupplier/{id}", [supplierCon::class, 'delete']);
Route::post("searchsupplier/{id}", [supplierCon::class, 'searchSupplier']);
Route::post("pagesupplier/{id}", [supplierCon::class, 'pageSupplier']);
//Obat
Route::get("obat", [obatCon::class, 'index']);
// Route::post("AddObat", [obatCon::class, 'AddObat']);                    ///belum selesai
// Route::post("editobat/{id}", [obatCon::class, 'editObat']);             ///belum selesai
// Route::post("UpdateObat", [obatCon::class, 'UpdateObat']);               ///belum selesai
Route::post("delobat/{id}", [obatCon::class, 'delete']);
Route::post("searchobat/{search}", [obatCon::class, 'searchObat']);
Route::post("pageobat/{page}", [obatCon::class, 'pageobat']);
Route::get("obalkes", [alkesCon::class, 'index']);
Route::post("delalkes/{id}", [alkesCon::class, 'delete']);
Route::post("searchalkes/{search}", [alkesCon::class, 'searchalkes']);
Route::post("pagealkes/{page}", [alkesCon::class, 'pagealkes']);

//Dokter
Route::get('dokter', [dokterCon::class, 'index']);
Route::post('AddDokter', [dokterCon::class, 'AddDokter']);
Route::post('editdokter/{id}', [dokterCon::class, 'editdokter']);
Route::post('showdokter/{id}', [dokterCon::class, 'showdokter']);
Route::post('UpdateDokter', [dokterCon::class, 'UpdateDokter']);
Route::post('deldokter/{id}', [dokterCon::class, 'deldokter']);
Route::post('pagedokter/{page}', [dokterCon::class, 'pagedokter']);
Route::post('searchdokter/{search}', [dokterCon::class, 'searchdokter']);
//Pasien
Route::get('pasien', [pasienCon::class, 'index']);
Route::post('AddPasien', [pasienCon::class, 'AddPasien']);
Route::post('editpasien/{id}', [pasienCon::class, 'editpasien']);
Route::post('showPasien/{id}', [pasienCon::class, 'showPasien']);
Route::post('UpdatePasien', [pasienCon::class, 'UpdatePasien']);
Route::post('delpasien/{id}', [pasienCon::class, 'delpasien']);
Route::post('pagepasien/{page}', [pasienCon::class, 'pagepasien']);
Route::post('searchpasien/{search}', [pasienCon::class, 'searchpasien']);



//Proses pendaftaran Pasien
Route::post('pasienDaftar', [prosesPendaftaran::class, 'pasienDaftar']);
Route::post('dokter/{poli}', [dokterCon::class, 'getdokter']);
Route::get('inputTindakan', [prosesPendaftaran::class, 'index']);
Route::post('deltindakan/{id}', [prosesPendaftaran::class, 'delete']);
Route::get('inputTindakan/{id}', [prosesPendaftaran::class, 'prosesview']);
//diagnosas
Route::post('pagediagnosas/{page}', [diagnosaCon::class, 'pagediagnosa']);
Route::post('searchdiagnosas/{search}', [diagnosaCon::class, 'searchdiagnosa']);
//add diganosa pada pasien
route::post("itdiagnosa/{id}", [diagnosaCon::class, 'adddiagnosapasien']);
//add tindakan pada pasien
route::post("atpasien/{id}", [tindakanCon::class, 'addtpasien']);
route::post('pagetindakan/{page}', [tindakanCon::class, 'pagetindakan']);
Route::post('searchtindakan/{search}', [tindakanCon::class, 'searchtindakan']);
Route::post('deltindakan/{id}', [tindakanCon::class, 'delete']);

// addrpasien
// add resep pasien
route::post('addrpasien/{id}', [resepCon::class, 'addresep']);
route::post('editresep', [resepCon::class, 'editresep']);
route::post('delresp/{id}', [resepCon::class, 'delete']);
route::post('inputCatatan', [prosesPendaftaran::class, 'inputCatatan']);
route::get('prosestindakan', [prosesPendaftaran::class, 'prosespendaftaran']);


//sales order / Kasir
route::get('kasir', [kasirCon::class, 'index']);
route::get('kasir/{tagihan}', [kasirCon::class, 'tagihan']);

//pembayaran
route::post('pembayaran', [pembayaranCon::class, 'pembayaran']);




Route::post('deldiagnosa/{id}', [diagnosaCon::class, 'delete']);
