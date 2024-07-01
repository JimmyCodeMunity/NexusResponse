<?php

namespace App\Http\Controllers;

use App\Mail\NewUserNotification;
use App\Models\ResponseModel;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class MedicController extends Controller
{
    //

    public function medicdashboard(){
        $data['getMyEmergencies'] = ResponseModel::getMyUnassignedEmergencies();
        $data['getMyCompletedEmergencies'] = ResponseModel::getMyAssignedEmergencies();
        return view('admin.dashboard',$data);
    }
    public function addmedicroute(){
        return view('admin.medic.add');
    }

    //get list of medics
    public function mediclist(){
        $data['getRecord'] = User::getMedic();
        return view('admin.medic.list',$data);
    }

    public function medicedit($id){
        $data['getRecord'] = User::getSingle($id);
        return view('admin.medic.edit',$data);
    }
    public function markcomplete($id){
        $reponse = ResponseModel::getSingle($id);
        $reponse->served = 1;
        $reponse->save();

        return redirect('medic/dashboard')->with('success','admin Deleted successfully');
    }


    public function addmedic(Request $request){
        $user = new User();
        $request->validate([
            'name' => 'required',
            'profile_pic' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
        $user->name = trim($request->name);
        $user->contact = trim($request->contact);
        $imageName = time().'.'.$request->profile_pic->extension();
        $request->profile_pic->move(public_path('images'), $imageName);
        // $user->profile_pic = trim($request->profile_pic);
        $user->profile_pic = 'images/'.$imageName;
        $user->email = trim($request->email);
        $user->password = Hash::make($request->password);
        $user->blood_type = trim($request->blood_type);
        $user->user_type = 2;
        $user->save();

        event(new Registered($user));

        // Send email to admin
        Mail::to('admin@nexus.com')->send(new NewUserNotification($user));


        return redirect('admin/medic/list')->with('success', 'new user added successfully');

    }



    public function updatemedic($id, Request $request){
        request()->validate([
            'email' => 'required|email|unique:users,email,'.$id
        ]);

        $user = User::getSingle($id);
        $user->name = trim($request->name);
        $user->contact = trim($request->contact);
        
        $user->email = trim($request->email);
        $user->blood_type = trim($request->blood_type);
        
        if(!empty($request->password)){
            $user->password = Hash::make($request->password);
        }
        if(!empty($request->profile_pic)){
            $imageName = time().'.'.$request->profile_pic->extension();
            $request->profile_pic->move(public_path('images'), $imageName);
            // $user->profile_pic = trim($request->profile_pic);
            $user->profile_pic = 'images/'.$imageName;
        }
        $user->user_type = 2;
        $user->save();

        return redirect('/medic/dashboard')->with('success','medic Updated successfully');
    }


    public function deletemedic($id){
        $user = User::getSingle($id);
        $user->is_delete = 1;
        $user->save();

        return redirect('admin/medic/list')->with('success','admin Deleted successfully');

    }
}
