@extends('layouts.admin')

@section('main-content')
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">{{ $title ?? __('Create Transaksi') }}</h1>

    <!-- Main Content goes here -->

    <div class="card">
        <div class="card-body">
            <form action="{{ route('transaksi.store_detail') }}" method="post">
                @csrf

                <div class="form-group">
                  <label for="transaksi">Nomer Transaksi</label>
                  <select name="id_transaksi" class="form-control" @error('id_transaksi') is-invalid @enderror>
                    <option value=""> -Pilih- </option>
                    @foreach ($transaksis as $item)
                    <option value="{{$item->id}}"{{old('id_transaksi') == $item->id ? 'selected' : null}}>{{$item->id}}</option>
                    @endforeach
                  </select>
                  @error('id_transaksi')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>

                <div class="form-group">
                  <label for="paket">Nama Paket</label>
                  <select name="id_paket" class="form-control" @error('id_paket') is-invalid @enderror>
                    <option value=""> -Pilih- </option>
                    @foreach ($pakets as $item)
                    <option value="{{$item->id}}"{{old('id_paket') == $item->id ? 'selected' : null}}>{{$item->jenis}}</option>
                    @endforeach
                  </select>
                  @error('id_paket')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>


                <div class="form-group">
                  <label for="qty">Jumlah</label>
                  <input type="int" class="form-control @error('qty') is-invalid @enderror" name="qty" id="qty" placeholder="Jumlah" autocomplete="off" value="{{ old('qty') }}">
                  @error('qty')
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
