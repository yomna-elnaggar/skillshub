<?php

namespace App\Http\Controllers\admin;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class AdminAdminController extends Controller
{
    public function index(){

        $adminRole= Role::where('name','admin')->first();
        $superadminRole= Role::where('name','superadmin')->first();

        $data['admins']= User::whereIn('role_id',[$adminRole->id,$superadminRole->id])
        ->orderBy('id','DESC')->paginate(10);

        return view('admin.admins.index')->with($data);
    }

    public function create(){
        $data['roles']= Role::whereIn('name',['admin','superadmin'])->get();

        return view('admin.admins.create')->with($data);
    }

    public function store(Request $request){

      $data=  $request->validate([
            'name'=>'required|string|max:255',
            'email'=>'required|email|max:255',
            'password'=>'required|string|min:5|max:25|confirmed',
            'role_id'=>'required|exists:roles,id',
        ]);
        //dd($request->all());
        $data['password']= Hash::make($request->password);

        User::create($data);
        return redirect(url("dashboard/admins"));

    }
    public function promote($adminId){
        
        $admin = User::findOrFail($adminId);

        $admin->update([
            'role_id'=> Role::where('name','superadmin')->first()->id
        ]);

        return redirect(url("dashboard/admins"));
    }

    public function demote($adminId){

        $admin = User::findOrFail($adminId);

        $admin->update([
            'role_id'=> Role::where('name','admin')->first()->id
        ]);

        return redirect(url("dashboard/admins"));
    }
}
