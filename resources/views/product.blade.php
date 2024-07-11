@extends('layouts.app')
<!-- Product Styles -->
<link rel="stylesheet" href="{{ asset('css/product.css') }}">

@section('content')
<main>

<!-- content -->
<section class="py-5">
  <div class="container theme-content-font">
    <div class="row gx-5">
        <aside class="col-lg-6">
            <div class="border rounded-4 mb-3 d-flex justify-content-center">
                <img style="max-width: 100%; max-height: 100vh; margin: auto;" class="rounded-4 fit" src="{{ asset('storage/'.$product->image) }}" />
            </div>

            @if($product->more_images !== null)
              <div class="d-flex justify-content-center mb-3">
                @php
                  $images = explode(',', $product->more_images);
                @endphp

                @foreach($images as $image)
                  <a data-fslightbox="mygalley" class="border mx-1 rounded-2" data-type="image" href="#" class="item-thumb">
                      <img width="60" height="60" class="rounded-2" src="{{ asset('storage/'.$image) }}" />
                  </a>
                @endforeach
              </div>
            @else
              @if($product->user_id == Auth::id())
                <div class="d-flex justify-content-center mb-3">
                  <div class="border mx-1 rounded-2" class="item-thumb">
                    <div class="dropdown">
                      <button class="btn btn-primary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Add More Images
                      </button>
                      <ul class="dropdown-menu">
                        <li>
                          <h6 class="dropdown-header">
                            Select multiple images
                          </h6>
                        </li>
                        
                        <li>
                          <form action="{{ route('admin.product.updateMoreImages', $product->id) }}" method="post" enctype="multipart/form-data">
                            @csrf 
                            <input type="file" name="more_images[]" id="" class="form-control" multiple>

                            <input type="submit" value="Save" class="btn btn-primary">
                          </form>
                        </li>
                      </ul>
                    </div>
                  </div>
                </div>
              @endif
            @endif
            <!-- thumbs-wrap.// -->
            <!-- gallery-wrap .end// -->
        </aside>

        <main class="col-lg-6 theme-content-font">
            <div class="ps-lg-3">
                <h1 class="title text-dark theme-title-font">
                    {{ ucfirst($product->name) }}
                </h1>

                <div class="d-flex flex-row my-3">
                    <div class="text-warning mb-1 me-2">
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fas fa-star-half-alt"></i>
                        <span class="ms-1">
                            4.5
                        </span>
                    </div>
                    
                    <!-- <span class="text-success ms-2">
                        In stock
                    </span> -->
                </div>

                <div class="mb-3">
                    <span class="h5">
                        Ksh. {{  $product->price}} 
                    </span>
                </div>

                @if($product->description == null)
                  @if($product->user_id == Auth::id())
                    <div class="d-flex justify-content-left mb-3">
                      <div class="border mx-1 rounded-2" class="item-thumb">
                        <div class="dropdown">
                          <button class="btn btn-primary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Add A Description
                          </button>
                          <ul class="dropdown-menu">
                            <li>
                              <h6 class="dropdown-header">
                                Add a Description
                              </h6>
                            </li>
                            
                            <li>
                              <form action="{{ route('admin.product.updateDescription', $product->id) }}" method="post">
                                @csrf 
                                <textarea type="text" name="description" id="" class="form-control"></textarea>

                                <input type="submit" value="Save" class="btn btn-primary">
                              </form>
                            </li>
                          </ul>
                        </div>
                      </div>
                    </div>
                  @endif
                @else
                  <p>
                    {{ $product->description }}
                  </p>
                @endif

                <div class="row">
                    <dt class="col-3">Type:</dt>
                    <dd class="col-9">Regular</dd>
                    @if($product->color == null)
                      @if($product->user_id == Auth::id())
                        <div class="dropdown">
                          <button class="btn btn-primary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Add A Color
                          </button>
                          <ul class="dropdown-menu">
                            <li>
                              <h6 class="dropdown-header">
                                Add a Color
                              </h6>
                            </li>
                            
                            <li>
                              <form action="{{ route('admin.product.updateColor', $product->id) }}" method="post">
                                @csrf 
                                <textarea type="text" name="color" id="" class="form-control"></textarea>

                                <input type="submit" value="Save" class="btn btn-primary">
                              </form>
                            </li>
                          </ul>
                        </div>
                      @endif
                    @else
                      <dt class="col-3">Color</dt>
                      <dd class="col-9">
                        {{ ucwords($product->color) }}
                      </dd>
                    @endif

                    @if($product->material == null)
                      @if($product->user_id == Auth::id())
                        <div class="dropdown">
                          <button class="btn btn-primary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Add A Material
                          </button>
                          <ul class="dropdown-menu">
                            <li>
                              <h6 class="dropdown-header">
                                Add a Material
                              </h6>
                            </li>
                            
                            <li>
                              <form action="{{ route('admin.product.updateMaterial', $product->id) }}" method="post">
                                @csrf 
                                <textarea type="text" name="material" id="" class="form-control"></textarea>

                                <input type="submit" value="Save" class="btn btn-primary">
                              </form>
                            </li>
                          </ul>
                        </div>
                      @endif
                    @else
                      <dt class="col-3">Material</dt>
                      <dd class="col-9">{{ ucwords($product->material) }}</dd>
                    @endif

                    <dt class="col-3">Brand</dt>
                    <dd class="col-9">Reebook</dd>
                </div>

                <hr />

                <div class="row mb-4">
                    <div class="col-md-4 col-6">
                      <label class="mb-2">Size</label>
                      <select class="form-select border border-secondary" style="height: 35px;">
                          <option>Small</option>
                          <option>Medium</option>
                          <option>Large</option>
                      </select>
                    </div>
                    <!-- col.// -->
                    <div class="col-md-4 col-6 mb-3">
                    <label class="mb-2 d-block">Quantity</label>
                    <div class="input-group mb-3" style="width: 170px;">
                        <button class="btn btn-white border border-secondary px-3" type="button" id="button-addon1" data-mdb-ripple-color="dark">
                        <i class="fas fa-minus"></i>
                        </button>
                        <input type="text" class="form-control text-center border border-secondary" placeholder="14" aria-label="Example text with button addon" aria-describedby="button-addon1" />
                        <button class="btn btn-white border border-secondary px-3" type="button" id="button-addon2" data-mdb-ripple-color="dark">
                        <i class="fas fa-plus"></i>
                        </button>
                    </div>
                    </div>
                </div>
                <a href="#" class="btn btn-warning shadow-0"> Buy now </a>
                <a href="{{ route('addToCart', $product->slug) }}" class="btn btn-primary shadow-0"> 
                  <i class="me-1 fa fa-shopping-basket"></i> 
                  
                  Add to cart 
                </a>

                @if(Auth::check())
                  <a method="post" href="" class="btn btn-light border border-primary py-2 icon-hover px-3"> 
                    <i class="me-1 fa fa-heart fa-lg"></i> 
                    Save 
                  </a>
                  <form action="{{ route('wishlist.store', $product->id) }}" method="post">
                    @csrf 
                    <input class="btn btn-light border border-primary py-2 icon-hover px-3" type="submit" value="Save">
                  </form>
                @endif
            </div>
        </main>
    </div>
  </div>
</section>
<!-- content -->

<section class="bg-light border-top py-4 theme-content-font">
  <div class="container">
    <div class="row gx-4">
      <div class="col-lg-8 mb-4">
        <div class="border rounded-2 px-3 py-2 bg-white">
          <!-- Pills navs -->
          <ul class="nav nav-pills nav-justified mb-3" id="ex1" role="tablist">
            <li class="nav-item d-flex" role="presentation">
              <a class="nav-link d-flex align-items-center justify-content-center w-100 active" id="ex1-tab-1" data-mdb-toggle="pill" href="#ex1-pills-1" role="tab" aria-controls="ex1-pills-1" aria-selected="true">Specification</a>
            </li>
            <li class="nav-item d-flex" role="presentation">
              <a class="nav-link d-flex align-items-center justify-content-center w-100" id="ex1-tab-2" data-mdb-toggle="pill" href="#ex1-pills-2" role="tab" aria-controls="ex1-pills-2" aria-selected="false">Warranty info</a>
            </li>
            <li class="nav-item d-flex" role="presentation">
              <a class="nav-link d-flex align-items-center justify-content-center w-100" id="ex1-tab-3" data-mdb-toggle="pill" href="#ex1-pills-3" role="tab" aria-controls="ex1-pills-3" aria-selected="false">Shipping info</a>
            </li>
            <li class="nav-item d-flex" role="presentation">
              <a class="nav-link d-flex align-items-center justify-content-center w-100" id="ex1-tab-4" data-mdb-toggle="pill" href="#ex1-pills-4" role="tab" aria-controls="ex1-pills-4" aria-selected="false">Seller profile</a>
            </li>
          </ul>
          <!-- Pills navs -->

          <!-- Pills content -->
          <div class="tab-content" id="ex1-content">
            <div class="tab-pane fade show active" id="ex1-pills-1" role="tabpanel" aria-labelledby="ex1-tab-1">
              <p>
                With supporting text below as a natural lead-in to additional content. Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut
                enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla
                pariatur.
              </p>
              <div class="row mb-2">
                <div class="col-12 col-md-6">
                  <ul class="list-unstyled mb-0">
                    <li><i class="fas fa-check text-success me-2"></i>Some great feature name here</li>
                    <li><i class="fas fa-check text-success me-2"></i>Lorem ipsum dolor sit amet, consectetur</li>
                    <li><i class="fas fa-check text-success me-2"></i>Duis aute irure dolor in reprehenderit</li>
                    <li><i class="fas fa-check text-success me-2"></i>Optical heart sensor</li>
                  </ul>
                </div>
                <div class="col-12 col-md-6 mb-0">
                  <ul class="list-unstyled">
                    <li><i class="fas fa-check text-success me-2"></i>Easy fast and ver good</li>
                    <li><i class="fas fa-check text-success me-2"></i>Some great feature name here</li>
                    <li><i class="fas fa-check text-success me-2"></i>Modern style and design</li>
                  </ul>
                </div>
              </div>
              <table class="table border mt-3 mb-2">
                <tr>
                  <th class="py-2">Display:</th>
                  <td class="py-2">13.3-inch LED-backlit display with IPS</td>
                </tr>
                <tr>
                  <th class="py-2">Processor capacity:</th>
                  <td class="py-2">2.3GHz dual-core Intel Core i5</td>
                </tr>
                <tr>
                  <th class="py-2">Camera quality:</th>
                  <td class="py-2">720p FaceTime HD camera</td>
                </tr>
                <tr>
                  <th class="py-2">Memory</th>
                  <td class="py-2">8 GB RAM or 16 GB RAM</td>
                </tr>
                <tr>
                  <th class="py-2">Graphics</th>
                  <td class="py-2">Intel Iris Plus Graphics 640</td>
                </tr>
              </table>
            </div>
            <div class="tab-pane fade mb-2" id="ex1-pills-2" role="tabpanel" aria-labelledby="ex1-tab-2">
              Tab content or sample information now <br />
              Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut
              aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui
              officia deserunt mollit anim id est laborum. Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis
              nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
            </div>
            <div class="tab-pane fade mb-2" id="ex1-pills-3" role="tabpanel" aria-labelledby="ex1-tab-3">
              Another tab content or sample information now <br />
              Dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea
              commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt
              mollit anim id est laborum.
            </div>
            <div class="tab-pane fade mb-2" id="ex1-pills-4" role="tabpanel" aria-labelledby="ex1-tab-4">
              Some other tab content or sample information now <br />
              Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut
              aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui
              officia deserunt mollit anim id est laborum.
            </div>
          </div>
          <!-- Pills content -->
        </div>
      </div>
      <div class="col-lg-4">
        <div class="px-0 border rounded-2 shadow-0">
          <div class="card">
            <div class="card-body">

              <h5 class="card-title">Similar items</h5>

              @if(!$similarProducts == null)
                @foreach($similarProducts as $product)
                  <div class="d-flex mb-3">
                    <a href="#" class="me-3">
                      <img src="{{ asset('storage/'.$product->image) }}" style="min-width: 96px; height: 96px;" class="img-md img-thumbnail" />
                    </a>
                    <div class="info">
                      <a href="#" class="nav-link mb-1">
                        {{ $product->name }} <br />
                        Line Mounts
                      </a>
                      <strong class="text-dark"> 
                        KSH. {{ $product->price }}
                      </strong>
                    </div>
                  </div>
                @endforeach
              @else
                <div class="d-flex mb-3">
                
                  <div class="info">
                    <a href="#" class="nav-link mb-1">
                      No Products To Display at this time
                    </a>
                  </div>
                </div>
              @endif
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection