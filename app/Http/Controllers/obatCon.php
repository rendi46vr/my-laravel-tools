<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class obatCon extends Controller
{
    public function index()
    {
        return view('obats.obat');
    }
}
