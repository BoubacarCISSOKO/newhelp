@extends('base')

@section('content')
@include('front.slider')
<style>
    .position-relative{
        
        border-bottom-right-radius: 15px;
        background-color: #92959a;
    }
</style>


         <!-- Start Section -->
    <section class="container py-5">
        <div class="row">

            <div class="col-md-6 col-lg-3 pb-5">
                <div class="h-100 py-5 services-icon-wap shadow">
                    <div class="h1 text-success text-center"><i class="fa fa-truck fa-lg"></i></div>
                    <h2 class="h5 mt-4 text-center">Delivery Services</h2>
                </div>
            </div>

            <div class="col-md-6 col-lg-3 pb-5">
                <div class="h-100 py-5 services-icon-wap shadow">
                    <div class="h1 text-success text-center"><i class="fas fa-exchange-alt"></i></div>
                    <h2 class="h5 mt-4 text-center">Shipping & Return</h2>
                </div>
            </div>

            <div class="col-md-6 col-lg-3 pb-5">
                <div class="h-100 py-5 services-icon-wap shadow">
                    <div class="h1 text-success text-center"><i class="fa fa-percent"></i></div>
                    <h2 class="h5 mt-4 text-center">Promotion</h2>
                </div>
            </div>

            <div class="col-md-6 col-lg-3 pb-5">
                <div class="h-100 py-5 services-icon-wap shadow">
                    <div class="h1 text-success text-center"><i class="fa fa-user"></i></div>
                    <h2 class="h5 mt-4 text-center">24 Hours Service</h2>
                </div>
            </div>
        </div>
    </section>
    <!-- End Section -->
        
        <div class="container">
       
            <div class="card">
            <div class="card-header">
                <h2 style="">Tous les produits</h2>
                    <!-- end csv -->
                </div>
            <div class="row">

            @foreach($articles as $key => $article)
                <div class="col-12 col-md-4 p-5 mt-3">
                    <div class="card rounded-0">
                        <a href="{{ route('product', $article->id) }}"><img src="{{url('images/articles/'.$article->photo)}}" class="card-img rounded-0 img-fluid" style=" width: 150px;height: 150px;"></a>
                        <div class="card-img-overlay rounded-0 product-overlay ">
                            <ul class="list-unstyled">
                                <li><a class="btn btn-success text-white mt-2" href="{{ route('product', $article->id) }}"><i class="far fa-eye"></i></a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="card-body">
                        <a href="shop-single.html" class="h3 text-decoration-none">{{$article->name}}</a>
                        <ul class="w-100 list-unstyled d-flex justify-content-between mb-0">
                            
                            <li class="pt-2">
                                <span class="product-color-dot color-dot-red float-left rounded-circle ml-1"></span>
                                <span class="product-color-dot color-dot-blue float-left rounded-circle ml-1"></span>
                                <span class="product-color-dot color-dot-black float-left rounded-circle ml-1"></span>
                                <span class="product-color-dot color-dot-light float-left rounded-circle ml-1"></span>
                                <span class="product-color-dot color-dot-green float-left rounded-circle ml-1"></span>
                            </li>
                        </ul>
                        <ul class="list-unstyled d-flex justify-content-center mb-1">
                            <li>
                                <i class="text-warning fa fa-star"></i>
                                <i class="text-warning fa fa-star"></i>
                                <i class="text-warning fa fa-star"></i>
                                <i class="text-muted fa fa-star"></i>
                                <i class="text-muted fa fa-star"></i>
                            </li>
                        </ul>
                        <p class="text-center mb-0">{{$article->price}} fcfa</p>
                    </div>
                </div>

              @endforeach

                    <div class="col-md-4">
                        <div class="card mb-4 product-wap rounded-0">
                            
                          
                        </div>
                    </div>
                  
                </div>
                <div div="row">
                    <ul class="pagination pagination-lg justify-content-end">
                        <li class="page-item disabled">
                            <a class="page-link active rounded-0 mr-3 shadow-sm border-top-0 border-left-0" href="#" tabindex="-1">1</a>
                        </li>
                        <li class="page-item">
                            <a class="page-link rounded-0 mr-3 shadow-sm border-top-0 border-left-0 text-dark" href="#">2</a>
                        </li>
                        <li class="page-item">
                            <a class="page-link rounded-0 shadow-sm border-top-0 border-left-0 text-dark" href="#">3</a>
                        </li>
                    </ul>
                </div>

               
                <!-- /.card-header -->
                
                <!-- /.card-body -->
            </div>

        </div>
    <!-- Featured Start -->

       <!-- Start Brands -->
       <section class="bg-light mt-2 py-5">
        <div class="container my-4">
            <div class="row text-center py-3">
                <div class="col-lg-6 m-auto">
                    <h1 class="h1">Toutes les marques</h1>
                </div>
                <div class="col-lg-9 m-auto tempaltemo-carousel">
                    <div class="row d-flex flex-row">
                        <!--Controls-->
                        <div class="col-1 align-self-center">
                            <a class="h1" href="#multi-item-example" role="button" data-bs-slide="prev">
                                <i class="text-light fas fa-chevron-left"></i>
                            </a>
                        </div>
                        <!--End Controls-->

                        <!--Carousel Wrapper-->
                        <div class="col">
                            <div class="carousel slide carousel-multi-item pt-2 pt-md-0" id="multi-item-example" data-bs-ride="carousel">
                                <!--Slides-->
                                <div class="carousel-inner product-links-wap" role="listbox">

                                    <!--First slide-->
                                    <div class="carousel-item active">
                                        <div class="row">
                                            @foreach (\App\Models\Marque::all() as $marque)
                                                    <div class="col-3 p-md-5">
                                                        <a href="#"><img class="img-fluid brand-img" src="{{url('images/marques/'.$marque->logo)}}" alt="Brand Logo"></a>
                                                    </div>
                                                @endforeach   
                                        </div>
                                    </div>
                                    <!--End First slide-->

                                    <!--Second slide-->
                                    <div class="carousel-item">
                                        <div class="row">
                                             @foreach (\App\Models\Marque::all() as $marque)
                                                    <div class="col-3 p-md-5">
                                                        <a href="#"><img class="img-fluid brand-img" src="{{url('images/marques/'.$marque->logo)}}" alt="Brand Logo"></a>
                                                    </div>
                                                @endforeach  
                                        </div>
                                    </div>
                                    <!--End Second slide-->

                                    <!--Third slide-->
                                    <div class="carousel-item">
                                        <div class="row">
                                        @foreach (\App\Models\Marque::all() as $marque)
                                                    <div class="col-3 p-md-5">
                                                        <a href="#"><img class="img-fluid brand-img" src="{{url('images/marques/'.$marque->logo)}}" alt="Brand Logo"></a>
                                                    </div>
                                                @endforeach  
                                        </div>
                                    </div>
                                    <!--End Third slide-->

                                </div>
                                <!--End Slides-->
                            </div>
                        </div>
                        <!--End Carousel Wrapper-->

                        <!--Controls-->
                        <div class="col-1 align-self-center">
                            <a class="h1" href="#multi-item-example" role="button" data-bs-slide="next">
                                <i class="text-light fas fa-chevron-right"></i>
                            </a>
                        </div>
                        <!--End Controls-->
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--End Brands-->


@endsection