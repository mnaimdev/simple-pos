@extends('admin')

@section('content')
    <div class="container">
        <nav aria-label="breadcrumb"
            style="margin-top: 30px; display: flex; justify-content: space-between; align-items: center;">
            <a href="{{ route('product') }}" class="btn btn-info">List</a>

            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('product') }}">Product</a></li>
                <li class="breadcrumb-item"><a>Barcode</a></li>
            </ol>
        </nav>
    </div>

    <div class="container my-2">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h3>Product Barcode</h3>
                    </div>


                    @php
                        $generator = new Picqer\Barcode\BarcodeGeneratorHTML();
                    @endphp



                    <div class="card-body">

                        <table class="table table-striped">
                            <tr>
                                <th>Product Name</th>
                                <th>BarCode</th>
                            </tr>
                            <tr>
                                <td>{{ $product->product_name }}</td>
                                <td>
                                    {!! $generator->getBarcode($product->product_code, $generator::TYPE_CODE_128) !!}
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
