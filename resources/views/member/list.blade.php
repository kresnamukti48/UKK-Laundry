@extends('layouts.admin')

@section('main-content')
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">{{ $title ?? __('Member CRUD') }}</h1>

    <!-- Main Content goes here -->

    <a href="{{ route('member.create') }}" class="btn btn-primary mb-3">New User</a>

    @if (session('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif

    <table class="table table-bordered table-stripped">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Alamat</th>
                <th>Jenis Kelamin</th>
                <th>Telepon</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($members as $member)
                <tr>
                    <td scope="row">{{ $loop->iteration }}</td>
                    <td>{{ $member->nama }}</td>
                    <td>{{ $member->alamat }}</td>
                    <td>{{ $member->jenis_kelamin }}</td>
                    <td>{{ $member->tlp }}</td>
                    <td>
                        <div class="d-flex">
                            <a href="{{ route('member.edit', $member->id) }}" class="btn btn-sm btn-primary mr-2">Edit</a>
                            <form action="{{ route('member.destroy', $member->id) }}" method="post">
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
