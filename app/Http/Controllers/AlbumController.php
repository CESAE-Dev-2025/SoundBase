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
    public function index(string $bandId)
    {
        $search = request()->query('search') ? request()->query('search') : null;

        $band = $this->getBand($bandId);

        $albums = $this->getAllAlbums($search, $bandId);

        return view('albums.all_albums', compact('albums', 'band'));
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

        return view('albums.view_album', compact('album'));
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
            $photo = Storage::putFile('bandPhotos', $request->photo);
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

    private function getAllAlbums($search, $bandId)
    {
        $albums = Album::where('albums.band_id', $bandId);

        // if ($search) {
        //     $bands
        //         ->where('bands.name', "LIKE", "%$search%")
        //         ->orWhere('album.title', "LIKE", "%$search%")
        //         ->select('bands.*', 'album.title as albumTitle', 'album.photo as albumCover');
        // }

        $albums = $albums->get();

        return $albums;
    }
}
