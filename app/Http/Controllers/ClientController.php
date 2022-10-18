<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Article;
class ClientController extends Controller
{
    //
    public function index(Request $request)
    {
        //
        
        $orders = $request->user()->orders()->get();
        
        return view('client.index',compact('orders'), ['user' => $request->user()]);
    }
    
    public function update(Request $request)
    {
        $user = $request->user();
        $request->validate([
            'prenom' => 'required|string|max:255',
            'nom' => 'required|string|max:255',
            'email' => 'required|string|max:255|unique:users,email,' . $user->id,
        ]);
        $user->update($request->all());
        return back()->with('info', 'Profil bien modifié');
    }

    
}
