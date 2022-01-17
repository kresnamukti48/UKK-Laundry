<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\Permission\Models\Role as ModelsRole;

class Role extends ModelsRole
{
    use HasFactory;

    public const ROLE_ADMIN = 'Admin';
    public const ROLE_KASIR = 'Kasir';
}
