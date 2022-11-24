@extends('base')

@section('content')


<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.0/font/bootstrap-icons.css">
<div class="checkout-main-area pt-10 pb-5">
    <div class="container d-flex justify-content-center">
        <div class="your-order-area  bg-white" style="font-family:areal" >
            <h3>Votre commande a été bien passée.</h3>
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
            <div class="card">
                <div class="card-header bg-white">
                   <h4> Groupe Isep Shop vous recmercie!</h4>
                   <blockquote class="blockquote">
                        <p class="mb-0 card-title"class="text-capitalize">Un e-mail vous sera envoyé via l'adresse   <span class="text-lowercase text-danger"> <strong>{{ Auth::user()->email }}</strong> </span> <br> avec toutes ces informations.</p>
                        <hr>
                        <footer class="blockquote-footer card-text text-capitalize">Pour toute question ou information complémentaire,</footer>
                        <footer class="blockquote-footer card-text text-capitalize">merci de contacter notre <cite title="support client">support client.</cite></footer>
                        <hr>
                        <a href="{{route('home')}} " class="btn bg-mody"><strong><i class="bi bi-arrow-left-circle"></i> Retour au catalogue</strong></a>
                    </blockquote>
                </div>
            </div>
        </div> 
    </div>
</div>
@endsection