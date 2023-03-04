<?php

namespace App\Http\Controllers;

use App\Models\history;
use App\Models\lelang;
use App\Models\barang;
use Illuminate\Support\Facades\auth;
use Illuminate\Http\Request;

class HistoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(history $history, lelang $lelang)
    {
        //
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
        $validateData = $request->validate(
            [
                'harga_penawaran' => 'required',
            ],
            [
                'harga_penawaran.required' => 'Harga Penawaran Harus Diisi'
            ]
        );

        $historie = new history();
        $historie->lelang_id = $lelang->id;
        $historie->users_id = auth::user()->id;
        $historie->barang_id = $lelang->barang->id;
        $historie->harga_penawaran = $request->harga_penawaran;
        $historie->status = 'pending';
        $historie->save();

        return redirect()->route('tawar', $lelang->id)->with('success', 'Penawaran Anda Tercatat')->with('ucapan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\history  $history
     * @return \Illuminate\Http\Response
     */
    public function show(history $history)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\history  $history
     * @return \Illuminate\Http\Response
     */
    public function edit(history $history)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\history  $history
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, history $history)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\history  $history
     * @return \Illuminate\Http\Response
     */
    public function destroy(history $history)
    {
        //
    }
}
