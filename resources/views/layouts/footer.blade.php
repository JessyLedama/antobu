<!-- Footer -->
<footer class="text-center text-lg-start text-muted bg-primary mt-3 theme-footer-bg">
  <!-- Section: Links  -->
  <section class="">
    <div class="container text-center text-md-start pt-4 pb-4">
      <!-- Grid row -->
      <div class="row mt-3">
        <!-- Grid column -->
        <div class="col-12 col-lg-3 col-sm-12 mb-2">
          <!-- Content -->
          @if(!$company->name == null)
            <img src="{{ asset('storage/'.$theme->favicon) }}" class="footer-logo" alt="">

            <br />

            <a href="{{ $company->website }}" target="_blank" class="text-white h2">
              {{ ucwords($company->name) }}
            </a>
          @else
            <a href="{{ $company->website }}" target="_blank" class="text-white h2">
              {{ env('APP_NAME') }}
            </a>
          @endif

          <p class="mt-1 text-white">
            @if(date("Y") == 2024)
              © {{ date("Y") }}  <br/>
            @else
              © 2024 - {{ date("Y") }}  <br/>
            @endif

            Copyright: 
            <a class="mt-1 text-white" href="https://simitechnologies.co.ke" target="_blank">
                SIMI Technologies
            </a>
          </p>
        </div>
        <!-- Grid column -->

        <!-- Grid column -->
        <div class="col-6 col-sm-4 col-lg-2">
          <!-- Links -->
          <h6 class="text-uppercase text-white fw-bold mb-2">
            Store
          </h6>
          <ul class="list-unstyled mb-4">
            <li><a class="text-white-50" href="#">About us</a></li>
            <li><a class="text-white-50" href="#">Find store</a></li>
            <li><a class="text-white-50" href="#">Categories</a></li>
            <li><a class="text-white-50" href="#">Blogs</a></li>
          </ul>
        </div>
        <!-- Grid column -->

        <!-- Grid column -->
        <div class="col-6 col-sm-4 col-lg-2">
          <!-- Links -->
          <h6 class="text-uppercase text-white fw-bold mb-2">
            Information
          </h6>
          <ul class="list-unstyled mb-4">
            <li><a class="text-white-50" href="#">Help center</a></li>
            <li><a class="text-white-50" href="#">Money refund</a></li>
            <li><a class="text-white-50" href="#">Shipping info</a></li>
            <li><a class="text-white-50" href="#">Refunds</a></li>
          </ul>
        </div>
        <!-- Grid column -->

        <!-- Grid column -->
        <div class="col-6 col-sm-4 col-lg-2">
          <!-- Links -->
          <h6 class="text-uppercase text-white fw-bold mb-2">
            Support
          </h6>
          <ul class="list-unstyled mb-4">
            <li><a class="text-white-50" href="#">Help center</a></li>
            <li><a class="text-white-50" href="#">Documents</a></li>
            <li><a class="text-white-50" href="#">Account restore</a></li>
            <li><a class="text-white-50" href="#">My orders</a></li>
          </ul>
        </div>
        <!-- Grid column -->

        <!-- Grid column -->
        <div class="col-12 col-sm-12 col-lg-3">
          <!-- Links -->
          <h6 class="text-uppercase text-white fw-bold mb-2">
            Newsletter
          </h6>
          
          <p class="text-white">
            Stay in touch with latest updates about our products and offers
          </p>
          
          <div class="input-group mb-3">

            @if ($errors->any())
              <div class="alert alert-danger">
                  <ul>
                      @foreach ($errors->all() as $error)
                          <li>{{ $error }}</li>
                      @endforeach
                  </ul>
              </div>
            @endif

            <form action="{{ route('newsletterSubscribe') }}" method="post">
              @csrf
              <input type="email" name="email" class="form-control border" placeholder="Email" aria-label="Email" aria-describedby="button-addon2" required/>
              <button class="btn btn-light border shadow-0 subscribe-btn" type="submit" id="button-addon2" data-mdb-ripple-color="dark">
                Subscribe
              </button>
            </form>
          </div>
        </div>
        <!-- Grid column -->
      </div>
      <!-- Grid row -->
    </div>
  </section>
  <!-- Section: Links  -->
</footer>
<!-- Footer -->
</main>