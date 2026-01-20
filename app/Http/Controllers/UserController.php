<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $search = request()->query('search') ? request()->query('search') : '';

        $users = $this->getAllUsers($search);

        return view('users.all_users', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('users.add_user');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validar dados recebidos
        $request->validate([
            'name' => 'required',
            'email' => 'required|unique:users|email',
            'password' => 'required|min:8'
        ]);

        // Inserir na bade de dados
        User::insert([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return redirect()
            ->route('users.all')
            ->with('message', 'Utilizador adicionado com sucesso!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $user = User::where('id', $id)->first();

        return view('users.view_user', compact('user'));
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
            'name' => 'required',
            'photo' => 'image'
        ]);

        $photo = null;

        if ($request->hasFile('photo')) {
            $photo = Storage::putFile('userPhotos', $request->photo);
        }

        // Inserir na bade de dados
        User::where('id', $request->id)->update([
            'name' => $request->name,
            'photo' => $photo
        ]);

        return redirect()
            ->route('users.all')
            ->with('message', 'Utilizador atualizado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        User::where('id', $id)->delete();
        return back()->with('message', 'Utilizador apagado com sucesso!');
    }

    private function getAllUsers($search)
    {
        // $users = User::all();
        $users = User::where('name', "LIKE", "%$search%")
            ->orWhere('email', "LIKE", "%$search%")
            ->get();

        return $users;
    }
}
