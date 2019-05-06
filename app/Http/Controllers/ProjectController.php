<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;


class ProjectController extends Controller {

  public function insertform() {

      return view('newProject');
  }

    public function insert (Request $request) {

        $naziv_projekta = $request->input('naziv_projekta');
        $opis_projekta = $request->input('opis_projekta');
        $cijena_projekta = $request->input('cijena_projekta');
        $obavljeni_poslovi = $request->input('obavljeni_poslovi');
        $datum_pocetka = $request->input('datum_pocetka');
        $datum_zavrsetka = $request->input('datum_zavrsetka');
        $voditelj_projekta = $request->input('voditelj_projekta');

        $data = array('naziv_projekta'=>$naziv_projekta, "opis_projekta"=>$opis_projekta, "cijena_projekta"=>$cijena_projekta,
        	     "obavljeni_poslovi"=>$obavljeni_poslovi, "datum_pocetka"=>$datum_pocetka, "datum_zavrsetka"=>$datum_zavrsetka,
               "voditelj_projekta"=>$voditelj_projekta);

        DB::table('projects')->insert($data);
        //echo "Project inserted successfully.<br/>";
        //echo '<a href = "/home">Click Here</a> to go back.';
        return redirect()->to('/projectTeam');

    }
}
