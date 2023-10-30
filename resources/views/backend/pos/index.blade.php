@extends('admin')

@section('content')
    <div class="container mt-5">
        <div class="row">
            <div class="col-lg-8">
                <div class="card">
                    <div class="card-header">
                        <h3>POS Handle</h3>
                    </div>
                    <div class="card-body">
                        @php
                            $sub_total = 0;
                            $vat = 0;
                            $total = 0;
                        @endphp

                        <table class="table table-striped">
                            <tr>
                                <th>Product Name</th>
                                <th>Quantity</th>
                                <th>Price</th>
                            </tr>
                            @foreach ($carts as $cart)
                                <tr>
                                    <td>{{ $cart->rel_to_product->product_name }}</td>
                                    <td>{{ $cart->quantity }}</td>
                                    <td>{{ $cart->rel_to_product->selling_price * $cart->quantity }} TK</td>
                                </tr>

                                @php
                                    $sub_total += $cart->quantity * $cart->rel_to_product->selling_price;
                                    $vat = ($sub_total * 15) / 100;
                                    $total = $sub_total + $vat;
                                @endphp
                            @endforeach
                        </table>



                        <div class="bg-dark p-2">
                            <p class="text-white m-2 text-center">VAT: {{ $vat }} TK</p>
                            <p class="text-white m-2 text-center">Subtotal: {{ $sub_total }} TK</p>
                            <p class="text-white m-2 text-center">Total: {{ $total }} TK</p>
                        </div>

                        <form action="{{ route('create.invoice') }}" method="POST">
                            @csrf

                            <div class="mt-3">
                                <label>Customer</label>
                                <select name="customer_id"
                                    class="form-control @error('customer_id')
                                    is-invalid
                                @enderror">
                                    <option disabled selected>-- Select Customer --</option>
                                    @foreach ($customers as $customer)
                                        <option value="{{ $customer->id }}">{{ $customer->name }}</option>
                                    @endforeach
                                </select>
                                @error('customer_id')
                                    <strong class="text-danger">
                                        {{ $message }}
                                    </strong>
                                @enderror
                            </div>



                            <div class="mt-3">
                                <label>Branch</label>
                                <select name="branch_id"
                                    class="form-control @error('branch_id')
                                    is-invalid
                                @enderror">
                                    <option disabled selected>-- Select Branch --</option>
                                    @foreach ($branches as $branch)
                                        <option value="{{ $branch->id }}">{{ $branch->name }}</option>
                                    @endforeach
                                </select>
                                @error('branch_id')
                                    <strong class="text-danger">
                                        {{ $message }}
                                    </strong>
                                @enderror
                            </div>

                            <div class="mt-3">
                                <button class="btn btn-info">Create Invoice</button>
                            </div>
                        </form>


                    </div>
                </div>
            </div>


            <div class="col-lg-4">
                <div class="card">
                    <div class="card-header">
                        <h3>Add Product</h3>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('cart.store') }}" method="POST">
                            @csrf

                            <div class="form-group mb-3">
                                <label>Product Name</label>
                                <select name="product_id"
                                    class="form-control @error('product_id')
                                    is-invalid
                                @enderror">
                                    <option disabled selected>-- Select Product --</option>
                                    @foreach ($products as $product)
                                        <option value="{{ $product->id }}">
                                            {{ $product->product_name }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('product_id')
                                    <strong class="text-danger">
                                        {{ $message }}
                                    </strong>
                                @enderror
                            </div>


                            <div class="form-group mb-3">
                                <label>Quantity</label>
                                <select name="quantity"
                                    class="form-control @error('quantity')
                                    is-invalid
                                @enderror">
                                    <option disabled selected>-- Select Quantity --</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                </select>
                                @error('quantity')
                                    <strong class="text-danger">
                                        {{ $message }}
                                    </strong>
                                @enderror
                            </div>

                            <div class="form-group mb-3">
                                <button type="submit" class="btn btn-primary">Add to Cart</button>
                            </div>

                        </form>
                        </table>
                    </div>
                </div>
            </div>



            {{-- <div class="col-lg-4">
                <div class="card">
                    <div class="card-header">
                        <h3>Transfer Product</h3>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('cart.store') }}" method="POST">
                            @csrf

                            <div class="form-group mb-3">
                                <label>Product Name</label>
                                <select name="product_id"
                                    class="form-control @error('product_id')
                                    is-invalid
                                @enderror">
                                    <option disabled selected>-- Select Product --</option>
                                    @foreach ($products as $product)
                                        <option value="{{ $product->id }}">
                                            {{ $product->product_name }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('product_id')
                                    <strong class="text-danger">
                                        {{ $message }}
                                    </strong>
                                @enderror
                            </div>


                            <div class="form-group mb-3">
                                <label>Quantity</label>
                                <select name="quantity"
                                    class="form-control @error('quantity')
                                    is-invalid
                                @enderror">
                                    <option disabled selected>-- Select Quantity --</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                </select>
                                @error('quantity')
                                    <strong class="text-danger">
                                        {{ $message }}
                                    </strong>
                                @enderror
                            </div>



                            <div class="form-group mb-3">
                                <label>Branch Name</label>
                                <select name="branch_id" class="form-control">
                                    <option selected disabled>-- Select Branch --</option>
                                    @foreach ($branches as $branch)
                                        <option value="{{ $branch->id }}">{{ $branch->name }}</option>
                                    @endforeach
                                </select>
                            </div>




                            <div class="form-group mb-3">
                                <button type="submit" class="btn btn-primary">Add to Cart</button>
                            </div>

                        </form>
                        </table>
                    </div>
                </div>
            </div> --}}
        </div>
    </div>
@endsection
