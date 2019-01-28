<?php 

namespace App\Http\Controllers;
use Illuminate\support\Facades\DB;
use Illuminate\Http\Request;
use App\Http\Requests\partenaireRequest;
use App\Parametre;
use App\Partenaire;
use App\User;
use App\Contact;
use Auth;

class PartenaireController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    
    public function index()
    {  
    $labo = Parametre::find('1'); 
    $Partenaires = Partenaire::all();
     // $nbr = DB::table('users')
     //            ->groupBy('Partenaire_id')
     //            ->count('Partenaire_id');

    $nbr = DB::table('contacts')
             ->select( DB::raw('count(*) as total,idPartenaire'))
             ->groupBy('idPartenaire')
             ->get();
 
        return view('Partenaire.index')->with([
            'Partenaires' => $Partenaires,
            'nbr' => $nbr,
            'labo'=>$labo,
        ]);;
    }

    public function create()
    {
        $labo = Parametre::find('1');
        if( Auth::user()->role->nom == 'admin')
            {
            	$Contacts = User::all(); 
                return view('Partenaire.create', ['Contacts' => $Contacts] ,['labo'=>$labo]);
            }
            else{
                return view('errors.403' ,['labo'=>$labo]);
            }
    }

    public function details($id)
    {
        $labo = Parametre::find('1');
        $Partenaire = Partenaire::find($id);
        $Contacts = Contact::where('idPartenaire', $id)->get();

        return view('Partenaire.details')->with([
            'Partenaire' => $Partenaire,
            'Contacts' => $Contacts,
            'labo'=>$labo,
        ]);
    } 

    public function store(PartenaireRequest $request)
    {
        $labo = Parametre::find('1');
        $Partenaire = new Partenaire();

        $Partenaire->nom = $request->input('nom');
        $Partenaire->type = $request->input('type');
        $Partenaire->logo = $request->input('logo');
        $Partenaire->pays = $request->input('pays');
        $Partenaire->ville = $request->input('ville');

        $Partenaire->save();

        return redirect('Partenaire');

    }

    public function update(PartenaireRequest $request,$id)
    {
        $labo = Parametre::find('1');
        $Partenaire = Partenaire::find($id);

        if( Auth::user()->role->nom == 'admin')
            {

            $Partenaire->nom = $request->input('nom');
        	$Partenaire->type = $request->input('type');
        	$Partenaire->logo = $request->input('logo');
        	$Partenaire->pays = $request->input('pays');
        	$Partenaire->ville = $request->input('ville');

            $Partenaire->save();

            return redirect('Partenaire/'.$id.'/details');
            }   
        else{
                return view('errors.403',['labo'=>$labo]);
            }

    }

    public function destroy($id)
    {
        if( Auth::user()->role->nom == 'admin')
            {
        $Partenaire = Partenaire::find($id);
        $Partenaire->delete();
        return redirect('Partenaire');
        }
    }

}

