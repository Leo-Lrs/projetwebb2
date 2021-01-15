@extends('layouts.appadmin')
@section('title')
Dashboard
@endsection
@section('contenu')
<?php
use App\Order;
use App\Client;
use Illuminate\Support\Facades\Session;
$clients = Client::count();
$commandes = Order::count();


$orders = Order::where('id',Session::get('id'))->get();

$orders->transform(function ($order, $key)
{
    $order->panier = unserialize($order->panier);

    return $order;
});

foreach($orders as $order)
{
    $totalPrice = $order->panier->totalPrice;
}
?>
<div class="row">
    <div class="col-md-3 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <p class="card-title text-md-center text-xl-left">Nombre de commandes</p>
                <div
                    class="d-flex flex-wrap justify-content-between justify-content-md-center justify-content-xl-between align-items-center">
                    <h3 class="mb-0 mb-md-2 mb-xl-0 order-md-1 order-xl-0">{{$commandes}}</h3>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-3 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <p class="card-title text-md-center text-xl-left">Nombre de clients</p>
                <div
                    class="d-flex flex-wrap justify-content-between justify-content-md-center justify-content-xl-between align-items-center">
                    <h3 class="mb-0 mb-md-2 mb-xl-0 order-md-1 order-xl-0">{{$clients}}</h3>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-3 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <p class="card-title text-md-center text-xl-left">Revenus totaux</p>
                <div
                    class="d-flex flex-wrap justify-content-between justify-content-md-center justify-content-xl-between align-items-center">
                    <h3 class="mb-0 mb-md-2 mb-xl-0 order-md-1 order-xl-0">
                        @foreach($orders as $order)
                        {{$totalPrice}}
                        @endforeach
                    </h3>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-3 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <p class="card-title text-md-center text-xl-left">Total Items Bookings</p>
                <div
                    class="d-flex flex-wrap justify-content-between justify-content-md-center justify-content-xl-between align-items-center">
                    <h3 class="mb-0 mb-md-2 mb-xl-0 order-md-1 order-xl-0">61344</h3>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')
<script src="backend/js/dashboard.js"></script>
@endsection