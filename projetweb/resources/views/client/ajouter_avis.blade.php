@extends('layouts.app1')
@section('title')
Avis sur {{$product->product_name}}
@endsection
@section('contenu')
<div class="container">
    <div class="row grid-margin">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Ajouter avis</h4>
                    @if(Session::has('status'))
                    <div class="alert alert-success">
                        {{Session::get('status')}}
                    </div>
                    @endif
                    @if (count($errors)> 0)
                    <div class="alert alert-danger">
                        @foreach ($errors->all() as $error)
                        {{$error}}
                        @endforeach
                    </div>
                    @endif
                    {!!Form::open(['action' => 'AvisController@sauver_avis', 'method' => 'POST', 'class' =>
                    'cmxform', 'id' => 'commentForm'])!!}
                    {{ csrf_field() }}
                    <div class="form-group">
                        {{Form::label('', 'Prénom', ['for' => 'cname'])}}
                        {{Form::text('firstname', '', ['class' => 'form-control', 'id' => 'cname'])}}
                    </div>
                    <div class="form-group">
                        {{Form::label('', 'Commentaire', ['for' => 'cname'])}}
                        {{Form::textarea('comment', '', ['class' => 'form-control', 'id' => 'cname'])}}
                    </div>
                    {{Form::submit('Ajouter mon avis', ['class' => 'btn bouton-avis btn-primary'])}}
                    {!!Form::close()!!}
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<br>
@endsection