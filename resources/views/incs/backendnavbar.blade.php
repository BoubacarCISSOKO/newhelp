<head>

  <!-- Libraries Stylesheet -->
  <link rel="stylesheet" href="{{ url('fronts/lib/owlcarousel/assets/owl.carousel.min.css') }}">

  <!-- css style -->
  <link rel="stylesheet" href="{{ url('fronts/css/style.css') }}">
  <link rel="stylesheet" href="{{ url('fronts/css/style.min.css') }}">

  <!-- google cdn -->
  <!-- Google Web Fonts -->
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet"> 

  <!-- Font Awesome -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">

</head>
<style>
  .mbayang{
    border-bottom: #fff 2px solid
  }
</style>
 <!-- Topbar Start -->
 <div class="container-fluid mbayang">

    <div class="row align-items-center py-1 px-xl-3">
        <div class="col-lg-3 d-none d-lg-block">
            <a href="{{route('home')}}"  class="text-decoration-none">
                <h3 class="m-0 display-5 font-weight-semi-bold"><span class="text-white font-weight-bold border px-3 mr-1">I</span>sep</h3>
            </a>
        </div>
        <div class="col-lg-6 col-6 text-left">
            <form action="">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Search for products">
                    <div class="input-group-append">
                        <span class="input-group-text bg-transparent text-white">
                            <i class="fa fa-search"></i>
                        </span>
                    </div>
                </div>
            </form>
        </div>
        <div class="col-lg-3 col-6 text-right">
            <a href="" class="btn border">
                <i class="fas fa-heart text-white"></i>
                <span class="badge">0</span>
            </a>
        </div>
    </div>
</div>
<!-- Topbar End -->


<!-- Navbar Start -->
<div class="container-fluid mb-5">
    <div class="row border-top px-xl-5">
        
        <div class="col-lg-12">
            <nav class="navbar navbar-expand-lg bg-light navbar-light py-3 py-lg-0 px-0">
                <a href="" class="text-decoration-none d-block d-lg-none">
                    <h1 class="m-0 display-5 font-weight-semi-bold"><span class="text-primary font-weight-bold border px-3 mr-1">E</span>Shopper</h1>
                </a>
                <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                    <div class="navbar-nav mr-auto py-0">
                        <a href="{{route('home')}}" class="nav-item nav-link active"> <i class="fas fa-home"></i> Accueil</a>
                        <a href="#" class="nav-item nav-link">Produits</a>
                    </div>
                    <div class="navbar-nav ml-auto py-0">
                        @if (Route::has('login'))
                            <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                                @auth
                                    <a href="{{ url('/') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Accueil</a>
                                @else
                                    <a href="{{ route('login') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Se connecter</a>

                                    @if (Route::has('register'))
                                        <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">S'inscrire</a>
                                    @endif
                                @endauth
                            </div>
                        @endif

                    </div>
                </div>
            </nav>
        </div>
    </div>
</div>
<!-- Navbar End -->
@yield('content')
<!-- Back to Top -->
<a href="#" class="btn btn-primary back-to-top"><i class="fa fa-angle-double-up text-white"></i></a>

<!-- JavaScript Libraries -->
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>

<link rel="stylesheet" href="{{ url('fronts/lib/owlcarousel/assets/owl.carousel.min.css') }}">
<script  src="{{ url('fronts/lib/owlcarousel/owl.carousel.min.js') }}"></script>
<script  src="{{ url('fronts/lib/easing/easing.min.js') }}"></script>

<!-- Template Javascript -->
<script  src="{{ url('fronts/js/main.js') }}"></script>