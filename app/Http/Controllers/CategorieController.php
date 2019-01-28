<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Categorie;
use Auth;
use App\Parametre;
use App\Http\Requests\categorieRequest;



class CategorieController extends Controller
{
	public function __construct()
    {
        $this->middleware('auth');
    }


	//permet de lister les categories
    public function index(){

    	$labo = Parametre::find('1');
    	$listcategorie = categorie::all();
    	return view('categorie.index' , ['categories' => $listcategorie] ,['labo'=>$labo]);

    }

    public function details($id)
    {
    	$labo = Parametre::find('1');
	 	$categorie = categorie::find($id);

	 	return view('categorie.details')->with([
	 		'categorie' => $categorie,
	 		'labo'=>$labo,
	 	]);;
    }

    //affichage de formulaire de creation d'categories
	 public function create()
	 {
	 	$labo = Parametre::find('1');
	 	// if( Auth::user()->role->nom == 'admin')
            //{
	 	//$categorie = categorie::all();

	 	return view('categorie.create',['labo'=>$labo]);
			 //}
            // else{
            //     return view('errors.403');
            // }

    }

    //enregistrer un categorie
	 public function store(categorieRequest $request){

	 	$categorie = new categorie();
	 	$labo = Parametre::find('1');

	 	

	 	$categorie->libelle = $request->input('libelle');
	 	$categorie->description = $request->input('description');	 	
	 	$categorie->save();

	 	return redirect('categorie');

	 	//return response()->json(["arr"=>$request->input('membre')]);

    }

    //récuperer un categorie puis le mettre dans le formulaire
	 public function edit($id){

	 	$categorie = categorie::find($id);
	 	$labo = Parametre::find('1');

	 	//$this->authorize('update', $categorie);

	 	return view('categorie.edit')->with([
	 		'categorie' => $categorie,
	 		'labo'=>$labo
	 	]);;
    }

    //modifier et inserer
    public function update(categorieRequest $request ,$id){
    
    	$categorie = categorie::find($id);
    	$labo = Parametre::find('1');

    	$categorie->libelle = $request->input('libelle');
	 	$categorie->description = $request->input('description');

	 	
	 	
	 	$categorie->save();

	 	

	 	

	 	return redirect('categorie');
    }
    
    //supprimer un categorie
    public function destroy($id){

    	$categorie = categorie::find($id);

	 	$this->authorize('delete', $categorie);

        $categorie->delete();
        return redirect('categories');

    }
}
