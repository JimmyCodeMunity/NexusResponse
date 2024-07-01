<?php

namespace App\Http\Controllers;

use App\Mail\NewUserNotification;
use App\Models\ResponseModel;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class UserController extends Controller
{

    public function userlist(){
        $data['getRecord'] = User::getUsers();
        return view('admin.user.list',$data);
    }

    public function userdashboard(){
        $data['getEmergencyHistory'] = ResponseModel::getEmergencyHistory();
        return view('admin.dashboard',$data);
    }

    public function adduserroute(){
        return view('admin/user/add');
    }



    public function useredit($id){
        $data['getRecord'] = User::getSingle($id);
        return view('admin.user.edit',$data);
    }
    
    public function adduser(Request $request)
    {
        // dd($request->all());

        $user = new User();
        $user->name = trim($request->name);
        $request->validate([
            'name' => 'required',
            'profile_pic' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
        $imageName = time().'.'.$request->profile_pic->extension();
        $request->profile_pic->move(public_path('images'), $imageName);
        // $user->profile_pic = trim($request->profile_pic);
        $user->profile_pic = 'images/'.$imageName;
        $user->blood_type = trim($request->blood_type);
        $user->blood_pressure = trim($request->blood_pressure);
        $user->age = trim($request->age);
        $user->contact = trim($request->contact);
        $user->insurance = trim($request->insurance);
        $user->address = trim($request->address);
        $user->height = trim($request->height);
        $user->weight = trim($request->weight);
        $user->email = trim($request->email);
        $user->password = Hash::make($request->password);
        $user->allergies = trim($request->allergies);
        $user->user_type = 3;
        $user->save();
        event(new Registered($user));

        // Send email to admin
        Mail::to('admin@nexus.com')->send(new NewUserNotification($user));


        return redirect('admin/user/list')->with('success', 'new user added successfully');
    }


    public function updateuser($id, Request $request){
        request()->validate([
            'email' => 'required|email|unique:users,email,'.$id
        ]);

        $user = User::getSingle($id);
        $user->name = trim($request->name);
        $user->email = trim($request->email);
        if(!empty($request->password)){
            $user->password = Hash::make($request->password);
        }
        if(!empty($request->profile_pic)){
            $imageName = time().'.'.$request->profile_pic->extension();
            $request->profile_pic->move(public_path('images'), $imageName);
            // $user->profile_pic = trim($request->profile_pic);
            $user->profile_pic = 'images/'.$imageName;
        }
        $user->blood_type = trim($request->blood_type);
        $user->blood_pressure = trim($request->blood_pressure);
        $user->age = trim($request->age);
        $user->contact = trim($request->contact);
        $user->insurance = trim($request->insurance);
        $user->address = trim($request->address);
        $user->height = trim($request->height);
        $user->weight = trim($request->weight);
        $user->allergies = trim($request->allergies);
        $user->user_type = 3;
        $user->save();

        if(Auth::user()->user_type == 1){
            return redirect('admin/dashboard')->with('success','admin Updated successfully');
        }else{
            return redirect('user/dashboard')->with('success','user Updated successfully');
        }
        
    }


    public function deleteuser($id){
        $user = User::getSingle($id);
        $user->is_delete = 1;
        $user->save();

        return redirect('admin/admin/list')->with('success','admin Deleted successfully');

    }
}
