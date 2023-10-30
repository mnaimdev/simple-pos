@extends('admin')

@section('content')
    <!-- Start Page content -->
    <div class="content">
        <div class="container-fluid p-2">

            <div class="row">
                <div class="col-md-12">
                    <div class="card-box">
                        <div class="clearfix">
                            <div class="pull-left mb-3">
                                <img src="assets/images/logo.png" alt="" height="28">
                            </div>
                            <div class="pull-right">
                                <h4 class="m-0 d-print-none">Invoice</h4>
                            </div>
                        </div>


                        <div class="row p-4">

                            <div class="col-6">
                                <h4>Billing Address</h4>

                                <address class="line-h-24">
                                    {{ $customer->name }}<br>
                                    {{ $customer->email }}<br>
                                    {{ $customer->address }}<br>
                                    {{ $customer->phone }}
                                </address>

                            </div>

                            <div class="col-4 offset-2">
                                <div class="mt-3 pull-right">
                                    <p class="m-b-10"><strong>Order Date: </strong> Jan 17, 2016</p>
                                    <p class="m-b-10"><strong>Order Status: </strong> <span
                                            class="badge badge-success">Paid</span></p>
                                    <p class="m-b-10"><strong>Order ID: </strong> #123456</p>
                                    <p class="m-b-10"><strong>Branch Name:
                                        </strong>{{ $branch->name }}</p>
                                </div>
                            </div><!-- end col -->
                        </div>
                        <!-- end row -->


                        <div class="row p-4">
                            <div class="col-md-12">
                                <div class="table-responsive">

                                    @php
                                        $sub_total = 0;
                                        $vat = 0;
                                        $total = 0;
                                    @endphp

                                    <table class="table mt-4">
                                        <thead>
                                            <tr>
                                                <th>SL</th>
                                                <th>Product Name</th>
                                                <th>Quantity</th>
                                                <th>Price</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($carts as $sl => $cart)
                                                <tr>
                                                    <td>{{ $sl + 1 }}</td>
                                                    <td>{{ $cart->rel_to_product->product_name }}</td>
                                                    <td>{{ $cart->quantity }}</td>
                                                    <td>{{ $cart->rel_to_product->selling_price }} x {{ $cart->quantity }}
                                                        TK</td>
                                                </tr>


                                                @php
                                                    $sub_total += $cart->quantity * $cart->rel_to_product->selling_price;
                                                    $vat += ($sub_total * 15) / 100;
                                                    $total = $sub_total + $vat;
                                                @endphp
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                        <div class="row p-4">
                            <div class="col-6">
                                <div class="clearfix pt-5">

                                </div>

                            </div>
                            <div class="col-6">
                                <div class="float-right">
                                    <p><b>Sub-total:</b> {{ $sub_total }} TK</p>
                                    <p><b>VAT (15):</b> {{ $vat }} TK</p>
                                    <h3>{{ $total }} TK</h3>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                        </div>

                        <div class="hidden-print mt-4 mb-4 p-4">
                            <div class="text-right">
                                <a href="javascript:window.print()" class="btn btn-primary waves-effect waves-light"><i
                                        class="fa fa-print m-r-5"></i> Print</a>

                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-primary" data-toggle="modal"
                                    data-target="#exampleModal">
                                    Create Invoice
                                </button>
                            </div>
                        </div>
                    </div>

                    <!-- Modal -->
                    <form action="{{ route('order') }}" method="POST">
                        @csrf

                        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">

                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Invoice of {{ $customer->name }}
                                        </h5>
                                        <h3>Total : {{ $total }} TK</h3>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>

                                    <div class="modal-body">
                                        <div class="form-group mb-3">
                                            <label>Payment</label>
                                            <select name="payment_method" class="form-control">
                                                <option selected disabled>-- Payment Method --</option>
                                                <option value="Hand Cash">Hand Cash</option>
                                                <option value="Cheque">Cheque</option>
                                                <option value="Due">Due</option>
                                            </select>
                                        </div>

                                        <div class="form-group mb-3">
                                            <label>Pay Now</label>
                                            <input type="number" name="pay" placeholder="Pay Now" class="form-control">
                                        </div>


                                        <div class="form-group mb-3">
                                            <label>Due</label>
                                            <input type="number" name="due" placeholder="Due" class="form-control">
                                        </div>


                                    </div>

                                    <input type="hidden" name="customer_id" value="{{ $customer->id }}">
                                    <input type="hidden" name="sub_total" value="{{ $sub_total }}">
                                    <input type="hidden" name="total" value="{{ $total }}">
                                    <input type="hidden" name="vat" value="{{ $vat }}">
                                    <input type="hidden" name="order_date" value="{{ date('Y-m-d') }}">
                                    <input type="hidden" name="order_status" value="pending">
                                    <input type="hidden" name="branch_id" value="{{ $branch->id }}">

                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-primary">Complete Order</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>



                </div>

            </div>
        @endsection
