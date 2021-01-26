@extends('back.layout')
@section('main')
<div class="container-fluid">
  @if(session()->has('alert'))
  <div class="alert alert-success alert-dismissible fade show" role="alert">
    {{ session('alert') }}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>
  @endif
  @if($errors-> isNotEmpty())
  <div class="alert alert-danger alert-dismissible fade show" role="alert">
    Il y a des erreurs dans les valeurs, veuillez corriger les entrées signalées en rouge.
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>
  @endif
</div>
@endsection