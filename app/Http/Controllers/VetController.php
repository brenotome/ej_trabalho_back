<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Vet;
use App\Animal;
use App\Speciality;

class VetController extends Controller
{
    public function create(Request $request){
        $vet=new Vet;
        $vet->name=$request->name;
        $vet->gender=$request->gender;
        $vet->phone_number=$request->phone_number;
        $vet->address=$request->address;
        $vet->age=$request->age;
        $vet->save();
        return response()->json([$vet]);
    }

    public function list(){
        return Vet::all();
    }

    public function show($id){
        $vet=Vet::findOrFail($id);
        if($vet){
            return response()->sucess($vet);
        }else{
            $data = "Vet not found";
            return response()->error($data,400);
        }
    }

    public function listAnimals($id){
        $vet=Vet::findOrFail($id);
        if($vet){
            return response()->sucess($vet->animals);
        }else{
            $data = "not found";
            return response()->error($data,400);
        }
    }

    public function update(Request $request,$id){
        $vet=Vet::findOrFail($id);
        if ($vet) {
            if ($request->name)
                $vet->name = $request->name;
            if($request->gender)
                $vet->gender=$request->gender;
            if($request->phone_number)
                $vet->phone_number=$request->phone_number;
            if($request->address)
                $vet->address=$request->address;
            if($request->age)
                $vet->age=$request->age;
            $vet->save();
            return response()->sucess($vet);
        }else{
            $data = "Vet not found";
            return response()->error($data,400);
        }
    }
        

    public function addAnimal(Request $request,$id){
        $vet=Vet::findOrFail($id);
        $animal=Animal::findOrFail($request->animal_id);
        if($animal && $vet){
            $vet->animals()->attach($animal);
            return response()->sucess($vet->animals); 
        }else{
            $data = "not found";
            return response()->error($data,400);
        }
    }

    public function delete($id){
        Vet::destroy($id);
        return response()->json(['Vet deleted']);
    }

    public function deleteAnimal(Request $request,$id){
        $vet=Vet::findOrFail($id);
        if($vet){
            $vet->animals()->detach($request->animal_id);
            return response()->sucess('deleted'); 
        }else{
            $data = "not found";
            return response()->error($data,400);
        }
    }

}
