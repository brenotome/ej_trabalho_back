<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Animal;
use App\Owner;
use App\Vet;


class AnimalController extends Controller
{
    public function create(Request $request){
        $animal=new Animal;
        $animal->name=$request->name;
        $animal->size=$request->size;
        $animal->color=$request->color;
        $animal->weight=$request->weight;
        $animal->description=$request->description;
        $animal->save();
        
        return response()->json([$animal]);
    }

    public function list(){
        return Animal::all();
    }

    public function show($id){
        $animal=Animal::findOrFail($id);
        if($animal){
            return response()->sucess($animal);
        }else{
            $data = "Animal not found";
            return response()->error($data,400);
        }
    }

    public function listVets($id){
        $animal=Animal::findOrFail($id);
        if($animal){
            return response()->sucess($animal->vets);
        }else{
            $data = "Animal not found";
            return response()->error($data,400);
        }
    }

    public function addVet(Request $request,$id){
        $animal=Animal::findOrFail($id);
        $vet=Vet::findOrFail($request->vet_id);
        if($animal && $vet){
            $animal->vets()->attach($vet);
            // $animal->save();
            return response()->sucess($animal->vets); 
        }else{
            $data = "not found";
            return response()->error($data,400);
        }
    }

    public function updateOwner(Request $request,$id){
        $animal=Animal::findOrFail($id);
        $owner=Owner::findOrFail($request->owner_id);
        if($animal && $owner){
            $animal->owner()->associate($owner);
            $animal->save();
            return response()->sucess($animal); 
        }else{
            $data = "not found";
            return response()->error($data,400);
        }
    }

    public function update(Request $request,$id){
        $animal=Animal::findOrFail($id);
        if($animal){
            if ($request->name)
                $animal->name = $request->name;
            if ($request->size) 
                $animal->size = $request->size;
            if ($request->weight) 
                $animal->weight = $request->weight;
            if ($request->color) 
                $animal->color = $request->color;
            if ($request->description) 
                $animal->description = $request->description;
            if ($request->owner_id)         
                $animal->owner_id=$request->owner_id;
            if ($request->specie_id) 
                $animal->specie_id=$request->specie_id;    
            $animal->save();            
            return response()->sucess($animal);
        }else{
            $data = "not found";
            return response()->error($data,400);
        }
    }

    public function delete($id){
        Animal::destroy($id);
        return response()->json(['Animal deleted']);
    }

    public function deleteOwner(Request $request,$id){
        $animal=Animal::findOrFail($id);
        if($animal){
            $animal->owner()->dissociate($request->owner_id);
            return response()->sucess($animal); 
        }else{
            $data = "not found";
            return response()->error($data,400);
        }
    }

    public function deleteVet(Request $request,$id){
        $animal=Animal::findOrFail($id);
        if($animal){
            $animal->vets()->detach($request->vet_id);
            return response()->sucess($animal); 
        }else{
            $data = "not found";
            return response()->error($data,400);
        }
    }
}
