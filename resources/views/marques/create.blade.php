@extends('admin.sidebar')
@section('title', "Création d'une marque")

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Nouvelle marque</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
              <li class="breadcrumb-item active">Créer une marque</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
    <form action="{{ route('marques.store') }}" method="POST" enctype="multipart/form-data">
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
                        <label for="inputName">Nom de la catégorie</label>
                        <input  style="border: 2px solid black;" type="text" id="inputName" class="form-control @error('nom') is-danger @enderror" name="nom" value="{{ old('nom') }}">
                        @error('nom')
                          <p class="help is-danger">{{ $message }}</p>
                        @enderror
                    
                    </div>
                    <div class="col col-6">
                    <label for="inputClientCompany">Logo de la marque</label>
                        <input  style="border: 2px solid black;" type="file" id="inputClientCompany" class="form-control @error('logo') is-danger @enderror" name="logo" value="{{ old('logo') }}">
                        @error('logo')
                          <p class="help is-danger">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputDescription">Description</label>
                    <textarea style="border: 2px solid black;" id="inputDescription" class="form-control @error('description') is-danger @enderror" rows="4" name="description">{{ old('description') }}</textarea>
                    @error('description')
                      <p class="help is-danger">{{ $message }}</p>
                    @enderror
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