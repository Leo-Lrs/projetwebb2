@extends('layouts.appadmin')
@section('title')
Jeux
@endsection
{{Form::hidden('', $increment=1)}}
@section('contenu')
<div class="card">
    <div class="card-body">
        <h4 class="card-title">Jeux</h4>
        @if(Session::has('status'))
        <div class="alert alert-success">
            {{Session::get('status')}}
        </div>
        @endif
        <div class="row">
            <div class="col-12">
                <div class="table-responsive">
                    <table id="order-listing" class="table">
                        <thead>
                            <tr>
                                <th>Ordre</th>
                                <th>Image</th>
                                <th>Nom du jeu</th>
                                <th>Plateforme</th>
                                <th>Description</th>
                                <th>Prix</th>
                                <th>Code d'activation</th>
                                <th>Quantité</th>
                                <th>Statut</th>
                                <th scope="col" colspan="2">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($produits as $produit)
                            <tr>
                                <td>{{$increment}}</td>
                                <td><img src="/storage/product_images/{{$produit->product_image}}" alt=""></td>
                                <td>{{$produit->product_name}}</td>
                                <td>
                                    @forelse ($produit->categories ?? [] as $category)
                                    <li>{{$category->category_name}}</li>
                                    @empty
                                    nothing
                                    @endforelse
                                </td>
                                <td>{{$produit->product_description}}</td>
                                <td>{{$produit->product_price}}</td>
                                <td>{{$produit->product_code}}</td>
                                <td>{{$produit->product_quantite}}</td>
                                <td>
                                    @if ($produit->status == 1)
                                    <label class="badge badge-success">Activé</label>
                                    @else
                                    <label class="badge badge-danger">Désactivé</label>
                                    @endif

                                </td>
                                <td>
                                    <button class="btn btn-outline-primary"
                                        onclick="window.location ='{{url('/edit_produit/'.$produit->id)}}'">Modifier</button>
                                    <a class="btn btn-outline-danger" href="{{url('/supprimerproduit/'.$produit->id)}}"
                                        id="delete">Supprimer</a>
                                    @if ($produit->status == 1)
                                    <button class="btn btn-outline-warning"
                                        onclick="window.location ='{{url('/desactiver_produit/'.$produit->id)}}'">Desactiver</button>
                                    @else
                                    <button class="btn btn-outline-success"
                                        onclick="window.location ='{{url('/activer_produit/'.$produit->id)}}'">Activer</button>
                                    @endif
                                </td>
                            </tr>
                            {{Form::hidden('', $increment=$increment+1)}}
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script src="backend/js/data-table.js"></script>
@endsection