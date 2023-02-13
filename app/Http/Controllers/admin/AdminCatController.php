<?php

namespace App\Http\Controllers\admin;

use Exception;
use App\Models\Cat;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminCatController extends Controller
{
    public function index(){

       $data['cats']= Cat::orderBy('id','DESC')->paginate(10); 
       return view('admin.cat.index')->with($data);
    }

    public function store(Request $request){

        $request->validate([
            'name_ar'=>'required|max:50',
            'name_en'=>'required|max:50'
        ]);
        
        Cat::create([
            'name'=> json_encode([
                'en'=>$request->name_en,
                'ar'=>$request->name_ar,
            ])
            ]);
          $request->session()->flash('mesg','row added successfully');  
        
            return back();
    }
    public function update(Request $request){

        $request->validate([
            'id'=>'required|exists:Cats,id',
            'name_ar'=>'required|max:50',
            'name_en'=>'required|max:50'
        ]);
        
        Cat::findOrFail($request->id)->update([
            'name'=> json_encode([
                'en'=>$request->name_en,
                'ar'=>$request->name_ar,
            ])
            ]);
            $request->session()->flash('mesg','row updated successfully'); 
            return back();
    }

    public function toggle(Cat $cat){


        $cat->update([
            'active'=> ! $cat->active
        ]);
        return back();
    }



    public function delete(Cat $cat ,Request $request){
            try{
                $cat->delete();
                $mesg= "row deleted successfully";
            } catch(Exception $e){

                $mesg= "can`t delete this row";
            }
       
             
            $request->session()->flash('mesg',$mesg); 
       
        return back();
    }
}
