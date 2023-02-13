<?php

namespace App\Http\Controllers\admin;

use Exception;
use App\Models\Cat;
use App\Models\Skill;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class AdminSkillsController extends Controller
{
    public function index(){

        $data['skills']= Skill::orderBy('id','DESC')->paginate(10); 
        $data['cats']=Cat::select('id','name')->get();
        return view('admin.skills.index')->with($data);
     }
     public function store(Request $request){

        $request->validate([
            'name_ar'=>'required|max:50',
            'name_en'=>'required|max:50',
            'img'=>'required|image|max:2048',
            'cat_id'=>'required|exists:Cats,id',
        ]);
       
        $path = Storage::putFile("skills",$request->file('img'));
       
 //dd($path);
        Skill::create([
            'name'=> json_encode([
                'en'=>$request->name_en,
                'ar'=>$request->name_ar,
            ]), 'cat_id'=> $request->cat_id,
            'img'=> $path
            ]);
          $request->session()->flash('mesg','row added successfully');  
        
            return back();
    }

    public function update(Request $request){

        $request->validate([
            'id'=>'required|exists:skills,id',
            'name_ar'=>'required|max:50',
            'name_en'=>'required|max:50',
            'img'=>'nullable|image|max:2048',
            'cat_id'=>'required|exists:Cats,id',
        ]);
        
       $skill= Skill::findOrFail($request->id) ; 
       $path = $skill->img;
       if($request->hasFile('img')){
        Storage::delete($path);
        $path = Storage::putFile("skills",$request->file('img'));
       }
       
       $skill->update([
            'name'=> json_encode([
                'en'=>$request->name_en,
                'ar'=>$request->name_ar,
            ])
            ]);
            $request->session()->flash('mesg','row updated successfully'); 
            return back();
    }

    
    public function toggle(Skill $skill){


        $skill->update([
            'active'=> ! $skill->active
        ]);
        return back();
    }


    public function delete(Skill $skill ,Request $request){
        try{
            
            $path = $skill->img;
           $skill->delete();
        Storage::delete($path);
           
            $mesg= "row deleted successfully";
        } catch(Exception $e){

            $mesg= "can`t delete this row";
        }
   
         
        $request->session()->flash('mesg',$mesg); 
   
    return back();
}
}
