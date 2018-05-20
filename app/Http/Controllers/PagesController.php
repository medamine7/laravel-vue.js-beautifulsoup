<?php


/*************************
 *                          created by :
 
 ________      ________      ___           ________      ________      ___     
|\   __  \    |\   __  \    |\  \         |\   __  \    |\   ___ \    |\  \    
\ \  \|\ /_   \ \  \|\  \   \ \  \        \ \  \|\  \   \ \  \_|\ \   \ \  \   
 \ \   __  \   \ \   __  \   \ \  \        \ \   __  \   \ \  \ \\ \   \ \  \  
  \ \  \|\  \   \ \  \ \  \   \ \  \____    \ \  \ \  \   \ \  \_\\ \   \ \  \ 
   \ \_______\   \ \__\ \__\   \ \_______\   \ \__\ \__\   \ \_______\   \ \__\
    \|_______|    \|__|\|__|    \|_______|    \|__|\|__|    \|_______|    \|__| 

                            Mohamed Amine
    
                            instagram : @_mab7

                                                                               
                                                                               
                                                                               


*/                                                                           

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\Process\Exception\ProcessFailedException;
use Symfony\Component\Process\Process;
use App\Article;
use App\Match;
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

    public function scrap(){
        $rank_script ='"'.storage_path("app/scripts/scrapScriptRank.py").'"';        
        exec ("python $rank_script", $output,$return);
        
        //  Return will return non-zero upon an error
        if (!$return) {
           //
        } else {
            echo "problem detected, Baladi!";
            die();
        }

        $this->translate();
        
    }


    public function translate(){
        $pl_rank = File::get("PL_Rank.json");
        $botola_rank = File::get("Botola_Rank.json");
        $laliga_rank = File::get("LaLiga_Rank.json");
        $seriea_rank = File::get("SerieA_Rank.json");

        $dict_pl = include 'Dictionaries/pl.php';
        $dict_laliga = include 'Dictionaries/laliga.php';
        $dict_seriea = include 'Dictionaries/seriea.php';
        $dict_botola = include 'Dictionaries/botola.php';


        foreach ($dict_pl as $key => $value) {
            $pl_rank=str_replace($key,$key.' <strong>'.$value.'</strong>',$pl_rank);
        }
        foreach ($dict_laliga as $key => $value) {
            $laliga_rank=str_replace($key,$key.' <strong>'.$value.'</strong>',$laliga_rank);
        }
        foreach ($dict_seriea as $key => $value) {
            $seriea_rank=str_replace($key,$key.' <strong>'.$value.'</strong>',$seriea_rank);
        }

        foreach ($dict_botola as $key => $value) {
            $botola_rank=str_replace($key,$key.' <strong>'.$value.'</strong>',$botola_rank);
        }

        File::put("PL_Rank.json",$pl_rank);
        File::put("Botola_Rank.json",$botola_rank);
        File::put("LaLiga_Rank.json",$laliga_rank);
        File::put("SerieA_Rank.json",$seriea_rank);

    }

    public function index()
    {

        // $this->scrap();
        
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
        $video = Article::where('slug',$slug)->first();
        $video->image=substr($video->image,0,-4)."-cropped".substr($video->image,-4);        
        $video->category->category_name=(app()->getLocale()=='ar') ? $video->category->category_name_ar : $video->category->category_name_en;                  
        $suggestions = Article::orderBy("created_at","desc")
        ->where("type","video")
        ->where("slug",'!=',$slug)
        ->where("lang",$locale)
        ->take(4)
        ->get();
        $suggestions->map(function($video,$index){
            $video->category;
            $video->category->category_name=(app()->getLocale()=='ar') ? $video->category->category_name_ar : $video->category->category_name_en;                  
            $video->image=substr($video->image,0,-4)."-cropped".substr($video->image,-4);
            $video->date = date("d/m/Y", strtotime($video->created_at));
            $video->time = date("H:i", strtotime($video->created_at));

        });
        
        return view('showroom',compact("video","suggestions"));
    }

    public function getVideosApi($choice,$num){
        $locale=session("locale");
        if($choice=="all"){
            $videos = Article::orderBy("created_at","desc")
            ->where("lang",$locale)
            ->where("type","video")
            ->take($num)->get();
        }else{
            $videos = Article::orderBy("created_at","desc")
            ->where("lang",session("locale"))
            ->where("type","video")
            ->whereHas('category', function ($query) use ($locale,$choice) {
            $query->where('category_name_'.$locale, $choice);
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

        // $this->scrap();
        
        
        $botola_rank = File::get("Botola_Rank.json");
        $pl_rank = File::get("PL_Rank.json");
        $laliga_rank = File::get("LaLiga_Rank.json");
        $seriea_rank = File::get("SerieA_Rank.json");

        
        
        $more_articles=$articles->splice(14);
        return view('index', compact('articles','more_articles','pl_rank','seriea_rank','laliga_rank','botola_rank','titles'))->with('category',$choice);
    }


    public function matches(){
        $matches = Match::orderBy("date",'desc')->where('date',date("Y/m/d"))->get();
        $locale=session("locale");
        if ($locale=='ar'){
            $matches->map(function($match){
                $match->home_team=$match->home_team_ar;
                $match->away_team=$match->away_team_ar;
                $match->league;          
            });
        }else{
            $matches->map(function($match){
                $match->home_team=$match->home_team_en;
                $match->away_team=$match->away_team_en; 
                $match->league;            
            });
        }
        return view('matches',compact("matches"));
    }

}
