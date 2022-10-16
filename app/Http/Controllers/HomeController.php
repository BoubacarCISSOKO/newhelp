<?php

namespace App\Http\Controllers;

use App\Models\Produit;
use App\Models\Article;
use App\Models\Categorie;
use App\Models\Souscategorie;
use App\Models\Marque;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Auth;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $articles = Article::orderBy('created_at', 'desc');
        $articles = $articles->paginate(15);
        return view('home', compact("articles"));
    }

    public function admindashbord()
    {
        $products = Produit::orderBy('created_at', 'desc');
        $products = $products->paginate(15);
        return view("admin.template", compact("products"));
    }
}
