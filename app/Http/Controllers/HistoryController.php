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
    public function create(history $history, lelang $lelang, barang $barang)
    {
        //
        $lelangs = lelang::find($lelang->id);
        $histories = history::orderBy('harga_penawaran', 'desc')->get()->where('lelang_id', $lelang->id);
        return view('lelang.penawaran', compact('lelangs', 'histories'));
    }

    public function historypenawaran(history $history, lelang $lelang)
    {
        // 
        $lelangs = lelang::find($lelang->id);
        $histories = history::orderBy('harga_penawaran', 'desc')->get()->where('lelang_id', $lelang->id);
        return view('lelang.historylelang', compact('lelangs', 'histories'));
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
        // dd($request);
        $validateData = $request->validate(
            [
                'harga_penawaran' => 'required',
            ],
            [
                'harga_penawaran.required' => 'Harga Penawaran Harus Diisi'
            ]
        );


        $histories = new history();
        $histories->lelangs_id = $lelang->id;
        $histories->users_id = auth::user()->id;
        $histories->barangs_id = $lelang->barang->id;
        $histories->harga_penawaran = $request->harga_penawaran;
        $histories->status = 'pending';
        $histories->save();

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
