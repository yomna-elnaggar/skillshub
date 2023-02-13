<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class langController extends Controller
{
    public function set($lang , Request $request){

        $acceptedlang=['en','ar'];
        if(! in_array($lang,$acceptedlang)){
            $lang='en';

        }

        $request->session()->put('lang',$lang);

        return back();

    }
}
