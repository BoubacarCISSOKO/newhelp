@extends('base')

@section('content')

<style>
    .position-relative{
        
        border-radius: 15px;
        background-color: #bcbcbc;
    }
</style>
    <!-- Featured Start -->
    <div class="container">
        <div class="row px-xl-5 pb-3 position-relative text-white mb-1 py-5 px-5">
         
            <dl class="row">
                <dt class="col-sm-6">
                <img src="{{url('images/articles/'.$product->photo)}}" alt="" class="w-full max-h-60">
                <br>
                </dt>
                <dd class="col-sm-6">
                <h3 class="text-gray-700 uppercase">{{ $product->name }}</h3>
                    <span class="mt-2 text-gray-500">{{ $product->price }} fcfa</span>
                    <form action="{{ route('cart.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" value="{{ $product->id }}" name="id">
                        <input type="hidden" value="{{ $product->name }}" name="name">
                        <input type="hidden" value="{{ $product->price }}" name="price">
                        <input type="hidden" value="{{ $product->image }}"  name="image">
                        <input type="hidden" value="1" name="quantity">
                        <button class="px-4 py-2 text-black rounded">Ajouter au panier</button>
                    </form>
                </dd>
            </dl> 
        </div>  

    </div>
    <!-- Featured End -->
@endsection
