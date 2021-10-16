@extends('admin.layouts.app')

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Products</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item "><a href="">Dashboard</a></li>
                        <li class="breadcrumb-item active">Product</li>
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
                            <h5 class="card-title">All Products</h5>
                            <div class="card-tools">
                                <a href="{{route('product.add')}}" class="btn btn-info rounded-0">
                                    New Product
                                </a>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="products-table">
                                    <thead>
                                    <th>#</th>
                                    <th>Image</th>
                                    <th>Name</th>
                                    <th>Quantity</th>
                                    <th>Price</th>
                                    <th>Description</th>
                                    <th>Option</th>
                                    </thead>
                                    <tbody>
                                    @forelse($products as $product)
                                        <tr>
                                            <td class="text-middle">{{$loop->index + 1}}</td>
                                            <td><img src="{{asset('storage/products/images/'.$product->image)}}" alt="image" height="100"></td>
                                            <td class="text-middle">{{$product->product_name}}</td>
                                            <td class="text-middle">{{$product->quantity}}</td>
                                            <td class="text-middle">{{number_format($product->price,0,'.',',')}}</td>
                                            <td class="text-middle">{{$product->description}}</td>
                                            <td class="text-middle">@include('admin.product.partials.action')</td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td class="text-center" colspan="7">No products yet</td>
                                        </tr>
                                    @endforelse
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
