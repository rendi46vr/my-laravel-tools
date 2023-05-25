<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\jpItem;

class tindakanCon extends Controller
{
    public $core = "tindakanPasien";
    public static function tindakanPasien()
    {
        ${$this->core} = jpItem::with('jenispemeriksaan')->paginate(20);
        return view('tindakan.tindakanpasien', compact($this->core))->render();
    }
}
