<?php

namespace App\Http\Controllers;

use App\DetailTransaksi;
use App\Exports\TransaksiExport;
use App\Member;
use App\Transaksi;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;

class TransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $transaksis = Transaksi::all();
        $members = Member::orderBy('nama')->get();
        $users = User::all();
        return view('transaksi.list', compact('transaksis', 'members', 'users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $members = Member::orderBy('nama')->get();
        return view('transaksi.create', compact('members'));
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
            'id_member' => 'required|exists:members,id',
            'tgl' => 'required|date',
            'status' => 'required',
            'dibayar' => 'required',
        ]);

        $tgl_transaksi = date_create($request->tgl);
        date_add($tgl_transaksi, date_interval_create_from_date_string($request->lama_pengerjaan . " days"));
        $batas_waktu = date_format($tgl_transaksi, 'Y-m-d');

        $transaksi = new Transaksi();

        $transaksi->id_member = $request->id_member;
        $transaksi->tgl = $request->tgl;
        $transaksi->batas_waktu = $batas_waktu;
        $transaksi->tgl_bayar = $request->tgl_bayar;
        $transaksi->status = $request->status;
        $transaksi->dibayar = $request->dibayar;
        $transaksi->id_user = Auth::id();

        $transaksi->save();

        return redirect()->route('transaksi.index')->with('message', 'Transaksi added successfully!');
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
    public function edit(Transaksi $transaksi)
    {
        return view('transaksi.edit', compact('transaksi'));
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
        $transaksi = Transaksi::findorfail($id);
        $request->validate([
            'id_member' => 'required|exists:members,id',
            'tgl' => 'required|date',
            'batas_waktu' => 'required|date',
            'tgl_bayar' => 'required|date',
            'status' => 'required',
            'dibayar' => 'required',
            'id_user' => 'required|exists:users,id',
        ]);

        $transaksi->id_member = $request->id_member;
        $transaksi->tgl = $request->tgl;
        $transaksi->batas_waktu = $request->batas_waktu;
        $transaksi->tgl_bayar = $request->tgl_bayar;
        $transaksi->status = $request->status;
        $transaksi->dibayar = $request->dibayar;
        $transaksi->id_user = $request->id_user;

        $transaksi->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $transaksi = Transaksi::findorFail($id);
        $transaksi->delete();

        return redirect()->route('transaksi.index')->with('message', 'Transaksi deleted successfully!');
    }

    public function detail($id)
    {
        $detailtransaksis = DetailTransaksi::all();
        return view('transaksi.detail', compact('detailtransaksis'));
    }

    public function export(Request $request)
    {
        $transaksi = Transaksi::all();
        $data = Excel::raw(new TransaksiExport($transaksi), \Maatwebsite\Excel\Excel::XLSX);
    }
}
