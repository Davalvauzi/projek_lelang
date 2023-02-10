<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    //
    public function view()
    {
        $users = User::all();
        return view('user.index', compact('users'));
    }
}
