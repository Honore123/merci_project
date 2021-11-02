@extends('admin.layouts.app')

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Order</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item "><a href="">Dashboard</a></li>
                        <li class="breadcrumb-item active">Report</li>
                        <li class="breadcrumb-item active">{{$order->id}}</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>


    <div class="content">
        <div class="container-fluid">
            <div class="row">
                @include('admin.layouts.partials.notification')
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title">All order</h5>
                            <div class="card-tools">
                                <a href="{{route('report.index')}}" class="btn btn-flat btn-info">Back</a>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="products-table">
                                    <thead>
                                    <th>#</th>
                                    <th>Image</th>
                                    <th>Product</th>
                                    <th>Quantity</th>
                                    <th>Price</th>
                                    </thead>
                                    <tbody>
                                    @forelse($products as $product)
                                        <tr>
                                            <td class="text-middle">{{$loop->index + 1}}</td>
                                            <td><img src="{{asset('storage/products/images/'.$product->product->image)}}" alt="" height="100"></td>
                                            <td class="text-middle">{{$product->product->product_name}}</td>
                                            <td class="text-middle">{{$product->quantity}}</td>
                                            <td class="text-middle">{{number_format($product->amount,0,'.',',')}}</td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td class="text-center" colspan="7">No order yet</td>
                                        </tr>
                                    @endforelse
                                    <tr>
                                        <td colspan="4" class="text-bold text-center">Total</td>
                                        <td class="text-bold">{{number_format($order->total_amount,0,'.',',')}} Rwf</td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
