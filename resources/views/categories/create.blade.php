@extends('incs.backendnavbar')
@section('title', "Création d'une nouvelle catégorie")

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Nouvelle catégorie</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
              <li class="breadcrumb-item active">Créer une catégorie</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
    <form action="{{ route('categories.store') }}" method="POST" enctype="multipart/form-data">
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
                        <input type="text" id="inputName" class="form-control @error('nom') is-danger @enderror" name="nom" value="{{ old('nom') }}">
                        @error('nom')
                          <p class="help is-danger">{{ $message }}</p>
                        @enderror
                    
                    </div>
                    <div class="col col-6">
                        <label for="inputClientCompany">Image de la catégorie</label>
                        <input type="file" id="inputClientCompany" class="form-control @error('image') is-danger @enderror" name="image" value="{{ old('image') }}">
                        @error('image')
                          <p class="help is-danger">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputDescription">Description</label>
                    <textarea id="inputDescription" class="form-control @error('description') is-danger @enderror" rows="4" name="description">{{ old('description') }}</textarea>
                    @error('description')
                      <p class="help is-danger">{{ $message }}</p>
                    @enderror
                </div>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
      </div>
      <div class="row">
        <div class="col-12">
          <a class="btn btn-primary m-1" href="{{ route('categories.index') }}" role="button"><i class="fas fa-arrow-alt-circle-left"> Retour</i></a>
          <button type="submit" class="btn btn-success float-right">Créer une nouvelle catégorie</button>
        </div>
      </div>
    
     </form>

    </section>
</div>
@endsection