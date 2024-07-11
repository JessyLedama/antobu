@extends('layouts.app')

@section('content')
<div class="container theme-content-font">
  <main>
    <div class="py-5 text-center">
      <h2 class="theme-primary-color theme-title-font">
        Place Your Order
      </h2>
      <p class="lead">
        You are about to place your order with us. Your selected payment method will be charged the amount indicated in your cart total. Thank you for doing business with us.
      </p>
    </div>

    <div class="row g-5">
      <div class="col-md-5 col-lg-4 order-md-last">
        <h4 class="d-flex justify-content-between align-items-center mb-3">
          <span class="text-primary theme-primary-color theme-title-font">
            Your cart
          </span>
          
          <span class="badge bg-primary theme-primary-bg theme-secondary-color rounded-pill">
            {{ $cart['count'] }}
          </span>
        </h4>

        <ul class="list-group mb-3">
          @foreach($cart as $item)
            @if(is_array($item))
              <li class="list-group-item d-flex justify-content-between lh-sm">
                <div>
                  <h6 class="my-0 theme-secondary-color">
                    {{ ucwords($item['name']) }}
                  </h6>
                  <small class="text-body-secondary theme-primary-color">
                    Quantity: {{ $item['quantity'] }}
                  </small>
                </div>
                <span class="text-body-secondary theme-primary-color">
                  KSh. {{ $item['price'] }}
                </span>
              </li>
            @endif
          @endforeach
          
          <li class="list-group-item d-flex justify-content-between">
            <span class="theme-secondary-color">Total (KSH)</span>
            <strong class="theme-primary-color">
              {{ $cart['total'] }}
            </strong>
          </li>
        </ul>

        <form class="card p-2">
          <div class="input-group">
            <input type="text" class="form-control theme-input-form" placeholder="Promo code">
            <button type="submit" class="btn btn-secondary theme-secondary-btn">Redeem</button>
          </div>
        </form>
      </div>
      <div class="col-md-7 col-lg-8">
        <h4 class="mb-3 theme-primary-color theme-title-font">Billing address</h4>
        <form class="needs-validation" novalidate>
          <div class="row g-3">
            <div class="col-sm-6">
              <label for="firstName" class="form-label theme-secondary-color">First name</label>
              <input type="text" class="form-control theme-input-form" id="firstName" placeholder="" value="" required>
              <div class="invalid-feedback">
                Valid first name is required.
              </div>
            </div>

            <div class="col-sm-6">
              <label for="lastName" class="form-label theme-secondary-color">Last name</label>
              <input type="text" class="form-control theme-input-form" id="lastName" placeholder="" value="" required>
              <div class="invalid-feedback">
                Valid last name is required.
              </div>
            </div>

            <div class="col-12">
              <label for="phone" class="form-label theme-secondary-color">Phone</label>
              <div class="input-group has-validation">
                <span class="input-group-text fa fa-mobile"></span>
                <input type="text" class="form-control theme-input-form" id="phone" placeholder="Phone" required>
              <div class="invalid-feedback">
                  Your phone number is required.
                </div>
              </div>
            </div>

            <div class="col-12">
              <label for="email" class="form-label theme-secondary-color">Email <span class="text-body-secondary theme-primary-color">(Optional)</span></label>
              <input type="email" class="form-control theme-input-form" id="email" placeholder="you@example.com">
              <div class="invalid-feedback">
                Please enter a valid email address for shipping updates.
              </div>
            </div>

            <div class="col-12">
              <label for="address" class="form-label theme-secondary-color">Address</label>
              <input type="text" class="form-control theme-input-form" id="address" placeholder="1234 Main St" required>
              <div class="invalid-feedback">
                Please enter your shipping address.
              </div>
            </div>

            <div class="col-12">
              <label for="address2" class="form-label theme-secondary-color">Address 2 <span class="text-body-secondary theme-primary-color">(Optional)</span></label>
              <input type="text" class="form-control theme-input-form" id="address2" placeholder="Apartment or suite">
            </div>

            <div class="col-md-5">
              <label for="country" class="form-label theme-secondary-color">Country</label>
              <select class="form-select theme-input-form" id="country" required>
                <option value="">Choose...</option>
                <option>United States</option>
              </select>
              <div class="invalid-feedback">
                Please select a valid country.
              </div>
            </div>

            <div class="col-md-4">
              <label for="state" class="form-label theme-secondary-color">State</label>
              <select class="form-select theme-input-form" id="state" required>
                <option value="">Choose...</option>
                <option>California</option>
              </select>
              <div class="invalid-feedback">
                Please provide a valid state.
              </div>
            </div>

            <div class="col-md-3">
              <label for="zip" class="form-label theme-secondary-color">Zip</label>
              <input type="text" class="form-control theme-input-form" id="zip" placeholder="" required>
              <div class="invalid-feedback">
                Zip code required.
              </div>
            </div>
          </div>

          <hr class="my-4">

          <div class="form-check">
            <input type="checkbox" class="form-check-input" id="same-address">
            <label class="form-check-label" for="same-address">Shipping address is the same as my billing address</label>
          </div>

          <div class="form-check">
            <input type="checkbox" class="form-check-input" id="save-info">
            <label class="form-check-label" for="save-info">Save this information for next time</label>
          </div>

          <hr class="my-4">

          <h4 class="mb-3 theme-primary-color theme-title-font">Payment</h4>

          <div class="my-3">
            <div class="form-check">
              <input id="credit" name="paymentMethod" type="radio" class="form-check-input" checked required>
              <label class="form-check-label" for="credit">Credit card</label>
            </div>
            <div class="form-check">
              <input id="debit" name="paymentMethod" type="radio" class="form-check-input" required>
              <label class="form-check-label" for="debit">Debit card</label>
            </div>
            <div class="form-check">
              <input id="paypal" name="paymentMethod" type="radio" class="form-check-input" required>
              <label class="form-check-label" for="paypal">PayPal</label>
            </div>
          </div>

          <div class="row gy-3">
            <div class="col-md-6">
              <label for="cc-name" class="form-label theme-secondary-color">Name on card</label>
              <input type="text" class="form-control theme-input-form" id="cc-name" placeholder="" required>
              <small class="text-body-secondary">Full name as displayed on card</small>
              <div class="invalid-feedback">
                Name on card is required
              </div>
            </div>

            <div class="col-md-6">
              <label for="cc-number" class="form-label theme-secondary-color">Credit card number</label>
              <input type="text" class="form-control theme-input-form" id="cc-number" placeholder="" required>
              <div class="invalid-feedback">
                Credit card number is required
              </div>
            </div>

            <div class="col-md-3">
              <label for="cc-expiration" class="form-label theme-secondary-color">Expiration</label>
              <input type="text" class="form-control theme-input-form" id="cc-expiration" placeholder="" required>
              <div class="invalid-feedback">
                Expiration date required
              </div>
            </div>

            <div class="col-md-3">
              <label for="cc-cvv" class="form-label theme-secondary-color">CVV</label>
              <input type="text" class="form-control theme-input-form" id="cc-cvv" placeholder="" required>
              <div class="invalid-feedback">
                Security code required
              </div>
            </div>
          </div>

          <hr class="my-4">

          <button class="w-100 btn btn-primary theme-primary-btn btn-lg" type="submit">
            Continue to checkout
          </button>
        </form>
      </div>
    </div>
  </main>
</div>
@endsection