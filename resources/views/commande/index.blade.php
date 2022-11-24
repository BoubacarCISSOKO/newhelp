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
                                    
                                </div>
                            </div>
                            
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="payment-method">
                            <h4 class="grand-totall-title">Moyens de paiements</span></h4>
                                                        
                            
                            <div class="pay-top sin-payment">
                                <input id="payment_method_1" class="input-radio" type="radio" value="PostePay" checked="checked" name="payment_method">
                                <label for="payment_method_1"> Poste Pay </label>
                                <div class="payment-box payment_method_bacs">
                                    <p>Effectuez votre paiement directement sur notre compte bancaire. Veuillez utiliser votre ID de commande comme référence de paiement.</p>                                            
                                </div>
                            </div>
                            <div class="pay-top sin-payment">
                                <input id="payment-method-2" class="input-radio" type="radio" value="Wari" name="payment_method">
                                <label for="payment-method-2">Wari</label>
                                <div class="payment-box payment_method_bacs">
                                    <p style="font-family: times, serif; font-size:14pt; font-style:italic">
                                        Payer facilement les bénéficiaires et les travailleurs, même lorsqu'il n'y a pas de banque
                                    </p>
                                </div>
                            </div>
                            <div class="pay-top sin-payment">
                                <input id="payment-method-3" class="input-radio" type="radio" value="OrangeMoney" name="payment_method">
                                <label for="payment-method-3">Orange Money</label>
                                <div class="payment-box payment_method_bacs">
                                    <p style="font-family: times, serif; font-size:14pt; font-style:italic">Payez simplement vos achats avec Orange Money. <br>
                                        Vous devez pour cela obtenir un code de paiement: <br>
                                        - Composez le #144#391# <br>
                                        - Entrez votre code secret Orange Money <br>
                                        - Vous recevez ensuite un SMS avec un code de paiement utilisable pendant 15 minutes. <br>
                                        - Conservez ce code. Il vous sera demandé pour régler votre commande par la suite. <br>
                                        - Cliquez pour revenir sur le site PostMarket une fois votre paiement terminé, dans le cas contraire, votre paiement ne sera pas enregistré.
                                    </p>
                                </div>
                            </div>
                            <div class="pay-top sin-payment">
                                <input id="payment-method-3" class="input-radio" type="radio" value="Wave" name="payment_method">
                                <label for="payment-method-3"> Wave</label>
                                <div class="payment-box payment_method_bacs">
                                    <p style="font-family: times, serif; font-size:14pt; font-style:italic">
                                    Déposez et retirez gratuitement. <br>
                                    Payez vos factures sans frais. <br>
                                    Transferez de l’argent pour 1%.
                                    </p>
                                </div>
                            </div>
                            <div class="pay-top sin-payment">
                                <input id="payment-method-3" class="input-radio" type="radio" value="PaiementALaLivraison" name="payment_method">
                                <label for="payment-method-3">Paiement à la livraison</label>
                                <div class="payment-box payment_method_bacs">
                                    <p style="font-family: times, serif; font-size:14pt; font-style:italic">
                                    Lors de la finalisation de la commande, sélectionnez simplement l'option "Espèces à la livraison" comme moyen de paiement. <br>
                                    Si vous n'êtes pas satisfait(e) de votre commande, vous avez toujours la possibilité de la rendre à notre livreur sans payer.
                                    </p>
                                </div>
                            </div>
                            <div class="pay-top sin-payment sin-payment-3">
                                <input id="payment-method-4" class="input-radio" type="radio" value="Virement" name="payment_method">
                                <label for="payment-method-4">VIREMENT</label>
                                <div class="payment-box payment_method_bacs">
                                    <p style="font-family: times, serif; font-size:14pt; font-style:italic">
                                    Au guichet : En vous présentant au guichet de votre banque avec votre pièce d’identité et les informations bancaires du débiteur et du bénéficiaire.
                                    </p>
                                </div>
                            </div>
                        </div>

                        <div class="Place-order">
                                <button type="submit" class="button bg-mody"> Passer la commande</button>   
                            </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
