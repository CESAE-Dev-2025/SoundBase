<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Band;
use App\Models\Album;

class BandController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $search = request()->query('search') ? request()->query('search') : null;

        $bands = $this->getAllBands($search);

        return view('bands.all_bands', compact('bands'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // $users = User::get();
        return view('bands.add_band'); //, compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validar dados recebidos
        $request->validate([
            'name' => 'required|min:3|max:50',
        ]);

        // Inserir na bade de dados
        Band::create([
            'name' => $request->name
        ]);

        return redirect()
            ->route('bands.all')
            ->with('message', 'banda adicionada com sucesso!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // $band = $this->getBand($id);
        $band = Band::where('id', $id)->first();

        return view('bands.view_band', compact('band'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        // Validar dados recebidos
        $request->validate([
            'name' => 'required|min:3|max:50',
        ]);

        // Inserir na bade de dados
        Band::where('id', $request->id)->update([
            'name' => $request->name,
            'photo' => $request->photo ? $request->photo : null
        ]);

        return redirect()
            ->route('bands.all')
            ->with('message', 'Banda atualizada com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Band::where('id', $id)->delete();
        return back()->with('message', 'Banda apagada com sucesso!');
    }

    private function getAllBands($search)
    {
        $bands = Band::leftJoin('albums', 'bands.id', 'albums.band_id')
            ->select('bands.id', 'bands.name', 'bands.photo', DB::raw('count(albums.band_id) as albums'))
            ->groupBy('bands.id');

        // if ($search) {
        //     $bands
        //         ->where('bands.name', "LIKE", "%$search%")
        //         ->orWhere('album.title', "LIKE", "%$search%")
        //         ->select('bands.*', 'album.title as albumTitle', 'album.photo as albumCover');
        // }

        $bands = $bands->get();

        return $bands;
    }

    private function getBand($id)
    {
        $band = Band::where('band.id', $id)->first();

        return $band;
    }
}
