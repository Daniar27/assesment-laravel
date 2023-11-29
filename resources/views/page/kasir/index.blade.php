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
                <th scope="col">Nama Kasir</th>
                <th scope="col">Kode Kasir</th>
                <th scope="col">No HP</th>
              </tr>
            </thead>
            <tbody>
                @foreach($data as $kasir)
                    <tr>
                        <td>{{ $kasir->id }}</td>
                        <td>{{ $kasir->nama_kasir }}</td>
                        <td>{{ $kasir->kode_kasir }}</td>
                        <td>{{ $kasir->no_hp }}</td>
                    </tr>
                @endforeach
            </tbody>
          </table>
    </div>
@endsection

