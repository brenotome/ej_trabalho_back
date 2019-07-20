<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Speciality;
use App\Vet;

class SpecialityController extends Controller
{
    public function create(Request $request){
        $speciality=new Speciality;
        $speciality->name=$request->name;
        $speciality->description=$request->description;
        $speciality->save();
        return response()->json([$speciality]);
    }

    public function list(){
        return Speciality::all();
    }

    public function show($id){
        $speciality=Speciality::findOrFail($id);
        if($speciality){
            return response()->sucess($speciality);
        }else{
            $data = "Speciality not found";
            return response()->error($data,400);
        }
    }

    public function listVets($id){
        $speciality=Vet::findOrFail($id);
        if($speciality){
            return response()->sucess($speciality->vets());
        }else{
            $data = "not found";
            return response()->error($data,400);
        }
    }

    public function update(Request $request,$id){
        $speciality=Speciality::findOrFail($id);
        if ($request->name)
            $speciality->name=$request->name;
        if ($request->gender)        
            $speciality->description=$request->description;
        $speciality->save();
        
        return response()->json([$speciality]);
    }

    public function addSpeciality(Request $request,$id){
        $speciality=Speciality::findOrFail($id);
        $vet=Vet::findOrFail($request->vet_id);
        if($speciality && $vet){
            $speciality->vets()->attach($vet);
            return response()->sucess($speciality); 
        }else{
            $data = "not found";
            return response()->error($data,400);
        }
    }

    public function delete($id){
        Speciality::destroy($id);
        return response()->json(['Speciality deleted']);
    }
}
