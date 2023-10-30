@extends('admin')

@section('content')
    <div class="container">
        <nav aria-label="breadcrumb"
            style="margin-top: 30px; display: flex; justify-content: space-between; align-items: center;">
            <div>

            </div>

            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                <li class="breadcrumb-item"><a>Pending Order</a></li>
            </ol>
        </nav>
    </div>

    <div class="container my-2">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h3>Pending Order List</h3>
                    </div>

                    <div class="card-body">
                        <table class="table table-striped" id="table_id">
                            <thead>
                                <tr>
                                    <th>SL</th>
                                    <th>Order Id</th>
                                    <th>Date</th>
                                    <th>Payment Method</th>
                                    <th>Customer</th>
                                    <th>Order Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($pending_orders as $sl => $order)
                                    <tr>
                                        <td>{{ $sl + 1 }}</td>
                                        <td>{{ $order->order_id }}</td>
                                        <td>{{ $order->order_date }}</td>
                                        <td>{{ $order->payment_method }}</td>
                                        <td>{{ $order->rel_to_customer->name }}</td>
                                        <td class="badge badge-danger mt-2">{{ $order->order_status }}</td>
                                        <td>
                                            <a href="{{ route('order.details', $order->id) }}"
                                                class="btn btn-primary">Details</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
