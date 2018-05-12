<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\Process\Exception\ProcessFailedException;
use Symfony\Component\Process\Process;
use App\Article;
use App\Article_categorie;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        // $rank_script ='"'.storage_path("app/scripts/scrapScriptRank.py").'"';        
        // exec ("python $rank_script", $output,$return);
        
        // //  Return will return non-zero upon an error
        // if (!$return) {
        //    //
        // } else {
        //     echo "problem detected, Baladi!";
        //     die();
        // }
        
        
        $botola_rank = File::get("Botola_Rank.json");
        $pl_rank = File::get("PL_Rank.json");
        $laliga_rank = File::get("LaLiga_Rank.json");
        $seriea_rank = File::get("SerieA_Rank.json");

        
        
        
        $locale=app()->getLocale();
        $articles = Article::orderBy("created_at","desc")
        ->where("type","text")
        ->where("lang",$locale)
        ->take(22)
        ->get();
        $articles->map(function($article,$index){
            $article->category;
            $article->category->category_name=(app()->getLocale()=='ar') ? $article->category->category_name_ar : $article->category->category_name_en;      
            $article->date = date("d/m/Y", strtotime($article->created_at));
            $article->time = date("H:i", strtotime($article->created_at));

            $article->image=substr($article->image,0,-4)."-cropped".substr($article->image,-4);
        });
        
        $more_articles=$articles->splice(14);
        return view('index', compact('articles','more_articles','pl_rank','seriea_rank','laliga_rank','botola_rank','titles'))->with("category",'all');
    }

    public function getArticle($idc,$slug){

        $locale=app()->getLocale();
        $article = Article::where('slug',$slug)->first();
        $article->image=substr($article->image,0,-4)."-cropped".substr($article->image,-4);        
        $article->category->category_name=(app()->getLocale()=='ar') ? $article->category->category_name_ar : $article->category->category_name_en;                  
        $suggestions = Article::orderBy("created_at","desc")
        ->where("slug",'!=',$slug)
        ->where("type","text")
        ->where("lang",$locale)
        ->take(4)
        ->get();
        $suggestions->map(function($article,$index){
            $article->category;
            $article->category->category_name=(app()->getLocale()=='ar') ? $article->category->category_name_ar : $article->category->category_name_en;                  
            $article->image=substr($article->image,0,-4)."-cropped".substr($article->image,-4);
            $article->date = date("d/m/Y", strtotime($article->created_at));
            $article->time = date("H:i", strtotime($article->created_at));

        });
        
        return view('article',compact("article","suggestions"));
    }

    
    public function getVideo($idc,$slug){

        $locale=app()->getLocale();
        $article = Article::where('slug',$slug)->first();
        $article->image=substr($article->image,0,-4)."-cropped".substr($article->image,-4);        
        $article->category->category_name=(app()->getLocale()=='ar') ? $article->category->category_name_ar : $article->category->category_name_en;                  
        $suggestions = Article::orderBy("created_at","desc")
        ->where("type","video")
        ->where("slug",'!=',$slug)
        ->where("lang",$locale)
        ->take(4)
        ->get();
        $suggestions->map(function($article,$index){
            $article->category;
            $article->category->category_name=(app()->getLocale()=='ar') ? $article->category->category_name_ar : $article->category->category_name_en;                  
            $article->image=substr($article->image,0,-4)."-cropped".substr($article->image,-4);
            $article->date = date("d/m/Y", strtotime($article->created_at));
            $article->time = date("H:i", strtotime($article->created_at));

        });
        
        return view('showroom',compact("article","suggestions"));
    }

    public function getVideosApi($choice,$num){
        if($choice=="all"){
            $videos = Article::orderBy("created_at","desc")
            ->where("lang",session("locale"))
            ->where("type","video")
            ->take($num)->get();
        }else{
            $videos = Article::orderBy("created_at","desc")
            ->where("lang",session("locale"))
            ->where("type","video")
            ->whereHas('category', function ($query) use ($choice) {
            $query->where('category_name_'.app()->getLocale(), '=', $choice);
            })->take($num)
            ->get();
        }
        $videos->map(function($video){
            $video->image=substr($video->image,0,-4)."-cropped".substr($video->image,-4);                
        });

        return response($videos,200)->header('Content-Type', 'text/plain');
    }


    public function getLeagues(){
        $leagues=Article_categorie::all();
        if (app()->getLocale()=='ar'){
            $leagues->map(function($league){
                $league->category_name=$league->category_name_ar;
            });
        }else{
            $leagues->map(function($league){
                $league->category_name=$league->category_name_en;
            });
        }

        return view("leagues")->with("leagues",$leagues);
    }

    public function getLeague($locale,$choice){
        $articles = Article::orderBy("created_at","desc")
        ->where("type","text")
        ->where("lang",$locale)
        ->take(22)
        ->whereHas('category', function ($query) use ($locale,$choice) {
        $query->where("category_name_".$locale, $choice);
        })->get();

        $articles->map(function($article,$index){
            $article->category;
            $article->category->category_name=(app()->getLocale()=='ar') ? $article->category->category_name_ar : $article->category->category_name_en;      
            $article->date = date("d/m/Y", strtotime($article->created_at));
            $article->time = date("H:i", strtotime($article->created_at));

            $article->image=substr($article->image,0,-4)."-cropped".substr($article->image,-4);
        });

        // $rank_script ='"'.storage_path("app/scripts/scrapScriptRank.py").'"';        
        // exec ("python $rank_script", $output,$return);
        
        // //  Return will return non-zero upon an error
        // if (!$return) {
        //    //
        // } else {
        //     echo "problem detected, Baladi!";
        //     die();
        // }
        
        
        $botola_rank = File::get("Botola_Rank.json");
        $pl_rank = File::get("PL_Rank.json");
        $laliga_rank = File::get("LaLiga_Rank.json");
        $seriea_rank = File::get("SerieA_Rank.json");

        
        
        $more_articles=$articles->splice(14);
        return view('index', compact('articles','more_articles','pl_rank','seriea_rank','laliga_rank','botola_rank','titles'))->with('category',$choice);
    }

}
