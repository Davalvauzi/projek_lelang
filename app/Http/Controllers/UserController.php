<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\barang;
use App\Models\lelang;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class usercontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        // $c = User::where('level', 'masyarakat')->count();
        // dd($c);
        $users = User::all();
        return view('user.index', compact('users'));
    }

    public function home()
    {
        //
        $barangs = barang::all();
        $lelangs = lelang::all();
        return view('welcome', compact('barangs', 'lelangs'));
    }

    public function sidebar()
    {
        //
        $users = user::all();
        view('template.sidebar', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('user.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $data = request()->validate(
            [
                'username' => 'required|unique:users,username',
                'password' => 'required',
            ],
            [
                'name.required' => 'Username Wajib Diisi',
                'name.unique' => 'Username Sudah ada',
                'password.required' => 'Password Wajib Diisi'
            ]
        );

        User::create([
            'username' => Str::camel($data['username']),
            'password' => bcrypt($data['password']),
            'level' => 'petugas'
        ]);

        return redirect('/user');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(user $user)
    {
        //
        $users = user::find($user->id);
        return view('user.show', compact('users'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(user $user)
    {
        //
        $users = user::find($user->id);
        return view('user.edit', compact('users'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, user $user)
    {
        //
        $request->validate([
            'username' => 'required',
            'level' => 'required'
        ]);

        $users = user::find($user->id);
        $users->username = $request->username;
        $users->level = $request->level;
        $users->update();

        return redirect('/user');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(user $user)
    {
        //
        $users = user::find($user->id);
        $users->delete();
        return redirect('user');
    }

    public function profile(user $user)
    {
        // 
        $users = User::all();
        return view('profile.index', compact('users'));
    }

    public function editprofile(user $user, Request $request)
    {
        $request->validate([
            'name' => 'required',
            'username' => 'required',
            'telepon' => 'required',
            'alamat' => 'required'
        ]);

        $users = user::find($user->id);
        $users->name = $request->name;
        $users->username = $request->username;
        $users->telepon = $request->telepon;
        $users->alamat = $request->alamat;
        $users->update();

        return redirect('/profile');
    }
}
