@role(App\Role::ROLE_ADMIN)
@include('layouts.partial.menu_admin')
@endrole

@role(App\Role::ROLE_KASIR)
@include('layouts.partial.menu_kasir')
@endrole
