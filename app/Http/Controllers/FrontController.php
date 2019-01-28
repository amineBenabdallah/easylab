<?php 

namespace App\Http\Controllers;
use Illuminate\support\Facades\DB;
use Illuminate\Http\Request;
use App\Http\Requests\equipeRequest;
use App\Parametre;
use App\Equipe;
use App\User;
use App\Role;
use App\Article;
use App\Actualite;
use App\Projet;
use Auth;

class FrontController extends Controller{
	public function index()
    {
      $labo = Parametre::find('1');
       $news = Actualite::all();
      $equipes = Equipe::all();
        return view('front/index')->with([
            'equipes' => $equipes,
            'news' => $news,
            'labo'=>$labo,
        ]);;
    }
    public function teams()
    {
      $labo = Parametre::find('1');
      $equipes = Equipe::all();
        return view('front/teams')->with([
            'equipes' => $equipes,
            'labo'=>$labo,
        ]);;
    }
    public function details($id)
    {
        $labo = Parametre::find('1');
    	$equipe = Equipe::find($id);
    	$membres = User::where('equipe_id', $id)->get();
    	return view('front.detailTeam')->with([
    		'membres' => $membres,
            'equipe' => $equipe,
            'labo'=>$labo,
        ]);
    }
    public function detailMembre($id)
    {
    	$membre = User::find($id);
        $equipes = Equipe::all();
        $roles = Role::all(); 
        $labo = Parametre::find('1');


        return view('front.detailMembre')->with([
            'membre' => $membre,
            'equipes' => $equipes,
            'roles' => $roles,
            'labo'=>$labo,
            
        ]);;
    }
    public function detailArticle($id)
    {
    	$labo = Parametre::find('1');
	 	$article = Article::find($id);
	 	$membres = Article::find($id)->users()->orderBy('name')->get();

	 	return view('front.publication')->with([
	 		'article' => $article,
	 		'membres'=>$membres,
	 		'labo'=>$labo,
	 	]);;
    }
    public function projects(){
    	$projets = Projet::all();
        $labo =  Parametre::find('1');
    	return view('front.projects' , ['projets' => $projets] ,['labo'=>$labo]);
    	
    }
    public function detailProject($id)
    { 
        $labo =  Parametre::find('1');
        $projet = Projet::find($id);
        $membres = Projet::find($id)->users()->orderBy('name')->get();

        return view('front.project')->with([
            'projet' => $projet,
            'membres'=>$membres,
            'labo'=>$labo,
        ]);;
    }
    public function article(){

    	$labo = Parametre::find('1');
    	$listarticle = Article::all();
    	return view('front.articles' , ['articles' => $listarticle] ,['labo'=>$labo]);

    } 
    public function about(){
        $labo = Parametre::find('1');
    	return view('front.about', ['labo'=>$labo]);

    } 
    public function contact(){
        $labo = Parametre::find('1');
    	return view('front.contact', ['labo'=>$labo]);

    } 
    public function news(){
      $labo = Parametre::find('1');
      $news = Actualite::all();
        return view('front/news')->with([
            'news' => $news,
            'labo'=>$labo,
        ]);;
    } 
    public function detailNews($id){
       $labo = Parametre::find('1');
       $new = Actualite::find($id);
       return view('front/new')->with([
            'new' => $new,
            'labo'=>$labo,
        ]);;
    } 

}



?>