@extends('admin')

@section('content')
    <div class="container mt-3">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h3>Order Info</h3>
                    </div>
                    <div class="card-body">

                        <form action="{{ route('order.status.update') }}" method="POST">
                            @csrf

                            <ul class="list-group">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <li class="list-group-item">Customer Name: {{ $order->rel_to_customer->name }}</li>
                                        <li class="list-group-item">Customer Email: {{ $order->rel_to_customer->email }}
                                        </li>
                                        <li class="list-group-item">Order Date: {{ $order->order_date }}</li>
                                        <li class="list-group-item">Payment Method: {{ $order->payment_method }}</li>
                                        <li class="list-group-item">Due: {{ $order->due }} TK</li>

                                    </div>
                                    <div class="col-lg-6">
                                        <li class="list-group-item">Subtotal: {{ $order->sub_total }} TK</li>
                                        <li class="list-group-item">Vat: {{ $order->vat }} TK</li>
                                        <li class="list-group-item">Total: {{ $order->total }} TK</li>
                                        <li class="list-group-item">Pay: {{ $order->pay }} TK</li>
                                        <li class="list-group-item">Order Status: <span
                                                class="badge badge-danger">{{ $order->order_status }}</span></li>

                                    </div>

                                    <input type="hidden" name="id" value="{{ $order->id }}">

                            </ul>
                            <button class="btn btn-primary mt-3" type="submit">Complete Order</button>
                        </form>
                    </div>
                </div>
            </div>


            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h3>Order Details</h3>
                    </div>
                    <div class="card-body">
                        <table class="table table-striped">
                            <tr>
                                <th>SL</th>
                                <th>Product Name</th>
                                <th>Product Image</th>
                                <th>Quantity</th>
                            </tr>
                            @foreach ($order_details as $sl => $order)
                                <tr>
                                    <td>{{ $sl + 1 }}</td>
                                    <td>{{ $order->rel_to_product->product_name }}</td>
                                    <td>
                                        <img src="{{ asset('/uploads/product') }}/{{ $order->rel_to_product->product_image }}"
                                            width="50" height="50">
                                    </td>
                                    <td>{{ $order->quantity }}</td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
