<?php

namespace App\Http\Controllers;

use App\Member;
use App\Paket;
use App\Transaksi;
use App\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $users = User::count();
        $members = Member::count();
        $packets = Paket::count();
        $transactions = Transaksi::count();

        $widget = [
            'users' => $users,
            'members' => $members,
            'packets' => $packets,
            'transactions' => $transactions
            //...
        ];

        return view('home', compact('widget'));
    }
}
