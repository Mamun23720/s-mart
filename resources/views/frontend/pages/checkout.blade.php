@extends('frontend.master')

@section('content')

<div class="container mt-5">

    <div class="row g-5">

        @if ($myCart = session()->get('basket'))

        <div class="col-md-5 col-lg-4 order-md-last">
          <h4 class="d-flex justify-content-between align-items-center mb-3">
            <span class="text-primary">Your cart</span>
            <span class="badge bg-primary rounded-pill">{{ session()->has('basket') ? count(session()->get('basket')) : 0 }}</span>
          </h4>

          <ul class="list-group mb-3">

            @foreach ($myCart as $cart)

            <li class="list-group-item d-flex justify-content-between lh-sm">
              <div>
                <h6 class="my-0">{{ $cart['name'] }}</h6>
                <small class="text-body-secondary">{{ $cart['quantity'] }} item</small>
              </div>
              <span class="text-body-secondary">{{ number_format($cart['subtotal'], 2) }}৳</span>
            </li>

            @endforeach

            <li class="list-group-item d-flex justify-content-between">
              <span>Total (BDT)</span>
              <strong>{{ number_format(array_sum(array_column(session()->get('basket'), 'subtotal')), 2) }}৳</strong>
            </li>
          </ul>


          {{-- <form class="card p-2">
            <div class="input-group">
              <input type="text" class="form-control" placeholder="Promo code">
              <button type="submit" class="btn btn-secondary">Redeem</button>
            </div>
          </form> --}}

        </div>

        @endif

        <div class="col-md-7 col-lg-8">
          <h4 class="mb-3">Billing Address :</h4>

          <form action="{{route('frontend.continue.checkout')}}" class="needs-validation" novalidate="" method="POST">
            @csrf

            <div class="row g-3">

                <div class="col-6 mt-2">
                    <label for="name" class="form-label">Receiver Name<span class="text-body-secondary"></span></label>
                    <input name="receiverName" type="text" class="form-control" id="name" placeholder="" style="border:solid 1px black">
                    <div class="invalid-feedback">
                      Please enter a valid name for shipping updates.
                    </div>
                  </div>
                  <div class="col-6 mt-2">
                    <label for="mobile" class="form-label">Receiver Number<span class="text-body-secondary"></span></label>
                    <input name="receiverNumber" type="number" class="form-control" id="mobile" placeholder=""  style="border:solid 1px black">
                    <div class="invalid-feedback">
                      Please enter a valid number for shipping updates.
                    </div>
                  </div>

              <div class="col-12 mt-2">
                <label for="email" class="form-label">Receiver Email<span class="text-body-secondary">(Optional)</span></label>
                <input name="receiverEmail" type="email" class="form-control" id="email" placeholder="you@example.com"  style="border:solid 1px black">
                <div class="invalid-feedback">
                  Please enter a valid email address for shipping updates.
                </div>
              </div>

              <div class="col-12 mt-2">
                <label for="address" class="form-label">Receiver Address</label>
                <input name="receiverAddress" type="text" class="form-control" id="address" placeholder="1234 Main St" required=""  style="border:solid 1px black">
                <div class="invalid-feedback">
                  Please enter your shipping address.
                </div>
              </div>

              <div class="col-md-3 mt-2">
                <label for="country" class="form-label">Country</label>
                <input name="receiverCountry" type="text" class="form-control" id="country" placeholder="" required=""  style="border:solid 1px black">
                <div class="invalid-feedback">
                  Country code required.
                </div>
              </div>

              <div class="col-md-3 mt-2">
                <label for="city" class="form-label">City</label>
                <input name="receiverCity" type="text" class="form-control" id="city" placeholder="" required=""  style="border:solid 1px black">
                <div class="invalid-feedback">
                  City code required.
                </div>
              </div>

              <div class="col-md-3 mt-2">
                <label for="zip" class="form-label">Zip</label>
                <input name="receiverZip" type="text" class="form-control" id="zip" placeholder="" required=""  style="border:solid 1px black">
                <div class="invalid-feedback">
                  Zip code required.
                </div>
              </div>
            </div>

            <hr class="my-4">

            <h4 class="mb-3">Payment Method</h4>

            <div class="my-3">

              <div class="form-check">
                <select name="receiverPaymentMethod" id="" style="height: 35px; width: 200px; border:solid 1px black;">
                    <option value="online" selected><b>Online</b></option>
                    <option value="cod"><b>Cash On Delivery</b></option>
                </select>
              </div>

            </div>

            <hr class="my-4">
            <button style="border-radius: 20px;" class="w-100 btn btn-primary btn-lg mb-5" type="submit"><b>Continue to Checkout</b></button>
          </form>

        </div>
      </div>
</div>

@endsection
