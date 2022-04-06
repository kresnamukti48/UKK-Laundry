<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Paket;

class PaketController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pakets = Paket::all();
        return view('paket.list', compact('pakets'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('paket.create');
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
            'jenis' => 'required',
            'harga' => 'required'
        ]);

        $paket = new Paket();

        $paket->jenis = $request->jenis;
        $paket->harga = $request->harga;

        $paket->save();

        return redirect()->route('paket.index')->with('message', 'Paket added successfully!');
    }



    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Paket $paket)
    {
        return view('paket.edit', compact('paket'));
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
        $paket = Paket::findorfail($id);
        $request->validate([
            'jenis' => 'required',
            'harga' => 'required',
        ]);

        $paket->jenis = $request->jenis;
        $paket->harga = $request->harga;

        $paket->save();

        return redirect()->route('paket.index')->with('message', 'User updated successfully!');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $paket = Paket::findorfail($id);
        $paket->delete();

        return redirect()->route('paket.index')->with('message', 'Paket Deleted Succesfully!');
    }
}
