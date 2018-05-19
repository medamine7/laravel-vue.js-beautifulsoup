<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Match extends Model
{
      public function league(){
        return $this->belongsTo(Article_categorie::class,"league_id");
    }

}
