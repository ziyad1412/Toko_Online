@extends('admin.layout.appadmin')
@section('content')
    @if (Auth::user()->role != 'pelanggan')
        <h1 class="mt-4">Data Detail Transaksi</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="{{ url('admin/dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item active">Data Detail Transaksi</li>
        </ol>

        <div class="card mb-4">
            <div class="card-header">
                <a class="btn btn-primary" href="{{ url('transaction-detail/create') }}">Tambah Detail Transaksi</a>
            </div>
            <div class="card-body">
                <table id="datatablesSimple" class="table table-bordered">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Document Code</th>
                            <th>Document Number</th>
                            <th>Product Code</th>
                            <th>User</th>
                            <th>Price</th>
                            <th>Quantity</th>
                            <th>Sub Total</th>
                            <th>Currency</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>No</th>
                            <th>Document Code</th>
                            <th>Document Number</th>
                            <th>Product Code</th>
                            <th>User</th>
                            <th>Price</th>
                            <th>Quantity</th>
                            <th>Sub Total</th>
                            <th>Currency</th>
                            <th>Aksi</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @php $no = 1; @endphp
                        @foreach ($transaction as $detail)
                            <tr>
                                <td>{{ $no }}</td>
                                <td>{{ $detail->document_code }}</td>
                                <td>{{ $detail->document_number }}</td>
                                <td>{{ $detail->product_code }}</td>
                                <td>{{ $detail->user }}</td>
                                <td>{{ $detail->price }}</td>
                                <td>{{ $detail->quantity }}</td>
                                <td>{{ $detail->sub_total }}</td>
                                <td>{{ $detail->currency }}</td>
                                <td>
                                    <a class="btn btn-primary"
                                        href="{{ url('transaction-detail/' . $detail->id) }}">View</a>
                                    @if (Auth::user()->role == 'admin')
                                        <a class="btn btn-warning"
                                            href="{{ url('transaction-detail/edit/' . $detail->id) }}">Edit</a>
                                        <a href="{{ url('transaction-detail/delete/' . $detail->id) }}"
                                            class="btn btn-danger"
                                            onclick="return confirm('Apakah Anda yakin ingin menghapus detail transaksi?')">Hapus</a>
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
