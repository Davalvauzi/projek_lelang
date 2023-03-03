<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\barang;
use App\Models\lelang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Dashboard extends Controller
{
    //
    public function admin()
    {
        $barangs = db::table('barangs')->count();
        $users = db::table('users')->count();
        $count = User::all()->count();
        $count = barang::all()->count();
        $count = lelang::all()->count();
        $lelangs = lelang::all();
        return view('dashboard.admin', compact('barangs', 'users', 'lelangs'))->with(['jumlahbarang' => $barangs, 'jumlahuser' => $users]);
    }

    public function petugas()
    {
        $barangs = db::table('barangs')->count();
        $users = db::table('users')->count();
        $count = User::all()->count();
        $count = barang::all()->count();
        $count = lelang::all()->count();
        $lelangs = lelang::all();
        return view('dashboard.petugas', compact('barangs', 'users', 'lelangs'))->with(['jumlahbarang' => $barangs, 'jumlahuser' => $users]);
    }

    public function masyarakat()
    {
        $barangs = db::table('barangs')->count();
        $users = db::table('users')->count();
        $count = User::all()->count();
        $count = barang::all()->count();
        $count = lelang::all()->count();
        $lelangs = lelang::all();
        return view('dashboard.masyarakat', compact('barangs', 'users', 'lelangs'))->with(['jumlahbarang' => $barangs, 'jumlahuser' => $users]);
    }
}
