@extends('layouts.admin')

@section('main-content')
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">{{ $title ?? __('Create Member') }}</h1>

    <!-- Main Content goes here -->

    <div class="card">
        <div class="card-body">
            <form action="{{ route('member.store') }}" method="post">
                @csrf

                <div class="form-group">
                  <label for="nama">Nama</label>
                  <input type="text" class="form-control @error('nama') is-invalid @enderror" name="nama" id="nama" placeholder="Nama" autocomplete="off" value="{{ old('nama') }}">
                  @error('nama')
                    <span class="text-danger">{{ $message }}</span>
                  @enderror
                </div>


                <div class="form-group">
                  <label for="alamat">Alamat</label>
                  <input type="text" class="form-control @error('alamat') is-invalid @enderror" name="alamat" id="alamat" placeholder="Alamat" autocomplete="off" value="{{ old('alamat') }}">
                  @error('alamat')
                    <span class="text-danger">{{ $message }}</span>
                  @enderror
                </div>

                <div class="form-group">
                  <label for="jenis_kelamin">Jenis Kelamin</label>
                  <select class="form-control @error('jenis_kelamin') is-invalid @enderror" name="jenis_kelamin" id="jenis_kelamin" placeholder="Jenis Kelamin" autocomplete="off" value="{{ old('jenis_kelamin') }}">
                    <option value="">-Pilih-</option>
                    <option value="Laki-Laki">Laki-laki</option>
	                <option value="Perempuan">Perempuan</option>
	          </select>
                  @error('jenis_kelamin')
                    <span class="text-danger">{{ $message }}</span>
                  @enderror
                </div>

                <div class="form-group">
                  <label for="tlp">Telepon</label>
                  <input type="number" class="form-control @error('tlp') is-invalid @enderror" name="tlp" id="tlp" placeholder="Telepon" autocomplete="off" value="{{ old('tlp') }}">
                  @error('tlp')
                    <span class="text-danger">{{ $message }}</span>
                  @enderror
                </div>



                <button type="submit" class="btn btn-primary">Save</button>


            </form>
        </div>
    </div>

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
