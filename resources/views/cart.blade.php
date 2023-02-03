@extends('home')

@section('maincontent')
<br><br><br><br><br>


  <section class="h-100 h-custom" style="background-color: #eee;">
    <div class="container py-5 h-100">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col">
          <div class="card">
            <div class="card-body p-4">

              <div class="row">

                <div class="col-lg-7">
                  <h5 class="mb-3"><a href="#!" class="text-body"><i
                        class="fas fa-long-arrow-alt-left me-2"></i>Continue shopping</a></h5>
                  <hr>

                  <div class="d-flex justify-content-between align-items-center mb-4">
                    <div>
                      <p class="mb-1">Shopping cart</p>
                      <p class="mb-0">You have {{ count($cart) }}  items in your cart</p>
                    </div>
                    
                    <!-- <div>
                      <p class="mb-0"><span class="text-muted">Sort by:</span> <a href="#!"
                          class="text-body">price <i class="fas fa-angle-down mt-1"></i></a></p>
                    </div> -->

                  </div>
                  @php($subtotal=0)
                  @php($allprod="")
                  @php($allqty="")
                  @php($allprice="")
                  @foreach ($cart as $crt)
                      <div class="card mb-3">
                        <div class="card-body">
                          <div class="d-flex justify-content-between">

                            <div class="d-flex flex-row align-items-center">
                                <div>
                                <img
                                    src="uploads/{{ $crt->image }}"
                                    class="img-fluid rounded-3" alt="Shopping item" style="width: 65px;">
                                </div>
                                <div class="ms-3">
                                  <!-- {{ Form::text('id',$crt->id)}} -->
                                  <h5>&nbsp;{{ $crt->productname }}</h5>
                                <!-- <p class="small mb-0">256GB, Navy Blue</p> -->
                                </div>
                            </div>

                            <div class="d-flex flex-row align-items-center">
                                <div style="width: 80px;">
                                  {{ Form::number('cart_quantity',$crt->cart_quantity,['class' => 'form-control'])}}
                                </div>
                                <div style="width: 80px;">
                                  <h5 class="mb-0">&nbsp;{{ number_format($crt->price,2) }}</h5>
                                </div>
                                {{ Form::open(array('url' => '/deleteitem','method'=>'POST')) }}
                                  {{ Form::hidden('id_delete',$crt->id)}}
                                  <button type="submit"  style="color: #cecece;"><i class="fa fa-trash text-danger"></i></button>
                                {{ Form::close() }}
                            </div>
                            

                          </div>
                        </div>
                      </div>
                      @php($subtotal=$subtotal+($crt->price * $crt->cart_quantity))
                      @php($allprod.= $crt->productname ."|*|")
                      @php($allqty.=$crt->cart_quantity ."|*|")
                      @php($allprice.=number_format($crt->price,2) ."|*|")
                    
                  @endforeach


                </div>
                <div class="col-lg-5" >
                {{ Form::open(array('url' => '/checkout','method'=>'GET')) }}

                  <input type="hidden" id="allprod" name="allprod" value="{{ $allprod }}" > 
                  <input type="hidden" id="allqty" name="allqty" value="{{ $allqty }}" >  
                  <input type="hidden" id="allprice" name="allprice" value="{{ $allprice }}"> 
                  <div class="card bg-primary text-white rounded-3">
                    <div class="card-body">
                      <div class="d-flex justify-content-between align-items-center mb-4">
                        <h5 class="mb-0">Shipping details</h5>
                        <label class="form-label" for="typeText" ><h5 class="mb-2">User:{{ Auth::user()->name }}</h5></label>
                        <!-- <img src="https://mdbcdn.b-cdn.net/img/Photos/Avatars/avatar-6.webp"
                          class="img-fluid rounded-3" style="width: 45px;" alt="Avatar"> -->
                      </div>
         
                      
                      <select class="form-control" id="payment" name="payment">
                        <option>COD</option>
                        <option disabled>Gcash</option>
                        <option disabled>Maya</option>
                      </select>
                      <label class="form-label" for="typeName">Payment Type</label>
                      <br>
                      <input type="hidden" id="userid" name="userid" class="form-control form-control-lg" size="17"
                             value="{{ Auth::user()->id }}"minlength="19" maxlength="19" /> 
                      <!-- <a href="#!" type="submit" class="text-white"><i
                          class="fab fa-cc-mastercard fa-2x me-2"></i></a>s
                      <a href="#!" type="submit" class="text-white"><i
                          class="fab fa-cc-visa fa-2x me-2"></i></a>
                      <a href="#!" type="submit" class="text-white"><i
                          class="fab fa-cc-amex fa-2x me-2"></i></a>
                      <a href="#!" type="submit" class="text-white"><i class="fab fa-cc-paypal fa-2x"></i></a> -->

                      <form class="mt-4">
                        <div class="form-outline form-white mb-4">
                          <input type="text" id="address" name="address" class="form-control form-control-lg" size="17"
                            value="{{ Auth::user()->address }}" />
                          <label class="form-label" for="typeName">Address</label>
                        </div>

                        <div class="form-outline form-white mb-4">
                          <input type="text" id="contact" name="contact" class="form-control form-control-lg" siez="17"
                            value="{{ Auth::user()->contact_num }}" minlength="19" maxlength="19" />
                          <label class="form-label" for="typeText">Contact Number</label>
                        </div>

                        <!-- <div class="row mb-4">
                          <div class="col-md-6">
                            <div class="form-outline form-white">
                              <input type="text" id="typeExp" class="form-control form-control-lg"
                                placeholder="MM/YYYY" size="7" id="exp" minlength="7" maxlength="7" />
                              <label class="form-label" for="typeExp">Expiration</label>
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="form-outline form-white">
                              <input type="password" id="typeText" class="form-control form-control-lg"
                                placeholder="&#9679;&#9679;&#9679;" size="1" minlength="3" maxlength="3" />
                              <label class="form-label" for="typeText">Cvv</label>
                            </div>
                          </div>
                        </div> -->

                      </form>

                      <hr class="my-4" >
                        
                        <div class="d-flex justify-content-between" >
                          <p class="mb-0 text-white">Subtotal</p>
                          <p class="mb-2 text-white">Php {{ number_format($subtotal,2) }}</p>
                        </div>

                        <div class="d-flex justify-content-between">
                          <p class="mb-2 text-white">Shipping</p>
                          <p class="mb-2 text-white">Php 75.00</p>
                        </div>

                        <div class="d-flex justify-content-between mb-4">
                          <p class="mb-2 text-white">Total</p>
                          <p class="mb-2 text-white">Php {{ number_format($subtotal+75,2) }}</p>
                          <input type="hidden" value="{{ number_format($subtotal+75,2) }}" id="totalnum" name="totalnum">
                        </div>

                        <div class="d-flex justify-content-between mb-4">
                          <p class="mb-2 text-white">Voucher Code:</p>
                          <input type="text" id="discount" name="discount">
                        </div>

                        <button type="submit" class="btn btn-info btn-block btn-lg">
                          <div class="d-flex justify-content-between">
                            <span>Php {{ number_format($subtotal+75,2) }}</span>
                            <span> Checkout <i class="fas fa fa-arrow-right ms-2"></i></span>
                          </div>
                        </button>
                      </hr>
                    </div>
                  </div>
                  {{ Form::close() }}

                </div>

              </div>

            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

@stop