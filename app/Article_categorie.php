<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article_categorie extends Model
{
    
    public $primaryKey = 'category_id';

    public function articles(){
        return $this->hasMany(Article::class);
    }
}
