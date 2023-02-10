<?php

namespace App\Http\Controllers;

use App\Models\lelang;
use App\Models\barang;
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
        $lelangs = lelang::select('id', 'barangs_id', 'tanggal', 'harga_akhir', 'status')
            ->where([
                'status' => 'dibuka',
                'users_id' => Auth::user()->id
            ])
            ->get();
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
        $data = Request()->validate([
            'nama_barang' => 'required|exists:barangs,id|unique:lelang,barangs_id',
            'tanggal' => 'required|date',
            'harga_akhir' => 'required|numeric'
        ], [
            'barang_id.required' => 'Barang Harus Diisi',
            'barang_id.exists' => 'Barang Tidak Ada Pada Data Barang',
            'barang_id.unique' => 'Barang Sudah Ada',
            'tanggal_lelang.required' => 'Tanggal Lelang Harus Diisi',
            'tanggal_lelang.date' => 'Tanggal Lelang Harus Berupa Tanggal',
            'harga_akhir.required' => 'Harga Akhir Harus Diisi',
            'harga_akhir.numeric' => 'Harga Akhir Harus Harus Berupa Angka',
        ]);
        $lelang = new Lelang;
        $lelang->barangs_id = $request->barangs_id;
        $lelang->tanggal_lelang = $request->tanggal_lelang;
        $lelang->harga_akhir = $request->harga_akhir;
        $lelang->users_id = Auth::user()->users_id;
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
}
