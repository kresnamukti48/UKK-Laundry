@extends('layouts.admin')

@section('main-content')
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">{{ $title ?? __('Paket CRUD') }}</h1>

    <!-- Main Content goes here -->

    <a href="{{ route('paket.create') }}" class="btn btn-primary mb-3">New Paket</a>

    @if (session('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif

    <table class="table table-bordered table-stripped">
        <thead>
            <tr>
                <th>No</th>
                <th>Jenis</th>
                <th>Harga</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($pakets as $paket)
                <tr>
                    <td scope="row">{{ $loop->iteration }}</td>
                    <td>{{ $paket->jenis }}</td>
                    <td>{{ $paket->harga }}</td>
                    <td>
                        <div class="d-flex">
                            <a href="{{ route('paket.edit', $paket->id) }}" class="btn btn-sm btn-primary mr-2">Edit</a>
                            <form action="{{ route('paket.destroy', $paket->id) }}" method="post">
                                @csrf
                                @method('delete')
                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure to delete this?')">Delete</button>
                            </form>
                        </div>
                    </td>
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
