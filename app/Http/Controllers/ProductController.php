<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Categorie;
use App\Models\Souscategorie;
use App\Models\Marque;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Auth;

class ProductController extends Controller
{
     /* 
     *authentification obligatoire
     */

    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $products = Product::orderBy('created_at', 'desc');
        $products = $products->paginate(15);
        return view("produits.index", compact("products"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $categories = Categorie::all();
        $marques = Marque::all();
        return view('produits.create', compact('categories','marques'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required',
            'weight' => 'required',
            'categorie_id'=> 'required',
            'souscategorie_id' => 'required',
            'marque_id' => 'required',
            'quantity'=>'required',
            'description' => 'required',
        ]);
        $product = new Product;
        $product->name = $request->name;
        $product->price = $request->price;
        $product->weight = $request->weight;
        $product->added_by = $request->added_by;
        $product->user_id = Auth::user()->id;
        $product->categorie_id = $request->categorie_id;
        $product->souscategorie_id = $request->souscategorie_id;
        $product->marque_id = $request->marque_id;
        $product->quantity = $request->quantity;
        $product->description = $request->description;

        if($request->hasFile('image')){
            $product->image = $request->image->store('images/products/images');
        }
        $product->slug = preg_replace('/[^A-Za-z0-9\-]/', '', str_replace(' ', '-', $request->nom)).'-'.Str::random(10);
        
        $product->save();
        return redirect()->route('products.index')->with('info', 'Le produit a bien été crée');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        //
        $categories = Categorie::all();
        $marques = Marque::all();
        return view('products.modifier', compact('product','categories', 'marques'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        //
        $product->nom = $request->nom;
        $product->user_id = Auth::user()->id;
        $product->added_by = $request->added_by;
        $product->categorie_id = $request->categorie_id;
        $product->souscategorie_id = $request->souscategorie_id;
        $product->soussouscategorie_id = $request->soussouscategorie_id;
        $product->marque_id = $request->marque_id;
        $product->prix_unitaire = $request->prix_unitaire;
        $product->prix_achat = $request->prix_achat;
        $product->description = $request->description;
        $product->stocks = $request->stocks;
        $product->unite = $request ->unite;
        $product->remise = $request->remise;
        $product->type_remise = $request->type_remise;
        $product->taxe = $request->taxe;
        $product->type_taxe = $request->type_taxe;
        $product->tags = implode('|',$request->tags);
        $product->stocks = $request->stocks;
       
       
        $product->type_livraison = $request->type_livraison;
        if($request->type_livraison == "gratuit")
        {
            $product->cout_livraison = 0;
        }
        elseif($request->type_livraison == "payant")
        {
            $product->cout_livraison = $request->cout_livraison;
        }

        if($request->hasFile('image')){
            $product->image = $request->image->store('images/products/images');
        }

        $product->slug = preg_replace('/[^A-Za-z0-9\-]/', '', str_replace(' ', '-', $request->nom)).'-'.Str::random(10);

       
        
        $product->save();
        return redirect()->route('products.index')->with('info', 'Le produit a bien été modifié');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $product = Product::findOrFail($id);
        if(Product::destroy($id)){
            // if($product->image != null){
            //     //unlink($product->image);
            // }
            // foreach (json_decode($product->photos) as $key => $photo) {
            //     //unlink($photo);
            // }
            return redirect()->route('products.index')->with('success','Produit supprimé avec succès '); 
        }
        else{
            return back()->with('error', 'Echec de de Suppression. Merci de reéssayer');
        }
    }

  

    /* Mise a publication du produit */
    public function updatePublished(Request $request)
    {
        $product = Product::findOrFail($request->id);
        $product->published = $request->status;
        if($product->save()){
            return 1;
        }
        return 0;
    }

    /* Mise a jour produit en vedette */
    public function updateFeatured(Request $request)
    {
        $product = Product::findOrFail($request->id);
        $product->featured = $request->status;
        if($product->save()){
            return 1;
        }
        return 0;
    }

}
