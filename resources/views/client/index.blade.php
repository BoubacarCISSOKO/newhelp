@extends('incs.navslider')

@section('content')


<!-- my account wrapper start -->
<div class="my-account-wrapper pt-5 pb-50">
    <div class="container card p-4">
        <div class="row">
            <div class="col-lg-12">
                <!-- My Account Page Start -->
                <div class="myaccount-page-wrapper">
                    <!-- My Account Tab Menu Start -->
                    <div class="row">
                        <div class="col-lg-3 col-md-4">
                            <div class="myaccount-tab-menu nav" role="tablist">
                                <a href="#dashboad" class="active" data-toggle="tab"><i class="fa fa-dashboard"></i>
                                    Tableau de bord</a>
                                <a href="#orders" data-toggle="tab"><i class="fa fa-cart-arrow-down"></i> Commandes</a>
                              
                                
                                <a href="#payment-method" data-toggle="tab"><i class="fa fa-credit-card"></i> Méthode de paiement</a>
                                <a href="#address-edit" data-toggle="tab"><i class="fa fa-map-marker"></i> Addresses</a>
                                <a href="#account-info" data-toggle="tab"><i class="fa fa-user"></i>Details du compte</a>
                                <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                                     <i class="fa fa-sign-out"></i> se deconnecter</a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                            </div>
                        </div>
                        <!-- My Account Tab Menu End -->
                        <!-- My Account Tab Content Start -->
                        <div class="col-lg-9 col-md-8">
                            <div class="tab-content" id="myaccountContent">
                                <!-- Single Tab Content Start -->
                                <div class="tab-pane fade show active" id="dashboad" role="tabpanel">
                                    <div class="myaccount-content">
                                        <h3>Tableau de bord de l'utilisateur</h3>
                                        <div class="welcome">
                                            @if (Session::has('info'))
                                                <div class="alert alert-success text-center">
                                                    <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
                                                    <p>{{ Session::get('info') }}</p>
                                                </div>
                                            @endif
                                            <p>Bonjour, <strong>{{ Auth::user()->nom }}</strong> (Si non <strong> {{ Auth::user()->nom }} !</strong><a href="{{ route('logout') }}" class="logout"> Se déconnecter</a>)</p>
                                        </div>

                                        <p class="mb-0">
                                            Depuis le tableau de bord de votre compte. Vous pouvez facilement vérifier et afficher vos commandes récentes, gérer vos adresses de livraison et de facturation et modifier vos informations personnelles de votre compte.
                                        </p>
                                    </div>
                                </div>
                                <!-- Single Tab Content End -->
                                <!-- Single Tab Content Start -->
                                <div class="tab-pane fade" id="orders" role="tabpanel">
                                    <div class="myaccount-content">
                                        <h3>Mes commandes</h3>
                                        <div class="myaccount-table table-responsive text-center">
                                            <table class="table table-bordered">
                                                <thead class="thead-light">
                                                    <tr>
                                                        <th>numéro de commande</th>
                                                        <th>Date</th>
                                                        <th>Status</th>
                                                        <th>Total</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @forelse ($orders as $order)
                                                        <tr>
                                                            <th>{{ $order->order_number }}</th>
                                                            <td>{{ $order->created_at->format('d-m-Y  H:i:s')}}</td>
                                                            <td>{{ $order->status }}</td>
                                                            <td>{{ config('settings.currency_symbol') }}{{ round($order->grand_total, 0) }} Fcfa</td>
                                                            <td><a href="cart.html" class="btn btn-xs bg-mody" title="Voir détails"><i class="fa fa-eye" aria-hidden="true"></i></a></td>
                                                        </tr>
                                                    @empty
                                                        <div class="col-sm-12">
                                                            <p class="alert alert-warning">Aucune commande à afficher.</p>
                                                            <div class="cart-shiping-update m-2">
                                                                <a href="{{route('boutique')}}" class="btn bg-mody" style="color:white">Faites vos achats</a>
                                                            </div>
                                                        </div>
                                                    @endforelse
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <!-- Single Tab Content End -->
                                <!-- Single Tab Content Start -->
                                <div class="tab-pane fade" id="download" role="tabpanel">
                                    <div class="myaccount-content">
                                        <h3>Téléchargement</h3>
                                        <div class="myaccount-table table-responsive text-center">
                                            <table class="table table-bordered">
                                                <thead class="thead-light">
                                                    <tr>
                                                        <th>N° de référence</th>
                                                        <!-- <th>Nom du produit</th> -->
                                                        <th>Télécharger</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                               a venir
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <!-- Single Tab Content End -->
                                <!-- Single Tab Content Start -->
                                <div class="tab-pane fade" id="payment-method" role="tabpanel">
                                    <div class="myaccount-content">
                                        <h3>Moyen de paiement</h3>
                                        <p class="saved-message">Vous ne pouvez pas encore enregistrer votre mode de paiement.</p>
                                    </div>
                                </div>
                                <!-- Single Tab Content End -->
                                <!-- Single Tab Content Start -->
                                <div class="tab-pane fade" id="address-edit" role="tabpanel">
                                    <div class="myaccount-content">
                                        <h3>Adresse de facturation</h3>
                                        <address>
                                            <p><strong> {{  $order->prenom }} {{  $order->nom }}</strong></p>
                                            <p>Adresse: {{ $order->address }}<br>Ville: {{ $order->city }} <br>Pays: {{ $order->country }}</p>
                                            <p>Mobile: {{ $order->phone }}</p>
                                       
                                            
                                        </address>
                                        <!-- <a href="#" class="check-btn sqr-btn "><i class="fa fa-edit"></i> Modifier l'adresse</a> -->
                                    </div>
                                </div>
                                <!-- Single Tab Content End -->
                                <!-- Single Tab Content Start -->
                                <div class="tab-pane fade" id="account-info" role="tabpanel">
                                    <div class="myaccount-content">
                                        <h3>Details du compte</h3>
                                        <div class="account-details-form">
                                            <form  method="POST" action="{{ route('client.update') }}">
                                                @csrf
                                                {{ method_field('PUT') }}

                                                <div class="row">
                                                    <div class="col-lg-6">
                                                        <div class="single-input-item">
                                                            <label for="inputName">Prénom</label>
                                                            <input style="font-size:15px" type="text" id="inputName" class="form-control @error('prenomnom') is-danger @enderror" name="prenom" value="{{ old('prenom',$user->prenom) }}">
                                                            @error('prenom')
                                                                <p class="help is-danger">{{ $message }}</p>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <div class="single-input-item">
                                                            <label for="nom">Nom</label>
                                                            <input style="font-size:15px" type="text" id="nom" class="form-control @error('nom') is-danger @enderror" name="nom" value="{{ old('nom',$user->nom) }}">
                                                            @error('nom')
                                                                <p class="help is-danger">{{ $message }}</p>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="single-input-item">
                                                    <label for="nom">E-mail</label>
                                                    <input style="font-size:15px" type="text" id="email" class="form-control @error('email') is-danger @enderror" name="email" value="{{ old('email',$user->email) }}">
                                                    @error('nom')
                                                        <p class="help is-danger">{{ $message }}</p>
                                                    @enderror
                                                </div>
                                                
                                                
                                                <div class="single-input-item">
                                                    <button class="check-btn sqr-btn ">Sauvegarder les modifications</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div> <!-- Single Tab Content End -->
                            </div>
                        </div> <!-- My Account Tab Content End -->
                    </div>
                </div> <!-- My Account Page End -->
            </div>
        </div>
    </div>
</div>
@endsection