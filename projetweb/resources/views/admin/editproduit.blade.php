@extends('layouts.appadmin')
@section('title')
Editer produit
@endsection
@section('contenu')
<div class="row grid-margin">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Editer produit</h4>
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
                {!!Form::open(['action' => 'ProductController@modifierproduit', 'method' => 'POST', 'class' =>
                'cmxform', 'id' => 'commentForm', 'enctype' => 'multipart/form-data'])!!}
                {{ csrf_field() }}
                <div class="form-group">
                    {{Form::hidden('id', $product->id)}}
                    {{Form::label('', 'Nom du produit', ['for' => 'cname'])}}
                    {{Form::text('product_name', $product->product_name, ['class' => 'form-control', 'id' => 'cname'])}}
                </div>
                <div class="form-group">
                    {{Form::label('', 'Description du produit', ['for' => 'cname'])}}
                    {{Form::textarea('product_description', $product->product_description, ['class' => 'form-control', 'id' => 'cname'])}}
                </div>
                <div class="form-group">
                    {{Form::label('', 'Prix du produit', ['for' => 'cname'])}}
                    {{Form::number('product_price', $product->product_price, ['class' => 'form-control', 'id' => 'cname'])}}
                </div>
                <div class="form-group">
                    {{Form::label('', "Code d'activation du produit", ['for' => 'cname'])}}
                    {{Form::text('product_code', $product->product_code, ['class' => 'form-control', 'id' => 'cname'])}}
                </div>
                <div class="form-group">
                    {{Form::label('', 'Quantité du produit', ['for' => 'cname'])}}
                    {{Form::number('product_quantite', $product->product_quantite, ['class' => 'form-control', 'id' => 'cname'])}}
                </div>
                <div class="form-group">
                    {{Form::label('', 'Plateforme')}}
                    @foreach($categories as $categorie)
                    <label style="display:block">
                        <input @foreach($product->categories as $product_categorie)
                        @if($product_categorie->id == $categorie->id) checked @endif
                        @endforeach
                        type="checkbox" value="{{ $categorie->id }}" name="categories[]"/>
                        <span>{{ $categorie->category_name }}</span>
                    </label>
                    @endforeach
                </div>
                <div class="form-group">
                    {{Form::label('', 'Image du produit', ['for' => 'cname'])}}
                    {{Form::file('product_image', ['class' => 'form-control', 'id' => 'cname'])}}
                </div>
                {{Form::submit('Modifier', ['class' => 'btn btn-primary'])}}
                {!!Form::close()!!}
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
{{--<script src="backend/js/form-validation.js"></script>
<script src="backend/js/bt-maxLength.js"></script>--}}
@endsection