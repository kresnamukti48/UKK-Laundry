<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Transaksi extends Model
{
    protected $fillable = ['id_member', 'tgl', 'batas_waktu', 'tgl_bayar', 'status', 'dibayar', 'id_user'];
    use SoftDeletes;
}
