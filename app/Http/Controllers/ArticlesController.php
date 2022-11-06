<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Article;
use App\Models\Categorie;
use App\Models\Souscategorie;
use App\Models\Marque;

use Intervention\Image\Facades\Image as Image;
use Illuminate\Support\Str;

class ArticlesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        $articles = Article::orderBy('created_at', 'desc');
        $articles = $articles->paginate(15);
        return view('articles.index', compact('articles'));
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
        return view('articles.create', compact('categories','marques','souscategories'));
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

        $article = new Article;
        $article->name = $request->name;
        $article->price = $request->price;
        $article->categorie_id = $request->categorie_id;
        $article->souscategorie_id = $request->souscategorie_id;
        $article->marque_id = $request->marque_id;
        $article->description = $request->description;
        
        if ($file = $request->file('photo')) {

            $optimizeImage = Image::make($file);
            $optimizePath = public_path() . '/images/articles/';
            $image = time() . $file->getClientOriginalExtension();
            $optimizeImage->resize(200, 200, function ($constraint) {
                $constraint->aspectRatio();
            });
            $optimizeImage->save($optimizePath . $image, 90);

            $article->photo = $image;
        }

        $article->save(); 
        return redirect()->route('articles.index')->with('info', 'La catégorie a bien été créée');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $article  = Article::findOrFail($id);
        $categories = Categorie::all(); 
        $marques = Marque::all();
        $souscategories = Souscategorie::all();
        return view('articles.editview', compact('article','categories','marques','souscategories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //

        $article = Article::find($id);
        $article->name = $request->name;
        $article->price = $request->price;
        $article->categorie_id = $request->categorie_id;
        $article->souscategorie_id = $request->souscategorie_id;
        $article->marque_id = $request->marque_id;
        $article->description = $request->description;
        
        if ($file = $request->file('photo')) {

            $optimizeImage = Image::make($file);
            $optimizePath = public_path() . '/images/articles/';
            $image = time() . $file->getClientOriginalExtension();
            $optimizeImage->resize(200, 200, function ($constraint) {
                $constraint->aspectRatio();
            });
            $optimizeImage->save($optimizePath . $image, 90);

            $article->photo = $image;
        }

        $article->save(); 
        return redirect()->route('articles.index')->with('info', 'L\'article a bien été modifié');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $article =  Article::find($id);
        $article->delete();
        return redirect()->route('articles.index')->with('info', 'L\'article a bien été supprimé');

    }
}
