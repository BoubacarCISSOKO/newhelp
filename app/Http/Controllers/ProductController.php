<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Categorie;
use App\Models\Souscategorie;
use App\Models\Marque;
use Illuminate\Http\Request;

use Intervention\Image\Facades\Image as Image;
use Illuminate\Support\Str;

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
        $souscategories = Souscategorie::all();
        return view('produits.create', compact('categories','marques','souscategories'));
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
        $product = new Product;
        $product->nom = $request->nom;
        $product->price = $request->price;
        $product->description = $request->description;
        if ($request->slug != null) {
            $product->slug = str_replace(' ', '-', $request->slug);
        }
        else {
            $product->slug = preg_replace('/[^A-Za-z0-9\-]/', '', str_replace(' ', '-', $request->nom)).'-'.Str::random(10);
        }
        

        if ($file = $request->file('image')) {

            $optimizeImage = Image::make($file);
            $optimizePath = public_path() . '/images/produits/';
            $image = time() . $file->getClientOriginalExtension();
            $optimizeImage->resize(200, 200, function ($constraint) {
                $constraint->aspectRatio();
            });
            $optimizeImage->save($optimizePath . $image, 90);

            $product->image = $image;
        }

        $product->categorie_id = $request->categorie_id;
        $product->souscategorie_id = $request->souscategorie_id;
        $product->marque_id = $request->marque_id;
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
