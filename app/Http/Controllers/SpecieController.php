<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Specie;
use App\Animal;

class SpecieController extends Controller
{
    public function create(Request $request){
        $specie=new Specie;
        $specie->name=$request->name;
        $specie->description=$request->description;
        $specie->save();
        return response()->json([$specie]);
    }

    public function list(){
        return Specie::all();
    }

    public function listAnimals($id){
        $specie=Specie::findOrFail($id);
        if($specie){
            return response()->sucess($specie->animals());
        }else{
            $data = "Owner not found";
            return response()->error($data,400);
        }
    }

    public function show($id){
        $specie=Specie::findOrFail($id);
        if($specie){
            return response()->sucess($specie);
        }else{
            $data = "Specie not found";
            return response()->error($data,400);
        }
    }

    public function update(Request $request,$id){
        $specie=Specie::findOrFail($id);
        if ($request->name)
            $specie->name = $request->name;
        if ($request->description) 
            $specie->description = $request->description;
        $specie->save();
        
        return response()->json([$specie]);
    }

    public function delete($id){
        Specie::destroy($id);
        return response()->json(['Specie deleted']);
    }
}
