@extends('layouts.appadmin')
@section('title')
Produits
@endsection
{{Form::hidden('', $increment=1)}}
@section('contenu')
<div class="card">
    <div class="card-body">
        <h4 class="card-title">Produits</h4>
        <div class="row">
            <div class="col-12">
                <div class="table-responsive">
                    <table id="order-listing" class="table">
                        <thead>
                            <tr>
                                <th>Order #</th>
                                <th>Image</th>
                                <th>Nom des produits</th>
                                <th>Catégorie du produit</th>
                                <th>Description</th>
                                <th>Prix</th>
                                <th>Code</th>
                                <th>Quantité</th>
                                <th>Status</th>
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
                                    <button class="btn btn-outline-primary">View</button>
                                    <button class="btn btn-outline-danger">Delete</button>
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