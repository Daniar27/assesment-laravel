@extends('layouts.base_admin.base_dashboard')
@section('judul', 'barang')
@section('script_head')
@endsection

@section('content')
    <div class="container">
        <h1>Tenant List</h1>
        <table class="table" id="barang-table">
            <thead>
              <tr>
                <th scope="col">Id</th>
                <th scope="col">Nama Tenant</th>
                <th scope="col">Kode Tenant</th>
                <th scope="col">No HP</th>
              </tr>
            </thead>
            <tbody>
                @foreach($data as $tenant)
                    <tr>
                        <td>{{ $tenant->id }}</td>
                        <td>{{ $tenant->nama_tenant }}</td>
                        <td>{{ $tenant->kode_tenant }}</td>
                        <td>{{ $tenant->no_hp }}</td>
                    </tr>
                @endforeach
            </tbody>
          </table>
    </div>
@endsection

