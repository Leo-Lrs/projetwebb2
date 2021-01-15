@extends('layouts.app1')
@section('title')
Ajouter avis
@endsection
@section('contenu')
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
                    {{Form::label('', 'Nom du jeu', ['for' => 'cname'])}}
                    {{Form::text('product_name', '', ['class' => 'form-control', 'id' => 'cname'])}}
                </div>
                <div class="form-group">
                    {{Form::label('', 'Description du jeu', ['for' => 'cname'])}}
                    {{Form::textarea('product_description', '', ['class' => 'form-control', 'id' => 'cname'])}}
                </div>
                <div class="form-group">
                    {{Form::label('', 'Prix du jeu', ['for' => 'cname'])}}
                    {{Form::number('product_price', '', ['class' => 'form-control', 'id' => 'cname'])}}
                </div>
                <div class="form-group">
                    {{Form::label('', "Code d'activation du jeu", ['for' => 'cname'])}}
                    {{Form::text('product_code', '', ['class' => 'form-control', 'id' => 'cname'])}}
                </div>
                <div class="form-group">
                    {{Form::label('', 'Quantité du jeu', ['for' => 'cname'])}}
                    {{Form::number('product_quantite', '', ['class' => 'form-control', 'id' => 'cname'])}}
                </div>
                <div class="form-group">
                    {{Form::label('', 'Plateforme')}}
                    @foreach ($categories as $categorie)
                    <label class="form-control" style="display:block">
                        <input type="checkbox" value="{{ $categorie->id }}" name="categories[]" />
                        <span>{{ $categorie->category_name }}</span>
                    </label>
                    @endforeach
                </div>
                <div class="form-group">
                    {{Form::label('', 'Image du jeu', ['for' => 'cname'])}}
                    {{Form::file('product_image', ['class' => 'form-control', 'id' => 'cname'])}}
                </div>
                {{Form::submit('Ajouter', ['class' => 'btn btn-primary'])}}
                {!!Form::close()!!}
                </form>
            </div>
        </div>
    </div>
</div>
@endsection