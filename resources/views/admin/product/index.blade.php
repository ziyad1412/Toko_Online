@extends('admin.layout.appadmin')
@section('content')
    @if (Auth::user()->role != 'pelanggan')
        <h1 class="mt-4">Data Produk</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="{{ url('admin/dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item active">Data Product</li>
        </ol>

        <div class="card mb-4">
            <div class="card-header">
                <a class="btn btn-primary" href="{{ url('product/create') }}">Tambah Produk</a>
            </div>
            <div class="card-body">
                <table id="datatablesSimple" class="table table-bordered">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Kode Produk</th>
                            <th>Nama Produk</th>
                            <th>Harga</th>
                            <th>Currency</th>
                            <th>Diskon (%)</th>
                            <th>Dimensi</th>
                            <th>Unit</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>No</th>
                            <th>Kode Produk</th>
                            <th>Nama Produk</th>
                            <th>Harga</th>
                            <th>Currency</th>
                            <th>Diskon (%)</th>
                            <th>Dimensi</th>
                            <th>Unit</th>
                            <th>Aksi</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @php $no = 1; @endphp
                        @foreach ($product as $p)
                            <tr>
                                <td>{{ $no }}</td>
                                <td>{{ $p->product_code }}</td>
                                <td>{{ $p->product_name }}</td>
                                <td>{{ $p->price }}</td>
                                <td>{{ $p->currency }}</td>
                                <td>{{ $p->discount }}</td>
                                <td>{{ $p->dimension }}</td>
                                <td>{{ $p->unit }}</td>
                                <td>
                                    <a class="btn btn-primary" href="{{ url('product/' . $p->id) }}">View</a>
                                    @if (Auth::user()->role == 'admin')
                                        <a class="btn btn-warning" href="{{ url('product/edit/' . $p->id) }}">Edit</a>
                                        <a href="{{ url('product/delete/' . $p->id) }}" class="btn btn-danger"
                                            onclick="return confirm('Apakah Anda yakin ingin menghapus produk?')">Hapus</a>
                                    @endif
                                </td>
                            </tr>
                            @php $no++; @endphp
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @else
        @include('admin.access_denied')
    @endif
@endsection
