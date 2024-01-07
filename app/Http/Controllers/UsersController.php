<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;

class UsersController extends Controller
{

    public function loginAuth(Request $request){
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $user = $request->only(['email', 'password']);
        if (Auth::attempt($user)) {
            return redirect()->route('home');
        } else{
            return redirect()->back()->with('failed', 'Proses login gagal, silahkan coba lagi dengan data yang benar!');
        }
    }

    public function logout(){
        Auth::logout();
        return redirect()->route('login')->with('logout', 'Anda telah logout!');
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::all();
        return view('users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|min:3',
            'email' => 'required',
            'role' => 'required',
            'password' => 'required',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'role' => $request->role,
            'password' => Hash::make($request->password),
            
        ]);

        return redirect()->back()->with('success', 'Berhasil menambahkan data Akun!');
    }

    /**
     * Display the specified resource.
     */
    public function show(User $users)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $users, $id)
    {
        $users = User::find($id);

        return view('users.edit', compact('users'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $users, $id)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'role' => 'required',
        ]);

        User::where('id', $id)->update([
            'name' => $request->name,
            'email' => $request->email,
            'role' => $request->role,
            'password' => Hash::make($request->password),
        ]);


        return redirect()->route('users.home')->with('success', 'Berhasil mengubah data!');
    }

    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request,User $users)
    {
        User::where('id', $request->id)->delete();

        return redirect()->route('users.home')->with('success', 'Berhasil menghapus data!');
    }
}
