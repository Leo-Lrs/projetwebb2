<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- CSRF Token -->
  {{-- <meta name="csrf-token" content="{{ csrf_token() }}"> --}}

  <title>{{ config('app.name', 'Laravel') }}</title>

  <!-- Scripts -->
  <script src="{{ asset('js/app.js') }}"></script>

  <!-- Fonts -->
  <link rel="dns-prefetch" href="//fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

  <!-- Styles -->
  <link href="{{ asset('css/app.css') }}" rel="stylesheet">

  @yield('css')
  <style>
    body {
      display: flex;
      min-height: 100vh;
      flex-direction: column;
    }

    h2.titre {
      font-size: 2rem;
      margin-top: 1rem;
      margin-bottom: 1rem;
    }

    main {
      flex: 1 0 auto;
      padding-top: .2rem !important;
    }

    .bg-collap {
      background-color: #57606f !important;
      color: #f1f2f6 !important;
    }

    a.mystyle {
      color: #fff;
    }

    a.mystyle:hover {
      color: #d0d9d7;
      text-decoration: underline;
    }

    .m-small {
      margin-bottom: .75rem;
    }

    .pos-btn {
      text-align: center;
      width: 93%;
    }

    .pos-btn-100 {
      text-align: center;
      width: 100%;
    }

    @media screen and (min-width: 601px) {

      .pos-btn,
      .post-btn-100 {
        text-align: left;
        width: auto;
      }

      h2.titre {
        font-size: 2.5rem;
        margin-top: 2rem;
        margin-bottom: 2rem;
      }
    }

    @media screen and (min-width: 993px) {
      h2.titre {
        font-size: 3rem;
        margin-top: 2.5rem;
        margin-bottom: 2.5rem;
      }
    }
  </style>
</head>

<body>
  @yield('head-scripts')
  <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
    @csrf
  </form>
  <nav>
    <div class="nav-wrapper">
      <a href="{{ route('home') }}" class="brand-logo mt-1 ml-3"><img src="/images/megagaming_baniere.jpg" height="65px"
          alt="Logo"></a>
      <a href="{{ route('home') }}" data-target="mobile" class="sidenav-trigger fade-in"><i
          class="material-icons">menu</i></a>
      <ul class="right hide-on-med-and-down">
        @if($cartCount)
        <li>
          <a class="tooltipped" href="{{ route('panier.index') }}" data-position="bottom"
            data-tooltip="Voir mon panier"><i
              class="material-icons left">shopping_cart</i>Panier&nbsp;({{ $cartCount }})</a>
        </li>
        @endif
        @guest
        <li><a href="{{ route('login') }}"><i class="material-icons left">perm_identity</i>Connexion</a></li>
        @else
        <li>
          <a class="tooltipped" href="{{ route('account') }}" data-position="bottom"
            data-tooltip="Voir mon compte client"><i
              class="material-icons left">settings</i>{{ auth()->user()->firstname . ' ' . auth()->user()->name }}</a>
        </li>
        @if(auth()->user()->admin)
        <li><a class="tooltipped" href="{{ route('admin') }}" data-position="bottom"
            data-tooltip="Voir le panel d'administration"><i class="material-icons left">dashboard</i>Administration</a>
        </li>
        @endif
        <li>
          <a class="tooltipped" href="{{ route('logout') }}" data-position="bottom" data-tooltip="Me déconnecter"
            onclick="event.preventDefault();
              document.getElementById('logout-form').submit();">
            <i class="material-icons left">perm_identity</i>
            Déconnexion
          </a>
        </li>
        @endguest
      </ul>
    </div>
  </nav>
  <ul class="sidenav" id="mobile">
    @guest
    <li style="background-color: #c7e2e2"><a class="right-align" href="{{ route('login') }}"><span
          class="font-rum2">Connexion</span></a></li>
    <li class="interligne"></li>
    @endguest
    @if($cartCount)
    <li style="background-color: #1289A7">
      <a class="tooltipped center-align" style="color: #f1f1f1;font-weight: bold;text-transform: uppercase;"
        href="{{ route('panier.index') }}" data-position="bottom"
        data-tooltip="Voir mon panier">Panier&nbsp;({{ $cartCount }})</a>
    </li>
    @endif
    {{-- <li class="divider"></li> --}}
    @auth
    <li>
      <div class="right-align p-r-2 font-rum" style="background-color: #c7e2e2;">Paramètres</div>
    </li>
    <li>
      <a href="{{ route('account') }}"><i
          class="material-icons left">settings</i>{{ auth()->user()->firstname . ' ' . auth()->user()->name }}</a>
    </li>
    @if(auth()->user()->admin)
    <li><a href="{{ route('admin') }}"><i class="material-icons left">dashboard</i>Administration</a></li>
    @endif
    <li>
      <a href="{{ route('logout') }}" onclick="event.preventDefault();
            document.getElementById('logout-form').submit();">
        <i class="material-icons left">perm_identity</i>
        Déconnexion
      </a>
    </li>
    @endauth
  </ul>
  <main>
    @yield('content')
  </main>
  <footer class="page-footer">
    <div class="container center-on-small-only">
      <div class="row">
        <div class="col m5 s12">
          <h5 class="white-text">{{ $shop->name }}</h5>
          <ul>
            @php
            $adress=explode("\r\n\r\n", $shop->address);
            @endphp
            @foreach($adress as $li)
            <li>{{ ' '.$li }}<br></li>
            @endforeach
            <li class="grey-text text-lighten-3 p-t-1 nowrape">Tel : <a class="mystyle"
                href="tel:{{ $shop->phone }}">{{ $shop->phone }}</a></li>
            <li class="grey-text text-lighten-3">Email : <a class="mystyle"
                href="mailto:{{ $shop->email }}">{{ $shop->email }}</a></li>
            <br>
            <li><img src="/images/paiement.png" alt="Modes de paiement" width="250px"></li>
          </ul>
        </div>
        <div class="col m5 offset-m2 s12">
          <h5 class="white-text">Informations</h5>
          <ul>
            @foreach ($pages as $page)
            <li class="m-b-0-45"><a class="grey-text text-lighten-3"
                href="{{ route('page', $page->slug) }}">{{ $page->title }}</a></li>
            @endforeach
          </ul>
        </div>
      </div>
    </div>
    <div class="footer-copyright">
      <div class="container">© 2020 {{ $shop->name }} ©</div>
    </div>
  </footer>
  @yield('javascript')
</body>

</html>