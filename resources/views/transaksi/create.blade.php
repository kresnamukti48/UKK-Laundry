@extends('layouts.admin')

@section('main-content')
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">{{ $title ?? __('Create Transaksi') }}</h1>

    <!-- Main Content goes here -->

    <div class="card">
        <div class="card-body">
            <form action="{{ route('transaksi.store') }}" method="post">
                @csrf

                <div class="form-group">
                  <label for="nama">Nama Member</label>
                  <select name="member_id" class="form-control" @error('member_id') is-invalid @enderror name="member_id" id="member_id">
                    <option value=""> -Pilih- </option>
                    @foreach ($members as $item)
                    <option value="{{$item->id}}"{{old('member_id') == $item->id ? 'selected' : null}}>{{$item->nama}}</option>
                    @endforeach
                  </select>
                  @error('member_id')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>


                <div class="form-group">
                  <label for="tgl">Tanggal</label>
                  <input type="date" class="form-control @error('tgl') is-invalid @enderror" name="tgl" id="tgl" placeholder="Tanggal" autocomplete="off" value="{{ old('tgl') }}">
                  @error('tgl')
                    <span class="text-danger">{{ $message }}</span>
                  @enderror
                </div>

                <div class="form-group">
                  <label for="lama_pengerjaan">Lama Pengerjaan</label>
                  <input type="number" class="form-control @error('lama_pengerjaan') is-invalid @enderror" name="lama_pengerjaan" id="lama_pengerjaan" placeholder="Tanggal" autocomplete="off" value="{{ old('lama_pengerjaan') }}">
                  @error('lama_pengerjaan')
                    <span class="text-danger">{{ $message }}</span>
                  @enderror
                </div>

                <div class="form-group">
                    <label for="tgl_bayar">Tanggal Bayar</label>
                    <input type="date" class="form-control @error('tgl_bayar') is-invalid @enderror" name="tgl_bayar" id="tgl_bayar" placeholder="Tanggal Bayar" autocomplete="off" value="{{ old('tgl_bayar') }}">
                    @error('tgl_bayar')
                      <span class="text-danger">{{ $message }}</span>
                    @enderror
                  </div>

                <div class="form-group">
                  <label for="status">Status</label>
                  <select class="form-control @error('status') is-invalid @enderror" name="status" id="status" placeholder="Status" autocomplete="off" value="{{ old('status') }}">
                    <option value="">-Pilih-</option>
                    <option value="Baru">Baru</option>
	                <option value="Proses">Proses</option>
	                <option value="Selesai">Selesai</option>
	                <option value="Diambil">Diambil</option>
	          </select>
                  @error('status')
                    <span class="text-danger">{{ $message }}</span>
                  @enderror
                </div>

                <div class="form-group">
                    <label for="dibayar">Dibayar</label>
                    <select class="form-control @error('dibayar') is-invalid @enderror" name="dibayar" id="dibayar" placeholder="Dibayar" autocomplete="off" value="{{ old('dibayar') }}">
                      <option value="">-Pilih-</option>
                      <option value="dibayar">Dibayar</option>
                      <option value="belum_dibayar">Belum Dibayar</option>
                </select>
                    @error('dibayar')
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
