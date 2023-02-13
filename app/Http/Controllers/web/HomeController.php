<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cat;

class HomeController extends Controller
{
    public function index(){

       
        return view('web.home.index');
    }
}
