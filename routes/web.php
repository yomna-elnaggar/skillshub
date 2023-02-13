<?php
use App\Http\Middleware\Lang;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\web\CatController;
use App\Http\Controllers\web\HomeController;
use App\Http\Controllers\web\langController;
use App\Http\Controllers\web\UserController;
use App\Http\Controllers\web\ExamsController;
use App\Http\Controllers\web\SkillsController;
use App\Http\Controllers\admin\AdminController;
use App\Http\Controllers\web\ContactController;
use App\Http\Controllers\web\ProfileController;
use App\Http\Controllers\admin\AdminCatController;
use App\Http\Controllers\admin\AdminAdminController;
use App\Http\Controllers\admin\AdminExamsController;
use App\Http\Controllers\admin\AdminSkillsController;
use App\Http\Controllers\admin\AdminMessageController;
use App\Http\Controllers\admin\AdminStudentsController;













/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/*Route::get('/', function () {
    return view('welcome');
});*/

Route::middleware('lang')->group(function(){
Route::get('/',[HomeController::class,'index']);
Route::get('/categories/show/{id}',[CatController::class,'show']);
Route::get('/skills/show/{id}',[SkillsController::class,'show']);
Route::get('/exams/show/{id}',[ExamsController::class,'show'])->middleware(['auth','student']);
Route::get('/exams/questions/{id}',[ExamsController::class,'questions']);
Route::get('contact',[ContactController::class,'index']); //->middleware('verified');
Route::post('contact/message/send',[ContactController::class,'send']);
Route::get('profile',[ProfileController::class,'index'])->middleware(['auth','student']);

});
Route::post('/exams/start/{id}',[ExamsController::class,'start'])->middleware(['auth','student','canEnterExam']);
Route::post('/exams/submit/{id}',[ExamsController::class,'submit'])->middleware(['auth','student']);
Route::get('/lang/set/{lang}',[langController::class,'set']);


Route::prefix('dashboard')->middleware(['auth','canEnterDashboard'])->group(function(){
    Route::get('/',[AdminController::class,'index']);
    Route::get('/cat',[AdminCatController::class,'index']);
    Route::post('/cat/store',[AdminCatController::class,'store']);
    Route::get('/cat/delete/{cat}',[AdminCatController::class,'delete']);
    Route::post('/cat/update',[AdminCatController::class,'update']);
    Route::get('/cat/toggle/{cat}',[AdminCatController::class,'toggle']);


    Route::get('/skills',[ AdminSkillsController::class,'index']);
    Route::post('/skills/store',[AdminSkillsController::class,'store']);
    Route::get('/skills/delete/{skill}',[AdminSkillsController::class,'delete']);
    Route::post('/skills/update',[AdminSkillsController::class,'update']);
    Route::get('/skills/toggle/{skill}',[AdminSkillsController::class,'toggle']);

    Route::get('/exams',[ AdminExamsController::class,'index']);
    Route::get('/exams/show/{exam}',[AdminExamsController::class,'show']);
    Route::get('/exams/show/{exam}/question',[AdminExamsController::class,'showQuestion']);
    Route::get('/exams/create',[AdminExamsController::class,'create']);
    Route::post('/exams/store',[AdminExamsController::class,'store']);
    Route::get('/exams/create_question/{exam}',[AdminExamsController::class,'createQuestion']);
    Route::post('/exams/store_question/{exam}',[AdminExamsController::class,'storeQuestion']);
    Route::get('/exams/delete/{exam}',[AdminExamsController::class,'delete']);
    Route::get('/exams/edit/{exam}',[AdminExamsController::class,'edit']);
    Route::post('/exams/update/{exam}',[AdminExamsController::class,'update']);
    Route::get('/exams/edit_question/{exam}/{question}',[AdminExamsController::class,'editQuestion']);
    Route::post('/exams/update_question/{exam}/{question}',[AdminExamsController::class,'updateQuestion']);
    Route::get('/exams/toggle/{exam}',[AdminExamsController::class,'toggle']);

    Route::get('/students',[AdminStudentsController::class,'index']);
    Route::get('/students/show-score/{id}',[AdminStudentsController::class,'showScore']);
    Route::get('/students/open-exam/{studentId}/{examId}',[AdminStudentsController::class,'openExam']);
    Route::get('/students/close-exam/{studentId}/{examId}',[AdminStudentsController::class,'closeExam']);

    Route::middleware('superadmin')->group(function(){
      Route::get('/admins',[AdminAdminController::class,'index']);
      Route::get('/admins/create',[AdminAdminController::class,'create']);
      Route::post('/admins/store',[AdminAdminController::class,'store']);
      Route::get('/admins/promote/{id}',[AdminAdminController::class,'promote']);
      Route::get('/admins/demote/{id}',[AdminAdminController::class,'demote']);
    });

    Route::get('/messages',[AdminMessageController::class,'index']);
    Route::get('/messages/show/{message}',[AdminMessageController::class,'show']);
    Route::post('/messages/response/{message}',[AdminMessageController::class,'response']);
    
});