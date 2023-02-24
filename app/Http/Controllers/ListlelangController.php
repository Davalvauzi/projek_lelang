<?php

namespace App\Http\Controllers;

use App\Models\lelang;
use App\Models\barang;
use App\Models\history;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class ListlelangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $lelangs = lelang::all();
        return view('listlelang.index', compact('lelangs'));
    }
    public function penawaran()
    {
        $lelangs = lelang::all();
        return view('listlelang.index', compact('lelangs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(lelang $lelang, history $history)
    {
        //
        $lelangs = lelang::find($lelang->id);
        $history = history::all();
        return view('listlelang.create', compact('lelangs', 'history'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, history $history, lelang $lelang, barang $barang)

    {
        //
        $request->validate([
            'harga_penawaran' => 'required|numeric'
        ], [
            'harga_penawarn.required' => 'harga penawran Harus Diisi',
            'harga_penawarn.exists' => 'harga penawran harus angka'
        ]);
        $history = new history();
        $history->lelang_id = $lelang->id;
        $history->users_id = Auth::user()->id;
        $history->harga = $request->harga_penawaran;
        $history->status = 'pending';
        $history->save();

        return redirect('listlelang.index', $lelang->id)->with('success', 'Anda Berhasil Menawar Barang Ini');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(lelang $lelang)
    {
        //
        $lelangs = lelang::find($lelang->id);
        return view('lelang.show', compact('lelangs'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
