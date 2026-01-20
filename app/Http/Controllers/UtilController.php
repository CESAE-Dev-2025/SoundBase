<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UtilController extends Controller
{
    public function fallback()
    {
        return view('fallback');
    }
}
