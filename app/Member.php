<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Member extends Model
{
    protected $fillable = ['nama', 'alamat', 'jenis_kelamin', 'tlp'];
    use SoftDeletes;
}
