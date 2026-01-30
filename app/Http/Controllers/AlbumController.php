<?php

namespace App\Http\Controllers;

use App\Models\Album;
use App\Models\Band;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AlbumController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $search = request()->query('search') ? request()->query('search') : "";

        $albums = $this->getAllAlbums($search);

        return view('albums.all_albums', compact('albums'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $band = $this->getBand($request->bandId);

        return view('albums.add_album', compact('band'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validar dados recebidos
        $request->validate([
            'title' => 'required|min:3|max:50',
            'release_date' => 'required',
            'bandId' => 'required'
        ]);

        // Inserir na bade de dados
        Album::create([
            'title' => $request->title,
            'release_date' => $request->release_date,
            'band_id' => $request->bandId
        ]);

        return redirect()
            ->route('bands.view', $request->bandId)
            ->with('message', 'Álbum adicionado com sucesso!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $album = Album::where('id', $id)->first();
        $band = Band::where('id', $album->band_id)->first()->name;

        return view('albums.view_album', compact('album', 'band'));
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
            'title' => 'required|min:3|max:50',
            'release_date' => 'required',
            'band_id' => 'required',
            'photo' => 'image'
        ]);

        $photo = null;

        if ($request->hasFile('photo')) {
            $photo = Storage::putFile('albumPhotos', $request->photo);
            $previousPhoto = Album::where('id', $request->id)->first()->photo;
            Storage::delete($previousPhoto);
        }

        // Inserir na bade de dados
        Album::where('id', $request->id)->update([
            'title' => $request->title,
            'release_date' => $request->release_date,
            'band_id' => $request->band_id,
            'photo' => $photo
        ]);

        return redirect()
            ->route('bands.view', $request->band_id)
            ->with('message', 'Álbum atualizado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Album::where('id', $id)->delete();
        return back()->with('message', 'Álbum apagado com sucesso!');
    }

    private function getBand($bandId)
    {
        $band = Band::where('id', $bandId)->first();

        return $band;
    }

    private function getAllAlbums($search)
    {
        return Album::leftJoin('bands', 'albums.band_id', 'bands.id')
            ->where('bands.name', "LIKE", "%$search%")
            ->orWhere('albums.title', "LIKE", "%$search%")
            ->select('albums.*', 'bands.name as band', 'bands.photo as bandImage')
            ->get();
    }
}
