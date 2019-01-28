<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Message;
use Auth;
use App\Parametre;

class MessageController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }


	//permet de lister les actualites
    public function index(){

    	$labo = Parametre::find('1');
    	$listmessage = Message::all();
    	return view('message.index' , ['messages' => $listmessage] ,['labo'=>$labo]);

    }

    public function details($id)
    {
    	$labo = Parametre::find('1');
	 	$message = Message::find($id);

	 	return view('message.details')->with([
	 		'message' => $message,
	 		'labo'=>$labo,
	 	]);;
    }



    
    //supprimer un actualite
    public function destroy($id){

    	$message = Message::find($id);

	 	$this->authorize('delete', $message);

        $message->delete();
        return redirect('message');

    }
}
