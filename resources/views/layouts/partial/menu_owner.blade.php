  <!-- Nav Item - Transaksi -->
  <li class="nav-item {{ Nav::isRoute('transaksi.index_owner') }}">
      <a class="nav-link" href="{{ route('transaksi.index_owner') }}">
          <i class="fas fa-fw fa-plus"></i>
          <span>{{ __('Transaksi Owner') }}</span>
      </a>
  </li>
