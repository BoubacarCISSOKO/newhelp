@extends('base')

@section('content')

<style>
    .position-relative{
        
        border-bottom-right-radius: 15px;
        background-color: #92959a;
    }
</style>
    <!-- Featured Start -->
    <div class="container-fluid pt-5">
        <div class="row px-xl-5 pb-1">
            <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
                <div class="d-flex align-items-center border mb-4" style="padding: 30px;">
                    <h1 class="fa fa-check text-primary m-0 mr-3"></h1>
                    <h5 class="font-weight-semi-bold m-0 text-white">Quality Product</h5>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
                <div class="d-flex align-items-center border mb-4" style="padding: 30px;">
                    <h1 class="fa fa-shipping-fast text-primary m-0 mr-2"></h1>
                    <h5 class="font-weight-semi-bold m-0 text-white">Free Shipping</h5>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
                <div class="d-flex align-items-center border mb-4" style="padding: 30px;">
                    <h1 class="fas fa-exchange-alt text-primary m-0 mr-3"></h1>
                    <h5 class="font-weight-semi-bold m-0 text-white">14-Day Return</h5>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
                <div class="d-flex align-items-center border mb-4" style="padding: 30px;">
                    <h1 class="fa fa-phone-volume text-primary m-0 mr-3"></h1>
                    <h5 class="font-weight-semi-bold m-0 text-white">24/7 Support</h5>
                </div>
            </div>
        </div>

        <div class="container">
            <div class="row px-xl-5 pb-3 position-relative text-center text-md-right text-white mb-1 py-5 px-5">
               
                <div class="col-lg-2 col-md-6 col-sm-6 col-12">
                    <div class="product-categories-wrap product-categories-border mb-15">
                        <blockquote class="blockquote" style="text-align: center;">
                        <a href="#">
                            <img class="margin-right-15 width-hight" width="95" height="95" align="left" src=""
                            title="#">
                        </a>
                        </blockquote>
                    </div>
                </div>
               
                
            </div>
            
        </div>
    </div>
    <!-- Featured End -->

     <!-- Footer Start -->
     <div class="container-fluid bg-secondary mt-1 pt-1">
        <div class="row border-top border-light mx-xl-5 py-4">
            <div class="col-md-6 px-xl-0">
                <p class="mb-md-0 text-center text-md-left">
                    &copy; <a class="font-weight-semi-bold text-white" href="#">Your Site Name</a>. All Rights Reserved. Designed
                    by
                    <a class="font-weight-semi-bold" href="https://htmlcodex.com">HTML Codex</a><br>
                    Distributed By <a href="https://themewagon.com" target="_blank">ThemeWagon</a>
                </p>
            </div>
            <div class="col-md-6 px-xl-0 text-center text-md-right">
                <img class="img-fluid" src="img/payments.png" alt="">
            </div>
        </div>
    </div>
    <!-- Footer End -->

@endsection