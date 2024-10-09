@extends('frontend.master')

@section('content')

<style>
    /* General */
    .bg-light {
        background-color: #f8f9fa !important;
    }

    /* Product Images */
    img.img-fluid {
        max-width: 80px;
        height: auto;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    }

    /* Product table */
    .table-hover tbody tr:hover {
        background-color: #f1f1f1;
    }

    .table-shopping-cart td {
        padding: 1rem 1rem;
        vertical-align: middle;
    }

    .input-group input[type="number"] {
        width: 60px;
        text-align: center;
    }

    /* Coupon Code */
    input[type="text"] {
        border: 1px solid #ccc;
        padding: 0.75rem;
        border-radius: 5px;
    }

    button.btn {
        border-radius: 25px;
        padding: 0.6rem 1.5rem;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        transition: all 0.3s ease-in-out;
    }

    button.btn:hover {
        background-color: #D19C97;
        color: rgb(0, 0, 0);
        box-shadow: 0 6px 15px rgba(0, 0, 0, 0.2);
    }

    /* Cart Totals */
    .cart-totals {
        background-color: #fff;
        padding: 1.5rem;
        border-radius: 5px;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
    }
</style>


<form class="bg-light py-5" method="POST" action="#">
    @csrf
    <div class="container-fluid">
        <div class="row">
            <!-- Product List Section -->
            <div class="col-lg-8 col-xl-8 mb-4">
                <div class="table-responsive shadow-sm bg-white p-4 rounded">
                    <table class="table table-borderless table-hover">
                        <thead class="bg-light">
                            <tr>
                                <th scope="col">Product</th>
                                <th scope="col"></th>
                                <th scope="col">Price</th>
                                <th style="text-align: center;" scope="col">Quantity</th>
                                <th  style="text-align: center;" scope="col">Update</th>
                                <th scope="col">Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- Product 1 -->
                            <tr>
                                <td class="align-middle">
                                    <img src="images/item-cart-04.jpg" alt="Product" class="img-fluid rounded" style="width: 80px;">
                                </td>
                                <td class="align-middle">Fresh Strawberries</td>
                                <td class="align-middle">$36.00</td>
                                <td style="text-align: center;" class="align-middle">
                                    1
                                    {{-- <div class="input-group">
                                        <button class="btn btn-outline-secondary btn-sm" type="button" onclick="decreaseQuantity(1)">-</button>
                                        <input type="number" class="form-control text-center" name="quantity[1]" value="1" id="quantity1">
                                        <button class="btn btn-outline-secondary btn-sm" type="button" onclick="increaseQuantity(1)">+</button>
                                    </div> --}}
                                </td>
                                <td style="text-align: center;" class="align-middle">
                                    <button type="submit" class="btn btn-outline-primary btn-sm">Update</button>
                                </td>
                                <td class="align-middle">$36.00</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Summary Section -->
            <div class="col-lg-4 col-xl-4">
                <div class="p-4 shadow-sm bg-white rounded">
                    <h5 class="mb-4">Cart Totals</h5>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item d-flex justify-content-between">
                            <span>Subtotal:</span>
                            <strong>$79.65</strong>
                        </li>
                        <li class="list-group-item d-flex justify-content-between">
                            <span>Shipping:</span>
                            <strong>Free</strong>
                        </li>
                        <li class="list-group-item d-flex justify-content-between">
                            <span>Total:</span>
                            <strong>$79.65</strong>
                        </li>
                    </ul>
                    <button class="btn btn-outline-primary btn-block mt-4">Proceed to Checkout</button>
                </div>
            </div>
        </div>

        <!-- Coupon and Update Cart -->
        <div class="row mt-2">
            <div class="col-lg-8">
                <div class="input-group">
                    <input type="text" class="form-control mt-1" placeholder="Coupon Code">
                    <div class="input-group-append">
                        <button class="btn btn-outline-primary btn-sm ml-2">Apply Coupon</button>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 text-center">
                <button class="btn btn-outline-primary btn-sm">Update Cart</button>
            </div>
        </div>
    </div>
</form>

<script>
    function decreaseQuantity(id) {
        var input = document.getElementById('quantity' + id);
        var value = parseInt(input.value);
        if (value > 1) {
            input.value = value - 1;
        }
    }

    function increaseQuantity(id) {
        var input = document.getElementById('quantity' + id);
        var value = parseInt(input.value);
        input.value = value + 1;
    }
</script>

@endsection
