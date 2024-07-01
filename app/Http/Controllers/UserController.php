<?php

namespace App\Http\Controllers;

use App\Mail\NewUserNotification;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class UserController extends Controller
{

    public function userlist(){
        $data['getRecord'] = User::getUsers();
        return view('admin.user.list',$data);
    }

    public function adduserroute(){
        return view('admin/user/add');
    }

    
    public function adduser(Request $request)
    {
        // dd($request->all());

        $user = new User();
        $user->name = trim($request->name);
        if (!empty($request->file('profile_pic'))) {
            $ext = $request->file('profile_pic')->getClientOriginalExtension();
            $file = $request->file('profile_pic');
            $randomStr = Str::random(20);
            $filename = strtolower($randomStr) . '.' . $ext;
            $file->move('uploads/profile', $filename);
            $user->profile_pic = $filename;
        }
        $user->profile_pic = trim($request->profile_pic);
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
}
