@extends('admin.sidebar')
@section('title', 'Listes des articles')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
            <h1>Liste des articles </h1>
            </div>
            <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <a class="btn btn-primary" href="{{ route('articles.create') }}" pull-right>Créer un article</a>
            </ol>
            </div>
        </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
        <div class="row">
            <div class="col-12">
            <div class="card">
                <div class="card-header">
                    @if(session()->has('info'))
                        <div class="container">
                            <div class="alert alert-dismissible alert-success fade show" role="alert">
                                {{ session('info') }}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        </div>
                        @elseif(session()->has('error'))
                        <div class="container">
                            <div class="alert alert-dismissible alert-danger fade show" role="alert">
                                {{ session('error') }}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        </div>
                    @endif

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    @if($message = Session::get('success'))
                    <div class="alert alert-success alert-block">
                        <button type="button" class="close" data-dismiss="alert">×</button>
                            <strong>{{ $message }}</strong>
                    </div>
                    @endif

                  
                    <!-- end csv -->
                </div>
                <!-- /.card-header -->
                <div class="card-body">

                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                    <th>#</th>
                    <th>Image</th>
                    <th>Nom</th>
                    <th>Prix</th>
                    <th>Actions</th>
                    
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($articles as $key => $article)
                        <tr @if($article->deleted_at) class="has-background-grey-lighter" @endif>
                            <td>{{$key+1}}</th>
                            <td>
                            <img src="{{url('images/articles/'.$article->photo)}}"  alt="Image-categorie" width="50px" height="50px">
                            </td>
                            <td>{{$article->name}}</td>
                            <td>
                                {{$article->price}}
                            </td>
                            <td>
                            <div class="btn-group btn-group-sm">
                                
                                <a  href="#" class="btn btn-xs btn-info" title="Voir détails">
                                    <i class="fas fa-eye"></i></a>
                                </a>
                            
                                <a  href="{{ route('articles.edit',$article->id) }}" class="btn btn-xs btn-warning" title="Modifier">
                                    
                                    <i class="fa fas fa-edit"></i>
                                    
                                </a>
                                <form method="post" action="{{ route('articles.destroy',$article->id) }}" class="pull-right">
                                    {{csrf_field()}}
                                    {{method_field("DELETE")}}
                                    <button type="submit" class="btn btn-danger" title="Supprimer">
                                        <i class="fas fa-trash"></i></button>
                                </form>
                               
                               </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </section>
</div>



<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
@endsection
