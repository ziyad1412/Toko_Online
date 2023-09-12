@extends('layouts.app')

@section('content')
    <div class="container">
        <h2 class="text-center mb-3">Sales Report Product</h2>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Document Code</th>
                    <th>User</th>
                    <th>Total</th>
                    <th>Date</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($transactionHeaders as $header)
                    <tr>
                        <td>{{ $header->document_code }}</td>
                        <td>{{ $header->user }}</td>
                        <td>Rp {{ number_format($header->total, 0, ',', '.') }}</td>
                        <td>{{ $header->date }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
