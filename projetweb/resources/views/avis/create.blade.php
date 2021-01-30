@extends('layouts.app')
@section('css')
<style>
    .custom-file-label::after {
        content: "Parcourir";
    }
</style>
@endsection
@section('content')
<div class="container-fluid">
    @if(session()->has('alert'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('alert') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @endif
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="container">
                    <form method="POST"
                        action="@isset($product) {{ route('produits.update', $product->id) }} @else {{ route('produits.store') }} @endisset"
                        enctype="multipart/form-data">
                        <div class="card-body">
                            @isset($product) @method('PUT') @endisset
                            @csrf
                            <br><br>
                            <label for="">Note</label>
                            <input name="note" type="number" label="Note" required="true" max="5" min="0">
                            <br><br>
                            <label for="">Commentaire</label>
                            <input name="commentaire" label="Commentaire" required="true">
                            <br><br>
                            <div class="form-group row mb-0">
                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-dark">Enregistrer</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('js')
<script>
    $(document).ready(() => {
      $('form').on('change', '#image', e => {
        $(e.currentTarget).next('.custom-file-label').text(e.target.files[0].name);
      });
      $('#changeImage').click(e => {
        $(e.currentTarget).parent().hide();
        $('#wrapper').html(`
          <div id="image" class="custom-file">
            <input type="file" id="image" name="image" class="custom-file-input" required>
            <label class="custom-file-label" for="image"></label>
          </div>`
        );
      });
    });
</script>
@endsection