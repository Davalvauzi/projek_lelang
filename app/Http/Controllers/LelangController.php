<?php

namespace App\Http\Controllers;

use App\Models\{
    barang,
    lelang,
    history
};
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LelangController extends Controller
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
        return view('lelang.index', compact('lelangs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $barangs = barang::select('id', 'nama_barang', 'harga_awal')
            ->whereNotIn('id', function ($query) {
                $query->select('barangs_id')->from('lelangs');
            })->get();
        return view('lelang.create', compact('barangs'));
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
        $request->validate([
            'barangs_id' => 'required|exists:barangs,id|unique:lelangs,barangs_id',
            'tanggal' => 'required|date',
            'harga_akhir' => 'required|numeric'
        ], [
            'barang_id.required' => 'Barang Harus Diisi',
            'barang_id.exists' => 'Barang Tidak Ada Pada Data Barang',
            'barang_id.unique' => 'Barang Sudah Ada',
            'tanggal.required' => 'Tanggal Lelang Harus Diisi',
            'tanggal.date' => 'Tanggal Lelang Harus Berupa Tanggal',
            'harga_akhir.required' => 'Harga Akhir Harus Diisi',
            'harga_akhir.numeric' => 'Harga Akhir Harus Harus Berupa Angka',
        ]);
        $lelang = new lelang;
        $lelang->barangs_id = $request->barangs_id;
        $lelang->tanggal = $request->tanggal;
        $lelang->harga_akhir = $request->harga_akhir;
        $lelang->users_id = Auth::user()->id;
        $lelang->status = 'dibuka';
        $lelang->save();

        return redirect()->route('lelang.index')->with('success', 'Data Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\lelang  $lelang
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
     * @param  \App\Models\lelang  $lelang
     * @return \Illuminate\Http\Response
     */
    public function edit(lelang $lelang)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\lelang  $lelang
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, lelang $lelang)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\lelang  $lelang
     * @return \Illuminate\Http\Response
     */
    public function destroy(lelang $lelang)
    {
        //
    }

    public function listlelang(lelang $lelang)
    {
        // dd($lelang);
        $lelangs = lelang::find($lelang->id);
        return view('listlelang.show', compact('lelangs'));
    }

    // public function tawar(lelang $lelang, history $history)
    // {
    //     $histories = history::all();
    //     $lelangs = lelang::find($lelang->id);
    //     return view('listlelang.create', compact('lelangs', 'histories'));
    // }
}
