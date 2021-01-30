@if(isset($order) && $order->state->slug === 'annule')
<h5>Articles de ma commande annulée</h5>
@else
<h5>Détails de ma commande</h5>
@endif

@foreach ($content as $item)
<hr><br>
<div class="row">
  <div class="col m8 s12">
    {{ $item->name }} ({{ $item->quantity }} @if($item->quantity > 1) exemplaires) @else exemplaire) @endif
  </div>
  <div class="col m4 s12">
    <strong>{{ number_format($item->total_price_gross ?? $item->price * $item->quantity, 2, ',', ' ') }}
      €</strong></div>
  {{--@if($product->id == $user->product_id)
  <div class="col s12 m2">
    <a href="{{ route('avis.create') }}">Ajouter avis</a>
</div>
@endif--}}
</div>
@endforeach
<hr><br>

@if(isset($order) && $order->state->slug === 'annule')
<span></span>
@else
<div class="row" style="background-color: lightgrey">
  <div class="col s6">
    Total
  </div>
  <div class="col s6">
    <strong>{{ number_format($total, 2, ',', ' ') }} €</strong>
  </div>
</div>
@endif