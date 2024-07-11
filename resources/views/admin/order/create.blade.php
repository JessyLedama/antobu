@extends('layouts.app')
<!-- Carousel Styles -->
<link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
<link rel="stylesheet" href="{{ asset('css/sales.css') }}">

@section('content')

@include('admin.sidebar')

<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    
    <h1 class="h2 theme-primary-color">
      New Order
    </h1>
    
    <div class="btn-toolbar mb-2 mb-md-0">
      <div class="btn-group me-2">
        <a href="{{ route('admin.product.xlsx') }}" class="btn btn-sm btn-outline-secondary theme-primary-color">
          XLSX
        </a>

        <a href="{{ route('admin.product.csv') }}" class="btn btn-sm btn-outline-secondary theme-primary-color">
          CSV
        </a>
      </div>

      <!-- <button type="button" class="btn btn-sm btn-outline-secondary dropdown-toggle d-flex align-items-center gap-1">
        <svg class="bi"><use xlink:href="#calendar3"/></svg>
        This week
      </button> -->
    </div>
  </div>

  <div class="btn-container">
    <a class="new-btn theme-secondary-btn" href="{{ route('admin.order.index') }}">
      All Products
    </a>
  </div>

  <form action="{{ route('admin.order.store') }}" method="post" enctype="multipart/form-data">
    @csrf

    <div class="row">
      <div class="btn-container">
        <h2 class="theme-primary-color">
          New
        </h2>
      </div>

      <div class="mb-3 col-8">
        <label for="name" class="form-label theme-secondary-color">
          Customer Name 
        </label>

        <select name="user_id" id="" class="form-control theme-input-form">
          <option value="">
            Select a customer
          </option>

          @foreach($customers as $customer)
            <option value="{{ $customer->slug }}">
              {{ ucwords($customer-name) }}
            </option>
          @endforeach
        </select>
      </div>

      <div class="mb-3 col-4">
        <label for="order-date" class="form-label theme-secondary-color">
          Order Date
        </label>

        <input name="order_date" type="date" class="form-control theme-input-form" id="order-date" required>
      </div>

      <div class="mb-3 col-12 products-list">
        <div class="bd-example-snippet bd-code-snippet">
          <div class="bd-example m-0 border-0">
            <nav>
              <div class="nav nav-tabs mb-3" id="nav-tab" role="tablist">
                <button class="nav-link active" id="nav-products-tab" data-bs-toggle="tab" data-bs-target="#nav-products" type="button" role="tab" aria-controls="nav-products" aria-selected="true">
                  Products
                </button>
                
                <!-- <button class="nav-link" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-profile" type="button" role="tab" aria-controls="nav-profile" aria-selected="false">Profile</button>
                <button class="nav-link" id="nav-contact-tab" data-bs-toggle="tab" data-bs-target="#nav-contact" type="button" role="tab" aria-controls="nav-contact" aria-selected="false">Contact</button> -->
              </div>
            </nav>

            <div class="tab-content" id="nav-tabContent">
              <div class="tab-pane fade show active" id="nav-products" role="tabpanel" aria-labelledby="nav-products-tab">
                <div class="bd-example-snippet bd-code-snippet">
                  <div class="bd-example m-0 border-0">
                    
                    <ul class="list-group list-group-flush">
                      
                      <table>
                        <thead>
                          <tr>
                            <th>
                              Product
                            </th>

                            <!-- <th>
                              Description
                            </th> -->

                            <th>
                              Quantity
                            </th>

                            <th>
                              Unit Price
                            </th>

                            <th>
                              Taxes
                            </th>

                            <th>
                              Subtotal
                            </th>
                          </tr>
                        </thead>
                        @foreach($products as $product)
                          
                          <tbody>
                            <tr>
                              <div class="bd-example-snippet bd-code-snippet">
                                <div class="bd-example m-0 border-0">
                                  
                                  <ul>
                                    <td>
                                      <li class="list-group-item">
                                        <a href="{{ route('admin.product.show', $product->slug) }}">
                                          <span>
                                            {{ ucwords($product->name) }}
                                          </span>
                                        </a>
                                      </li>
                                    </td>

                                    <!-- <td>
                                      <li class="list-group-item">
                                        <a href="{{ route('admin.product.show', $product->slug) }}">
                                          <span>
                                            {!! ucfirst($product->description) !!}
                                          </span>
                                        </a>
                                      </li>
                                    </td> -->

                                    <td>
                                      <li class="list-group-item">
                                        <span>
                                          <input type="text" name="quantity" value="1" class="form-control text-center">
                                        </span>
                                      </li>
                                    </td>

                                    <td>
                                      <li class="list-group-item">
                                        <span>
                                          <input type="text" name="price" value="{{ ucwords($product->price) }}" class="form-control text-center">
                                        </span>
                                      </li>
                                    </td>

                                    <td>
                                      <li class="list-group-item"> 
                                        <span>
                                          {{ ucwords($product->tax_id) }}
                                        </span>

                                        <select name="tax_id" id="" class="form-control">
                                          <option value="">
                                            Select a tax
                                          </option>

                                          @foreach($taxes as $tax)
                                            <option value="{{ $tax->slug }}">
                                              {{ ucwords($tax->name) }} {{ $tax->amount }}
                                            </option>
                                          @endforeach
                                        </select>
                                      </li>
                                    </td>

                                    <td>
                                      <li class="list-group-item">
                                        <a href="{{ route('admin.product.show', $product->slug) }}">
                                        
                                          <span>
                                            {{ ucwords($product->subtotal) }}
                                          </span>
                                        </a>
                                      </li>
                                    </td>
                                  </ul>     
                                </div>
                              </div>
                            </tr>
                          </tbody>
                        @endforeach
                      </table>
                      
                      <li class="list-group-item">
                        <a href="">
                          Add a Product
                        </a>
                      </li>
                    </ul>

                    <hr>

                    <div class="row">
                      <div class="col4 float-right"> 
                        <span class="float-right sale-order-total">
                          Total:
                        </span>

                        <span class="float-right sale-order-total">
                          {{ $product->total }}
                        </span>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <!-- <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                <p>This is some placeholder content the <strong>Profile tab's</strong> associated content. Clicking another tab will toggle the visibility of this one for the next. The tab JavaScript swaps classes to control the content visibility and styling. You can use it with tabs, pills, and any other <code>.nav</code>-powered navigation.</p>
              </div>
              <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
                <p>This is some placeholder content the <strong>Contact tab's</strong> associated content. Clicking another tab will toggle the visibility of this one for the next. The tab JavaScript swaps classes to control the content visibility and styling. You can use it with tabs, pills, and any other <code>.nav</code>-powered navigation.</p>
              </div> -->
            </div>
          </div>
        </div>
      </div>
    </div>

    <input type="submit" value="Save" class="new-btn">
  </form>
</main>
@endsection