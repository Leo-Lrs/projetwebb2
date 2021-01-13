@extends('layouts.app1')
@section('title')
{{$product->product_name}}
@endsection
@section('contenu')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10 mb-5 text-center">
            <h2>{{$product->product_name}}</h2><br>
            <img src="/storage/product_images/{{$product->product_image}}" alt=""><br>
            <h6>{{$product->product_price}} €</h6>
            <p>{{$product->product_description}}</p>
        </div>
    </div>
</div>
@endsection