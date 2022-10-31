<?php

namespace App\Http\Controllers;
use App\Models\anonce;
use Facade\FlareClient\View;
use Illuminate\Http\Request;

use App\Models\etude;
use App\Models\experience;
use App\Models\ville;
use App\Models\mitier;
use App\Models\stageaire;

use function PHPSTORM_META\type;

class AnonceController extends Controller
{
    public function indexStageaire(){
        $annoces = anonce::ALL()->where('type','S');
        return view('ClientSide.espaceStageaire.Anonce')->with('annoces',$annoces);
    }

    public function indexRecrutement(){
        $annoces = anonce::ALL()->where('type','R');
        return view('ClientSide.espaceRecrutement.Anonce')->with('annoces',$annoces);
    }
    public function tst(){

        $villes         = ville::all();
        $mitiers        = mitier::all();
        $experiences    = experience::all();
        $etudes         = etude::all();

        $data           = [
            
            "villes"        => $villes,
            "mitiers"       => $mitiers,
            "experiences"   => $experiences,
            "etudes"        => $etudes
        ];

        return view('adminSide.dashboard')->with('data',$data);
    }

    public function indexR(){

        return view('adminSide.Recrutement.creatRecrutement');

    }
    public function indexS(){

        return view('adminSide.Recrutement.creatStage');

    }

    public function store(Request $request){
        $req = $request->validate([
            'titre'             =>'required',
            'siege'             =>'nullable',
            'lieux'             =>'nullable',
            'Type'              =>'required',
            'Secteur_activite'  =>'nullable',
            'Type_Contrat'      =>'nullable',
            'Niveau_Poste'      =>'nullable',
            'experience'        =>'nullable',
            'Nombre_Poste'      =>'nullable',
            'discription'       =>'nullable'
        ]);

        //dd($req['discription']);
        anonce::insert($req);
        dd('store');    
        //return redirect()->route('anonce.tst')->with('success','votre Anonce est bien enregistrer !');

    }
    //admin dash:
    public function getAllAnonce(){
         $annoces = anonce::ALL();
         return view('adminSide.Recrutement.listeAnonce')->with('annoces',$annoces);
    
    }
    
    
    public function getAllAnonceFiltrer(Request $request){
        $req = $request->validate([
            'lieux' =>'nullable'
            ]
        );
        $annocesF = anonce::where('lieux', $req['lieux'] )->get();
        // dd(count($annocesF));
        //return response()->json(['annoces' => $annocesF]);
        $text = "1";
        for($i = 0; $i>count($annocesF); $i++){
            dd("for");
            $text+='<div>titre:'.$annocesF[$i]['titre'].'</div>';
           dd($text);
        }
         return response($text);
        
    }
    public function edit($id){
        dd('edit');
        $idAnonce = anonce::findOrFail($id);
        return view('adminSide.Recrutement.updateRecrutement', compact('idAnonce'));
        
        
    }
    public function Update(Request $request){
        return view('adminSide.Recrutement.updateRecrutement', compact('request'));
    }

    public function updateEtat(Request $request){
        dd("update etat->cloturer");
        
    }
    
    public function getCvByAnonce(Request $req){
        // dd($req->id);
        $cvByAnonce = stageaire::where('idAnnonce',$req->id)->get();
        
        return view('adminSide.Recrutement.CVTheque.ListeCVbyAnonce')->with('CVAn',$cvByAnonce);
    }
}
