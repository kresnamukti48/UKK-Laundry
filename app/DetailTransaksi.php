<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailTransaksi extends Model
{
    use HasFactory;
    protected $fillable = ['id_transaksi', 'id_paket', 'qty'];

    public function transaksi()
    {
        return $this->belongsTo(Transaksi::class, 'id_transaksi');
    }

    public function paket()
    {
        return $this->belongsTo(Paket::class, 'id_paket');
    }

    public function jumlah()
    {
        $jumlah = $this->paket();
        $qty = DetailTransaksi::all();
        $harga = $jumlah->sum('harga');
        $qty1 = $qty->sum('qty');
        $total_harga = $harga * $qty1;

        return $total_harga;
    }
}
