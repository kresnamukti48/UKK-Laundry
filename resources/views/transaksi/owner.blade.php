@extends('layouts.admin')

@section('main-content')
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">{{ $title ?? __('Transaksi') }}</h1>

    <!-- Main Content goes here -->

    <a href="{{ route('transaksi.export') }}" class="btn btn-success mb-3">Export</a>

    @if (session('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif

    <table class="table table-bordered table-stripped">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Member</th>
                <th>Tanggal Transaksi</th>
                <th>Batas Waktu Pengambilan</th>
                <th>Tanggal Bayar</th>
                <th>Status</th>
                <th>Pembayaran</th>
                <th>Nama Kasir</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($transaksis as $transaksi)
                <tr>
                    <td scope="row">{{ $loop->iteration }}</td>
                    <td>{{ $transaksi->member->nama }}</td>
                    <td>{{ $transaksi->tgl }}</td>
                    <td>{{ $transaksi->batas_waktu }}</td>
                    <td>{{ $transaksi->tgl_bayar }}</td>
                    <td>{{ $transaksi->status }}</td>
                    <td>{{ $transaksi->dibayar }}</td>
                    <td>{{ $transaksi->user->name }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <!-- End of Main Content -->
@endsection

@push('notif')
    @if (session('success'))
        <div class="alert alert-success border-left-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    @if (session('status'))
        <div class="alert alert-success border-left-success" role="alert">
            {{ session('status') }}
        </div>
    @endif
@endpush
