<?php

namespace App\Http\Controllers\admin;

use App\Models\Exam;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminStudentsController extends Controller
{
     
    public function index(){

        $studentRole= Role::where('name','student')->first();
        
        $data['students']=User::where('role_id',$studentRole->id)->orderBy('id','DESC')->paginate(10);
        
        return view('admin.students.index')->with($data);
     }

     public function showScore($id){

        $student= User::findOrfail($id);

        if($student->role->name !== 'student'){
            return back();
        }
        $data['student']=$student;
        $data['exams']= $student->exams;

        return view('admin.students.show-scoer')->with($data);

     }

     public function openExam($studentId, $examId){

        $student= User::findOrfail($studentId);

        $student->exams()->UpdateExistingPivot($examId,
        [
            'status'=>'opened'
        ]);

        return back();

     }

     
     public function closeExam($studentId, $examId){

        $student= User::findOrfail($studentId);

        $student->exams()->UpdateExistingPivot($examId,
        [
            'status'=>'closed'
        ]);
        return back();
     }

   
}
