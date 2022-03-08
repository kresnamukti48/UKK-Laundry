@extends('layouts.admin')

@section('main-content')
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">{{ $title ?? __('Edit Paket') }}</h1>

    <!-- Main Content goes here -->

    <div class="card">
        <div class="card-body">
            <form action="{{ route('transaksi.update_detail', $detailtransaksi->id) }}" method="post">
                @csrf
                @method('put')

                <div class="form-group">
                    <label for="paket">Nama Paket</label>
                    <select name="id_paket" class="form-control" @error('id_paket') is-invalid @enderror>
                      @foreach ($paket as $item)
                      <option value="{{$item->id}}">{{$item->jenis}}</option>
                      @endforeach
                    </select>
                    @error('id_paket')<div class="invalid-feedback">{{ $message }}</div>@enderror
                  </div>



                <div class="form-group">
                  <label for="qty">Jumlah</label>
                  <input type="number" class="form-control @error('qty') is-invalid @enderror" name="qty" id="qty" placeholder="Jumlah" autocomplete="off" value="{{ old('qty') ?? $detailtransaksi->qty }}">
                  @error('qty')
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
