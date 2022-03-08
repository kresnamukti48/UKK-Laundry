<?php

namespace App\Http\Controllers;

use App\DetailTransaksi;
use App\Paket;
use App\Transaksi;
use Illuminate\Http\Request;

class DetailTransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $transaksis = Transaksi::all();
        $pakets = Paket::orderBy('jenis')->get();
        return view('transaksi.createdetail', compact('transaksis', 'pakets'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'id_transaksi' => 'required|exists:transaksis,id',
            'id_paket' => 'required|exists:pakets,id',
            'qty' => 'required',

        ]);

        $detailtransaksi = new DetailTransaksi();

        $detailtransaksi->id_transaksi = $request->id_transaksi;
        $detailtransaksi->id_paket = $request->id_paket;
        $detailtransaksi->qty = $request->qty;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('transaksi.editdetail', compact('detailtransaksi'));
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
        $detailtransaksi = DetailTransaksi::findorFail($id);
        $request->validate([
            'id_paket' => 'required|exists:pakets,id',
            'qty' => 'required',

        ]);

        $detailtransaksi->id_paket = $request->id_paket;
        $detailtransaksi->qty = $request->qty;

        $detailtransaksi->save();

        return redirect()->back()->with('message', 'Detail Updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $detailtransaksi = DetailTransaksi::findorFail($id);
        $detailtransaksi->delete();

        return redirect()->back()->with('message', 'Detail Deleted successfully!');
    }
}