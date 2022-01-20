        <!-- Nav Item -->
        <li class="nav-item {{ Nav::isRoute('basic.index') }}">
            <a class="nav-link" href="{{ route('basic.index') }}">
                <i class="fas fa-fw fa-plus"></i>
                <span>{{ __('User CRUD') }}</span>
            </a>
        </li>

        <!-- Nav Item - Member -->
        <li class="nav-item {{ Nav::isRoute('member.index') }}">
            <a class="nav-link" href="{{ route('member.index') }}">
                <i class="fas fa-fw fa-plus"></i>
                <span>{{ __('Member CRUD') }}</span>
            </a>
        </li>

        <!-- Nav Item - Paket -->
        <li class="nav-item {{ Nav::isRoute('paket.index') }}">
            <a class="nav-link" href="{{ route('paket.index') }}">
                <i class="fas fa-fw fa-plus"></i>
                <span>{{ __('Paket CRUD') }}</span>
            </a>
        </li>

        <!-- Nav Item - Transaksi -->
        <li class="nav-item {{ Nav::isRoute('transkasi.index') }}">
            <a class="nav-link" href="{{ route('transaksi.index') }}">
                <i class="fas fa-fw fa-plus"></i>
                <span>{{ __('Transaksi') }}</span>
            </a>
        </li>


        <!-- Nav Item - About -->
        <li class="nav-item {{ Nav::isRoute('about') }}">
            <a class="nav-link" href="{{ route('about') }}">
                <i class="fas fa-fw fa-hands-helping"></i>
                <span>{{ __('About') }}</span>
            </a>
        </li>
