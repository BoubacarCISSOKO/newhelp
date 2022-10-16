@extends('admin.sidebar')
@section('title', 'Listes des categories')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
            <h1>Liste des categories </h1>
            </div>
            <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <a class="btn btn-primary" href="{{ route('categories.create') }}" pull-right>Créer une nouvelle catégorie</a>
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
                    <th>Featured</th>
                    <th>Actions</th>
                    
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($categories as $key => $categorie)
                        <tr @if($categorie->deleted_at) class="has-background-grey-lighter" @endif>
                            <td>{{$key+1}}</th>
                            <td>
                            <img src="{{url('images/categories/'.$categorie->image)}}"  alt="Image-categorie" width="50px" height="50px">
                            </td>
                            <td>{{$categorie->nom}}</td>
                            <td>
                                <label class="switch custom-control custom-checkbox">
                                <input class="custom-control-input" onchange="update_featured(this)" value="{{ $categorie->id }}" type="checkbox" <?php if($categorie->featured == 1) echo "checked";?> >
                                <span class="custom-control-label"></span></label>
                            </td>
                            <td>
                            <div class="btn-group btn-group-sm">
                                
                                <a  href="#" class="btn btn-xs btn-info" title="Voir détails">
                                    <i class="fas fa-eye"></i></a>
                                </a>
                            
                                <a href="#" class="btn btn-xs btn-warning" title="Modifier">
                                    
                                    <i class="fa fas fa-edit"></i>
                                    
                                </a>
                                <a onclick="#" class="btn btn-xs btn-danger" title="Supprimer">
                                    <i class="fas fa-trash"></i>
                                
                                </a>
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
@endsection
@section('scripts')
    <script type="text/javascript">
        function update_featured(el){
            if(el.checked){
                var status = 1;
            }
            else{
                var status = 0;
            }
            $.post('#', 
            {_token:'{{ csrf_token() }}', id:el.value, status:status}, function(data){
                if(data == 1){
                    alert('Featured categories mise à jour avec succès');
                }
                else{
                    alert('Echec de mise à jour');
                }
            });
        }
    </script>
@endsection