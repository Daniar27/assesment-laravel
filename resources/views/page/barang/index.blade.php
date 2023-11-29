@extends('layouts.base_admin.base_dashboard')
@section('judul', 'barang')
@section('script_head')
@endsection

@section('content')
    <div class="container">
        <h1>Barang List</h1>
        <a class="btn btn-primary" href="/dashboard/barang/create" role="button">Tambah Barang</a>
        <table class="table" id="barang-table">
            <thead>
              <tr>
                <th scope="col">Id</th>
                <th scope="col">Nama Barang</th>
                <th scope="col">Kode Barang</th>
                <th scope="col">Satuan</th>
                <th scope="col">Harga Satuan</th>
                <th scope="col">Stok</th>
                <th scope="col">Tenant</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>
                @foreach($data as $barang)
                    <tr>
                        <td>{{ $barang->id }}</td>
                        <td>{{ $barang->nama_barang }}</td>
                        <td>{{ $barang->kode_barang }}</td>
                        <td>{{ $barang->satuan }}</td>
                        <td>{{ $barang->harga_satuan }}</td>
                        <td>{{ $barang->stok }}</td>
                        <td>{{ $barang->tenant->nama_tenant }}</td>
                        <td class="btn-group">
                            <a href='barang/{{ $barang->id }}/edit'><i class='fas fa-edit fa-lg btn btn-warning'>Edit</i></a>
                            <form action="{{ route('barang.destroy', $barang->id) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
          </table>
    </div>
@endsection

@push('scripts')
    <script>
        $(function() {
            $('#barang-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{!! route('barang-list') !!}',
                columns: [
                    { data: 'id', name: 'id' }, // Add this line for the 'id' column
                    { data: 'nama_barang', name: 'nama_barang' },
                    { data: 'kode_barang', name: 'kode_barang' },
                    { data: 'satuan', name: 'satuan' },
                    { data: 'harga_satuan', name: 'harga_satuan' },
                    { data: 'stok', name: 'stok' },
                    { data: 'tenant.nama_tenant', name: 'tenant.nama_tenant' },
                    { data: 'options', name: 'options', orderable: false, searchable: false }, // Add this line for the 'options' column
                ]
            });
        });
    </script>
@endpush
