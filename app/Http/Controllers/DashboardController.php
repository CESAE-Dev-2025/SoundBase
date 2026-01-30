<?php

namespace App\Http\Controllers;

use App\Models\Album;
use App\Models\Band;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $totalUsers = User::count();
        $totalBands = Band::count();
        $totalAlbums = Album::count();

        return view('dash.home', compact('totalUsers', 'totalBands', 'totalAlbums'));
    }
}
