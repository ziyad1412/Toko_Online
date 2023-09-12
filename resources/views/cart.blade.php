@extends('layouts.app')

@section('content')
    <div class="container">
        <table id="cart" class="table table-hover table-condensed">
            <thead>
                <tr>
                    <th>Nama Produk</th>
                    <th>Harga</th>
                    <th>Unit</th>
                    <th>Total Harga</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $total = 0;
                @endphp
                @if (session('cart'))
                    @foreach (session('cart') as $id => $details)
                        @php $total += ($details['price'] - ($details['price'] / $details['discount'])) * $details['quantity'] @endphp
                        <tr data-id="{{ $id }}">
                            <td data-th="Product">
                                {{ $details['product_name'] }}
                            </td>
                            <td data-th="Price">Rp
                                {{ number_format($details['price'] - $details['price'] / $details['discount'], 0, ',', '.') }}
                            </td>
                            <td data-th="Quantity">
                                <input type="number" value="{{ $details['quantity'] }}"
                                    class="form-control quantity cart_update" min="1" />
                            </td>
                            <td data-th="Subtotal">Rp
                                {{ number_format(($details['price'] - $details['price'] / $details['discount']) * $details['quantity'], 0, ',', '.') }}

                            </td>
                            <td class="actions" data-th="">
                                <button class="btn btn-danger btn-sm cart_remove"><i class="fa fa-trash-o"></i>
                                    Delete</button>
                            </td>
                        </tr>
                        @php
                            // Dapatkan detail transaksi sesuai dengan produk_code
                            $transactionDetail = \App\Models\TransactionDetail::where('product_code', $details['product_code'])->first();
                        @endphp
                        @if ($transactionDetail)
                        @endif
                    @endforeach
                @endif
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="5" class="text-right">
                        <h4><strong>Total : Rp {{ number_format($total, 0, ',', '.') }}</strong></h4>
                    </td>
                </tr>
                <tr>
                    <td colspan="5" class="text-right">
                        <a href="{{ url('/') }}" class="btn btn-danger"> <i class="fa fa-arrow-left"></i> Continue
                            Shopping</a>
                        <button type="button" class="btn btn-primary" id="checkout-button"><i class="fa fa-money"></i>
                            Checkout</button>
                    </td>
                </tr>
            </tfoot>
        </table>
    </div>
@endsection

@section('scripts')
    <script type="text/javascript">
        $(".cart_update").change(function(e) {
            e.preventDefault();

            var ele = $(this);

            $.ajax({
                url: '{{ route('update_cart') }}',
                method: "patch",
                data: {
                    _token: '{{ csrf_token() }}',
                    id: ele.parents("tr").attr("data-id"),
                    quantity: ele.parents("tr").find(".quantity").val()
                },
                success: function(response) {
                    window.location.reload();
                }
            });
        });

        $(".cart_remove").on('click', function(e) {
            e.preventDefault();

            var ele = $(this);

            if (confirm("Do you really want to remove?")) {
                $.ajax({
                    url: '{{ route('remove_from_cart') }}',
                    method: "DELETE",
                    data: {
                        _token: '{{ csrf_token() }}',
                        id: ele.parents("tr").attr("data-id")
                    },
                    success: function(response) {
                        window.location.reload();
                    }
                });
            }
        });

        $('#checkout-button').click(function() {
            window.location.href = '{{ route('checkout.show') }}';
        });


        // $('#checkout-button').click(function() {
        //     $.ajax({
        //         url: '{{ route('checkout') }}',
        //         method: 'POST',
        //         data: {
        //             _token: '{{ csrf_token() }}'
        //         },
        //         success: function(response) {
        //             // Handle sukses checkout, misalnya tampilkan pesan sukses
        //             alert('Checkout berhasil');
        //             // Redirect atau lakukan tindakan lain sesuai kebutuhan
        //             window.location.href = '{{ route('report.index') }}';
        //         },
        //         error: function(response) {
        //             // Handle error jika diperlukan
        //             alert('Checkout gagal');
        //         }
        //     });
        // });
    </script>
@endsection
