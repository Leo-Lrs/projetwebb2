@extends('layouts.app')
@section('content')
@if($shop->home_infos && (!isset($_COOKIE['notif'])))
<div class="annonce-container right w-notif m-r-2 m-t-n1-5">
  <div class="card">
    <ul class="collapsible">
      <li classe="px-1">
        <div class="annonce">
          <div class="collapsible-header head-annonce red-text text-darken-1"><i
              class="material-icons">info</i>Informations importantes</div>
        </div>
        <div class="collapsible-body informations">
          <ul>
            @php
            $info=explode("\r\n\r\n", $shop->home_infos);
            @endphp
            @foreach($info as $li)
            <li>{{ ' '.$li }}<br></li>
            @endforeach
          </ul>
        </div>
      </li>
    </ul>
  </div>
</div>
@endif

@guest
@if(!isset($_COOKIE['bienvenue']))
<div id="guest" class="container fade">
  <div class="row">
    <div class="col s12 offset-m2 m8">
      <div class="card blue-grey darken-1 z-depth-3">
        <div class="card-content white-text">
          <span class="card-title center-align">Bienvenue !!</span>
          <p>Touvez votre bonheur sur <span class="bold">MegaGaming</span>, ici tous vos jeux préférés à prix bas !<br>
            L'inscription est nécessaire pour passer une commande.</p>
          <p>Bonne visite</p>
        </div>
        <div class="card-action right-align">
          <a id="close" class="" href="#">Fermez la fenêtre</a>
        </div>
      </div>
    </div>
  </div>
</div>
@endif
@endguest

<div class="container">
  <form style="width: 40%; margin-right: auto; margin-left:auto; margin-top: 20px; margin-bottom: 20px;"
    class="form-inline my-2 my-lg-0" method="get">
    <input class="form-control mr-sm-2" name="search" type="search" placeholder="Recherche" aria-label="Search">
    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Rechercher</button>
    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Afficher tous les produits</button>
  </form>
  <div class="row">
    <div class="col s12 cards-container">
      @foreach($products as $product)
      <div class="card">
        <div class="card-image">
          @if($product->quantity)
          <a href="{{ route('produits.show', $product->id) }}">
            @endif
            <img src="/images/thumbs/{{ $product->image }}">
            @if($product->quantity) </a> @endif
        </div>
        <div class="right card-category">Editeur :
          {{ $product->category->name }}
        </div>
        <div class="card-content center-align">
          <p>{{ $product->name }}</p>
          @if($product->quantity)
          <p class="fz-85"><strong>{{ number_format($product->price, 2, ',', ' ') }} €</strong></p>
          @else
          <p class="red-text"><strong>Produit en rupture de stock</strong></p>
          @endif
        </div>
      </div>
      @endforeach
    </div>
  </div>
  <div style="width: 30%; margin-right: auto; margin-left:auto; ">
    {{ $products->links() }}
  </div>
</div>
@endsection

@section('javascript')

<script>
  function removeFadeOut( el, speed ) {
      var seconds = speed/1000;
      el.style.transition = "opacity "+seconds+"s ease";

      el.style.opacity = 0;
      setTimeout(function() {
          el.parentNode.removeChild(el);
      }, speed);
  }

  // fade out

  function fadeOut(el){
    el.style.opacity = 1;

    (function fade() {
      if ((el.style.opacity -= .1) < 0) {
        el.style.display = "none";
      } else {
        requestAnimationFrame(fade);
      }
    })();
  }

  // fade in

  function fadeIn(el, display){
    el.style.opacity = 0;
    el.style.display = display || "block";

    (function fade() {
      var val = parseFloat(el.style.opacity);
      if (!((val += .1) > 1)) {
        el.style.opacity = val;
        requestAnimationFrame(fade);
      }
    })();
  }


  const guest = document.querySelector('#guest');
  const close = document.querySelector('#close');

if(guest && close){
    close.addEventListener('click', () => {
    removeFadeOut(guest, 2000);
    document.cookie = 'bienvenue=hidden; path=/; max-age= 10000';
  });
}

  const info = document.querySelector('.collapsible-body.informations');
  const divHeadAnnonce = document.querySelector('.head-annonce');
  const divAnnonce = document.querySelector('.annonce-container');

  const animateCSS = (element, animation, prefix = 'animate__') =>
    // We create a Promise and return it
    new Promise((resolve, reject) => {
      const animationName = `${prefix}${animation}`;
      const node = document.querySelector(element);

      node.classList.add(`${prefix}animated`, animationName);

      // When the animation ends, we clean the classes and resolve the Promise
      function handleAnimationEnd() {
        node.classList.remove(`${prefix}animated`, animationName);
        node.removeEventListener('animationend', handleAnimationEnd);

        resolve('Animation ended');
      }

      node.addEventListener('animationend', handleAnimationEnd);
    });

    const element = document.querySelector('.annonce');
    element.style.setProperty('--animate-duration', '.8s');
    // element.classList.add('animate__delay-2s', 'animate__repeat-3');

    var head = () => {
      if(info.style.display !== 'block'){
        animateCSS('.annonce', 'headShake');
        animateCSS('.annonce', 'delay-2s');
        animateCSS('.annonce', 'repeat-3');
        animateCSS('.annonce', 'headShake');
      }else{
        clearInterval(anim);
      }
    }
    const anim = setInterval(head, 1000);

    divHeadAnnonce.addEventListener('click', () => {
      if(info.style.display === 'block'){
        // animateCSS('.annonce-container', 'fadeOut');
        // divAnnonce.classList.add('animate__animated', 'animate__fadeOut');
        removeFadeOut(divAnnonce, 2000);
        document.cookie = 'notif=hidden; path=/; max-age= 10000';
      }
    });

</script>

@endsection