<!-- resources/views/page/barang/add.blade.php -->

@extends('layouts.base_admin.base_dashboard')
@section('judul', 'add barang')
@section('script_head')
@endsection

@section('content')
    <div class="container">
        <h1>Add Barang</h1>
        <form action="{{ route('barang.store') }}" method="post">
            @csrf <!-- Add this line to include the CSRF token -->

            <div class="mb-3">
              <label for="nama_barang" class="form-label">Nama Barang</label>
              <input type="text" class="form-control" id="nama_barang" name="nama_barang" aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
                <label for="nama_barang" class="form-label">Kode Barang</label>
                <input type="text" class="form-control" id="kode_barang" name="kode_barang" aria-describedby="emailHelp">
              </div>
            <div class="mb-3">
                <label for="satuan" class="form-label">Satuan</label>
                <input type="text" class="form-control" id="satuan" name="satuan" aria-describedby="emailHelp">
              </div>
              <div class="mb-3">
                <label for="harga_satuan" class="form-label">Harga Satuan</label>
                <input type="number" class="form-control" id="harga_satuan" name="harga_satuan" aria-describedby="emailHelp">
              </div>
            <div class="mb-3">
                <label for="stok" class="form-label">Stok Barang</label>
                <input type="number" class="form-control" id="stok" name="stok" aria-describedby="emailHelp">
              </div>

              <div class="mb-3">
                <label for="tenant_id" class="form-label">Select Tenant</label>
                <select class="form-select" id="tenant_id" name="tenant_id" aria-label="Select Tenant">
                    @foreach($tenants as $tenant)
                        <option value="{{ $tenant->id }}">{{ $tenant->nama_tenant }} - {{ $tenant->kode_tenant }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
          </form>
    </div>
@endsection
