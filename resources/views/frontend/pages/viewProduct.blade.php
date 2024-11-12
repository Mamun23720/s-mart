@extends('frontend.master')

@section('content')

<!-- Single Product Page Start -->
<div class="container py-5">
    <div class="row">
        <!-- Product Image Section -->
        <div class="col-lg-6">
            <div class="product-image">
                <img src="{{ url('/uploads/product/' . $product->image) }}" class="img-fluid" alt="{{ $product->name }}">
            </div>
        </div>

        <!-- Product Info Section -->
        <div class="col-lg-6">
            <div class="product-details">
                <h2 class="product-title">{{ $product->name }}</h2>
                <div class="product-price">
                    <h4 style="color: red">
                        {{ number_format($product->price - ($product->price * $product->discount / 100), 2) }} ৳
                    </h4>
                    @if($product->discount > 0)
                    <h6 class="text-muted"><del>{{ number_format($product->price, 2) }} ৳</del></h6>
                    @endif
                </div>

                <!-- Product Description -->
                <div class="product-description">
                    <h5>Product Description</h5>
                    <p>{{ $product->description }}</p>
                </div>

                <!-- Quantity and Add to Cart -->
                <div class="product-quantity">
                    <label for="quantity">Quantity</label>
                    <input type="number" id="quantity" class="form-control" value="1" min="1">
                </div>

                <div class="mt-3">
                    <a href="{{route('frontend.addToCart', $product->id )}}" class="btn btn-primary btn-lg">Add to Cart</a>
                </div>
            </div>
        </div>
    </div>
</div>


    <!-- Related Products Section -->
<div class="container-fluid mt-2">

    <div class="related-products">
        <h3>Related Products</h3>
        <div class="row">
            @foreach($relatedProducts as $relatedProduct)
            <div class="col-md-3 mb-4">
                <div class="card h-100 text-center" style="border: 2px solid black">
                    <img style="height: 300px; width:100%;" src="{{ url('/uploads/product/' . $relatedProduct->image) }}" class="card-img-top" alt="{{ $relatedProduct->name }}">
                    <div class="card-body">
                        <h5 class="card-title">{{ $relatedProduct->name }}</h5>
                        <p class="card-text text-danger d-flex justify-content-center align-items-center">
                            {{ number_format($relatedProduct->price - ($relatedProduct->price * $relatedProduct->discount / 100), 2) }} ৳

                            @if($relatedProduct->discount > 0)
                                <span class="text-muted ml-2" style="text-decoration: line-through;">
                                    {{ number_format($relatedProduct->price, 2) }} ৳
                                </span>
                            @endif
                        </p>


                        <a href="{{ route('frontend.view.product', $relatedProduct->slug) }}" class="btn btn-primary">View Product</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
<!-- Single Product Page End -->

@endsection
