@extends('incs.backendnavbar')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Création d'un produit</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">Nom</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="price" class="col-md-4 col-form-label text-md-end">Prix</label>

                            <div class="col-md-6">
                                <input id="prix" type="text" class="form-control @error('prix') is-invalid @enderror" name="prix" value="{{ old('prix') }}" required autocomplete="prix" autofocus>

                                @error('prix')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="weight" class="col-md-4 col-form-label text-md-end">Poids</label>

                            <div class="col-md-6">
                                <input id="weight" type="text" class="form-control @error('weight') is-invalid @enderror" name="weight" value="{{ old('weight') }}" required autocomplete="weight" autofocus>

                                @error('weight')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                        <div class="row mb-3">
                            <label for="weight" class="col-md-4 col-form-label text-md-end">Catégorie </label>

                            <div class="col-md-6">
                                <select class="form-control select2bs4" name="categorie_id" id="categorie_id" required>
                                    <option value="" selected disabled>Selectionner une categorie</option>
                                    @foreach($categories as $categorie)
                                        <option value="{{$categorie->id}}">{{ $categorie->nom }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        
                        <div class="row mb-3">
                            <label for="weight" class="col-md-4 col-form-label text-md-end">Sous Catégorie</label>

                            <div class="col-md-6">
                                <select class="form-control select2bs4" name="souscategorie_id" id="subcategory" required>
                                
                                </select>
                            </div>
                        </div>


                        <div class="row mb-3">
                            <label for="weight" class="col-md-4 col-form-label text-md-end">Marque </label>

                            <div class="col-md-6">
                                <select class="form-control select2bs4" name="marque_id" id="marque" required>
                                
                                </select>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="weight" class="col-md-4 col-form-label text-md-end">Quantité</label>

                            <div class="col-md-6">
                                <input type="number" min="0" value="0" step="1" id="stocks" class="form-control @error('quantity') is-danger @enderror" name="quantity" value="{{ old('quantity') }}" required> 
                                @error('quantity')
                                <p class="help is-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="weight" class="col-md-4 col-form-label text-md-end">Image:</label>

                            <div class="col-md-6">
                                <input type="file" id="image" name="image" class="form-control col-md-7 col-xs-12">
                                <small class="txt-desc">(Veuillez choisir l'image de la catégorie)</small>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="weight" class="col-md-4 col-form-label text-md-end"> Description</label><br>

                            <div class="col-md-6">
                            <textarea id="description" class="form-control @error('description') is-invalid @enderror" name="description" rows="2" >
                            {{old('description')}}
                            </textarea><br>
                            <small class="txt-desc">(Veuillez saisir une description)</small>
                            </div>
                        </div>
                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Créer
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
