<?php

namespace App\Http\Controllers;

use App\DetailTransaksi;
use App\Exports\TransaksiExport;
use App\Member;
use App\Paket;
use App\Role;
use App\Transaksi;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;

class TransaksiController extends Controller
{

    public function __construct()
    {
        $this->middleware(['role:' . implode('|', [Role::ROLE_ADMIN, Role::ROLE_KASIR, Role::ROLE_OWNER])])->only(['index', 'export']);
        $this->middleware(['role:' . implode('|', [Role::ROLE_ADMIN, Role::ROLE_KASIR])])->except(['index', 'export']);
    }

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
            'lama_pengerjaan' => 'required',
            'status' => 'required',
            'dibayar' => 'required',
        ]);


        $tgl_transaksi = Carbon::createFromFormat('Y-m-d', $request->tgl);
        $batas_waktu = $tgl_transaksi->addDays($request->lama_pengerjaan);

        $transaksi = new Transaksi();

        $transaksi->id_member = $request->id_member;
        $transaksi->lama_pengerjaan = $request->lama_pengerjaan;
        $transaksi->tgl = $request->tgl;
        $transaksi->batas_waktu = $batas_waktu->format('Y-m-d');
        $transaksi->tgl_bayar = $request->dibayar == 'dibayar' ? now() : null;
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
    public function show()
    {
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
            'status' => 'required',
            'dibayar' => 'required',
        ]);

        $transaksi->tgl_bayar = $request->dibayar == 'dibayar' ? now() : null;
        $transaksi->status = $request->status;
        $transaksi->dibayar = $request->dibayar;

        $transaksi->save();

        return redirect()->route('transaksi.index')->with('message', 'Transaksi update successfully!');
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

        return redirect()->route('transaksi.index',)->with('message', 'Transaksi deleted successfully!');
    }



    public function export(Request $request)
    {
        $data = Transaksi::all();
        return Excel::download(new TransaksiExport($data), 'transaksi.xlsx');
    }

    public function index_detail($id_transaksi)
    {


        $details = DetailTransaksi::where('id_transaksi', $id_transaksi)->get();
        $transaksis = Transaksi::all();
        $pakets = Paket::all();
        return view('transaksi.detail', compact('details', 'transaksis', 'pakets'));
    }

    public function create_detail()
    {
        $transaksis = Transaksi::all();
        $pakets = Paket::orderBy('jenis')->get();
        return view('transaksi.createdetail', compact('transaksis', 'pakets'));
    }

    public function store_detail(Request $request)
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

        $detailtransaksi->save();

        return redirect()->route('transaksi.index_detail', $request->id_transaksi)->with('message', 'Detail Added successfully!');
    }

    public function edit_detail($id)
    {
        $detailtransaksi = DetailTransaksi::findOrFail($id);
        $paket = Paket::all();
        return view('transaksi.editdetail', compact('detailtransaksi', 'paket'));
    }

    public function update_detail(Request $request, $id)
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

    public function destroy_detail($id)
    {

        $detailtransaksi = DetailTransaksi::findorFail($id);
        $detailtransaksi->delete();

        return redirect()->back()->with('message', 'Detail Deleted successfully!');
    }
}
