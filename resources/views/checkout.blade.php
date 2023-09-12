@extends('layouts.app')

@section('content')
    <div class="container">
        <h2 class="text-center mb-3">Checkout Product</h2>
        <table class="table">
            <thead>
                <tr>
                    <th>Product Name</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Subtotal</th>
                </tr>
            </thead>
            <tbody>
                @php $total = 0 @endphp
                @foreach ($cart as $id => $details)
                    @php $total += ($details['price'] - ($details['price'] / $details['discount'])) * $details['quantity'] @endphp
                    <tr>
                        <td>{{ $details['product_name'] }}</td>
                        <td>Rp
                            {{ number_format($details['price'] - $details['price'] / $details['discount'], 0, ',', '.') }}
                        </td>
                        <td>{{ $details['quantity'] }}</td>
                        <td>Rp
                            {{ number_format(($details['price'] - $details['price'] / $details['discount']) * $details['quantity'], 0, ',', '.') }}
                        </td>
                    </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <th colspan="3">Total:</th>
                    <th>Rp {{ number_format($total, 0, ',', '.') }}</th>
                </tr>
            </tfoot>
        </table>
        <a href="{{ route('checkout') }}" class="btn btn-success">Proceed to Payment</a>
        <a href="{{ route('report.index') }}" class="btn btn-primary"><i class="fa fa-money"></i>
            Report</a>
    </div>
@endsection
