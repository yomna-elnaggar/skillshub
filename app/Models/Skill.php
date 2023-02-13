<?php

namespace App\Models;

use Illuminate\Support\Facades\App;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Skill extends Model
{
    use HasFactory;

    protected $guarded =['id','created_at','updated_at'];

    public function cat(){

        return $this->belongsTo(Cat::class);
    }

    public function exams(){

        return $this->hasMany(Exam::class);
    }

    public function name($lang = null){

        $lang= $lang ?? App::getLocale();

        return json_decode($this->name)->$lang;
    }

    public function getStudentsCount(){
        $studentNum=0;
        foreach($this->exams as $exam ){
            $studentNum += $exam->users->count();

        }
        return $studentNum;
    }
    public function scopeActive($query){
        return $query->where('active' ,1);
    }
}
