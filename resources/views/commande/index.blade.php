@extends('base')

@section('content')

<div class="checkout-main-area pt-20 pb-120">
    <div class="container">  
        <div class="checkout-wrap pt-30 card p-4">
            <form action="{{ route('commande.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                <div class="row">
                    <div class="col-lg-7">
                        <div class="billing-info-wrap mr-50">
                            <h3>DÉTAILS DE LA FACTURATION</h3>
                        
                                <div class="row">
                                    <div class="col-lg-6 col-md-6">
                                        <div class="billing-info mb-20">
                                            <label>Prénom <abbr class="required" title="required">*</abbr></label>  
                                            <input id="prenom" type="text" class="form-control @error('prenom') is-invalid @enderror" name="prenom" value="{{ old('prenom') }}" placeholder="Votre prénom" required autocomplete="prenom" autofocus>   
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6">
                                        <div class="billing-info mb-20">
                                            <label>Nom <abbr class="required" title="required">*</abbr></label>
                                            <input id="nom" type="text" class="form-control @error('nom') is-invalid @enderror" name="nom" value="{{ old('nom') }}" placeholder="Votre nom" required autocomplete="nom" autofocus>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-md-12">
                                        <div class="billing-info mb-20">
                                            @if (Route::has('login'))
                                                @auth
                                                <label>Email Address <abbr class="required" title="required">*</abbr></label>
                                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ auth()->user()->email }}" placeholder="Votre adresse E-mail" required autocomplete="email">                                                
                                                @else
                                                <label>Email Address <abbr class="required" title="required">*</abbr></label>
                                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="Votre adresse E-mail" required autocomplete="email">
                                                @endauth
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="billing-info mb-20">
                                            <label>Ville<abbr class="required" title="required">*</abbr></label>
                                            <input id="city" type="text" class="form-control @error('city') is-invalid @enderror" name="city" value="{{ old('city') }}" placeholder="Votre ville" required autocomplete="city" autofocus>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="billing-info mb-20">
                                            <label>Pays <abbr class="required" title="required">*</abbr></label>
                                            <input id="country" type="text" class="form-control @error('country') is-invalid @enderror" name="country" value="{{ old('country') }}" placeholder="Votre pays" required autocomplete="country" autofocus>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="billing-info mb-20">
                                            <label>Adresse <abbr class="required" title="required">*</abbr></label>
                                            <input id="address" type="text" class="form-control @error('address') is-invalid @enderror" name="address" value="{{ old('address') }}" placeholder="Votre adresse" required autocomplete="address" autofocus>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="billing-info mb-20">
                                            <label>Téléphone <abbr class="required" title="required">*</abbr></label>
                                            <input id="phone" type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}" placeholder="Votre numéro de téléphone" required autocomplete="phone" autofocus>
                                        </div>
                                    </div>
                                </div>
                        </div>
                    </div>
                    <div class="col-lg-5">
                        <div class="your-order-area">
                            <h3>VOTRE COMMANDE</h3>
                            <div class="your-order-wrap gray-bg-4">
                                <div class="your-order-info-wrap">
                                    <div class="your-order-info">
                                        <ul>
                                            <li>Produits <span>Total</span></li>
                                        </ul>
                                    </div>
                                    <div class="your-order-middle">
                                        @foreach($cartCollection as $item)
                                        <ul>
                                            <li>{{ $item['name'] }} ({{ $item->quantity }} @if($item->quantity > 1) exemplaires) @else exemplaire) @endif
                                                <span> {{number_format(\Cart::get($item->id)->getPriceSum()) }} Fcfa <br>
                                                    {{--<b>With Discount: </b>{{ \Cart::get($item->id)->getPriceSumWithConditions() }} Fcfa--}} </span>
                                            </li>
                                        
                                        </ul>
                                        @endforeach
                                    </div>
                                    <div class="your-order-info order-subtotal">
                                        <ul>
                                            <li>Total Hors Tax<span>{{number_format(\Cart::getTotal()) }} Fcfa  </span></li>
                                            <li>TVA<span>18%</span></li>
                                        </ul>
                                    </div>
                                    <div class="your-order-info order-shipping">
                                        <ul>
                                            <li>LIVRAISON <p>Entrez votre adresse complète </p>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="your-order-info order-total">
                                        <ul>
                                            <li>Total TTC <span>{{number_format(\Cart::getTotal()) }} Fcfa </span></li>
                                        </ul>
                                    </div>
                                    
                                    <div class="card mb-4 mb-lg-0">
                                        <div class="card-body">
                                            <p><strong>Moyens de paiements</strong></p>
                                            <input id="payment_method_1" class="input-radio" type="radio" value="PostePay" checked="checked" name="payment_method">

                                            <img class="me-2" width="45px"
                                            src="{{url('images/2 (2).png')}}"
                                            alt="Visa" />
                                            <input id="payment_method_1" class="input-radio" type="radio" value="PostePay" checked="checked" name="payment_method">

                                            <img class="me-2" width="45px"
                                            src="{{url('images/2 (3).png')}}"
                                            alt="American Express" />
                                            <input id="payment_method_1" class="input-radio" type="radio" value="PostePay" checked="checked" name="payment_method">

                                            <img class="me-2" width="45px"
                                            src="{{url('images/2 (1).png')}}"
                                            alt="Mastercard" />
                                            
                                        </div>
                                    </div>

                                    <button type="submit" class="btn btn-primary btn-lg btn-block m-2">
                                        Passer la commande
                                    </button>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                </div>
               
            </form>
        </div>
    </div>
</div>
@endsection
