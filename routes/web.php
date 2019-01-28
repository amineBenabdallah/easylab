<?php
use App\User;
use App\These;
use App\Projet;
use App\Article;
use App\Equipe;
use App\Parametre;
use Illuminate\Support\Facades\Input;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/*Route::get('/', function () {
    return view('front/index');
});*/
Route::get('login', function () {
    return view('auth/login');
});
Route::get('/','FrontController@index');
Route::get('teams','FrontController@teams');
Route::get('teams/{id}','FrontController@details');
Route::get('teams/membre/{id}','FrontController@detailMembre');
Route::get('articles/{id}/detail','FrontController@detailArticle');
Route::get('articlesFront','FrontController@article');
Route::get('projects','FrontController@projects');
Route::get('projects/{id}','FrontController@detailProject');
Route::get('about','FrontController@about');
Route::get('contact','FrontController@contact');
Route::get('news','FrontController@news');
Route::get('news/{id}','FrontController@detailNews');


Route::get('actualite','ActualiteController@index');
Route::get('actualite/create','ActualiteController@create');
Route::post('actualite','ActualiteController@store');
Route::get('actualite/{id}/details','ActualiteController@details');
Route::get('actualite/{id}/edit','ActualiteController@edit');
Route::put('actualite/{id}','ActualiteController@update');
Route::delete('actualite/{id}','ActualiteController@destroy');

Route::get('statistic','StatisticsController@index');
Route::get('statistic/create','StatisticsController@create');
Route::post('statistic','StatisticsController@store');
Route::get('statistic/{id}/details','StatisticsController@details');
Route::get('statistic/{id}/edit','StatisticsController@edit');
Route::put('statistic/{id}','StatisticsController@update');
Route::delete('statistic/{id}','StatisticsController@destroy');

Route::get('materiel','MaterielController@index');
Route::get('materiel/create','MaterielController@create');
Route::post('materiel','MaterielController@store');
Route::get('materiel/{id}/details','MaterielController@details');
Route::get('materiel/{id}/edit','MaterielController@edit');
Route::get('materiel/{id}/{user}/reserve','MaterielController@reserve');
Route::get('materiel/{id}/unreserve','MaterielController@unreserve');
Route::put('materiel/{id}','MaterielController@update');
Route::delete('materiel/{id}','MaterielController@destroy');

Route::get('categorie','CategorieController@index');
Route::get('categorie/create','CategorieController@create');
Route::post('categorie','CategorieController@store');
Route::get('categorie/{id}/details','CategorieController@details');
Route::get('categorie/{id}/edit','CategorieController@edit');
Route::put('categorie/{id}','CategorieController@update');
Route::delete('categorie/{id}','CategorieController@destroy');

Route::get('contacts','ContactsController@index');
Route::get('contacts/create','ContactsController@create');
Route::post('contacts','ContactsController@store');
Route::get('contacts/{id}/details','ContactsController@details');
Route::get('contacts/{id}/edit','ContactsController@edit');
Route::put('contacts/{id}','ContactsController@update');
Route::delete('contacts/{id}','ContactsController@destroy');

Route::get('dashboard','dashController@index');
Route::get('parametre','ParametreController@create');
Route::post('parametre','ParametreController@store');

Route::get('theses','TheseController@index');
Route::get('theses/create','TheseController@create');
Route::post('theses','TheseController@store')->middleware('thesecond');
Route::get('theses/{id}/details','TheseController@details');
Route::get('theses/{id}/edit','TheseController@edit');
Route::put('theses/{id}','TheseController@update');
Route::delete('theses/{id}','TheseController@destroy');

Route::get('articles','ArticleController@index');
Route::get('articles/create','ArticleController@create');
Route::post('articles','ArticleController@store');
Route::get('articles/{id}/details','ArticleController@details');
Route::get('articles/{id}/edit','ArticleController@edit');
Route::put('articles/{id}','ArticleController@update');
Route::delete('articles/{id}','ArticleController@destroy');

Route::get('membres','UserController@index');
Route::get('membres/create','UserController@create');
Route::post('membres','UserController@store');
Route::get('membres/{id}/details','UserController@details');
Route::get('trombinoscope','UserController@trombi');
Route::get('membres/{id}/edit','UserController@edit');
Route::put('membres/{id}','UserController@update');
Route::delete('membres/{id}','UserController@destroy');

 
Route::get('test','EquipeController@index');

Route::get('equipes','EquipeController@index');
Route::get('equipes/create','EquipeController@create');
Route::post('equipes','EquipeController@store');
Route::get('equipes/{id}/details','EquipeController@details');
Route::put('equipes/{id}','EquipeController@update');
Route::delete('equipes/{id}','EquipeController@destroy');

Route::get('test','partenaireController@index');

Route::get('Partenaire','PartenaireController@index');
Route::get('Partenaire/create','PartenaireController@create');
Route::post('Partenaire','PartenaireController@store');
Route::get('Partenaire/{id}/details','PartenaireController@details');
Route::put('Partenaire/{id}','PartenaireController@update');
Route::delete('Partenaire/{id}','PartenaireController@destroy');

Route::get('projets','ProjetController@index');
Route::get('projets/create','ProjetController@create');
Route::post('projets','ProjetController@store');
Route::get('projets/{id}/details','ProjetController@details');
Route::get('projets/{id}/edit','ProjetController@edit');
Route::put('projets/{id}','ProjetController@update');
Route::delete('projets/{id}','ProjetController@destroy');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/statistics',function(){

	$year = date('Y');
	 $a1 = DB::table('articles')->distinct('id')->where('annee',$year)->count();
	 $a2 = DB::table('articles')->distinct('id')->where('annee',$year-1)->count();
	 $a3 = DB::table('articles')->distinct('id')->where('annee',$year-2)->count();
	 $a4 = DB::table('articles')->distinct('id')->where('annee',$year-3)->count();
	 $a5 = DB::table('articles')->distinct('id')->where('annee',$year-4)->count();
	 $a6 = DB::table('articles')->distinct('id')->where('annee',$year-5)->count();
	 $a7 = DB::table('articles')->distinct('id')->where('annee',$year-6)->count();

	 $b1 = DB::table('theses')->where(DB::raw("DATE_FORMAT(STR_TO_DATE(date_debut,'%m/%d/%Y'),'%Y')"),$year)->count();
	 $b2 = DB::table('theses')->where(DB::raw("DATE_FORMAT(STR_TO_DATE(date_debut,'%m/%d/%Y'),'%Y')"),$year-1)->count();
	 $b3 = DB::table('theses')->where(DB::raw("DATE_FORMAT(STR_TO_DATE(date_debut,'%m/%d/%Y'),'%Y')"),$year-2)->count();
	 $b4 = DB::table('theses')->where(DB::raw("DATE_FORMAT(STR_TO_DATE(date_debut,'%m/%d/%Y'),'%Y')"),$year-3)->count();
	 $b5 = DB::table('theses')->where(DB::raw("DATE_FORMAT(STR_TO_DATE(date_debut,'%m/%d/%Y'),'%Y')"),$year-4)->count();
	 $b6 = DB::table('theses')->where(DB::raw("DATE_FORMAT(STR_TO_DATE(date_debut,'%m/%d/%Y'),'%Y')"),$year-5)->count();
	 $b7 = DB::table('theses')->where(DB::raw("DATE_FORMAT(STR_TO_DATE(date_debut,'%m/%d/%Y'),'%Y')"),$year-6)->count();

	 //$date = new Carbon( $these->date_debut );  

	 //$t1 = DB::table('theses')->distinct('id')->where(,$year)->count();

    $annee = [$year-6,$year-5,$year-4,$year-3,$year-2,$year-1,$year];
    $article = [$a7, $a6, $a5,$a4,$a3,$a2,$a1];
    $these = [$b7, $b6, $b5,$b4,$b3,$b2,$b1];
  
	return response()->json(["annee"=>$annee,
							 "article"=> $article,
							 "these"=> $these
							]);
});

Route::any('/search',function(){

	$labo = Parametre::find('1'); 
    $q = Input::get ( 'q' );
    $membres = User::where('name','LIKE','%'.$q.'%')->orWhere('prenom','LIKE','%'.$q.'%')->orWhere('email','LIKE','%'.$q.'%')->get();
    $theses = These::where('titre','LIKE','%'.$q.'%')->orWhere('sujet','LIKE','%'.$q.'%')->get();
    $articles = Article::where('titre','LIKE','%'.$q.'%')->orWhere('resume','LIKE','%'.$q.'%')->orWhere('type','LIKE','%'.$q.'%')->get();
    $projets = Projet::where('intitule','LIKE','%'.$q.'%')->orWhere('resume','LIKE','%'.$q.'%')->orWhere('type','LIKE','%'.$q.'%')->get();
    $equipes = Equipe::where('intitule','LIKE','%'.$q.'%')->orWhere('resume','LIKE','%'.$q.'%')->orWhere('achronymes','LIKE','%'.$q.'%')->get();

        // return view('search')->withDetails($user)->withQuery ( $q );
        return view('search')->with([
            'membres' => $membres,
            'theses' => $theses,
            'articles' => $articles,
            'projets' => $projets,
            'equipes' => $equipes,
            'labo'=>$labo,
            
        ]);;

});
