@extends('incs.navslider')

@section('content')


<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
        <div class="row mb-2">
           
            <div class="col-sm-12">
            <h3 class="text-3xl text-bold">Panier</h3>
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
                    <th>Image</th>
                    <th>Nom</th>
                    <th class="pl-5 text-left lg:text-right lg:pl-0">
                                <span class="lg:hidden" title="Quantity">Qtd</span>
                                <span class="hidden lg:inline">Quantity</span>
                              </th>
                    <th>Prix</th>
                    <th>Actions</th>
                    
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($cartItems as $item)
                                @php
                                    $product = \App\Models\Article::find($item->id);
                                @endphp
                        <tr>
                            <td> <a href="#">
                                <img src="{{url('images/articles/'.$product->photo)}}" style="width:50px" />
                                </a>
                            </th>
                            <td>
                            {{ $item->name }}
                            </td>
                            <td class="justify-center mt-6 md:justify-end md:flex">
                                <div class="h-10 w-28">
                                  <div class="relative flex flex-row w-full h-8">
                                    
                                    <form action="{{ route('cart.update') }}" method="POST">
                                      @csrf
                                      <input type="hidden" name="id" value="{{ $item->id}}" >
                                    <input type="number" name="quantity" value="{{ $item->quantity }}" 
                                    class="w-6 text-center bg-gray-300" />
                                    <button type="submit" class="px-2 pb-2 ml-2 text-black bg-blue-500">update</button>
                                    </form>
                                  </div>
                                </div>
                              </td>

                            <td>
                            {{ $item->price }} fcfa
                            </td>
                            <td>
                            <div class="btn-group btn-group-sm">
                                
                            <form action="{{ route('cart.remove') }}" method="POST">
                                    @csrf
                                    <input type="hidden" value="{{ $item->id }}" name="id">
                                    <button class="px-4 py-2 text-black bg-red-600">x</button>
                                </form>
                                
                               </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="row">
                    <div class="col-lg-6">
                    <div class="row">
                            <div class="col-lg-3">
                            Total: {{ Cart::getTotal() }} fcfa
                            </div>
                            <div class="col-lg-3">
                                <a href="" class="btn btn-primary">Commander</a>
                            </div>
                       </div>
                    </div>
                    <div class="col-lg-6">
                       <div class="row">
                            <div class="col-lg-3">
                                <form action="{{ route('cart.clear') }}" method="POST">
                                @csrf
                                <button class="px-6 py-2 text-red-800 bg-red-300">vider panier</button>
                                </form>
                            </div>
                            <div class="col-lg-3">
                                <a href="{{route('home')}}" class="btn btn-primary">Autre achat</a>
                            </div>
                       </div>
                    </div>
                </div>
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


    <!-- Featured End -->
@endsection




