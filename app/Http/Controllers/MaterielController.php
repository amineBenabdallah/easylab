<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Materiel;
use App\Categorie;
use App\Equipe;
use App\User;
use App\UserMateriel;
use App\EquipeMateriel;
use Auth;
use App\Parametre;
use App\Http\Requests\materielRequest;



class materielController extends Controller
{
	public function __construct()
    {
        $this->middleware('auth');
    }


	//permet de lister les materiels
    public function index(){

    	$labo = Parametre::find('1');
    	$listmateriel = materiel::all();
    	return view('materiel.index' , ['materiels' => $listmateriel] ,['labo'=>$labo]);

    }

    public function details($id)
    {
    	$labo = Parametre::find('1');
	 	$materiel = materiel::find($id);
	 	if($materiel->status=='reserved'){

	 		$equipe_id=DB::table('equipe_materiels')->where('materiel_id',$materiel->id)->value('equipe_id');

	 		$membre_id=DB::table('user_materiels')->where('materiel_id',$materiel->id)->value('user_id');

	 		$user=User::find($membre_id);
	 		$equipe=Equipe::find($equipe_id);
	 		return view('materiel.details')->with([
	 		'materiel' => $materiel,
	 		'labo'=>$labo,
	 		'user'=>$user,
	 		'equipe'=>$equipe
	 	]);;
	 	}else{
	 		return view('materiel.details')->with([
	 		'materiel' => $materiel,
	 		'labo'=>$labo
	 	]);;
	 	}
	 	
    }

    //affichage de formulaire de creation d'materiels
	 public function create()
	 {
	 	$labo = Parametre::find('1');
	 	// if( Auth::user()->role->nom == 'admin')
            //{
	 	$categorie = categorie::all();

	 	return view('materiel.create',['categories'=>$categorie],['labo'=>$labo]);
			//}
            // else{
            //     return view('errors.403');
            // }

    }

    //enregistrer un materiel
	 public function store(materielRequest $request){

	 	$materiel = new materiel();
	 	$labo = Parametre::find('1');

	 	

	 	$materiel->libelle = $request->input('libelle');
	 	$materiel->description = $request->input('description');
	 	//$materiel->status ='libre';
	 	$materiel->idCategorie=$request->input('idCategorie');
	 	$materiel->save();

	 	return redirect('materiel');

	 	//return response()->json(["arr"=>$request->input('membre')]);

    }

    //récuperer un materiel puis le mettre dans le formulaire
	 public function edit($id){

	 	$materiel = Materiel::find($id);
	 	$labo = Parametre::find('1');
	 	$categorie = categorie::all();
	 	//$this->authorize('update', $materiel);

	 	return view('materiel.edit')->with([
	 		'materiel' => $materiel,
	 		'labo'=>$labo,
	 		'categories'=>$categorie
	 	]);;
    }

    public function reserve($id,$user){

	 	$materiel = materiel::find($id);
	 	$labo = Parametre::find('1');
	 	$userMateriel= new UserMateriel();
		$equipeMateriel= new EquipeMateriel();
		$userMateriel->user_id=$user;
		$userMateriel->materiel_id=$id;
		$userr=User::find($user);
		$equipeMateriel->materiel_id=$id;
		$equipeMateriel->equipe_id=$userr->equipe_id;
		$materiel->status='reserved';
		$materiel->reserver=$id;
		$materiel->save();
		$userMateriel->save();
		$equipeMateriel->save();
	 	//$this->authorize('update', $materiel);
/*
	 	return view('materiel.edit')->with([
	 		'materiel' => $materiel,
	 		'labo'=>$labo
 	]);;*/
 		return redirect('materiel');
    }
    public function unreserve($id){

	 	$materiel = materiel::find($id);
	 	$labo = Parametre::find('1');
		$materiel->status='libre';
		$materiel->reserver=NULL;
		$materiel->save();
	 	//$this->authorize('update', $materiel);
/*
	 	return view('materiel.edit')->with([
	 		'materiel' => $materiel,
	 		'labo'=>$labo
 	]);;*/
 		return redirect('materiel');
    }

    //modifier et inserer
    public function update(materielRequest $request ,$id){
    
    	$materiel = materiel::find($id);
    	$labo = Parametre::find('1');

    	$materiel->libelle = $request->input('libelle');
	 	$materiel->description = $request->input('description');
	 	$materiel->idCategorie = $request->input('idCategorie');

	 	//hkalfat@gmail.com
	 	
	 	$materiel->save();

	 	return redirect('materiel');
    }
    
    //supprimer un materiel
    public function destroy($id){

    	$materiel = materiel::find($id);

	 	$this->authorize('delete', $materiel);

        $materiel->delete();
        return redirect('materiel');

    }
}

