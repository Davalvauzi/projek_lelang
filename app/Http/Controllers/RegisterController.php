<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    //
    public function view()
    {
        return view('auth.register');
    }

    public function store(Request $request)
    {
        $data = request()->validate(
            [
                'name' => 'required|min:1|max:25',
                'username' => 'required|unique:users,username|max:15',
                'password' => 'required|min:4',
                'telepon' => 'required|numeric|max:13',
            ],
            [
                'name.required' => 'Nama tidak boleh kosong',
                'name.min' => 'Nama anda terlalu pendek',
                'name.max' => 'Nama anda terlalu panjang',
                'username.required' => 'Username tidak boleh kosong',
                'username.unique' => 'Username sudah terdaftar',
                'username.max' => 'Username anda terlalu panjang',
                'password.required' => 'Password tidak boleh kosong',
                'password.min' => 'Password terlalu pendek',
                'telepon.required' => 'Nomor Telepon tidak boleh kosong',
                'telepon.numeric' => 'Nomor Telepon harus berupa angka',
                'telepon.max' => 'Nomor Telepon terlalu panjang',
            ]
        );

        User::create([
            'name' => Str::camel($data['name']),
            'username' => Str::lower($data['username']),
            'password' => bcrypt($data['password']),
            'level' => 'masyarakat',
            'telepon' => $data['telepon'],
        ]);
        return redirect('/login');
    }
}
