<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produit;
use App\Models\Categorie;
use App\Models\Souscategorie;
use App\Models\Marque;
use Intervention\Image\Facades\Image as Image;
use Illuminate\Support\Str;
use Auth;

class MarqueController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $marques = Marque::orderBy('created_at', 'desc');
        $marques = $marques->paginate(15);
        return view('marques.index', compact('marques'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('marques.create');
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

        $marque = new Marque;
        $marque->nom = $request->nom;
        $marque->description = $request->description;
        if ($request->slug != null) {
            $marque->slug = str_replace(' ', '-', $request->slug);
        }
        else {
            $marque->slug = preg_replace('/[^A-Za-z0-9\-]/', '', str_replace(' ', '-', $request->nom)).'-'.Str::random(10);
        }
        

        if ($file = $request->file('logo')) {

            $optimizeImage = Image::make($file);
            $optimizePath = public_path() . '/images/marques/';
            $image = time() . $file->getClientOriginalExtension();
            $optimizeImage->resize(200, 200, function ($constraint) {
                $constraint->aspectRatio();
            });
            $optimizeImage->save($optimizePath . $image, 90);

            $marque->logo = $image;
        }

        $marque->save(); 
        return redirect()->route('marques.index')->with('info', 'La catégorie a bien été créée');

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
