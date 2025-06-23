<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BancaController extends Controller
{
    public function index()
    {
        return view('banca.index');
    }
}
