@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Laporan Penjualan</h1>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Document Code</th>
                    <th>Document Number</th>
                    <th>User</th>
                    <th>Total</th>
                    <th>Date</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($transactionHeaders as $header)
                    <tr>
                        <td>{{ $header->document_code }}</td>
                        <td>{{ $header->document_number }}</td>
                        <td>{{ $header->user }}</td>
                        <td>{{ $header->total }}</td>
                        <td>{{ $header->date }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
