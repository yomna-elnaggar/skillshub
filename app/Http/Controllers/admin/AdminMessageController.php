<?php

namespace App\Http\Controllers\admin;

use App\Models\Message;
use Illuminate\Http\Request;
use App\Mail\ContactResponsMail;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;

class AdminMessageController extends Controller
{
    public function index(){

        $data['messages']= Message::orderBy('id','DESC')->paginate(10);

        return view('admin.messages.index')->with($data);
    }

    public function show(Message $message){

        $data['message']= $message;

        return view('admin.messages.show')->with($data);
    }
    public function response(Message $message , Request $request){

        $request->validate([
            'title'=>'required|string|max:255',
            'body'=>'required|string',
        ]);

        $reciverMail= $message->email;
        $reciverName =$message->name;

        Mail::to($reciverMail)->send(new ContactResponsMail($request->title,$request->body,$reciverName)
    );
    return redirect(url("dashboard/messages"));
    }
}
