@extends('user.layouts.app')
@section('content')
    <form action="{{route('order.store', $table->id)}}" method="POST">
        @csrf
        <div class="row">
            @include('user.layouts.partials.notification')
            <div class="col-12 mb-4">
                <h4>Table: {{$table->number}}</h4>
                <button type="submit" class="btn btn-primary btn-flat float-right">Submit Order</button>
            </div>
            @forelse($products as $product)
                <div class="card col-md-3 px-0">
                    <img src="{{asset('storage/products/images/'.$product->image)}}" class="card-img-top" height="300" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">{{$product->product_name}}</h5>
                        <p class="card-text text-warning">{{number_format($product->price,0,'.',',') }} Rwf</p>
                        <div class="icheck-warning d-inline">
                            <input type="checkbox" name="product[]" id="checkboxPrimary{{$product->id}}" value="{{$product->id}}">
                            <label for="checkboxPrimary{{$product->id}}">
                                Add to order
                            </label>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-md-12">
                    <p>No products</p>
                </div>
            @endforelse

        </div>

    </form>

@endsection
