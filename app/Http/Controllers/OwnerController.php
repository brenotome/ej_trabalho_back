<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Owner;
use App\Animal;

class OwnerController extends Controller
{
    public function create(Request $request){
        $owner=new Owner;
        $owner->name=$request->name;
        $owner->gender=$request->gender;
        $owner->phone_number=$request->phone_number;
        $owner->address=$request->address;
        $owner->occupation=$request->occupation;
        $owner->save();
        return response()->json([$owner]);
    }

    public function list(){
        return Owner::all();
    }

    public function listAnimals($id){
        $owner=Owner::findOrFail($id);
        if($owner){
            return response()->sucess($owner->animals);
        }else{
            $data = "Owner not found";
            return response()->error($data,400);
        }
    }
    public function show($id){
        $owner=Owner::findOrFail($id);
        if($owner){
            return response()->sucess($owner);
        }else{
            $data = "Owner not found";
            return response()->error($data,400);
        }
    }

    public function update(Request $request,$id){
        $owner=Owner::findOrFail($id);
        if($owner){
            if ($request->name)
                $owner->name=$request->name;
            if ($request->gender)        
                $owner->gender=$request->gender;
            if ($request->phone_number)                
                $owner->phone_number=$request->phone_number;
            if ($request->address)        
                $owner->address=$request->address;
            if ($request->occupation)        
                $owner->occupation=$request->occupation;
            $owner->save();
            return response()->sucess($animal);
        }else{
            $data = "not found";
            return response()->error($data,400);
        }
    }


    public function delete($id){
        Owner::destroy($id);
        return response()->json(['Owner deleted']);
    }
}
