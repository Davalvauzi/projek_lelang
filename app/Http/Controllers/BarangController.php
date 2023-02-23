<?php

namespace App\Http\Controllers;

use App\Models\barang;
use Illuminate\Http\Request;

class BarangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\ResponseT
     */
    public function index()
    {
        //
        $barangs = barang::all();
        return view('barang.index', compact('barangs'));
    }

    /**
     * Show the form for creating a new resource
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('barang.create');
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
        $permintaan = $request->validate([
            'nama_barang' => 'required',
            'tanggal' => 'required',
            'harga_awal' => 'required',
            'deskripsi_barang' => 'required',
            'image' => 'image|file|max:10024',
        ]);

        if ($request->file('image')) {
            $permintaan['image'] = $request->file('image')->store('post-images');
        }

        // $image = time() . '.' . $request->image->extension();

        // $request->image->move(public_path('images'), $image);

        // barang::create([
        //     'nama_barang' => $request->nama_barang,
        //     'tanggal' => $request->tanggal,
        //     'harga_awal' => $request->harga_awal,
        //     'deskripsi_barang' => $request->deskripsi_barang,
        //     'image' => $image
        // ]);

        barang::create($permintaan);

        return redirect('/barang');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function show(barang $barang)
    {
        //
        $barangs = barang::find($barang->id);
        return view('barang.show', compact('barangs'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function edit(barang $barang)
    {
        //
        $barangs = barang::find($barang->id);
        return view('barang.edit', compact('barangs'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, barang $barang)
    {
        //
        $request->validate([
            'nama_barang' => 'required',
            'tanggal' => 'required',
            'harga_awal' => 'required',
            'image' => 'image|file',
            'deskripsi_barang' => 'required'
        ]);

        $barangs = barang::find($barang->id);
        $barangs->nama_barang = $request->nama_barang;
        $barangs->tanggal = $request->tanggal;
        $barangs->harga_awal = $request->harga_awal;
        $barangs->deskripsi_barang = $request->deskripsi_barang;
        $barangs->image = $request->image;
        $barangs->update();

        return redirect('/barang');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function destroy(barang $barang)
    {
        //
        $barangs = barang::find($barang->id);
        $barangs->delete();
        return redirect('barang');
    }
}
