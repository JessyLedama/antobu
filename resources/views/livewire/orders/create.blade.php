<?php

use Livewire\Volt\Component;

new class extends Component {
    //
}; ?>

<div>
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
</div>
