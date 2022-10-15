<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categorie;

use Intervention\Image\Facades\Image as Image;
use Illuminate\Support\Str;

class CategorieController extends Controller
{

   
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $categories = Categorie::orderBy('created_at', 'desc');
        $categories = $categories->paginate(15);
        return view('categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $categorie = new Categorie;
        $categorie->nom = $request->nom;
        $categorie->description = $request->description;
        if ($request->slug != null) {
            $categorie->slug = str_replace(' ', '-', $request->slug);
        }
        else {
            $categorie->slug = preg_replace('/[^A-Za-z0-9\-]/', '', str_replace(' ', '-', $request->nom)).'-'.Str::random(10);
        }
        

        if ($file = $request->file('image')) {

            $optimizeImage = Image::make($file);
            $optimizePath = public_path() . '/images/categories/';
            $image = time() . $file->getClientOriginalExtension();
            $optimizeImage->resize(200, 200, function ($constraint) {
                $constraint->aspectRatio();
            });
            $optimizeImage->save($optimizePath . $image, 90);

            $categorie->image = $image;
        }

        $categorie->save(); 
        return redirect()->route('categories.index')->with('info', 'La catégorie a bien été créée');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Categorie $category)
    {
        //
        return view('categories.voir', compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Categorie $category)
    {
        //
        return view('categories.modifier', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Categorie $category) 
    {
        $category->nom = $request->nom;
        $category->description = $request->description;
        if ($request->slug != null) {
            $category->slug = str_replace(' ', '-', $request->slug);
        }
        else {
            $category->slug = preg_replace('/[^A-Za-z0-9\-]/', '', str_replace(' ', '-', $request->nom)).'-'.Str::random(10);
        }
        if($request->hasFile('image')){
            $category->image = $request->file('image')->store('images/categories');
           
        }
        $category->save();
        return redirect()->route('categories.index')->with('info', 'La catégorie a bien été modifiée');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Categorie $category)
    {
        //
        if (count($category->souscategories) > 0 || count($category->products) > 0 ) {
            return back()->with('error', 'Impossible de supprimer cette categorie. Merci de la vider d\'abord!!!.');
        }elseif($category->delete()){
            # code...
            return back()->with('info', 'La catégorie a bien été supprimée.');
        }
    }

   /*  public function forceDestroy($id)
    {
        Categorie::withTrashed()->whereId($id)->firstOrFail()->forceDelete();

        return back()->with('info', 'La categorie a bien été supprimée définitivement dans la base de données.');
    }

    public function restore($id)
    {
        Categorie::withTrashed()->whereId($id)->firstOrFail()->restore();

        return back()->with('info', 'La categorie a bien été restaurée.');
    } */

    public function updateFeatured(Request $request)
    {
        $categorie = Categorie::findOrFail($request->id);
        $categorie->featured = $request->status;
        if($categorie->save()){
            return 1;
        }
        return 0;
    }

    // the $category model variable is automatically injected and is a retrieved dataset from your database
    public function getSubcategories(Categorie $category) { 

        $subcategories = $category->souscategories
        ->pluck('nom', 'id')->all();
    
        return response()->json($subcategories);
    }
    

}
