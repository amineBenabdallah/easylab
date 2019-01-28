<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class StatController extends Controller
{
    //
    public function chartGroupeThese()
      {

        /*$result = DB::table('stocks')
                    ->where('stockName','=','Infosys')
                    ->orderBy('stockYear', 'ASC')
                    ->get();
        return response()->json($result);*/
      }

      public function chartGroupeEquipe()
      {
      	$i=0;
      	$result1=DB::select("SELECT c1.equipe_id AS id,Livre FROM (SELECT c.equipe_id,COUNT(c.type)as Livre FROM ( SELECT a.equipe_id , b.type from `users` as a,`projets` as b WHERE a.id=b.chef_id and b.type='Livre') AS c) AS c1");
      	/*while ($row=mysqli_assoc_fetch($result1)) {
      		# code...
      		$result11[$i][0]=$row['id'];
			$result11[$i][1]=$row['Livre'];
			$i++;
      	}
      	$i=0;*/
      	$result2=DB::select("SELECT c1.equipe_id AS id,Poster FROM (SELECT c.equipe_id,COUNT(c.type)as Poster FROM ( SELECT a.equipe_id , b.type from `users` as a,`projets` as b WHERE a.id=b.chef_id and b.type='Poster') AS c) AS c1");
      	/*while ($row=mysqli_assoc_fetch($result2)) {
      		# code...
      		$result22[$i][0]=$row['id'];
			$result22[$i][1]=$row['Livre'];
			$i++;
      	}
      	$i=0;*/
      	$result3=DB::select("SELECT c1.equipe_id AS id,Article_court FROM (SELECT c.equipe_id,COUNT(c.type)as Article_court FROM ( SELECT a.equipe_id , b.type from `users` as a,`projets` as b WHERE a.id=b.chef_id and b.type='Article court') AS c) AS c1");
      	/*while ($row=mysqli_assoc_fetch($result3)) {
      		# code...
      		$result33[$i][0]=$row['id'];
			$result33[$i][1]=$row['Livre'];
			$i++;
      	}
      	$i=0;*/
      	$result4=DB::select("SELECT c1.equipe_id AS id,Article_long FROM (SELECT c.equipe_id,COUNT(c.type)as Article_long FROM ( SELECT a.equipe_id , b.type from `users` as a,`projets` as b WHERE a.id=b.chef_id and b.type='Article long') AS c) AS c1");
      	/*while ($row=mysqli_assoc_fetch($result4)) {
      		# code...
      		$result44[$i][0]=$row['id'];
			$result44[$i][1]=$row['Livre'];
			$i++;
      	}
      	$i=0;*/
      	$result5=DB::select("SELECT c1.equipe_id AS id,Publication FROM (SELECT c.equipe_id,COUNT(c.type)as Publication FROM ( SELECT a.equipe_id , b.type from `users` as a,`projets` as b WHERE a.id=b.chef_id and b.type='Publication(Revue)') AS c) AS c1");
      	/*while ($row=mysqli_assoc_fetch($result5)) {
      		# code...
      		$result55[$i][0]=$row['id'];
			$result55[$i][1]=$row['Livre'];
			$i++;
      	}
      	$i=0;*/
      	$result6=DB::select("SELECT c1.equipe_id AS id,Chapitre FROM (SELECT c.equipe_id,COUNT(c.type)as Chapitre FROM ( SELECT a.equipe_id , b.type from `users` as a,`projets` as b WHERE a.id=b.chef_id and b.type='Chapitre d\'un livre') AS c) AS c1");
      	/*while ($row=mysqli_assoc_fetch($result6)) {
      		# code...
      		$result66[$i][0]=$row['id'];
			$result66[$i][1]=$row['Livre'];
			$i++;
      	}
      	$i=0;*/
      	$result7=DB::select("SELECT c1.equipe_id AS id,Brevet FROM (SELECT c.equipe_id,COUNT(c.type)as Brevet FROM ( SELECT a.equipe_id , b.type from `users` as a,`projets` as b WHERE a.id=b.chef_id and b.type='Brevet') AS c) AS c1");
      	/*while ($row=mysqli_assoc_fetch($result7)) {
      		# code...
      		$result77[$i][0]=$row['id'];
			$result77[$i][1]=$row['Livre'];
			$i++;
      	}*/
      	$i=1;
      	$result0=DB::select("SELECT id FROM `equipes`");

      	$result={"id","Livre","Poster","Article court","Article long","Publication","Chapitre","Brevet"};
      	$bool1=0;
      	$bool2=0;
      	$bool3=0;
      	$bool4=0;
      	$bool5=0;
      	$bool6=0;
      	$bool7=0;
      	foreach ($result0 as $result00) {
      		# code...
      		$result[$i][0]=$result00->id;
      		foreach ($result1 as $result11) {
      			# code...
      			if ($result00->id==$result11->id) {
      			# code...
      				$bool1=1;
      				$result[$i][1]=$result11->Livre;
      			}
      		}
      		if ($bool1==0) {
      			# code...
      			$result[$i][1]=0;
      		}
      		foreach ($result2 as $result22) {
      			# code...
      			if ($result00->id==$result22->id) {
      			# code...
      				$bool1=1;
      				$result[$i][2]=$result22->Poster;
      			}
      		}
      		if ($bool2==0) {
      			# code...
      			$result[$i][2]=0;
      		}
      		foreach ($result3 as $result33) {
      			# code...
      			if ($result00->id==$result33->id) {
      			# code...
      				$bool3=1;
      				$result[$i][3]=$result33->Article_court;
      			}
      		}
      		if ($bool3==0) {
      			# code...
      			$result[$i][3]=0;
      		}
      		foreach ($result4 as $result44) {
      			# code...
      			if ($result00->id==$result44->id) {
      			# code...
      				$bool4=1;
      				$result[$i][4]=$result44->Article_long;
      			}
      		}
      		if ($bool4==0) {
      			# code...
      			$result[$i][4]=0;
      		}
      		foreach ($result5 as $result55) {
      			# code...
      			if ($result00->id==$result55->id) {
      			# code...
      				$bool5=1;
      				$result[$i][5]=$result55->Publication;
      			}
      		}
      		if ($bool5==0) {
      			# code...
      			$result[$i][5]=0;
      		}
      		foreach ($result6 as $result66) {
      			# code...
      			if ($result00->id==$result66->id) {
      			# code...
      				$bool6=1;
      				$result[$i][6]=$result66->Chapitre;
      			}
      		}
      		if ($bool6==0) {
      			# code...
      			$result[$i][6]=0;
      		}
      		foreach ($result7 as $result77) {
      			# code...
      			if ($result00->id==$result77->id) {
      			# code...
      				$bool7=1;
      				$result[$i][7]=$result77->Brevet;
      			}
      		}
      		if ($bool7==0) {
      			# code...
      			$result[$i][7]=0;
      		}
      	}

        return response()->json($result);
      }

      public function chartstackedArticle()
      {
        
      }

      public function chartPieNombre()
      {
        
      }

      public function chartPieArticle()
      {
        
      }
}
