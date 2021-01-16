@extends('layouts.app1')
@section('title')
Paiement
@endsection
@section('contenu')
<div class="hero-wrap hero-bread" style="background-image: url('frontend/images/bg_4.jpg');"></div>
@if(Session::has('cart'))
<section class="ftco-section">
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-xl-7 ftco-animate">
				<form action="{{url('/payer')}}" class="billing-form" method="POST" id="checkout-form">
					{{ csrf_field() }}
					<h3 class="mb-4 billing-heading">Details de facturation</h3>
					@if(Session::has('error'))
					<div class="alert alert-danger">
						{{Session::get('error')}}
						{{Session::put('error', null)}}
					</div>
					@endif
					<div class="row align-items-end">
						<div class="col-md-6">
							<div class="form-group">
								<label for="firstname">Prénom</label>
								<input type="text" name="firstname" class="form-control" placeholder="">
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label for="lastname">Nom</label>
								<input type="text" name="lastname" class="form-control" placeholder="">
							</div>
						</div>
						<div class="w-100"></div>
						<div class="col-md-12">
							<div class="form-group">
								<label for="country">Pays</label>
								<div class="select-wrap">
									<div class="icon"><span class="ion-ios-arrow-down"></span></div>
									<select name="" id="" class="form-control">
										<option value="">France</option>
										<option value="">Italy</option>
										<option value="">Philippines</option>
										<option value="">South Korea</option>
										<option value="">Hongkong</option>
										<option value="">Japan</option>
									</select>
								</div>
							</div>
						</div>
						<div class="w-100"></div>
						<div class="col-md-6">
							<div class="form-group">
								<label for="streetaddress">Addresse</label>
								<input type="text" name="adress" class="form-control"
									placeholder="House number and street name">
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<input type="text" class="form-control"
									placeholder="Appartment, suite, unit etc: (optional)">
							</div>
						</div>
						<div class="w-100"></div>
						<div class="col-md-6">
							<div class="form-group">
								<label for="towncity">Ville</label>
								<input type="text" class="form-control" placeholder="">
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label for="postcodezip">Code postal</label>
								<input type="text" class="form-control" placeholder="">
							</div>
						</div>
						<div class="w-100"></div>
						<div class="col-md-6">
							<div class="form-group">
								<label for="phone">Téléphone</label>
								<input type="text" class="form-control" placeholder="">
							</div>
						</div>
						<div class="col-md-12">
							<div class="form-group">
								<label for="cardname">Nom de la carte</label>
								<input type="text" class="form-control" id="card-name" name="card_name">
							</div>
						</div>
						<div class="col-md-12">
							<div class="form-group">
								<label for="cardnumber">Numéro de carte</label>
								<input type="text" class="form-control" id="card-number">
							</div>
						</div>
						<div class="col-md-4">
							<div class="form-group">
								<label for="cardmonth">Mois d'expiration</label>
								<input type="text" class="form-control" id="card-expiry-month" maxlength="2">
							</div>
						</div>
						<div class="col-md-4">
							<div class="form-group">
								<label for="cardyear">Année d'expiration</label>
								<input type="text" class="form-control" id="card-expiry-year" maxlength="2">
							</div>
						</div>
						<div class="col-md-4">
							<div class="form-group">
								<label for="cardcvc">Cryptogramme</label>
								<input type="text" class="form-control" id="card-cvc" maxlength="3">
							</div>
						</div>
						<div class="col-md-12">
							<div class="form-group">
								<input type="submit" class="btn btn-primary py-3 px-4" value="Payer maintenant">
							</div>
						</div>
						<div class="w-100"></div>
					</div>
				</form><!-- END -->
			</div>
			<div class="col-xl-5">
				<div class="row mt-5 pt-3">
					<div class="col-md-12 d-flex mb-5">
						<div class="cart-detail cart-total p-3 p-md-4">
							<p class="d-flex total-price">
								<span>Total</span>
								<span>{{Session::get('cart')->totalPrice}} €</span>
							</p>
						</div>
					</div>
					<div class="col-md-12">
						<div class="cart-detail p-3 p-md-4">
							<h3 class="billing-heading mb-4">Payment Method</h3>
							<div class="form-group">
								<div class="col-md-12">
									<div class="radio">
										<label><input type="radio" name="optradio" class="mr-2"> Carte bancaire</label>
									</div>
								</div>
							</div>
							<div class="form-group">
								<div class="col-md-12">
									<div class="radio">
										<label><input type="radio" name="optradio" class="mr-2"> Direct Bank
											Tranfer</label>
									</div>
								</div>
							</div>
							<div class="form-group">
								<div class="col-md-12">
									<div class="radio">
										<label><input type="radio" name="optradio" class="mr-2"> Check
											Payment</label>
									</div>
								</div>
							</div>
							<div class="form-group">
								<div class="col-md-12">
									<div class="radio">
										<label><input type="radio" name="optradio" class="mr-2"> Paypal</label>
									</div>
								</div>
							</div>
							<div class="form-group">
								<div class="col-md-12">
									<div class="checkbox">
										<label><input type="checkbox" value="" class="mr-2"> I have read and accept
											the terms and conditions</label>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div> <!-- .col-md-8 -->
		</div>
	</div>
</section> <!-- .section -->
@endif
@endsection

@section('scripts')
<script src="https://js.stripe.com/v2/"></script>
<script src="src/js/checkout.js"></script>
<script>
	$(document).ready(function(){

		var quantitiy=0;
		   $('.quantity-right-plus').click(function(e){
		        
		        // Stop acting like a button
		        e.preventDefault();
		        // Get the field name
		        var quantity = parseInt($('#quantity').val());
		        
		        // If is not undefined
		            
		            $('#quantity').val(quantity + 1);

		          
		            // Increment
		        
		    });

		     $('.quantity-left-minus').click(function(e){
		        // Stop acting like a button
		        e.preventDefault();
		        // Get the field name
		        var quantity = parseInt($('#quantity').val());
		        
		        // If is not undefined
		      
		            // Increment
		            if(quantity>0){
		            $('#quantity').val(quantity - 1);
		            }
		    });
		    
		});
</script>
@endsection