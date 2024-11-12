@extends('frontend.master')
@section('content')

<!-- Products Start -->
<div class="container-fluid pt-5">
    <div class="text-center mb-4">
        <h2 class="section-title px-5"><span class="px-2">All Products</span></h2>
    </div>
    <div class="row px-xl-5 pb-3" style="gap: 0px;">
        @foreach ($allProduct as $product)
        <div class="col-lg-3 col-md-6 col-sm-12">
            <div class="card product-item mb-4" style="border: 2px solid black;">
                <a href="{{route('frontend.view.product',$product->slug)}}">
                    <div class="card-header  position-relative overflow-hidden bg-transparent border p-0" style="height: 350px;">
                        <!-- Discount Badge Start -->
                        @if($product->discount > 0)
                        <div style="position: absolute; top: 10px; right: 10px; background-color: red; color: white; padding: 5px 10px; border-radius: 5px; font-size: 12px;">
                            {{ $product->discount }}% OFF
                        </div>
                        @endif
                        <!-- Discount Badge End -->
                        <img class="img-fluid" style="width: 100%; height: 100%; object-fit: cover;" src="{{$product->image}}" alt="Product Image">
                    </div>
                </a>
                <div class="card-body border-left border-right text-center p-0 pt-4">
                    <h6 class="text-truncate mb-3">{{$product->name}}</h6>
                    <div class="d-flex justify-content-center">
                        <h6 style="color: red">{{ number_format($product->price - (($product->price * $product->discount) / 100), 2) }} ৳</h6>
                        <h6 class="text-muted ml-2"><del>{{ number_format($product->price, 2) }} ৳</del></h6>
                    </div>
                </div>
                <div class="card-footer d-flex justify-content-between bg-light border">
                    <a href="{{route('frontend.view.product',$product->slug)}}" class="btn btn-sm text-dark p-0"><i class="fas fa-eye text-primary mr-1"></i>View Detail</a>
                    <a href="{{route('frontend.addToCart',$product->id)}}" class="btn btn-sm text-dark p-0"><i class="fas fa-shopping-cart text-primary mr-1"></i>Add To Cart</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
<!-- Products End -->

@endsection
