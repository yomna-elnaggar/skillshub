<?php

namespace App\Http\Controllers\admin;

use Exception;
use App\Models\Exam;
use App\Models\Skill;
use App\Models\Question;
use Illuminate\Http\Request;
use App\Events\ExamAddedEvent;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class AdminExamsController extends Controller
{
    
    public function index(){

        $data['exams']= Exam::orderBy('id','DESC')->paginate(10); 
        $data['skills']=Skill::select('id','name')->get();
        return view('admin.exams.index')->with($data);
     }
     
    public function show(Exam $exam){

        $data['exam']= $exam;//findorfail  // 
     
        return view('admin.exams.show')->with($data);
     }

     public function  showQuestion(Exam $exam){

        $data['exam']= $exam;//findorfail  // 
     
        return view('admin.exams.showQuestion')->with($data);
     }

     public function create(){

        $data['skills']= Skill::select('id','name')->get();
       
        return view('admin.exams.create')->with($data);
     }

     public function store(Request $request){

        $request->validate([
            'name_ar'=>'required|max:50',
            'name_en'=>'required|max:50',
            'desc_ar'=>'required|max:5000',
            'desc_en'=>'required|max:5000',
            'img'=>'required|image|max:2048',
            'skill_id'=>'required|exists:Skills,id',
            'questions_no'=>'required|integer',
            'difficulty'=>'required|integer|min:1|max:5',
            'duration_minss'=>'required|integer|min:1',
        ]);
       
        //$path = Storage::putFile("exams",$request->file('img'));
        if($request->hasfile('img'))
        {  $file=$request->file('img') ;
           
             $name = $file->getClientOriginalName();
             $file->storeAs('uploads/exams', $file->getClientOriginalName(),'upload_attachments');
         }

       $exam= Exam::create([
            'name'=> json_encode([
                'en'=>$request->name_en,
                'ar'=>$request->name_ar,
            ]), 
            'desc'=> json_encode([
                'en'=>$request->desc_en, 
                'ar'=>$request->desc_ar,
            ]),'skill_id'=> $request->skill_id,
              'img'=> $name,
             'questions_no'=> $request->questions_no,
             'difficulty'=> $request->difficulty,
             'duration_minss'=> $request->duration_minss,
             'active'=> 0,
            ]);
          $request->session()->flash('prev',"exam/$exam->id");  
        
            return redirect(url("dashboard/exams/create_question/{$exam->id}"));
    }

    public function createQuestion(Exam $exam){

        if(session('prev') !== "exam/$exam->id"){
            return redirect(url("dashboard/exams/create_question/{$exam->id}"));

        }
        
        $data['exam_id'] = $exam->id;
        $data['questions_no'] = $exam->questions_no;
         
        return view('admin.exams.createQuestion')->with($data);
        
    }

    public function storeQuestion(Exam $exam , Request $request){
        $request->validate([
            'title'=>'required|array',
            'title.*'=>'required|string|max:500',
            'right_ans'=>'required|array',
            'right_ans.*'=>'required|in:1,2,3,4',
            'option_1s'=>'required|array',
            'option_1s.*'=>'required|string|max:255',
            'option_2s'=>'required|array',
            'option_2s.*'=>'required|string|max:255',
            'option_3s'=>'required|array',
            'option_3s.*'=>'required|string|max:255',
            'option_4s'=>'required|array',
            'option_4s.*'=>'required|string|max:255',
            
        ]);

        for($i=0 ; $i < $exam->questions_no;$i++){
            Question::create([
                'exam_id'=>$exam->id,
                'title'=> $request->title[$i],
                'option_1'=> $request->option_1s[$i],
                 'option_2'=> $request->option_2s[$i],
                 'option_3'=> $request->option_3s[$i],
                 'option_4'=> $request->option_4s[$i],
                 'right_ans'=> $request->right_ans[$i],
                ]);
        }

        $exam->update([
            'active'=>1,
        ]);

        event(new ExamAddedEvent);

        return redirect(url("dashboard/exams"));
    }
     public function edit(Exam $exam){

            $data['skills']= Skill::select('id','name')->get();
            $data['exam']=$exam;//find or fail

            return view('admin.exams.edit')->with($data);
     }

     public function update(Exam $exam ,Request $request){
       
        
        $request->validate([
            'name_ar'=>'required|max:50',
            'name_en'=>'required|max:50',
            'desc_ar'=>'required|max:5000',
            'desc_en'=>'required|max:5000',
            'img'=>'nullable|image|max:2048',
            'skill_id'=>'required|exists:Skills,id',
            'difficulty'=>'required|integer|min:1|max:5',
            'duration_minss'=>'required|integer|min:1',
        ]);

       
        $path = $exam->img;
        if($request->hasFile('img')){
         Storage::delete($path);
         $path = Storage::putFile("exams",$request->file('img'));
        }
        
       $exam->update([
        'name'=> json_encode([
            'en'=>$request->name_en,
            'ar'=>$request->name_ar,
        ]) , 'desc'=> json_encode([
            'en'=>$request->desc_en, 
            'ar'=>$request->desc_ar,
        ]),'skill_id'=> $request->skill_id,
          'img'=> $path,
         
         'difficulty'=> $request->difficulty,
         'duration_minss'=> $request->duration_minss,
         
        ]);
        $request->session()->flash('mesg','row updated successfully'); 
        return redirect(url("dashboard/exams/show/{$exam->id}"));
     }

     public function editQuestion(Exam $exam, Question $question){

        $data['exam']= $exam;
        $data['question']=$question;//find or fail

        return view('admin.exams.edit_question')->with($data);
 }
         public function updateQuestion(Exam $exam, Question $question,Request $request){
          $data=  $request->validate([
            
                'title'=>'required|string|max:500',
                'right_ans'=>'required|in:1,2,3,4',
                'option_1'=>'required|string|max:255',
                'option_2'=>'required|string|max:255',
                'option_3'=>'required|string|max:255',
                'option_4'=>'required|string|max:255',
                
            ]);


            $question->update($data);
            return redirect(url("dashboard/exams/show/{$exam->id}"));
         }

         
    public function delete(Exam $exam,Request $request){
        try{
            
            $path = $exam->img;
            $exam->questions()->delete();
           $exam->delete();
           Storage::delete($path);
           
            $mesg= "row deleted successfully";
        } catch(Exception $e){

            $mesg= "can`t delete this row";
        }
   
         
        $request->session()->flash('mesg',$mesg); 
   
    return back();
}
public function toggle(Exam $exam){

 if($exam->questions_no == $exam->questions()->count()){
    $exam->update([
        'active'=> ! $exam->active
    ]);}
    return back();
}
    
}
