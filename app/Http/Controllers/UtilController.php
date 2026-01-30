<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UtilController extends Controller
{

    public function home()
    {
        return view('homepage');
    }


    public function fallback()
    {
        // TODO: Adicionar 404 personalizada
        return view('fallback');
    }
}
