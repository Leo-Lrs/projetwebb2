@extends('layouts.app1')
@section('title')
MegaGaming
@endsection
@section('contenu')
<section id="home-section" class="hero">
	<div class="home-slider owl-carousel">
		<div class="slider-item" style="background-image: url('/frontend/images/bg_4.jpg');"></div>
		<div class="slider-item" style="background-image: url('/frontend/images/bg_5.jpg');"></div>
	</div>
</section>
<section class="ftco-section">
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-md-10 mb-5 text-center">
				<ul class="product-category">
					<li><a href="{{URL::to('/shop')}}"
							class="{{(request()->is('shop')?'active':'')}}{{(request()->is('/')?'active':'')}}">Tout</a>
					</li>
					@foreach ($categories as $categorie)
					<li><a href="/select_par_cat/{{$categorie->id}}"
							class="{{(request()->is('select_par_cat/'.$categorie->id)?'active':'')}}">{{$categorie->category_name}}</a>
					</li>
					@endforeach
				</ul>
			</div>
		</div>
		<div class="row">
			@foreach ($produits as $produit)
			<div class="col-md-6 col-lg-3 ftco-animate">
				<div class="product">
					<a href="{{URL::to('/show_product/'.$produit->id)}}" class="img-prod"><img class="img-fluid"
							src="/storage/product_images/{{$produit->product_image}}">
						<div class="overlay"></div>
					</a>
					<div class="text py-3 pb-4 px-3 text-center">
						<h3><a href="#">{{$produit->product_name}}</a></h3>
						<div class="d-flex">
							<div class="pricing">
								<p class="price"><span class="price-sale">{{$produit->product_price}} €</span></p>
							</div>
						</div>
						<div class="bottom-area d-flex px-3">
							<div class="m-auto d-flex">
								<a href="{{URL::to('/show_product/'.$produit->id)}}"
									class="add-to-cart d-flex justify-content-center align-items-center text-center">
									<span><i class="ion-ios-menu"></i></span>
								</a>
								<a href="/ajouter_panier/{{$produit->id}}"
									class="buy-now d-flex justify-content-center align-items-center mx-1">
									<span><i class="ion-ios-cart"></i></span>
								</a>
							</div>
						</div>
					</div>
				</div>
			</div>
			@endforeach
			<div class="row mt-5">
				<div class="col text-center">
					<div class="block-27">
						<ul>
							<li><a href="#">&lt;</a></li>
							<li class="active"><span>1</span></li>
							<li><a href="#">2</a></li>
							<li><a href="#">3</a></li>
							<li><a href="#">4</a></li>
							<li><a href="#">5</a></li>
							<li><a href="#">&gt;</a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
</section>
@endsection