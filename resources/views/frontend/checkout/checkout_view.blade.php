@extends('frontend.master_dashboard')
@section('main')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<div class="page-header breadcrumb-wrap">
            <div class="container">
                <div class="breadcrumb">
                    <a href="index.html" rel="nofollow"><i class="fi-rs-home mr-5"></i>Home</a> 
                    <span></span> Checkout
                </div>
            </div>
        </div>
        <div class="container mb-80 mt-50">
            <div class="row">
                <div class="col-lg-8 mb-40">
                    <h3 class="heading-2 mb-10">Checkout</h3>
                    <div class="d-flex justify-content-between">
                    @if(count($carts) == 1)
                        <h6 class="text-body">There is 1 product in your cart</h6>
                    @elseif(count($carts) > 1)
                    <h6 class="text-body">There are {{ count($carts) }} products in your cart</h6>
                @endif
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-7">

    <div class="row">
        <h4 class="mb-30">Billing Details</h4>
        <form method="post" action="{{ route('checkout.store') }}">
        @csrf

            <div class="row">
                <div class="form-group col-lg-6">
                    <input type="text" required="" name="shipping_name" value="{{ Auth::user()->name }}">
                </div>
                <div class="form-group col-lg-6">
                    <input type="email" required="" name="shipping_email" value="{{ Auth::user()->email }}">
                </div>
            </div>
            <div class="row shipping_calculator">
	    <div class="form-group col-lg-6">
	        <div class="custom_select">
	            <select name="ward_id" class="form-control select-active">
	                <option value="">Select Township...</option>
	                @foreach($ward as $item)
	                <option value="{{ $item->id }}">{{ $item->ward_name }}</option>
	                @endforeach

	            </select>
	        </div>
	    </div>
     



                                <div class="form-group col-lg-6">
                                    <input required="" type="text" name="shipping_phone" value="{{ Auth::user()->phone }}" placeholder="Phone Number *">
                                </div>
                            </div>

                <div class="row shipping_calculator">
                <div class="form-group col-lg-6">
                    <div class="custom_select">
                        <select name="township_id" class="form-control select-active">
                            
                            

                        </select>
                    </div>
                </div>
                                <div class="form-group col-lg-6">
                                <input required="" type="text" name="post_code" placeholder="Post Code *">
                                </div>
                            </div>


<div class="row shipping_calculator">
<div class="form-group col-lg-6">
<div class="custom_select">
<select name="region_id" class="form-control select-active">

            
        </select>
    </div>
</div>
     <div class="form-group col-lg-6">
     <input required="" type="text" name="shipping_address" placeholder="Address *" value="{{ Auth::user()->address }}">
                                </div>
                            </div>




      <div class="form-group mb-30">
        <textarea rows="5" placeholder="Additional information" name="notes"></textarea>
                            </div>



                        
                    </div>
                </div>


<div class="col-lg-5">
<div class="border p-40 cart-totals ml-30 mb-50">
    <div class="d-flex align-items-end justify-content-between mb-30">
        <h4>Your Order</h4>
        <!-- <h6 class="text-muted">Subtotal</h6> -->
    </div>
    <div class="divider-2 mb-30"></div>
    <div class="table-responsive order_table checkout">
        <table class="table no-border">
            <tbody>
@foreach($carts as $item)
                <tr>
                    <td class="image product-thumbnail"><img src="{{ asset($item->options->image) }} " alt="#" style="width:50px; height: 50px;"></td>
                    <td>
                        <h6 class="w-160 mb-5"><a href="shop-product-full.html" class="text-heading">{{ $item->name }}</a></h6></span>
                        <div class="product-rate-cover">

                         <strong>Color :{{ $item->options->color }} </strong>
                         <br>
                         <strong>Size :{{ $item->options->size }} </strong>

                        </div>
                    </td>
                    <td>
                        <h6 class="text-muted pl-20 pr-20">x {{ $item->qty }}</h6>
                    </td>
                    <td>
                        <h4 class="text-brand">MMK{{ $item->price }}</h4>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>




 <table class="table no-border">
        <tbody>
            <tr>
                <td class="cart_total_label">
                    <h6 class="text-muted">Subtotal</h6>
                </td>
                <td class="cart_total_amount">
                    <h4 class="text-brand text-end">MMK{{ $cartTotal }}</h4>
                </td>
            </tr>

            
              <tr>
                <td class="cart_total_label">
                    <h6 class="text-muted">Grand Total</h6>
                </td>
                <td class="cart_total_amount">
                    <h4 class="text-brand text-end">MMK{{ $cartTotal }}</h4>
                </td>
            </tr>
        </tbody>
    </table>





    </div>
</div>
                    <div class="payment ml-30">
                        <h4 class="mb-30">Payment</h4>
                        <div class="payment_option">
            <div class="custome-radio">
                <input class="form-check-input" required="" type="radio" name="payment_option" value="cash" id="exampleRadios4" checked="">
                <label class="form-check-label" for="exampleRadios4" data-bs-toggle="collapse" data-target="#checkPayment" aria-controls="checkPayment">Cash on delivery</label>
            </div>

                        
                        <button type="submit" class="btn btn-fill-out btn-block mt-30">Place an Order<i class="fi-rs-sign-out ml-15"></i></button>
                    </div>
                </div>
            </div>
        </div>
        </form>

        <script type="text/javascript">
  		
  		$(document).ready(function(){
  			$('select[name="ward_id"]').on('change', function(){
  				var ward_id = $(this).val();
  				if (ward_id) {
  					$.ajax({
  						url: "{{ url('/township-get/ajax') }}/"+ward_id,
  						type: "GET",
  						dataType:"json",
  						success:function(data){
  							$('select[name="region_id"]').html('');
  							var d =$('select[name="township_id"]').empty();
  							$.each(data, function(key, value){
  								$('select[name="township_id"]').append('<option value="'+ value.id + '">' + value.township_name + '</option>');
  							});
  						},
  					});
  				} else {
  					alert('danger');
  				}
  			});
  		});

//Region Data Display

          $(document).ready(function(){
  			$('select[name="township_id"]').on('change', function(){
  				var township_id = $(this).val();
  				if (township_id) {
  					$.ajax({
  						url: "{{ url('/region-get/ajax') }}/"+township_id,
  						type: "GET",
  						dataType:"json",
  						success:function(data){
  							$('select[name="region_id"]').html('');
  							var d =$('select[name="region_id"]').empty();
  							$.each(data, function(key, value){
  								$('select[name="region_id"]').append('<option value="'+ value.id + '">' + value.region_name + '</option>');
  							});
  						},
  					});
  				} else {
  					alert('danger');
  				}
  			});
  		});
  </script>





@endsection