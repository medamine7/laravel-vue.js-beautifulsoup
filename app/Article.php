<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    public $primaryKey = 'article_id';


    public function category(){
        return $this->belongsTo(Article_categorie::class,"category_id");
    }

}
