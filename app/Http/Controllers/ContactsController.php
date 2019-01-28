<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;
use Illuminate\support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use App\Http\Requests\contactRequest;
use App\Http\Requests\contactEditRequest;
use App\Parametre;
use App\Contact;
use App\partenaire;
use App\Role;
use App\User;
use Auth;


class ContactsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

     public function index()
    {
        $contacts = Contact::all(); 
        $labo = Parametre::find('1');

        return view('contact.index' , ['contacts' => $contacts],['labo'=>$labo]);
    }

    public function details($id)
    {
        $contact = Contact::find($id);
        $partenaires = Partenaire::all();
        $labo = Parametre::find('1');


        return view('contact.details')->with([
            'contact' => $contact,
            'partenaires' => $partenaires,
            'labo'=>$labo
            
        ]);;
    } 

    public function create()
    {
        $labo = Parametre::find('1');
        if( Auth::User()->role->nom == 'admin')
            {
                $partenaires = Partenaire::all();
                return view('contact.create' , ['partenaires' => $partenaires],['labo'=>$labo]);
            }
            else{
                return view('errors.403',['labo'=>$labo]);
            }
    }

    public function store(ContactRequest $request)
    {
        $contact = new Contact();
        $labo = Parametre::find('1');
        if($request->hasFile('img')){
            $file = $request->file('img');
            $file_name = time().'.'.$file->getClientOriginalExtension();
            $file->move(public_path('/uploads/photo'),$file_name);
        }
        else{
            $file_name="ContactDefault.png";
        }

            $contact->name = $request->input('name');
            $contact->prenom = $request->input('prenom');
            $contact->email = $request->input('email');
            $contact->date_naissance = $request->input('date_naissance');
            $contact->grade = $request->input('grade');
            $contact->idPartenaire = $request->input('partenaire');
            $contact->num_tel = $request->input('num_tel');
            // $contact->autorisation_public_linkedin = $request->input('autorisation_public_linkedin');
            
            // $contact->autorisation_public_rg = $request->input('autorisation_public_rg');
            
            $contact->photo = 'uploads/photo/'.$file_name;

            $contact->save();
        return redirect('contacts');

    }

    public function edit($id)
    {

        $contact = Contact::find($id);
        $partenaires = partenaire::all();
        $labo = Parametre::find('1');


        return view('contact.edit')->with([
            'contact' => $contact,
            'partenaires' => $partenaires,
            'labo'=>$labo,
            
        ]);;
    
    }

    public function update(ContactEditRequest $request , $id)
    {
      
        $contact = Contact::find($id);
        $labo = Parametre::find('1');
        
        if($request->hasFile('img')){
            $file = $request->file('img');
            $file_name = time().'.'.$file->getClientOriginalExtension();
            $file->move(public_path('/uploads/photo'),$file_name);

                        }

        $contact->name = $request->input('name');
        $contact->prenom = $request->input('prenom');
        $contact->email = $request->input('email');
        $contact->date_naissance = $request->input('date_naissance');
        $contact->grade = $request->input('grade');
                
        $contact->idPartenaire = $request->input('partenaire');
        $contact->num_tel = $request->input('num_tel');
       
     

     
       
          
        $contact->save();

        return redirect('contacts/'.$id.'/details');

    }

    
    public function destroy($id)
    {
        if( Auth::Contact()->role->nom == 'admin')
            {
        $contact = Contact::find($id);
        $contact->delete();
        return redirect('contacts');
            }
    }
    
}
