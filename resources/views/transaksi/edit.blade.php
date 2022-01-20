@extends('layouts.admin')

@section('main-content')
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">{{ $title ?? __('Edit transaksi') }}</h1>

    <!-- Main Content goes here -->

    <div class="card">
        <div class="card-body">
            <form action="{{ route('transaksi.update', $transaksi->id) }}" method="post">
                @csrf
                @method('put')


                <div class="form-group">
                    <label for="status">Status</label>
                    <select class="form-control @error('status') is-invalid @enderror" name="status" id="status" placeholder="status" autocomplete="off" >
                        <option value="">-Pilih-</option>
                        <option value="Baru" {{ old('status', $transaksi->status) == 'Baru' ? 'selected' : null }}>Baru</option>
                        <option value="Proses" {{ old('status', $transaksi->status) == 'Proses' ? 'selected' : null }}>Proses</option>
                        <option value="Selesai" {{ old('status', $transaksi->status) == 'Selesai' ? 'selected' : null }}>Selesai</option>
                        <option value="Diambil" {{ old('status', $transaksi->status) == 'Diambil' ? 'selected' : null }}>Diambil</option>
                  </select>
                      @error('jenis')
                        <span class="text-danger">{{ $message }}</span>
                      @enderror
                </div>

                <div class="form-group">
                    <label for="dibayar">Dibayar</label>
                    <select class="form-control @error('dibayar') is-invalid @enderror" name="dibayar" id="dibayar" placeholder="dibayar" autocomplete="off" >
                        <option value="">-Pilih-</option>
                        <option value="dibayar" {{ old('dibayar', $transaksi->dibayar) == 'dibayar' ? 'selected' : null }}>Dibayar</option>
                        <option value="belum_dibayar" {{ old('dibayar', $transaksi->dibayar) == 'belum_dibayar' ? 'selected' : null }}>Belum Dibayar</option>
                  </select>
                      @error('jenis')
                        <span class="text-danger">{{ $message }}</span>
                      @enderror
                </div>




                <button type="submit" class="btn btn-primary">Save</button>
                <a href="{{ route('member.index') }}" class="btn btn-default">Back to list</a>

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
