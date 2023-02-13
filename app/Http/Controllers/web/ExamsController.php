<?php

namespace App\Http\Controllers\web;

use App\Models\Exam;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ExamsController extends Controller
{
    public function show($examId){

        $data['exam']= Exam::findOrFail($examId);
        $user= Auth::user();
        $data['canShowStartBtn']= true;
        if($user != null){

            $pivotRow= $user->exams()->where('exam_id',$examId)->first();

            if(  $pivotRow != null and $pivotRow->pivot->status == "closed" ){

                $data['canShowStartBtn']= false;
            }

        }
        

        return view('web.exams.show')->with($data);
    }

    public function start($examId, Request $request){
       //add  in pivot table with attach
      $user=  Auth::user();

      if(! $user->exams->contains($examId)){
        $user->exams()->attach($examId);

      }else{//if admin active exam for student close it agin
        $user->exams()->UpdateExistingPivot($examId,
        [
            'status'=>'closed'
        ]);
      }
      

        $request->session()->flash('prev',"start/$examId");
      return redirect(url("exams/questions/$examId")) ;

    }

    public function questions($examId ,Request $request){

        if(session('prev') !== "start/$examId"){
            return redirect(url("exams/show/$examId"));

        }
        
        $data['exam']= Exam::findOrFail($examId);

        $request->session()->flash('prev',"question/$examId");
        return view('web.exams.questions')->with($data);;
    }

    public function submit($examId ,Request $request){

       if(session('prev') !== "question/$examId"){
            return redirect(url("exams/show/$examId"));

        }
 // score
        $request->validate([
            "answer" => "required|array",
            "answer.*" => "required|in: 1,2,3,4"
        ]);
        $exam= Exam::findOrFail($examId);
        $points=0;
        $toyalQuesNum = $exam->questions->count();

        foreach($exam->questions as $quet){
            if(isset($request->answer[$quet->id])){
            
                $userAns= $request->answer[$quet->id];
                $eirhtAns= $quet->right_ans;
                if($userAns== $eirhtAns){
                    $points += 1;}
            } 
        }
        $score = ($points /$toyalQuesNum) *100; 
    // caculate time of exame
      

    $timeOfSubmit = Carbon::now();
    $user= Auth::user();
    $pivotRow= $user->exams()->where('exam_id',$examId)->first();
    
    $startTime= $pivotRow->pivot->created_at;
        $timeMins= $timeOfSubmit->diffInMinutes($startTime);
        if($timeMins > $pivotRow->duration_minss){
            $score=0;
        }
// update in pivot table(update existig pivot)
     $user->exams()->UpdateExistingPivot($examId,[
        'score'=> $score,
        'time_mins'=>$timeMins
     ]);

     $request->session()->flash("success" , "you finish exam successfuly with score $score%");
   return redirect(url("exams/show/$examId"));

        //dd($vv);
    }
}
