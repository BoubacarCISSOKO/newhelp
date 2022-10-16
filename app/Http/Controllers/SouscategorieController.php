<?php

namespace App\Http\Controllers;

use App\Models\Produit;
use App\Models\Categorie;
use App\Models\Souscategorie;
use App\Models\Marque;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Auth;

class SouscategorieController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        
        $souscategories =Souscategorie::orderBy('created_at', 'desc');
        $souscategories = $souscategories->paginate(15);
       
        return view('souscategories.index', compact('souscategories'));

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

        return view('souscategories.create', compact('categories'));
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
        $souscategorie = new Souscategorie;
        $souscategorie->nom = $request->nom;
        $souscategorie->parent_id = $request->parent_id;
        if ($request->slug != null) {
            $souscategorie->slug = str_replace(' ', '-', $request->slug);
        }
        else {
            $souscategorie->slug = preg_replace('/[^A-Za-z0-9\-]/', '', str_replace(' ', '-', $request->nom)).'-'.Str::random(10);
        }
        
        $souscategorie->save(); 
        return redirect()->route('souscategories.index')->with('info', 'La sous catégorie a bien été créée');

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
    }
}
