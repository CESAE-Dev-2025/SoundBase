<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UtilController extends Controller
{

    public function home()
    {

        $userData = [
            'name' => 'Leandro Gabriel',
            'age' => 46
        ];

        // Formas de fazer DEBUG
        // var_dump($userData);
        // dd($cesaeInfo);

        return view('homepage', compact('userData'));
    }


    public function fallback()
    {
        return view('fallback');
    }
}
