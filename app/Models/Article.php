<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;

    public function categorie(){
        return $this->belongsTo(Categorie::class,'categorie_id');  
     }

     public function souscategorie(){
        return $this->belongsTo(Souscategorie::class,'souscategorie_id');  
     }


   public function marques(){
      return $this->belongsTo(Marque::class, 'marque_id');
   }
}
