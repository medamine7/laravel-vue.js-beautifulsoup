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

        
        
        
        
        $articles = Article::orderBy("created_at","desc")
        ->where("type","text")
        ->where("lang",app()->getLocale())
        ->take(22)
        ->get();
        
        $articles->map(function($article,$index){
            $article->category;
        });
        
        $more_articles=$articles->splice(14);
        return view('index', compact('articles','more_articles','pl_rank','seriea_rank','laliga_rank','botola_rank','titles'));
    }

    public function getArticle($idc,$anchor){

        $article = Article::where('article_id',$anchor)->first();
        $suggestions = Article::orderBy("created_at","desc")
        ->where("type","text")
        ->where("article_id",'!=',$anchor)
        ->take(4)
        ->get();
        $suggestions->map(function($article,$index){
            $article->category;
        });
        return view('article',compact("article","suggestions"));
    }


    public function getVideosApi($num){
        $videos = Article::orderBy("created_at","desc")
        ->where("lang",session("locale"))
        ->where("type","video")
        ->take($num)->get();
        return response($videos,200)->header('Content-Type', 'text/plain');
    }


    public function getLeagues(){
        $leagues=Article_categorie::all();
        
        return view("leagues")->with("leagues",$leagues);
    }

    public function getLeague($choice){
        $articles = Article::whereHas('category', function ($query) use ($choice) {
        $query->where('category_name', '=', $choice);
        })->get();

        $articles->map(function($article,$index){
            $article->category;
        });

        dd ($articles);
    }

}
