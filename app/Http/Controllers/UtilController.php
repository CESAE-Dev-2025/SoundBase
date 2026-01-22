<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UtilController extends Controller
{

    public function home()
    {

        // TODO: Remover dados de usuário
        $userData = [
            'name' => 'Leandro Gabriel',
            'age' => 46
        ];

        // Formas de fazer DEBUG
        // var_dump($userData);
        // dd($cesaeInfo);

        // TODO: Personalizar Home
        // TODO: Personalizar Login
        return view('homepage', compact('userData'));
    }


    public function fallback()
    {
        // TODO: Adicionar 404 personalizada
        return view('fallback');
    }
}
