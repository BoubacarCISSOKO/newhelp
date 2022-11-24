  <!-- Start Content -->
  <div class="container py-5">
        <div class="row">

            <div class="col-lg-3">
                <h1 class="h2 pb-4">Categories</h1>
                <ul class="list-unstyled templatemo-accordion">
                    <li class="pb-3">
                    @foreach (\App\Models\Categorie::all() as $category)
                    <a class="collapsed d-flex justify-content-between h3 text-decoration-none" href="#">
                            {{$category->nom}}
                            <i class="fa fa-fw fa-chevron-circle-down mt-1"></i>
                        </a>
                        
                    @endforeach
                    </li>
                    
                </ul>
            </div>

            <div class="col-lg-9">
                  <!-- Start Banner Hero -->
                <div id="template-mo-zay-hero-carousel" class="carousel slide" data-bs-ride="carousel">
                    <ol class="carousel-indicators">
                        <li data-bs-target="#template-mo-zay-hero-carousel" data-bs-slide-to="0" class="active"></li>
                        <li data-bs-target="#template-mo-zay-hero-carousel" data-bs-slide-to="1"></li>
                        <li data-bs-target="#template-mo-zay-hero-carousel" data-bs-slide-to="2"></li>
                    </ol>
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <div class="container">
                                <div class="row p-5">
                                    <div class="mx-auto col-md-8 col-lg-6 order-lg-last">
                                        <img class="img-fluid" src="{{url('images/1 (3).png')}}" alt="Image">
                                    </div>
                                    <div class="col-lg-6 mb-0 d-flex align-items-center">
                                        <div class="text-align-left align-self-center">
                                            <h1 class="h1 text-success"><b>Zay</b> eCommerce</h1>
                                            <h3 class="h2">Tiny and Perfect eCommerce Template</h3>
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <div class="container">
                                <div class="row p-5">
                                    <div class="mx-auto col-md-8 col-lg-6 order-lg-last">
                                        <img class="img-fluid" src="{{url('images/1 (2).png')}}" alt="Image">
                                    </div>
                                    <div class="col-lg-6 mb-0 d-flex align-items-center">
                                        <div class="text-align-left">
                                            <h1 class="h1">Proident occaecat</h1>
                                            <h3 class="h2">Aliquip ex ea commodo consequat</h3>
                                           
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <div class="container">
                                <div class="row p-5">
                                    <div class="mx-auto col-md-8 col-lg-6 order-lg-last">
                                        <img class="img-fluid" src="{{url('images/1 (1).png')}}" alt="Image">
                                    </div>
                                    <div class="col-lg-6 mb-0 d-flex align-items-center">
                                        <div class="text-align-left">
                                            <h1 class="h1">Repr in voluptate</h1>
                                            <h3 class="h2">Ullamco laboris nisi ut </h3>
                                          
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <a class="carousel-control-prev text-decoration-none w-auto ps-3" href="#template-mo-zay-hero-carousel" role="button" data-bs-slide="prev">
                        <i class="fas fa-chevron-left"></i>
                    </a>
                    <a class="carousel-control-next text-decoration-none w-auto pe-3" href="#template-mo-zay-hero-carousel" role="button" data-bs-slide="next">
                        <i class="fas fa-chevron-right"></i>
                    </a>
                </div>
                <!-- End Banner Hero -->
            </div>
        </div>
    </div>