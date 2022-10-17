<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Cart;
class CartController extends Controller
{
    public function cartList()
    {
        $cartItems = \Cart::getContent();
        // dd($cartItems);
        return view('cart', compact('cartItems'));
    }


    public function addToCart(Request $request)
    {
        \Cart::add([
            'id' => $request->id,
            'name' => $request->name,
            'price' => $request->price,
            'quantity' => $request->quantity,
            'attributes' => array(
                'image' => $request->image,
            )
        ]);

        return redirect()->route('cart.list')->with('success', 'ajouté dans le panier avec succes !');
    }

    public function updateCart(Request $request)
    {
        \Cart::update(
            $request->id,
            [
                'quantity' => [
                    'relative' => false,
                    'value' => $request->quantity
                ],
            ]
        );

        return redirect()->route('cart.list')->with('success', 'modifié dans le panier avec succes !');
    }

    public function removeCart(Request $request)
    {
        \Cart::remove($request->id);
        return redirect()->route('cart.list')->with('success', 'supprimé dans le panier !');
    }

    public function clearAllCart()
    {
        \Cart::clear();

        return redirect()->route('cart.list')->with('info', 'panier vidé!');
    }
}