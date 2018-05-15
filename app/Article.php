<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Mail;
use \App\Mail\Mymail;
use Illuminate\Support\Facades\Auth;


class Article extends Model
{
    public $primaryKey = 'article_id';


    public function category(){
        return $this->belongsTo(Article_categorie::class,"category_id");
    }

    public function save(array $options = [])
    {
        // If no author has been assigned, assign the current user's id as the author of the post
        if (!$this->admin_id && Auth::user()) {
            $this->admin_id = Auth::user()->id;
        }

        parent::save();
        
        $this->slug = str_slug(date('Y-m-d-H-s').'-'.$this->article_id);
        
        parent::save();

        Mail::to("mamado.amine.nihon@gmail.com")->send(new Mymail($this));
                
    }

    public function authorId()
    {
        return $this->belongsTo(Admin::class, 'admin_id');
    }

}
