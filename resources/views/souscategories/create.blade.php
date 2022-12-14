@extends('admin.sidebar')
@section('title', "Création d'une nouvelle catégorie")

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Nouvelle sous-catégorie</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
              <li class="breadcrumb-item active">Créer une sous-catégorie</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
    <form action="{{ route('souscategories.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
      <div class="row">
        <div class="col-md-12">
          <div class="card card-primary">
            <div class="card-header">
              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                  <i class="fas fa-minus"></i>
                </button>
              </div>
            </div>
            <div class="card-body">
                <div class="form-group row">
                    <div class="col col-6">
                        <label for="inputName">Nom de la sous catégorie</label>
                        <input  style="border: 2px solid black;" type="text" id="inputName" class="form-control @error('nom') is-danger @enderror" name="nom" value="{{ old('nom') }}">
                        @error('nom')
                          <p class="help is-danger">{{ $message }}</p>
                        @enderror
                    
                    </div>
                    <div class="col col-6">
                        <label for="parent_id">Nom de la categorie</label>
                        <select  style="border: 2px solid black;" class="form-control select2bs4" style="width: 100%;" name="parent_id" required>
                                    <option value="" selected disabled>Selectionner une categorie</option>
                               @foreach($categories as $categorie)
                                    <option value="{{$categorie->id}}">{{ $categorie->nom }}</option>
                                @endforeach
                            </select>
                    </div>
                </div>
               
              
                <div class="row">
                  <div class="col-6">
                    <a class="btn btn-primary m-1" href="{{ route('souscategories.index') }}" role="button"><i class="fas fa-arrow-alt-circle-left"> Retour</i></a>
                  </div>
                  <div class="col-6">
                    <button type="submit" class="btn btn-success float-right m-1">Créer une nouvelle sous-catégorie</button>
                  </div>
                </div>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
      </div>
     </form>

    </section>
</div>
@endsection