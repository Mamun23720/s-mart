@extends('frontend.master')

@section('content')

    <!-- Navbar Start -->
    <div class="container-fluid mb-5">
        <div class="row border-top px-xl-5">
            <div class="col-lg-3 d-none d-lg-block">
                <a class="btn shadow-none d-flex align-items-center justify-content-between bg-primary text-white w-100" data-toggle="collapse" href="#navbar-vertical" style="height: 65px; margin-top: -1px; padding: 0 30px;">
                    <h6 style="color: white"class="m-0">Categories</h6>
                    <i class="fa fa-angle-down text-dark" style="color: white !important;"></i>
                </a>


                <nav class="collapse show navbar navbar-vertical navbar-light align-items-start p-0 border border-top-0 border-bottom-0" id="navbar-vertical">
                    @foreach ($allCategory as $category)
                    <div class="navbar-nav w-100 overflow-hidden" style="height: 100%;">
                        {{-- <div class="nav-item dropdown">
                            <a href="#" class="nav-link" data-toggle="dropdown">Dresses <i class="fa fa-angle-down float-right mt-1"></i></a>
                            <div class="dropdown-menu position-absolute bg-secondary border-0 rounded-0 w-100 m-0">
                                <a href="" class="dropdown-item">Men's Dresses</a>
                                <a href="" class="dropdown-item">Women's Dresses</a>
                                <a href="" class="dropdown-item">Baby's Dresses</a>
                            </div>
                        </div> --}}
                        <a href="" class="nav-item nav-link">{{ $category->name }}</a>
                        <!-- <a href="" class="nav-item nav-link">Jeans</a>
                        <a href="" class="nav-item nav-link">Swimwear</a>
                        <a href="" class="nav-item nav-link">Sleepwear</a>
                        <a href="" class="nav-item nav-link">Sportswear</a>
                        <a href="" class="nav-item nav-link">Jumpsuits</a>
                        <a href="" class="nav-item nav-link">Blazers</a>
                        <a href="" class="nav-item nav-link">Jackets</a>
                        <a href="" class="nav-item nav-link">Shoes</a> -->
                    </div>
                    @endforeach
                </nav>


            </div>
            <div class="col-lg-9">


                <nav class="navbar navbar-expand-lg bg-light navbar-light py-3 py-lg-0 px-0">
                    <a href="" class="text-decoration-none d-block d-lg-none">
                        <h1 class="m-0 display-5 font-weight-semi-bold"><span class="text-primary font-weight-bold border px-3 mr-1">S</span>Shopper</h1>
                    </a>
                    <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                        <div class="navbar-nav mr-auto py-0">
                            <a style="color: black !important; font-weight: bold;" href="/" class="nav-item nav-link active">Home</a>
                            <a style="color: black !important; font-weight: bold;" href="{{ route('frontend.shop') }}" class="nav-item nav-link">Shop</a>
                            <a style="color: black !important; font-weight: bold;" href="detail.html" class="nav-item nav-link">Shop Detail</a>
                            <div class="nav-item dropdown">
                                <a style="color: black !important; font-weight: bold;" href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Pages</a>
                                <div class="dropdown-menu rounded-0 m-0">
                                    <a href="{{ route('view.cart.item') }}" class="dropdown-item">Shopping Cart</a>
                                    <a href="checkout.html" class="dropdown-item">Checkout</a>
                                </div>
                            </div>
                            <a style="color: black !important; font-weight: bold;" href="contact.html" class="nav-item nav-link">Contact</a>
                        </div>
                        <div class="navbar-nav ml-auto py-0">
                            <a style="color: black !important; font-weight: bold;" href="" class="nav-item nav-link">Login</a>
                            <a style="color: black !important; font-weight: bold;" href="" class="nav-item nav-link">Register</a>
                        </div>
                    </div>
                </nav>


                <div id="header-carousel" class="carousel slide" data-ride="carousel" data-interval="3000">
                    <div class="carousel-inner">
                        @foreach ($allBanner as $key => $item)
                            <div class="carousel-item {{ $key == 0 ? 'active' : '' }}" style="height: 410px;">
                                <img style="height: 100%; width:100%;" class="img-fluid" src="{{ url('/uploads/banner/' . $item->image) }}" alt="Image">
                                <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                                    <div class="p-3" style="max-width: 700px;">
                                        <h4 class="text-light text-uppercase font-weight-medium mb-3">10% Off Your First Order
                                        </h4>
                                        <h3 class="display-4 text-white font-weight-semi-bold mb-4">{{ $item->name }}</h3>
                                        <a href="{{ route('frontend.shop') }}" class="btn btn-light py-2 px-3">Shop Now</a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <a class="carousel-control-prev" href="#header-carousel" data-slide="prev">
                        <div class="btn btn-dark" style="width: 45px; height: 45px;">
                            <span class="carousel-control-prev-icon mb-n2"></span>
                        </div>
                    </a>
                    <a class="carousel-control-next" href="#header-carousel" data-slide="next">
                        <div class="btn btn-dark" style="width: 45px; height: 45px;">
                            <span class="carousel-control-next-icon mb-n2"></span>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <!-- Navbar End -->


    <!-- Featured Start -->
    <div class="container-fluid pt-5">
        <div class="row px-xl-5 pb-3">
            <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
                <div class="d-flex align-items-center border mb-4" style="padding: 30px;">
                    <h1 class="fa fa-check text-primary m-0 mr-3"></h1>
                    <h5 class="font-weight-semi-bold m-0">Quality Product</h5>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
                <div class="d-flex align-items-center border mb-4" style="padding: 30px;">
                    <h1 class="fa fa-shipping-fast text-primary m-0 mr-2"></h1>
                    <h5 class="font-weight-semi-bold m-0">Free Shipping</h5>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
                <div class="d-flex align-items-center border mb-4" style="padding: 30px;">
                    <h1 class="fas fa-exchange-alt text-primary m-0 mr-3"></h1>
                    <h5 class="font-weight-semi-bold m-0">14-Day Return</h5>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
                <div class="d-flex align-items-center border mb-4" style="padding: 30px;">
                    <h1 class="fa fa-phone-volume text-primary m-0 mr-3"></h1>
                    <h5 class="font-weight-semi-bold m-0">24/7 Support</h5>
                </div>
            </div>
        </div>
    </div>
    <!-- Featured End -->


    <!-- Categories Start -->
    <div class="container-fluid pt-5">
        <div class="text-center mb-4">
            <h2 class="section-title px-5"><span class="px-2">Popular Categories</span></h2>
        </div>
        <div class="row px-xl-5 pb-3" style="gap: 0px;">
            @foreach ($allCategory as $category)
                <div class="col-lg-3 col-md-4 col-sm-6 pb-1" style="padding: 5px;">
                    <div class="cat-item d-flex flex-column border" style="width: 303px; border: 2px solid black !important" >
                        <a href="" class="cat-img position-relative overflow-hidden" style="height: 300px; width: 300px;">
                            <img style="width: 100%; height: 100%;"
                                class="img-fluid" src="{{ url('/uploads/category/' . $category->image) }}"
                                alt="No image">
                        </a>
                        <h2 style="background-color:#D19C97; text-align: center; margin-bottom: 0; font-family: 'Times New Roman', Times, serif;">{{ $category->name }}</h2>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    <!-- Categories End -->





    <!-- Offer Start -->
    <div class="container-fluid offer pt-5">
        <div class="row px-xl-5">
            <div class="col-md-6 pb-4">
                <div class="position-relative bg-secondary text-center text-md-right text-white mb-2 py-5 px-5">
                    <img src="https://themewagon.github.io/eshopper/img/offer-1.png" alt="">
                    <div class="position-relative" style="z-index: 1;">
                        <h5 class="text-uppercase text-primary mb-3">20% off the all order</h5>
                        <h1 class="mb-4 font-weight-semi-bold">Spring Collection</h1>
                        <a href="{{ route('frontend.shop') }}" class="btn btn-outline-primary py-md-2 px-md-3">Shop
                            Now</a>
                    </div>
                </div>
            </div>
            <div class="col-md-6 pb-4">
                <div class="position-relative bg-secondary text-center text-md-left text-white mb-2 py-5 px-5">
                    <img src="https://themewagon.github.io/eshopper/img/offer-2.png" alt="">
                    <div class="position-relative" style="z-index: 1;">
                        <h5 class="text-uppercase text-primary mb-3">20% off the all order</h5>
                        <h1 class="mb-4 font-weight-semi-bold">Winter Collection</h1>
                        <a href="{{ route('frontend.shop') }}" class="btn btn-outline-primary py-md-2 px-md-3">Shop
                            Now</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Offer End -->


    <!-- Products Start -->
    <div class="container-fluid pt-5">
        <div class="text-center mb-4">
            <h2 class="section-title px-5"><span class="px-2">Trendy Products</span></h2>
        </div>
        <div class="row px-xl-5 pb-3" style="gap: 0px;">
            @foreach ($trendyProducts as $product)
                <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
                    <div class="card product-item border-0">
                        <a href="{{ route('frontend.view.product', $product->slug) }}">
                            <div class="card-header product-img position-relative overflow-hidden bg-transparent border p-0"
                                style="height: 350px;">
                                <img class="img-fluid" style="width: 100%; height: 100%; object-fit: cover;"
                                    src="{{ url('/uploads/product/' . $product->image) }}" alt="Product Image">
                            </div>
                        </a>
                        <div class="card-body border-left border-right text-center p-0 pt-4">
                            <h6 class="text-truncate mb-3">{{ $product->name }}</h6>
                            <div class="d-flex justify-content-center">
                                <h6 style="color: red">
                                    {{ number_format($product->price - ($product->price * $product->discount) / 100, 2) }}
                                    ৳</h6>
                                <h6 class="text-muted ml-2"><del>{{ number_format($product->price, 2) }} ৳</del></h6>
                            </div>
                        </div>
                        <div class="card-footer d-flex justify-content-between bg-light border">
                            <a href="{{ route('frontend.view.product', $product->slug) }}"
                                class="btn btn-sm text-dark p-0"><i class="fas fa-eye text-primary mr-1"></i>View
                                Detail</a>
                            <a href="" class="btn btn-sm text-dark p-0"><i
                                    class="fas fa-shopping-cart text-primary mr-1"></i>Add To Cart</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    <!-- Products End -->






    <!-- Subscribe Start -->
    <div class="container-fluid bg-secondary my-5">
        <div class="row justify-content-md-center py-5 px-xl-5">
            <div class="col-md-6 col-12 py-5">
                <div class="text-center mb-2 pb-2">
                    <h2 class="section-title px-5 mb-3"><span class="bg-secondary px-2">Stay Updated</span></h2>
                    <p>Start Your Smart Lifestyle with the S-Mart</p>
                </div>
                <form action="">
                    <div class="input-group">
                        <input type="text" class="form-control border-white p-4" placeholder="Email Goes Here">
                        <div class="input-group-append">
                            <button class="btn btn-primary px-4">Subscribe</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Subscribe End -->


    <!-- Products Start -->
    <div class="container-fluid pt-2">
        <div class="text-center mb-4">
            <h2 class="section-title px-5"><span class="px-2">Just For You</span></h2>
        </div>
        <div class="row px-xl-5 pb-3" style="gap: 0px;">
            @foreach ($justForYou as $product)
                <div class="col-lg-3 col-md-6 col-sm-12 pb-4">
                    <div class="card product-item border-0">
                        <a href="{{ route('frontend.view.product', $product->slug) }}">
                            <div class="card-header product-img position-relative overflow-hidden bg-transparent border p-0"
                                style="height: 350px;">
                                <img class="img-fluid" style="width: 100%; height: 100%; object-fit: cover;"
                                    src="{{ url('/uploads/product/' . $product->image) }}" alt="Product Image">
                            </div>
                        </a>
                        <div class="card-body border-left border-right text-center p-0 pt-4">
                            <h6 class="text-truncate mb-3">{{ $product->name }}</h6>
                            <div class="d-flex justify-content-center">
                                <h6 style="color: red">
                                    {{ number_format($product->price - ($product->price * $product->discount) / 100, 2) }}
                                    ৳</h6>
                                <h6 class="text-muted ml-2"><del>{{ number_format($product->price, 2) }} ৳</del></h6>
                            </div>
                        </div>
                        <div class="card-footer d-flex justify-content-between bg-light border">
                            <a href="{{ route('frontend.view.product', $product->slug) }}"
                                class="btn btn-sm text-dark p-0"><i class="fas fa-eye text-primary mr-1"></i>View
                                Detail</a>
                            <a href="" class="btn btn-sm text-dark p-0"><i
                                    class="fas fa-shopping-cart text-primary mr-1"></i>Add To Cart</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    <!-- Products End -->



    <!-- Vendor Start -->
    <div class="container-fluid py-5">
        <div class="row px-xl-5">
            <div class="col">
                <div class="owl-carousel vendor-carousel">
                    @foreach ($allBrand as $brand)
                        <div class="vendor-item border p-4">
                            <img src="{{ url('/uploads/brand/' . $brand->logo) }}" alt="No logo">
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <!-- Vendor End -->
@endsection
